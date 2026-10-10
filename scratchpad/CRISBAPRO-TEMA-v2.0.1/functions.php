<?php
/**
 * CRISBAPRO Theme Functions
 * Professional Signage Company Website
 * Version: 2.0.2
 *
 * Changelog:
 * 2.0.2 - Formulario de contacto: envío real por email a los 3 destinatarios (antes no se enviaba nada). Funciones reutilizables para futuros formularios: crisbapro_form_recipients() y crisbapro_send_form_email().
 * 2.0.1 - Lightbox (pop-up) para ampliar las imágenes de servicios: clic para abrir; clic fuera, botón × o tecla ESC para cerrar.
 * 2.0.0 - Refactorización completa: UN SOLO grupo ACF asignado a la Página de inicio (compatible con ACF Free). Servicios (6) y proyectos (6) como campos fijos. Panel de estilos (tipografía y colores). Sin CPTs, sin Options Page y sin campos repetibles.
 * 1.9.5 - Se eliminan los grupos con campos repetibles (no existen en ACF Free).
 * 1.9.4 - Fix servicios: revert layout 'block' → 'table' (ACF Free 6.8.10 incompatibility)
 * 1.9.3 - Fix servicios: change layout 'table' → 'block'
 * 1.9.2 - Fix mobile hero white gap (remove redundant margin-top under sticky header)
 * 1.9.2 - Fix circular var reference breaking H1/H2 size on desktop (responsive.css)
 * 1.9.2 - Fix mobile logo clipping/centering (cap .custom-logo max-height under 48px header)
 * 1.9.1 - Fix mobile hero clipping long H1 (height:auto + overflow:visible)
 * 1.9.0 - Add custom logo support via WordPress Customizer (Appearance → Customize → Site Identity)
 * 1.8.0 - Simplify CTA: Use direct anchor link href="#contacto" for formulario de contacto
 * 1.7.0 - FINAL FIX: Use scrollIntoView() and data-scroll-to buttons for reliable scroll navigation
 * 1.6.0 - Fix anchor link with event delegation (robust smooth scroll that works with dynamic content)
 * 1.5.0 - Fix anchor link smooth scroll (add scroll-margin-top to sections, improve JS calculation)
 * 1.4.0 - Add ACF fields for services (image, title, description), change "Ver Proyecto" to "Pide Presupuesto" with contact form link
 * 1.3.0 - Make hero background image visible (reduce gradient opacity), style menu text bold and blue
 * 1.2.0 - Reduce header height, optimize hero section visibility, improve responsive design
 * 1.1.0 - Add ACF fields for portfolio projects (editable from WP admin)
 * 1.0.0 - Initial release
 */

define('CRISBAPRO_VERSION', '2.0.2');

// ============================================================================
// SETUP BÁSICO DEL TEMA
// ============================================================================

if (!function_exists('crisbapro_setup')) {
    function crisbapro_setup() {
        // Soporte para título dinámico
        add_theme_support('title-tag');

        // Soporte para logo personalizado
        add_theme_support('custom-logo');

        // Soporte para imágenes destacadas
        add_theme_support('post-thumbnails');

        // Soporte para bloques Gutenberg
        add_theme_support('wp-block-styles');
        add_theme_support('responsive-embeds');

        // Soporte para HTML5
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'script',
            'style'
        ));

        // Registrar menús
        register_nav_menus(array(
            'main-menu' => __('Menú Principal', 'crisbapro'),
            'footer-menu' => __('Menú Footer', 'crisbapro')
        ));
    }
    add_action('after_setup_theme', 'crisbapro_setup');
}

// ============================================================================
// CONTENIDO POR DEFECTO (se usa cuando un campo ACF está vacío)
// ============================================================================

function crisbapro_defaults() {
    return array(
        'hero_title'       => '¿Necesitas un rótulo, vinilo o renovar la imagen de tu negocio?',
        'hero_subtitle'    => 'En CRISBAPro realizamos diseño, fabricación e instalación de rotulación para comercios y empresas en Madrid.',
        'hero_cta_primary' => 'Solicitar Presupuesto',
        'hero_cta_secondary' => 'Ver Servicios',
        'trust' => array(
            1 => array('Gestión Completa', 'Diseño, fabricación e instalación bajo un mismo contacto'),
            2 => array('10+ Años Experiencia', 'Especialistas en rotulación profesional para empresas'),
            3 => array('Garantía Verificable', 'Proyectos reales con resultados comprobables'),
        ),
        'services' => array(
            1 => array('Rótulos Luminosos', 'Rótulos con iluminación para que tu negocio destaque de día y de noche.'),
            2 => array('Letras Metálicas', 'Letras corpóreas en metal para fachadas y recepciones con acabado profesional.'),
            3 => array('Vinilos Decorativos', 'Vinilos para cristaleras, paredes y vehículos con diseño a tu medida.'),
            4 => array('Señalética', 'Señalización interior y exterior para oficinas, clínicas y espacios públicos.'),
            5 => array('Fachadas', 'Renovamos la imagen exterior de tu local con rotulación a medida.'),
            6 => array('Rotulación Artística', 'Rótulos y murales con diseño personalizado que reflejan la identidad de tu marca.'),
        ),
        'company_phone'    => '608 78 20 15',
        'company_email'    => 'cristian@crisbapro.com',
        'company_whatsapp' => '+34 608 78 20 15',
        'company_location' => 'Madrid, España',
    );
}

// ============================================================================
// LECTURA DE CAMPOS ACF (grupo único asignado a la Página de inicio)
// ============================================================================

function crisbapro_front_page_id() {
    return (int) get_option('page_on_front');
}

// Lee un campo de la Página de inicio aunque se llame desde header/footer/wp_head.
function crisbapro_front_field($name, $default = '') {
    if (!function_exists('get_field')) {
        return $default;
    }
    $front_id = crisbapro_front_page_id();
    if ($front_id > 0) {
        $value = get_field($name, $front_id);
    } else {
        $value = get_field($name);
    }

    if ($value === null || $value === false || $value === '') {
        return $default;
    }
    return $value;
}

// ============================================================================
// TIPOGRAFÍA Y COLORES DINÁMICOS
// ============================================================================

function crisbapro_font_map() {
    $fallback = ", -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif";
    return array(
        'Inter'      => array('query' => 'Inter:wght@400;500;600;700',      'stack' => "'Inter'" . $fallback),
        'Roboto'     => array('query' => 'Roboto:wght@400;500;700',         'stack' => "'Roboto'" . $fallback),
        'Open Sans'  => array('query' => 'Open+Sans:wght@400;500;600;700',  'stack' => "'Open Sans'" . $fallback),
        'Montserrat' => array('query' => 'Montserrat:wght@400;500;600;700', 'stack' => "'Montserrat'" . $fallback),
    );
}

function crisbapro_selected_font() {
    $fonts = crisbapro_font_map();
    $font = crisbapro_front_field('global_font_family', 'Inter');
    return (is_string($font) && isset($fonts[$font])) ? $font : 'Inter';
}

// Devuelve #RRGGBB en mayúsculas; si el valor no es válido devuelve $default.
function crisbapro_clean_hex($value, $default) {
    $value = is_string($value) ? trim($value) : '';
    if ($value !== '' && $value[0] !== '#') {
        $value = '#' . $value;
    }
    $hex = sanitize_hex_color($value);
    if (!$hex) {
        return strtoupper($default);
    }
    if (strlen($hex) === 4) {
        $hex = '#' . $hex[1] . $hex[1] . $hex[2] . $hex[2] . $hex[3] . $hex[3];
    }
    return strtoupper($hex);
}

function crisbapro_hex_to_rgb($hex) {
    return array(
        hexdec(substr($hex, 1, 2)),
        hexdec(substr($hex, 3, 2)),
        hexdec(substr($hex, 5, 2)),
    );
}

// Mezcla $hex con negro ($target = 0) o blanco ($target = 255) en la proporción $amount (0-1).
function crisbapro_mix_hex($hex, $target, $amount) {
    $rgb = crisbapro_hex_to_rgb($hex);
    $out = array();
    foreach ($rgb as $channel) {
        $out[] = (int) round($channel + ($target - $channel) * $amount);
    }
    return sprintf('#%02X%02X%02X', $out[0], $out[1], $out[2]);
}

// Solo emite CSS cuando un valor difiere del diseño original, así con los valores
// por defecto la web se ve exactamente igual que antes.
function crisbapro_dynamic_css() {
    $fonts = crisbapro_font_map();
    $font = crisbapro_selected_font();

    $primary    = crisbapro_clean_hex(crisbapro_front_field('color_primary', '#0052CC'), '#0052CC');
    $secondary  = crisbapro_clean_hex(crisbapro_front_field('color_secondary', '#FF6B35'), '#FF6B35');
    $hero_color = crisbapro_clean_hex(crisbapro_front_field('hero_title_color', '#FFFFFF'), '#FFFFFF');

    $hero_size = (int) crisbapro_front_field('hero_title_size', 48);
    if ($hero_size <= 0) {
        $hero_size = 48;
    }
    $hero_size = max(24, min(96, $hero_size));

    $root = array();
    $after = '';

    if ($font !== 'Inter') {
        $root[] = '--font-family-base:' . $fonts[$font]['stack'];
        $root[] = '--font-family:' . $fonts[$font]['stack'];
    }

    if ($primary !== '#0052CC') {
        $root[] = '--color-primary:' . $primary;
        $root[] = '--color-primary-dark:' . crisbapro_mix_hex($primary, 0, 0.28);
        $root[] = '--color-primary-light:' . crisbapro_mix_hex($primary, 255, 0.90);
        $root[] = '--color-primary-rgb:' . implode(', ', crisbapro_hex_to_rgb($primary));
    }

    if ($secondary !== '#FF6B35') {
        $root[] = '--color-secondary:' . $secondary;
        $root[] = '--color-secondary-dark:' . crisbapro_mix_hex($secondary, 0, 0.14);
        $root[] = '--color-secondary-light:' . crisbapro_mix_hex($secondary, 255, 0.85);
        $root[] = '--color-secondary-rgb:' . implode(', ', crisbapro_hex_to_rgb($secondary));
    }

    if ($hero_color !== '#FFFFFF') {
        $root[] = '--hero-title-color:' . $hero_color;
    }

    if ($hero_size !== 48) {
        // Mantiene la proporción original 48 / 40 / 28 px (escritorio / tablet / móvil).
        $tablet = max(20, (int) round($hero_size * 40 / 48));
        $mobile = max(20, (int) round($hero_size * 28 / 48));
        $root[] = '--hero-title-size:' . $mobile . 'px';
        $after .= '@media (min-width:768px){:root{--hero-title-size:' . $tablet . 'px}}';
        $after .= '@media (min-width:1024px){:root{--hero-title-size:' . $hero_size . 'px}}';
        // responsive.css fija 56px en >=1600px; esta regla (cargada después) respeta el valor del panel.
        // En horizontal con poca altura se mantiene la regla original de responsive.css.
        $after .= '@media (min-height:501px){.hero-title{font-size:var(--hero-title-size)}}';
    }

    if (empty($root)) {
        return '';
    }

    return ':root{' . implode(';', $root) . '}' . $after;
}

// ============================================================================
// CARGAR ESTILOS Y SCRIPTS
// ============================================================================

function crisbapro_enqueue_assets() {
    $fonts = crisbapro_font_map();
    $font = crisbapro_selected_font();

    // CSS Principal
    wp_enqueue_style(
        'crisbapro-main',
        get_template_directory_uri() . '/assets/css/main.css',
        array(),
        CRISBAPRO_VERSION
    );

    wp_enqueue_style(
        'crisbapro-responsive',
        get_template_directory_uri() . '/assets/css/responsive.css',
        array('crisbapro-main'),
        CRISBAPRO_VERSION
    );

    // Variables CSS dinámicas (después de responsive.css para poder sobrescribirlo)
    $dynamic_css = crisbapro_dynamic_css();
    if ($dynamic_css !== '') {
        wp_add_inline_style('crisbapro-responsive', $dynamic_css);
    }

    // Google Fonts (la tipografía elegida en el panel)
    wp_enqueue_style(
        'crisbapro-fonts',
        'https://fonts.googleapis.com/css2?family=' . $fonts[$font]['query'] . '&display=swap',
        array(),
        null
    );

    // JavaScript Principal
    wp_enqueue_script(
        'crisbapro-main',
        get_template_directory_uri() . '/assets/js/main.js',
        array(),
        CRISBAPRO_VERSION,
        true
    );

    // Carousel
    wp_enqueue_script(
        'crisbapro-carousel',
        get_template_directory_uri() . '/assets/js/carousel.js',
        array('crisbapro-main'),
        CRISBAPRO_VERSION,
        true
    );

    // Smooth Scroll
    wp_enqueue_script(
        'crisbapro-scroll',
        get_template_directory_uri() . '/assets/js/smooth-scroll.js',
        array('crisbapro-main'),
        CRISBAPRO_VERSION,
        true
    );
}
add_action('wp_enqueue_scripts', 'crisbapro_enqueue_assets');

// ============================================================================
// CAMPOS ACF - UN SOLO GRUPO ASIGNADO A LA PÁGINA DE INICIO (v2.0.0)
// Solo tipos disponibles en ACF Free: tab, text, textarea, image, email, select, number.
// ============================================================================

function crisbapro_acf_field($type, $name, $label, $extra = array()) {
    return array_merge(array(
        'key'   => 'field_cp_' . $name,
        'label' => $label,
        'name'  => $name,
        'type'  => $type,
    ), $extra);
}

function crisbapro_acf_tab($slug, $label) {
    return array(
        'key'       => 'field_cp_tab_' . $slug,
        'label'     => $label,
        'name'      => '',
        'type'      => 'tab',
        'placement' => 'top',
        'endpoint'  => 0,
    );
}

function crisbapro_register_acf_fields() {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    $d = crisbapro_defaults();
    $fields = array();

    // 1. HERO
    $fields[] = crisbapro_acf_tab('hero', 'Hero');
    $fields[] = crisbapro_acf_field('text', 'hero_title', 'Título Principal', array('default_value' => $d['hero_title']));
    $fields[] = crisbapro_acf_field('textarea', 'hero_subtitle', 'Subtítulo', array('default_value' => $d['hero_subtitle'], 'rows' => 3));
    $fields[] = crisbapro_acf_field('image', 'hero_image', 'Imagen de Fondo', array(
        'return_format' => 'url',
        'preview_size'  => 'medium',
        'library'       => 'all',
        'instructions'  => 'Si lo dejas vacío se usa la imagen incluida en el tema.',
    ));
    $fields[] = crisbapro_acf_field('text', 'hero_cta_primary', 'CTA Primario (Botón)', array('default_value' => $d['hero_cta_primary']));
    $fields[] = crisbapro_acf_field('text', 'hero_cta_secondary', 'CTA Secundario (Botón)', array('default_value' => $d['hero_cta_secondary']));

    // 2. BLOQUE DE CONFIANZA
    $fields[] = crisbapro_acf_tab('trust', 'Confianza');
    for ($i = 1; $i <= 3; $i++) {
        $fields[] = crisbapro_acf_field('text', 'trust_title_' . $i, 'Título ' . $i, array('default_value' => $d['trust'][$i][0]));
        $fields[] = crisbapro_acf_field('textarea', 'trust_desc_' . $i, 'Descripción ' . $i, array('default_value' => $d['trust'][$i][1], 'rows' => 2));
    }

    // 3. SERVICIOS (6 fijos)
    $fields[] = crisbapro_acf_tab('services', 'Servicios');
    for ($i = 1; $i <= 6; $i++) {
        $fields[] = crisbapro_acf_field('image', 'service_' . $i . '_img', 'Servicio ' . $i . ' - Imagen', array(
            'return_format' => 'url',
            'preview_size'  => 'medium',
            'library'       => 'all',
        ));
        $fields[] = crisbapro_acf_field('text', 'service_' . $i . '_title', 'Servicio ' . $i . ' - Título', array('default_value' => $d['services'][$i][0]));
        $fields[] = crisbapro_acf_field('textarea', 'service_' . $i . '_desc', 'Servicio ' . $i . ' - Descripción', array('default_value' => $d['services'][$i][1], 'rows' => 3));
    }

    // 4. PROYECTOS DESTACADOS (6 fijos)
    $fields[] = crisbapro_acf_tab('projects', 'Proyectos');
    for ($i = 1; $i <= 6; $i++) {
        $fields[] = crisbapro_acf_field('image', 'project_' . $i . '_img', 'Proyecto ' . $i . ' - Imagen', array(
            'return_format' => 'url',
            'preview_size'  => 'medium',
            'library'       => 'all',
        ));
        $fields[] = crisbapro_acf_field('text', 'project_' . $i . '_title', 'Proyecto ' . $i . ' - Título');
    }

    // 5. INFORMACIÓN DE CONTACTO
    $fields[] = crisbapro_acf_tab('contact', 'Contacto');
    $fields[] = crisbapro_acf_field('text', 'company_phone', 'Teléfono', array('default_value' => $d['company_phone']));
    $fields[] = crisbapro_acf_field('email', 'company_email', 'Email', array('default_value' => $d['company_email']));
    $fields[] = crisbapro_acf_field('text', 'company_whatsapp', 'WhatsApp', array('default_value' => $d['company_whatsapp']));
    $fields[] = crisbapro_acf_field('text', 'company_location', 'Localización', array('default_value' => $d['company_location']));

    // 6. ESTILOS GLOBALES Y HERO
    $fields[] = crisbapro_acf_tab('styles', 'Estilos');
    $fields[] = crisbapro_acf_field('select', 'global_font_family', 'Tipografía global', array(
        'choices' => array(
            'Inter'      => 'Inter',
            'Roboto'     => 'Roboto',
            'Open Sans'  => 'Open Sans',
            'Montserrat' => 'Montserrat',
        ),
        'default_value' => 'Inter',
        'allow_null'    => 0,
        'multiple'      => 0,
        'ui'            => 0,
        'return_format' => 'value',
    ));
    $fields[] = crisbapro_acf_field('text', 'color_primary', 'Color primario', array(
        'default_value' => '#0052CC',
        'placeholder'   => '#0052CC',
        'instructions'  => 'Formato hexadecimal, por ejemplo #0052CC.',
    ));
    $fields[] = crisbapro_acf_field('text', 'color_secondary', 'Color secundario', array(
        'default_value' => '#FF6B35',
        'placeholder'   => '#FF6B35',
        'instructions'  => 'Formato hexadecimal, por ejemplo #FF6B35.',
    ));
    $fields[] = crisbapro_acf_field('text', 'hero_title_color', 'Color del título del Hero', array(
        'default_value' => '#FFFFFF',
        'placeholder'   => '#FFFFFF',
        'instructions'  => 'Formato hexadecimal, por ejemplo #FFFFFF.',
    ));
    $fields[] = crisbapro_acf_field('number', 'hero_title_size', 'Tamaño del título del Hero (escritorio)', array(
        'default_value' => 48,
        'min'           => 24,
        'max'           => 96,
        'step'          => 1,
        'append'        => 'px',
        'instructions'  => 'En tablet y móvil se reduce automáticamente en proporción.',
    ));

    acf_add_local_field_group(array(
        'key'    => 'group_crisbapro_config',
        'title'  => 'CRISBAPRO - Configuración Completa',
        'fields' => $fields,
        'location' => array(
            array(
                array(
                    'param'    => 'page_type',
                    'operator' => '==',
                    'value'    => 'front_page',
                ),
            ),
        ),
        'menu_order'      => 0,
        'position'        => 'normal',
        'style'           => 'default',
        'label_placement' => 'top',
    ));
}
add_action('acf/init', 'crisbapro_register_acf_fields');

// ============================================================================
// INTEGRACIÓN RANK MATH
// ============================================================================

function crisbapro_rank_math_ready() {
    // Verificar que Rank Math está activo
    if (defined('RANK_MATH_VERSION')) {
        // Los campos de Rank Math se configuran automáticamente
        // No necesita configuración adicional en el tema
    }
}
add_action('wp_loaded', 'crisbapro_rank_math_ready');

// ============================================================================
// HELPERS - OBTENER VALORES DE ACF
// ============================================================================

function crisbapro_get_hero_title() {
    return crisbapro_front_field('hero_title', crisbapro_defaults()['hero_title']);
}

function crisbapro_get_hero_subtitle() {
    return crisbapro_front_field('hero_subtitle', crisbapro_defaults()['hero_subtitle']);
}

function crisbapro_get_hero_image() {
    $custom_image = crisbapro_front_field('hero_image', '');
    if ($custom_image && is_string($custom_image)) {
        return $custom_image;
    }
    // Default to bundled hero image
    return get_template_directory_uri() . '/assets/images/hero-bg.jpg';
}

function crisbapro_get_phone() {
    return crisbapro_front_field('company_phone', crisbapro_defaults()['company_phone']);
}

function crisbapro_get_email() {
    return crisbapro_front_field('company_email', crisbapro_defaults()['company_email']);
}

function crisbapro_get_whatsapp() {
    return crisbapro_front_field('company_whatsapp', crisbapro_defaults()['company_whatsapp']);
}

function crisbapro_get_location() {
    return crisbapro_front_field('company_location', crisbapro_defaults()['company_location']);
}

// ============================================================================
// FORMULARIOS - ENVÍO POR EMAIL
// Todos los formularios del tema envían por crisbapro_send_form_email() y usan la
// misma lista de destinatarios (crisbapro_form_recipients()).
// ============================================================================

// Destinatarios de TODOS los formularios. Para añadir o quitar uno, editar solo esta lista.
function crisbapro_form_recipients() {
    $recipients = array(
        'webcreativo2@gmail.com',
        'info@crisbapro.com',
        'crisbavisual@gmail.com',
    );
    return apply_filters('crisbapro_form_recipients', $recipients);
}

// Opciones del selector "Tipo de Servicio" del formulario de contacto (slug => etiqueta).
function crisbapro_service_options() {
    return array(
        'rotulos-luminosos'    => 'Rótulos Luminosos',
        'letras-metalicas'     => 'Letras Metálicas',
        'vinilos'              => 'Vinilos Decorativos',
        'senaletica'           => 'Señalética',
        'fachadas'             => 'Fachadas',
        'rotulacion-artistica' => 'Rotulación Artística',
        'impresion'            => 'Impresión Gran Formato',
    );
}

// Envía un correo a todos los destinatarios. Devuelve true/false según el resultado de wp_mail().
// $fields: array etiqueta => valor. $reply_to: email del visitante (para poder responderle).
function crisbapro_send_form_email($form_label, array $fields, $reply_to = '', $reply_name = '') {
    $recipients = array();
    foreach (crisbapro_form_recipients() as $address) {
        $address = sanitize_email($address);
        if ($address && is_email($address)) {
            $recipients[] = $address;
        }
    }
    if (empty($recipients)) {
        return false;
    }

    $one_line = function ($text) {
        return trim(preg_replace('/[\r\n\t]+/', ' ', (string) $text));
    };

    $host = preg_replace('/^www\./', '', (string) wp_parse_url(home_url(), PHP_URL_HOST));
    $headers = array('Content-Type: text/plain; charset=UTF-8');
    if ($host !== '') {
        $headers[] = 'From: CRISBAPRO Web <wordpress@' . $host . '>';
    }

    $reply_to = sanitize_email($reply_to);
    if ($reply_to && is_email($reply_to)) {
        $name = str_replace(array('"', '<', '>', ',', ';'), '', $one_line($reply_name));
        $headers[] = 'Reply-To: ' . ($name !== '' ? $name . ' ' : '') . '<' . $reply_to . '>';
    }

    $subject = '[CRISBAPRO] ' . $one_line($form_label);
    if ($reply_name !== '') {
        $subject .= ' - ' . $one_line($reply_name);
    }

    $line = str_repeat('-', 40);
    $body = 'Nuevo mensaje desde ' . home_url('/') . ' (formulario: ' . $one_line($form_label) . ')' . "\n" . $line . "\n";
    foreach ($fields as $label => $value) {
        $body .= $label . ': ' . $value . "\n";
    }
    $body .= $line . "\n" . 'Enviado: ' . current_time('d/m/Y H:i') . "\n";

    return wp_mail($recipients, $subject, $body, $headers);
}

// Procesa el formulario de contacto (index.php, #presupuesto-form). main.js lo envía con fetch.
function crisbapro_handle_contact_form() {
    if (!isset($_SERVER['REQUEST_METHOD']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
        return;
    }
    if (!isset($_POST['crisbapro_form']) || $_POST['crisbapro_form'] !== 'contacto') {
        return;
    }

    // Campo trampa anti-spam: las personas no lo ven; los bots lo rellenan. Se simula éxito sin enviar.
    if (!empty($_POST['web'])) {
        wp_send_json_success(array('message' => 'ok'));
    }

    $field = function ($key) {
        return isset($_POST[$key]) ? wp_unslash($_POST[$key]) : '';
    };

    $nombre   = mb_substr(sanitize_text_field($field('nombre')), 0, 120);
    $email    = sanitize_email($field('email'));
    $telefono = mb_substr(sanitize_text_field($field('telefono')), 0, 40);
    $servicio = sanitize_text_field($field('servicio'));
    $mensaje  = mb_substr(sanitize_textarea_field($field('presupuesto')), 0, 5000);

    if ($nombre === '' || !is_email($email) || $mensaje === '' || $servicio === '') {
        wp_send_json_error(array('message' => 'Faltan datos obligatorios o el email no es válido.'), 400);
    }

    $options = crisbapro_service_options();
    $servicio_label = isset($options[$servicio]) ? $options[$servicio] : $servicio;

    $sent = crisbapro_send_form_email(
        'Solicitud de presupuesto',
        array(
            'Nombre'               => $nombre,
            'Email'                => $email,
            'Teléfono'             => $telefono !== '' ? $telefono : '(no indicado)',
            'Tipo de servicio'     => $servicio_label,
            'Descripción del proyecto' => "\n" . $mensaje,
        ),
        $email,
        $nombre
    );

    if (!$sent) {
        error_log('CRISBAPRO: wp_mail() no pudo enviar el formulario de contacto.');
        wp_send_json_error(array('message' => 'No se pudo enviar el correo.'), 500);
    }

    wp_send_json_success(array('message' => 'Enviado'));
}
add_action('init', 'crisbapro_handle_contact_form', 20);

// ============================================================================
// SOPORTE PARA BLOQUES GUTENBERG PERSONALIZADOS
// ============================================================================

function crisbapro_register_block_category() {
    if (function_exists('register_block_type')) {
        // Los bloques HTML personalizados se registran automáticamente
        // No necesitan configuración adicional
    }
}
add_action('init', 'crisbapro_register_block_category');

// ============================================================================
// SEGURIDAD Y OPTIMIZACIÓN
// ============================================================================

// Remover versiones de scripts y estilos
add_filter('style_loader_src', 'crisbapro_remove_version', 10, 2);
add_filter('script_loader_src', 'crisbapro_remove_version', 10, 2);

function crisbapro_remove_version($src, $handle) {
    if (strpos($src, 'ver=')) {
        $src = remove_query_arg('ver', $src);
    }
    return $src;
}

// Desabilitar XML-RPC (seguridad)
add_filter('xmlrpc_enabled', '__return_false');

// ============================================================================
// LIMPIAR HEAD
// ============================================================================

remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rest_output_link_wp_head');

// ============================================================================
// FIN DEL ARCHIVO
// ============================================================================
?>
