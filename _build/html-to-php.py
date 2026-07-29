#!/usr/bin/env python3
"""
Generate WordPress page templates from the HTML preview files.

The HTML files are the single source of truth. This lifts the page-hero +
<main> out of each one, rewrites links/asset paths to WordPress calls, and
wraps the result in get_header()/get_footer().

Run from the theme root:  python3 _build/html-to-php.py
"""
import re, sys, os

# html file -> (php template, WP "Template Name")
PAGES = {
    'about.html':          ('page-about.php',          'About the Firm'),
    'team.html':           ('page-team.php',           'Our Team'),
    'consultation.html':   ('page-consultation.php',   'Consultation'),
    'contact.html':        ('page-contact.php',        'Contact'),
    'media.html':          ('page-media.php',          'Media & Press'),
    'testimonials.html':   ('page-testimonials.php',   'Testimonials'),
    'photos.html':         ('page-photos.php',         'Photos'),
    'disclaimer.html':     ('page-disclaimer.php',     'Disclaimer'),
    'privacy-policy.html': ('page-privacy-policy.php', 'Privacy Policy'),
    'accessibility.html':  ('page-accessibility.php',  'Accessibility'),
    'practice-areas.html': ('page-practice-areas.php', 'Practice Areas'),
}

# .html filename -> WordPress slug
SLUGS = {
    'index.html': '/', 'about.html': '/about/', 'team.html': '/team/',
    'practice-areas.html': '/practice-areas/', 'media.html': '/media/',
    'photos.html': '/photos/', 'testimonials.html': '/testimonials/',
    'contact.html': '/contact/', 'consultation.html': '/consultation/',
    'disclaimer.html': '/disclaimer/', 'privacy-policy.html': '/privacy-policy/',
    'accessibility.html': '/accessibility/',
}

def convert_body(html):
    """Extract page-hero (if present) + <main>…</main>."""
    parts = []
    hero = re.search(r'<div class="page-hero">.*?</div>\s*</div>', html, re.S)
    if hero:
        parts.append(hero.group(0))
    main = re.search(r'<main[^>]*>.*?</main>', html, re.S)
    if not main:
        raise SystemExit("  !! no <main> found")
    m = main.group(0)
    # give WP the id/role its templates use
    m = re.sub(r'^<main[^>]*>', '<main id="main" role="main">', m, count=1)
    parts.append(m)
    return '\n\n'.join(parts)

def wp_ify(body):
    # team member links: team/slug.html -> /team/slug/
    body = re.sub(r'href="(?:\.\./)?team/([a-z0-9-]+)\.html"',
                  lambda m: '''href="<?php echo esc_url( home_url( '/team/%s/' ) ); ?>"''' % m.group(1),
                  body)
    # internal page links
    def link(m):
        f = m.group(1) + '.html'
        anchor = m.group(2) or ''
        slug = SLUGS.get(f)
        if not slug:
            return m.group(0)
        return '''href="<?php echo esc_url( home_url( '%s' ) ); ?>%s"''' % (slug, anchor)
    body = re.sub(r'href="([a-z0-9-]+)\.html(#[a-z0-9-]+)?"', link, body)
    # theme images
    body = re.sub(r'src="(?:\.\./)?assets/images/([^"]+)"',
                  lambda m: '''src="<?php echo esc_url( wa_img( '%s' ) ); ?>"''' % m.group(1),
                  body)
    # theme video
    body = re.sub(r'src="(?:\.\./)?assets/video/([^"]+)"',
                  lambda m: '''src="<?php echo esc_url( get_template_directory_uri() . '/assets/video/%s' ); ?>"''' % m.group(1),
                  body)
    return body

def build(html_file, php_file, template_name):
    if not os.path.exists(html_file):
        print(f"  skip {html_file} (missing)"); return False
    html = open(html_file).read()
    body = wp_ify(convert_body(html))
    out = (f"<?php\n/**\n * Template Name: {template_name}\n *\n"
           f" * GENERATED from {html_file} by _build/html-to-php.py — do not hand-edit.\n"
           f" * Edit {html_file}, then re-run the build script.\n */\n"
           f"get_header();\n?>\n\n{body}\n\n<?php get_footer(); ?>\n")
    open(php_file,'w').write(out)
    print(f"  ✓ {html_file}  ->  {php_file}")
    return True

# ── Homepage: index.html has no <main>; body content sits between </header> and <footer> ──
def build_front_page():
    html = open('index.html').read()
    start = html.index('</header>') + len('</header>')
    end   = html.index('<footer')
    body  = html[start:end].strip()
    body  = wp_ify(body)
    body  = '<main id="main" role="main">\n' + body + '\n</main>'
    out = ("<?php\n/**\n * Front Page (static homepage)\n *\n"
           " * GENERATED from index.html by _build/html-to-php.py — do not hand-edit.\n"
           " * Edit index.html, then re-run the build script.\n */\n"
           "get_header();\n?>\n\n" + body + "\n\n<?php get_footer(); ?>\n")
    open('front-page.php','w').write(out)
    print("  \u2713 index.html  ->  front-page.php")

if __name__ == '__main__':
    print("Generating WordPress templates from HTML sources:")
    n = sum(build(h, p, t) for h, (p, t) in PAGES.items())
    build_front_page(); n += 1
    print(f"\n{n} templates generated.")
