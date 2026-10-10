#!/usr/bin/env bash
# Genera el ZIP instalable del tema CRISBAPRO.
#
# REGLA: la carpeta raíz DENTRO del ZIP es SIEMPRE "CRISBAPRO-TEMA-v2.0.1", aunque el tema
# suba a 2.0.2, 2.1.0 o 3.0.0. WordPress identifica el tema por el nombre de esa carpeta:
# si cambia, se instala como un tema distinto, se acumulan copias y se pierden el logo y
# los menús del Personalizador (se guardan por nombre de carpeta).
#
# Uso: bash scratchpad/build-crisbapro-zip.sh      (sale en la raíz del repo: CRISBAPRO-TEMA-v<version>.zip)
set -euo pipefail

SLUG="CRISBAPRO-TEMA-v2.0.1"
HERE="$(cd "$(dirname "$0")" && pwd)"
ROOT="$(cd "$HERE/.." && pwd)"
SRC="$HERE/$SLUG"

fail() { echo "ERROR: $1" >&2; exit 1; }

[ -d "$SRC" ] || fail "no existe $SRC (edita siempre esta carpeta; no crees copias con otro nombre)."

# 1. Una sola versión, coherente en los tres sitios, y con entrada en el changelog
v_style=$(grep -m1 '^Version:' "$SRC/style.css" | awk '{print $2}')
v_func=$(grep -m1 ' \* Version:' "$SRC/functions.php" | awk '{print $3}')
v_const=$(grep -m1 "define('CRISBAPRO_VERSION'" "$SRC/functions.php" | sed -E "s/.*'([0-9][0-9.]*)'\);.*/\1/")
[ -n "$v_style" ] || fail "no se encontró 'Version:' en style.css"
[ "$v_style" = "$v_func" ] && [ "$v_style" = "$v_const" ] \
  || fail "versiones distintas: style.css=$v_style functions.php(cabecera)=$v_func CRISBAPRO_VERSION=$v_const"
grep -q "^ \* $v_style - " "$SRC/functions.php" || fail "falta la entrada '$v_style' en el changelog de functions.php"
echo "Versión: $v_style (style.css, functions.php y CRISBAPRO_VERSION coinciden; changelog presente)"

# 2. Sintaxis
while IFS= read -r f; do php -l "$f" > /dev/null || fail "error de sintaxis PHP en $f"; done < <(find "$SRC" -name '*.php')
if command -v node > /dev/null; then
  while IFS= read -r f; do node --check "$f" || fail "error de sintaxis JS en $f"; done < <(find "$SRC" -name '*.js')
fi
echo "Sintaxis PHP/JS OK"

# 3. screenshot.png no debe cambiar por accidente
expected_sha=$(tr -d '[:space:]' < "$HERE/crisbapro-screenshot.sha256")
actual_sha=$(sha256sum "$SRC/screenshot.png" | awk '{print $1}')
if [ "$expected_sha" != "$actual_sha" ] && [ "${ALLOW_NEW_SCREENSHOT:-0}" != "1" ]; then
  fail "screenshot.png ha cambiado. Si es intencionado: ALLOW_NEW_SCREENSHOT=1 y actualiza crisbapro-screenshot.sha256"
fi
echo "screenshot.png sin cambios"

# 4. Los campos ACF existentes no se renombran ni se eliminan (si no, se pierde el contenido de la Home)
php "$HERE/crisbapro-check-fields.php" "$SRC"

# 4b. Todo campo del formulario de contacto debe procesarlo el servidor (si no, el dato se pierde sin avisar)
form_fields=$(sed -n '/id="presupuesto-form"/,/<\/form>/p' "$SRC/index.php" | grep -oE 'name="[^"]+"' | sed -E 's/name="([^"]+)"/\1/' | grep -v -E '^(crisbapro_form|web)$' | sort -u)
[ -n "$form_fields" ] || fail "no se encontraron campos en el formulario #presupuesto-form"
for f in $form_fields; do
  grep -q "\$field('$f')" "$SRC/functions.php" || fail "el campo '$f' del formulario no lo recoge crisbapro_handle_contact_form()"
done
echo "Formulario OK: todos los campos ($(echo $form_fields | tr '\n' ' ')) los recoge el servidor"

# 5. Construir el ZIP: carpeta raíz fija, sin carpetas vacías
OUT="$ROOT/CRISBAPRO-TEMA-v${v_style}.zip"
rm -f "$OUT"
(cd "$HERE" && zip -r -X -D -q "$OUT" "$SLUG")

# 6. Verificar que TODO el contenido cuelga de la carpeta fija
bad=$(unzip -Z1 "$OUT" | grep -v "^$SLUG/" || true)
[ -z "$bad" ] || fail "el ZIP contiene entradas fuera de $SLUG/: $bad"

echo "OK -> $OUT"
echo "Carpeta raíz del ZIP: $SLUG  |  archivos: $(unzip -Z1 "$OUT" | wc -l)"
