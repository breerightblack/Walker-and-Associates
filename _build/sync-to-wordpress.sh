#!/usr/bin/env bash
#
# Rebuild the WordPress-ready theme folder from this working folder.
#
#   1. regenerates the .php templates from the .html sources
#   2. copies only the files WordPress needs into ../walker-associates-wp/
#
# Run from the theme root:   bash _build/sync-to-wordpress.sh
#
set -euo pipefail

SRC="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
DEST="$(dirname "$SRC")/walker-associates-wp"

echo "→ Regenerating PHP templates from HTML sources"
cd "$SRC"
python3 _build/html-to-php.py
python3 _build/gen-team-bios.py

echo
echo "→ Rebuilding $DEST"
rm -rf "$DEST"
mkdir -p "$DEST"

# WordPress theme files only
cp "$SRC"/*.php          "$DEST"/
cp "$SRC"/style.css      "$DEST"/
cp "$SRC"/screenshot.png "$DEST"/ 2>/dev/null || true
cp -R "$SRC"/assets      "$DEST"/
[ -d "$SRC/template-parts" ] && cp -R "$SRC"/template-parts "$DEST"/

# Strip things WordPress shouldn't serve
rm -f  "$DEST"/assets/.DS_Store "$DEST"/.DS_Store
rm -rf "$DEST"/assets/images/.DS_Store
find "$DEST" -name '.DS_Store' -delete

echo
echo "→ Done. WordPress theme is at:"
echo "   $DEST"
echo
echo "   Files: $(find "$DEST" -type f | wc -l | tr -d ' ')"
echo "   To zip for upload:"
echo "     cd \"$(dirname "$DEST")\" && zip -r walker-associates-wp.zip walker-associates-wp -x '*.DS_Store'"
