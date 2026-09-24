<?php
/**
 * CRISBAPRO Theme - Header Template Part
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <header class="header">
        <div class="header-container">
            <div class="logo-section">
                <?php
                if (has_custom_logo()) {
                    the_custom_logo();
                } else {
                    echo '<a href="' . esc_url(home_url('/')) . '" class="site-title">' . esc_html(bloginfo('name')) . '</a>';
                }
                ?>
            </div>

            <nav class="nav" id="main-nav">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'main-menu',
                    'fallback_cb' => 'wp_page_menu',
                    'menu_class' => 'nav-menu',
                    'container' => false,
                ));
                ?>
            </nav>

            <div class="header-contact">
                <a href="tel:<?php echo esc_attr(str_replace(' ', '', crisbapro_get_phone())); ?>" class="contact-link phone">
                    <?php echo esc_html(crisbapro_get_phone()); ?>
                </a>
                <a href="mailto:<?php echo esc_attr(crisbapro_get_email()); ?>" class="contact-link email">
                    Email
                </a>
            </div>

            <button class="menu-toggle" id="menu-toggle" aria-label="Abrir menú">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </header>

