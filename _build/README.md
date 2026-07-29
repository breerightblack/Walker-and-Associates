# Build & Deploy

Two folders, one source of truth.

| Folder | Purpose |
|---|---|
| `walker-associates-theme/` | **Edit here.** HTML previews + PHP templates + source docs. |
| `walker-associates-wp/` | **Generated.** WordPress theme only — this is what gets zipped. Never edit directly. |

## The rule

The `.html` files are the source of truth. The `.php` templates are generated
from them. This is what stopped the two folders drifting apart before.

## After making a change

```bash
bash _build/sync-to-wordpress.sh
```

That regenerates every `.php` template from its `.html` source, rebuilds the
team bios, and refreshes `walker-associates-wp/`.

## Zipping for WordPress

```bash
cd ~/Desktop && zip -r walker-associates-wp.zip walker-associates-wp -x '*.DS_Store'
```

## Files you edit by hand (not generated)

- `header.php`, `footer.php` — nav and footer
- `functions.php`, `functions-contact-handler.php`
- `assets/css/main.css`, `assets/js/main.js`
- `style.css` — bump `Version:` to bust WordPress's asset cache

## Adding the booking widget later

`consultation.html` has a marked slot:

```html
<div id="booking-widget" class="booking-slot">
```

In WordPress: edit the Consultation page, add a **Custom HTML** block, paste the
ThriveCart or Calendly embed. No template editing needed.

## Source documents

`_source-docs/` holds the client-supplied originals the content came from:
bios, testimonials, and the disclaimer spec. Not shipped to WordPress.
