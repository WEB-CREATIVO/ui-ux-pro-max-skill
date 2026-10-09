<?php
/**
 * CRISBAPRO Theme - Footer Template Part
 */
?>

    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h4><?php echo esc_html(bloginfo('name')); ?></h4>
                    <p><?php echo esc_html(bloginfo('description')); ?></p>
                </div>

                <div class="footer-section">
                    <h4>Servicios</h4>
                    <ul class="footer-links">
                        <li><a href="#servicios">Rótulos Luminosos</a></li>
                        <li><a href="#servicios">Letras Metálicas</a></li>
                        <li><a href="#servicios">Vinilos Decorativos</a></li>
                        <li><a href="#servicios">Señalética</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h4>Contacto</h4>
                    <ul class="footer-contact">
                        <li>
                            <a href="tel:<?php echo esc_attr(str_replace(' ', '', crisbapro_get_phone())); ?>">
                                <?php echo esc_html(crisbapro_get_phone()); ?>
                            </a>
                        </li>
                        <li>
                            <a href="mailto:<?php echo esc_attr(crisbapro_get_email()); ?>">
                                <?php echo esc_html(crisbapro_get_email()); ?>
                            </a>
                        </li>
                        <li>
                            <a href="https://wa.me/<?php echo esc_attr(str_replace(['+', ' '], '', crisbapro_get_whatsapp())); ?>" target="_blank">
                                WhatsApp
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h4>Síguenos</h4>
                    <div class="social-links">
                        <a href="#" aria-label="Facebook">f</a>
                        <a href="#" aria-label="Instagram">📷</a>
                        <a href="#" aria-label="LinkedIn">in</a>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="footer-legal">
                    <p>&copy; <?php echo date('Y'); ?> <?php echo esc_html(bloginfo('name')); ?>. Todos los derechos reservados.</p>
                    <ul class="footer-legal-links">
                        <li><a href="<?php echo esc_url(home_url('/politica-de-privacidad')); ?>">Política de Privacidad</a></li>
                        <li><a href="<?php echo esc_url(home_url('/politica-de-cookies')); ?>">Política de Cookies</a></li>
                    </ul>
                </div>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer-menu',
                    'fallback_cb' => false,
                    'container' => false,
                    'menu_class' => 'footer-menu',
                    'echo' => true,
                ));
                ?>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>
<?php
// This closing tag ensures proper PHP syntax
?>
