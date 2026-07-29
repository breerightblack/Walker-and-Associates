#!/usr/bin/env python3
"""
Regenerate the $bios array in single-team_member.php from the team/*.html files.
team/*.html is the source of truth. Run from theme root.
"""
import re, glob, os

ORDER = ['james-walker','paul-wilson-ii','enrique-ramos','stephanie-hay','taja-nave',
         'russ-green','j-richard-byrd','gina-e-ryan','yillian-sarmiento',
         'sarah-manowitz','joel-snellings','blythe-silvetz']

def php_str(s):
    return "'" + s.replace('\\', '\\\\').replace("'", "\\'") + "'"

def parse(slug):
    path = f'team/{slug}.html'
    if not os.path.exists(path): return None
    s = open(path).read()
    name  = re.search(r'<h1 class="bio-name">(.*?)</h1>', s, re.S)
    title = re.search(r'<p class="bio-title">(.*?)</p>', s, re.S)
    photo = re.search(r'<img class="bio-photo" src="\.\./assets/images/team/([^"]+)"', s)
    focus = re.findall(r'flex-shrink:0;"></span>(.*?)</span>', s, re.S)
    art   = re.search(r'<article class="bio-content">(.*?)</article>', s, re.S)
    if not (name and title and photo and art): return None
    # keep block-level elements as discrete HTML strings
    blocks = re.findall(r'<(p|h3)\b[^>]*>.*?</\1>', art.group(1), re.S)
    blocks = [' '.join(b.split()) for b in blocks]
    return {
        'name':  ' '.join(name.group(1).split()),
        'title': ' '.join(title.group(1).split()),
        'file':  photo.group(1),
        'focus': [' '.join(f.split()) for f in focus],
        'bio':   blocks,
    }

entries = []
for slug in ORDER:
    d = parse(slug)
    if not d:
        print(f"  !! skipped {slug}"); continue
    focus = ', '.join(php_str(f) for f in d['focus'])
    bio   = '\n'.join(f"      {php_str(b)}," for b in d['bio'])
    entries.append(
f"""  '{slug}' => [
    'name'  => {php_str(d['name'])},
    'title' => {php_str(d['title'])},
    'file'  => {php_str(d['file'])},
    'focus' => [ {focus} ],
    'bio'   => [
{bio}
    ],
  ],""")
    print(f"  ✓ {slug:22} ({len(d['bio'])} blocks, {len(d['focus'])} focus)")

array_php = "$bios = [\n\n" + "\n\n".join(entries) + "\n\n];"

p = 'single-team_member.php'
s = open(p).read()
# swap the array
start = s.index('$bios = [')
depth, i = 0, start
while True:
    if s[i] == '[': depth += 1
    elif s[i] == ']':
        depth -= 1
        if depth == 0:
            end = s.index(';', i) + 1
            break
    i += 1
s = s[:start] + array_php + s[end:]

# renderer: allow safe HTML instead of escaping it to literal text
s = s.replace("""          <?php foreach ( $member['bio'] as $para ) : ?>
          <p><?php echo esc_html( $para ); ?></p>
          <?php endforeach; ?>""",
"""          <?php foreach ( $member['bio'] as $block ) : ?>
          <?php echo wp_kses_post( $block ); ?>
          <?php endforeach; ?>""")
s = s.replace("""        <?php foreach ( $member['bio'] as $para ) : ?>
        <p><?php echo esc_html( $para ); ?></p>
        <?php endforeach; ?>""",
"""        <?php foreach ( $member['bio'] as $block ) : ?>
        <?php echo wp_kses_post( $block ); ?>
        <?php endforeach; ?>""")
# focus dot colour: --rust was removed from the palette
s = s.replace('background:var(--rust)', 'background:var(--gold-dark)')
s = s.replace('Bio data is hardcoded here until ACF custom fields are populated in WP admin.',
              'GENERATED from team/*.html by _build/gen-team-bios.py — do not hand-edit the $bios array.')
open(p,'w').write(s)
print(f"\n{len(entries)} bios written to {p}")
