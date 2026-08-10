#!/usr/bin/env python3
"""
Generate WordPress page templates from the HTML preview files.

The HTML files are the single source of truth. This lifts the page-hero +
<main> out of each one, rewrites links/asset paths to WordPress calls, and
wraps the result in get_header()/get_footer().

Run from the theme root:  python3 _build/html-to-php.py
"""
import re, sys, os, glob

# html file -> (php template, WP "Template Name")
PAGES = {
    'about.html':          ('page-about.php',          'About the Firm'),
    'all-practice-areas.html': ('page-all-practice-areas.php', 'All Practice Areas'),
    'entertainment-law.html':        ('page-entertainment-law.php',        'Entertainment Law'),
    'film-and-television-law.html':  ('page-film-and-television-law.php',  'Film & Television Law'),
    'litigation.html':               ('page-litigation.php',               'Litigation'),
    'corporate-law.html':            ('page-corporate-law.php',            'Corporate Law'),
    'team.html':           ('page-team.php',           'Our Team'),
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
    'practice-areas.html': '/practice-areas/',
    'all-practice-areas.html': '/all-practice-areas/', 'media.html': '/media/',
    'photos.html': '/photos/', 'testimonials.html': '/testimonials/',
    'contact.html': '/contact/',
    'entertainment-law.html': '/entertainment-law/',
    'film-and-television-law.html': '/film-and-television-law/',
    'litigation.html': '/litigation/',
    'corporate-law.html': '/corporate-law/',
    'disclaimer.html': '/disclaimer/', 'privacy-policy.html': '/privacy-policy/',
    'accessibility.html': '/accessibility/',
}

PA_SLUGS = {os.path.basename(f)[:-5] for f in glob.glob('practice-areas/*.html')}

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
    # practice-area links: practice-areas/slug.html -> /practice-areas/slug/
    body = re.sub(r'href="(?:\.\./)?practice-areas/([a-z0-9-]+)\.html"',
                  lambda m: '''href="<?php echo esc_url( home_url( '/practice-areas/%s/' ) ); ?>"''' % m.group(1),
                  body)
    # bare sibling links inside practice-areas/ (href="book-deals.html")
    def pa_sibling(m):
        sl = m.group(1)
        if sl in PA_SLUGS:
            return '''href="<?php echo esc_url( home_url( '/practice-areas/%s/' ) ); ?>"''' % sl
        return m.group(0)
    body = re.sub(r'href="([a-z0-9-]+)\.html"', pa_sibling, body)
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
    body = re.sub(r'href="(?:\.\./)?([a-z0-9-]+)\.html(#[a-z0-9-]+)?"', link, body)
    # theme images — src= and any data-* attribute pointing at assets/images
    body = re.sub(r'(src|data-full|data-src|data-thumb)="(?:\.\./)?assets/images/([^"]+)"',
                  lambda m: '''%s="<?php echo esc_url( wa_img( '%s' ) ); ?>"''' % (m.group(1), m.group(2)),
                  body)
    # inline CSS background-image url() pointing at theme images
    body = re.sub(r"""url\('(?:\.\./)?assets/images/([^']+)'\)""",
                  lambda m: '''url('<?php echo esc_url( wa_img( '%s' ) ); ?>')''' % m.group(1),
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
def build_practice_areas():
    import json
    n = 0
    for f in sorted(glob.glob('practice-areas/*.html')):
        slug = os.path.basename(f)[:-5]
        html = open(f).read()
        title = re.search(r'<h1>(.*?)</h1>', html, re.S)
        name = re.sub(r'<[^>]+>', '', title.group(1)).strip() if title else slug
        body = wp_ify(convert_pa_body(html))
        out = (f"<?php\n/**\n * Template Name: PA — {name}\n *\n"
               f" * GENERATED from {f} by _build/html-to-php.py — do not hand-edit.\n */\n"
               f"get_header();\n?>\n\n{body}\n\n<?php get_footer(); ?>\n")
        open(f'page-{slug}.php','w').write(out)
        n += 1
    print(f"  \u2713 {n} practice-area templates")
    return n

def convert_pa_body(html):
    parts = []
    hero = re.search(r'<div class="pa-page-hero">.*?\n</div>', html, re.S)
    if hero: parts.append(hero.group(0))
    main = re.search(r'<main[^>]*>.*?</main>', html, re.S)
    if main:
        parts.append(re.sub(r'^<main[^>]*>', '<main id="main" role="main">', main.group(0), count=1))
    return '\n\n'.join(parts)

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
    n += build_practice_areas()
    print(f"\n{n} templates generated.")
