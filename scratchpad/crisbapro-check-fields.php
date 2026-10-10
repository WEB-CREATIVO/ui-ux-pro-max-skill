<?php
/**
 * Comprueba que los campos ACF del tema CRISBAPRO no pierden datos entre versiones.
 *
 * El contenido guardado en la Home depende del NOMBRE y la KEY de cada campo.
 * Reglas: se pueden AÑADIR campos; no se puede renombrar, cambiar de tipo ni eliminar uno existente.
 *
 * Uso: php crisbapro-check-fields.php <carpeta-del-tema> [--update]
 *   --update  añade al fichero .lock los campos nuevos (nunca modifica ni borra los existentes)
 */

if ($argc < 2) {
    fwrite(STDERR, "Uso: php crisbapro-check-fields.php <carpeta-del-tema> [--update]\n");
    exit(2);
}

$theme  = rtrim($argv[1], '/');
$update = in_array('--update', $argv, true);
$lock   = __DIR__ . '/crisbapro-acf-fields.lock';

$GLOBALS['cp_groups'] = array();
function add_action() {}
function add_filter() {}
function add_theme_support() {}
function register_nav_menus() {}
function remove_action() {}
function __($s) { return $s; }
function remove_query_arg($a, $s) { return $s; }
function get_option() { return 0; }
function sanitize_hex_color($c) { return $c; }
function wp_enqueue_style() {}
function wp_enqueue_script() {}
function get_template_directory_uri() { return ''; }
function acf_add_local_field_group($g) { $GLOBALS['cp_groups'][] = $g; }

require $theme . '/functions.php';
crisbapro_register_acf_fields();

$groups = $GLOBALS['cp_groups'];
if (count($groups) !== 1) {
    fwrite(STDERR, "ERROR: debe haber exactamente 1 grupo ACF, hay " . count($groups) . ".\n");
    exit(1);
}

$current = array('group' => $groups[0]['key'], 'fields' => array());
foreach ($groups[0]['fields'] as $f) {
    if ($f['type'] === 'tab' || $f['name'] === '') {
        continue; // las pestañas no guardan datos
    }
    $current['fields'][$f['key']] = array('name' => $f['name'], 'type' => $f['type']);
}

$locked = file_exists($lock) ? json_decode(file_get_contents($lock), true) : null;

if ($locked === null) {
    file_put_contents($lock, json_encode($current, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . "\n");
    echo "Lock creado con " . count($current['fields']) . " campos.\n";
    exit(0);
}

$errors = array();
if ($locked['group'] !== $current['group']) {
    $errors[] = "La key del grupo cambió: {$locked['group']} -> {$current['group']}";
}
foreach ($locked['fields'] as $key => $info) {
    if (!isset($current['fields'][$key])) {
        $errors[] = "Campo ELIMINADO o con key cambiada: {$key} ({$info['name']})";
    } elseif ($current['fields'][$key]['name'] !== $info['name']) {
        $errors[] = "Campo RENOMBRADO: {$info['name']} -> {$current['fields'][$key]['name']} (key {$key})";
    } elseif ($current['fields'][$key]['type'] !== $info['type']) {
        $errors[] = "Campo con TIPO cambiado: {$info['name']} {$info['type']} -> {$current['fields'][$key]['type']}";
    }
}

$new = array_diff_key($current['fields'], $locked['fields']);

if ($errors) {
    fwrite(STDERR, "ERROR: los siguientes cambios harían perder contenido guardado en la Home:\n  - " . implode("\n  - ", $errors) . "\n");
    exit(1);
}

if ($new) {
    if ($update) {
        $locked['fields'] = array_merge($locked['fields'], $new);
        file_put_contents($lock, json_encode($locked, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . "\n");
        echo "Lock actualizado: " . count($new) . " campo(s) nuevo(s) añadido(s).\n";
    } else {
        fwrite(STDERR, "AVISO: hay " . count($new) . " campo(s) nuevo(s) sin registrar en el lock (" . implode(', ', array_column($new, 'name')) . ").\n");
        fwrite(STDERR, "Ejecuta: php scratchpad/crisbapro-check-fields.php {$theme} --update\n");
        exit(1);
    }
}

echo "Campos ACF OK: " . count($locked['fields']) . " campos protegidos, ninguno renombrado ni eliminado.\n";
