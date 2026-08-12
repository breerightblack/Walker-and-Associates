#!/usr/bin/env python3
"""
Generate WordPress page templates from the HTML preview files.

The HTML files are the single source of truth. This lifts the page-hero +
<main> out of each one, rewrites links/asset paths to WordPress calls, and
wraps the result in get_header()/get_footer().

Run from the theme root:  python3 _build/html-to-php.py
"""
import re, sys, os, glob

# Rewrite slug of the team_member CPT in functions.php. Keep the two in sync:
# /team/ belongs to the WordPress Page, so individual bios live under this.
TEAM_CPT_SLUG = 'team-members'

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

VOID_TAGS = {'area','base','br','col','embed','hr','img','input','link',
             'meta','param','source','track','wbr'}

def strip_top_level(chunk, tags):
    """Remove <tag>…</tag> only where it is a DIRECT child of `chunk`.

    A same-named element nested inside other markup (a <header> inside a card,
    say) is content and must survive, so this tracks real nesting depth with
    a parser rather than pattern-matching tag pairs.
    """
    from html.parser import HTMLParser

    class Scanner(HTMLParser):
        def __init__(self):
            super().__init__(convert_charrefs=False)
            self.depth = 0
            self.spans = []       # (start, end) of top-level elements to drop
            self._open = None     # offset where the current drop started

        def _off(self):
            line, col = self.getpos()
            return self.line_starts[line - 1] + col

        def handle_starttag(self, tag, attrs):
            if tag in VOID_TAGS:
                return
            if self.depth == 0 and tag in tags and self._open is None:
                self._open = self._off()
            self.depth += 1

        def handle_startendtag(self, tag, attrs):
            pass                  # self-closing: no depth change

        def handle_endtag(self, tag):
            if tag in VOID_TAGS:
                return
            self.depth -= 1
            if self.depth == 0 and self._open is not None and tag in tags:
                self.spans.append((self._open, self._off() + len(f'</{tag}>')))
                self._open = None

    s = Scanner()
    starts, n = [0], 0
    for line in chunk.splitlines(keepends=True):
        n += len(line); starts.append(n)
    s.line_starts = starts
    try:
        s.feed(chunk)
    except Exception:
        return chunk              # never let the safety net corrupt output

    for start, end in reversed(s.spans):
        chunk = chunk[:start] + chunk[end:]
    return chunk

def convert_body(html):
    """Take everything inside <body>, minus the bits WordPress supplies itself.

    Previously this grabbed a hardcoded `<div class="page-hero">` plus
    `<main>…</main>`, which silently dropped anything else living outside
    <main> — practice-areas.html's `.pa-hero` and photos.html's lightbox
    dialog both vanished that way. Capturing the whole body means new markup
    can't go missing just because of where it sits in the document.

    header.php / footer.php own the nav and footer, so the wa-nav / wa-footer
    mount points and any <header>/<footer>/<nav>/<script> at body level are
    dropped here on purpose.
    """
    body = re.search(r'<body[^>]*>(.*)</body>', html, re.S)
    if not body:
        raise SystemExit("  !! no <body> found")
    b = body.group(1)

    # Elements WordPress renders for us, or that belong in wp_head/wp_footer.
    # The site chrome in these sources is the wa-nav / wa-footer mount point
    # that nav.js fills in, so those are what we drop.
    b = re.sub(r'<div id="wa-(?:nav|footer)"\s*>\s*</div>', '', b)
    b = re.sub(r'<script\b[^>]*>.*?</script>', '', b, flags=re.S)
    b = re.sub(r'<script\b[^>]*/>', '', b)

    # Safety net for hand-written site chrome. Only <header>/<footer> at body
    # level are chrome; <nav> is NOT stripped, because every <nav> in these
    # sources is a breadcrumb inside the page content.
    b = strip_top_level(b, ('header', 'footer'))

    # Give <main> the id/role the theme's templates and skip-links expect.
    if '<main' in b:
        b = re.sub(r'<main[^>]*>', '<main id="main" role="main">', b, count=1)

    return re.sub(r'\n{3,}', '\n\n', b).strip()

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
    # team member links: team/slug.html -> /team-members/slug/
    # Must track the team_member CPT rewrite slug in functions.php. The Page at
    # /team/ owns that path now, so bios live under /team-members/.
    body = re.sub(r'href="(?:\.\./)?team/([a-z0-9-]+)\.html"',
                  lambda m: '''href="<?php echo esc_url( home_url( '/%s/%s/' ) ); ?>"''' % (TEAM_CPT_SLUG, m.group(1)),
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

# Slugs that exist BOTH at the root (a pillar hub page) and under
# practice-areas/ (a single practice area). WordPress matches page-{slug}.php on
# the slug alone and ignores the parent, so the two would fight over one
# template file. We emit both under distinct names plus a dispatcher.
def collisions():
    root = {os.path.basename(f) for f in glob.glob('*.html')}
    return {os.path.basename(f)[:-5]
            for f in glob.glob('practice-areas/*.html')
            if os.path.basename(f) in root}

COLLIDING = collisions()

def build(html_file, php_file, template_name):
    if not os.path.exists(html_file):
        print(f"  skip {html_file} (missing)"); return False
    slug = os.path.basename(html_file)[:-5]
    if slug in COLLIDING and not os.path.dirname(html_file):
        php_file = f'page-{slug}-pillar.php'
        template_name += ' (Hub)'
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
        open(f'page-{slug}-area.php' if slug in COLLIDING else f'page-{slug}.php','w').write(out)
        n += 1
    n += build_dispatchers()
    print(f"  \u2713 {n} practice-area templates")
    return n

def build_dispatchers():
    """For a colliding slug, page-{slug}.php picks the hub or the practice-area
    template by looking at the page's parent. Keeps both URLs working."""
    for slug in sorted(COLLIDING):
        out = (f"<?php\n/**\n * Dispatcher for the '{slug}' slug.\n *\n"
               f" * This slug is used twice: a hub page at /{slug}/ and a practice\n"
               f" * area at /practice-areas/{slug}/. WordPress matches page-{{slug}}.php\n"
               f" * on the slug alone, so we route on the page's parent here.\n *\n"
               f" * GENERATED by _build/html-to-php.py \u2014 do not hand-edit.\n */\n"
               f"$wa_parent = wp_get_post_parent_id( get_queried_object_id() );\n"
               f"$wa_parent_slug = $wa_parent ? get_post_field( 'post_name', $wa_parent ) : '';\n"
               f"include locate_template(\n"
               f"    $wa_parent_slug === 'practice-areas'\n"
               f"        ? 'page-{slug}-area.php'\n"
               f"        : 'page-{slug}-pillar.php'\n"
               f");\n")
        open(f'page-{slug}.php','w').write(out)
        print(f"  \u2713 dispatcher  ->  page-{slug}.php")
    return len(COLLIDING)

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
