<?php
/**
 * CRISBAPRO Theme Functions
 * Professional Signage Company Website
 * Version: 1.3.0
 *
 * Changelog:
 * 1.3.0 - Make hero background image visible (reduce gradient opacity), style menu text bold and blue
 * 1.2.0 - Reduce header height, optimize hero section visibility, improve responsive design
 * 1.1.0 - Add ACF repeater for portfolio projects (editable from WP admin)
 * 1.0.0 - Initial release
 */

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
// CARGAR ESTILOS Y SCRIPTS
// ============================================================================

function crisbapro_enqueue_assets() {
    // CSS Principal
    wp_enqueue_style(
        'crisbapro-main',
        get_template_directory_uri() . '/assets/css/main.css',
        array(),
        '1.0.0'
    );

    wp_enqueue_style(
        'crisbapro-responsive',
        get_template_directory_uri() . '/assets/css/responsive.css',
        array('crisbapro-main'),
        '1.0.0'
    );

    // Google Fonts
    wp_enqueue_style(
        'crisbapro-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap',
        array(),
        null
    );

    // JavaScript Principal
    wp_enqueue_script(
        'crisbapro-main',
        get_template_directory_uri() . '/assets/js/main.js',
        array(),
        '1.0.0',
        true
    );

    // Carousel
    wp_enqueue_script(
        'crisbapro-carousel',
        get_template_directory_uri() . '/assets/js/carousel.js',
        array('crisbapro-main'),
        '1.0.0',
        true
    );

    // Smooth Scroll
    wp_enqueue_script(
        'crisbapro-scroll',
        get_template_directory_uri() . '/assets/js/smooth-scroll.js',
        array('crisbapro-main'),
        '1.0.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'crisbapro_enqueue_assets');

// ============================================================================
// CAMPOS ACF - LANDING (HOME)
// ============================================================================

function crisbapro_register_acf_fields() {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    // GRUPO: HERO SECTION
    acf_add_local_field_group(array(
        'key' => 'group_crisbapro_hero',
        'title' => 'Hero Section',
        'fields' => array(
            array(
                'key' => 'field_hero_title',
                'label' => 'Título Principal',
                'name' => 'hero_title',
                'type' => 'text',
                'default_value' => 'Rotulación Profesional en Madrid',
            ),
            array(
                'key' => 'field_hero_subtitle',
                'label' => 'Subtítulo',
                'name' => 'hero_subtitle',
                'type' => 'textarea',
                'default_value' => 'Diseñamos, fabricamos e instalamos soluciones que hacen visible tu negocio',
            ),
            array(
                'key' => 'field_hero_image',
                'label' => 'Imagen de Fondo',
                'name' => 'hero_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_hero_cta_primary',
                'label' => 'CTA Primario (Botón)',
                'name' => 'hero_cta_primary',
                'type' => 'text',
                'default_value' => 'Solicitar Presupuesto',
            ),
            array(
                'key' => 'field_hero_cta_secondary',
                'label' => 'CTA Secundario (Botón)',
                'name' => 'hero_cta_secondary',
                'type' => 'text',
                'default_value' => 'Ver Servicios',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_type',
                    'operator' => '==',
                    'value' => 'front_page',
                ),
            ),
        ),
    ));

    // GRUPO: TRUST BLOCK
    acf_add_local_field_group(array(
        'key' => 'group_crisbapro_trust',
        'title' => 'Bloque de Confianza',
        'fields' => array(
            array(
                'key' => 'field_trust_title1',
                'label' => 'Título 1',
                'name' => 'trust_title_1',
                'type' => 'text',
                'default_value' => 'Gestión Completa',
            ),
            array(
                'key' => 'field_trust_desc1',
                'label' => 'Descripción 1',
                'name' => 'trust_desc_1',
                'type' => 'textarea',
                'default_value' => 'Diseño, fabricación e instalación bajo un mismo contacto',
            ),
            array(
                'key' => 'field_trust_title2',
                'label' => 'Título 2',
                'name' => 'trust_title_2',
                'type' => 'text',
                'default_value' => '10+ Años Experiencia',
            ),
            array(
                'key' => 'field_trust_desc2',
                'label' => 'Descripción 2',
                'name' => 'trust_desc_2',
                'type' => 'textarea',
                'default_value' => 'Especialistas en rotulación profesional para empresas',
            ),
            array(
                'key' => 'field_trust_title3',
                'label' => 'Título 3',
                'name' => 'trust_title_3',
                'type' => 'text',
                'default_value' => 'Garantía Verificable',
            ),
            array(
                'key' => 'field_trust_desc3',
                'label' => 'Descripción 3',
                'name' => 'trust_desc_3',
                'type' => 'textarea',
                'default_value' => 'Proyectos reales con resultados comprobables',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_type',
                    'operator' => '==',
                    'value' => 'front_page',
                ),
            ),
        ),
    ));

    // GRUPO: PROYECTOS DESTACADOS
    acf_add_local_field_group(array(
        'key' => 'group_crisbapro_projects',
        'title' => 'Proyectos Destacados',
        'fields' => array(
            array(
                'key' => 'field_projects_repeater',
                'label' => 'Proyectos',
                'name' => 'portfolio_projects',
                'type' => 'repeater',
                'layout' => 'table',
                'button_label' => 'Añadir Proyecto',
                'sub_fields' => array(
                    array(
                        'key' => 'field_project_image',
                        'label' => 'Imagen',
                        'name' => 'project_image',
                        'type' => 'image',
                        'return_format' => 'url',
                        'preview_size' => 'thumbnail',
                    ),
                    array(
                        'key' => 'field_project_title',
                        'label' => 'Título del Proyecto',
                        'name' => 'project_title',
                        'type' => 'text',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_type',
                    'operator' => '==',
                    'value' => 'front_page',
                ),
            ),
        ),
    ));

    // GRUPO: INFORMACIÓN DE CONTACTO
    acf_add_local_field_group(array(
        'key' => 'group_crisbapro_contact',
        'title' => 'Información de Contacto',
        'fields' => array(
            array(
                'key' => 'field_phone',
                'label' => 'Teléfono',
                'name' => 'company_phone',
                'type' => 'text',
                'default_value' => '608 78 20 15',
            ),
            array(
                'key' => 'field_email',
                'label' => 'Email',
                'name' => 'company_email',
                'type' => 'email',
                'default_value' => 'cristian@crisbapro.com',
            ),
            array(
                'key' => 'field_whatsapp',
                'label' => 'WhatsApp',
                'name' => 'company_whatsapp',
                'type' => 'text',
                'default_value' => '+34 608 78 20 15',
            ),
            array(
                'key' => 'field_location',
                'label' => 'Localización',
                'name' => 'company_location',
                'type' => 'text',
                'default_value' => 'Madrid, España',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options-theme-settings',
                ),
            ),
        ),
    ));
}
add_action('acf/init', 'crisbapro_register_acf_fields');

// ============================================================================
// PÁGINA DE OPCIONES DEL TEMA
// ============================================================================

if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Configuración del Tema',
        'menu_title' => 'CRISBAPRO Settings',
        'menu_slug' => 'theme-settings',
        'capability' => 'edit_posts',
        'redirect' => false,
    ));
}

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
    return get_field('hero_title') ?: 'Rotulación Profesional en Madrid';
}

function crisbapro_get_hero_subtitle() {
    return get_field('hero_subtitle') ?: 'Diseñamos, fabricamos e instalamos soluciones que hacen visible tu negocio';
}

function crisbapro_get_hero_image() {
    $custom_image = get_field('hero_image');
    if ($custom_image) {
        return $custom_image;
    }
    // Default to bundled hero image
    return get_template_directory_uri() . '/assets/images/hero-bg.jpg';
}

function crisbapro_get_phone() {
    return get_field('company_phone', 'option') ?: '608 78 20 15';
}

function crisbapro_get_email() {
    return get_field('company_email', 'option') ?: 'cristian@crisbapro.com';
}

function crisbapro_get_whatsapp() {
    return get_field('company_whatsapp', 'option') ?: '+34 608 78 20 15';
}

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
