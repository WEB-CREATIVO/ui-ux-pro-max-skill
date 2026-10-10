<?php
/**
 * CRISBAPRO Theme - Main Template
 * Landing Page rendered with ACF fields
 */

get_header();

$cp_defaults = crisbapro_defaults();
?>

<!-- HERO SECTION -->
<section id="inicio" class="hero" style="background-image: url('<?php echo esc_url(crisbapro_get_hero_image()); ?>');">
    <div class="container">
        <div class="hero-content">
            <h1 class="hero-title"><?php echo wp_kses_post(crisbapro_get_hero_title()); ?></h1>
            <p class="hero-subtitle"><?php echo wp_kses_post(crisbapro_get_hero_subtitle()); ?></p>
            <div class="hero-cta">
                <a href="#contacto" class="btn btn-primary">
                    <?php echo esc_html(get_field('hero_cta_primary') ?: $cp_defaults['hero_cta_primary']); ?>
                </a>
                <a href="#servicios" class="btn btn-secondary">
                    <?php echo esc_html(get_field('hero_cta_secondary') ?: $cp_defaults['hero_cta_secondary']); ?>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- TRUST BLOCK -->
<section id="confianza" class="trust-block">
    <div class="container">
        <div class="trust-grid">
            <?php for ($i = 1; $i <= 3; $i++) : ?>
                <div class="trust-item">
                    <h3 class="trust-title">
                        <?php echo esc_html(get_field('trust_title_' . $i) ?: $cp_defaults['trust'][$i][0]); ?>
                    </h3>
                    <p class="trust-description">
                        <?php echo esc_html(get_field('trust_desc_' . $i) ?: $cp_defaults['trust'][$i][1]); ?>
                    </p>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>

<!-- SERVICIOS SECTION -->
<section id="servicios" class="servicios">
    <div class="container">
        <h2>Nuestros Servicios de Rotulación</h2>
        <div class="services-grid">
            <?php for ($i = 1; $i <= 6; $i++) :
                $image       = get_field('service_' . $i . '_img');
                $title       = get_field('service_' . $i . '_title') ?: $cp_defaults['services'][$i][0];
                $description = get_field('service_' . $i . '_desc') ?: $cp_defaults['services'][$i][1];
                ?>
                <div class="service-card">
                    <?php if ($image) : ?>
                        <div class="service-image">
                            <button type="button" class="service-zoom"
                                    data-lightbox-src="<?php echo esc_url($image); ?>"
                                    data-lightbox-alt="<?php echo esc_attr($title); ?>"
                                    aria-haspopup="dialog"
                                    aria-label="<?php echo esc_attr('Ampliar imagen: ' . $title); ?>">
                                <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>" loading="lazy" decoding="async">
                            </button>
                        </div>
                    <?php endif; ?>
                    <h3><?php echo esc_html($title); ?></h3>
                    <p><?php echo esc_html($description); ?></p>
                    <a href="#contacto" class="btn-link">Pide Presupuesto →</a>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>

<!-- CAROUSEL SECTION -->
<?php
$cp_projects = array();
for ($i = 1; $i <= 6; $i++) {
    $project_image = get_field('project_' . $i . '_img');
    $project_title = get_field('project_' . $i . '_title');
    if ($project_image || $project_title) {
        $cp_projects[] = array('image' => $project_image, 'title' => $project_title);
    }
}
$cp_is_editor = current_user_can('edit_pages');
?>
<?php if (!empty($cp_projects) || $cp_is_editor) : ?>
<section id="portfolio" class="carousel-section">
    <div class="container">
        <h2>Proyectos Destacados</h2>
        <div class="carousel-wrapper">
            <button class="carousel-control prev" aria-label="Anterior">❮</button>
            <div class="carousel">
                <?php if (!empty($cp_projects)) : ?>
                    <?php foreach ($cp_projects as $project) : ?>
                        <div class="carousel-slide">
                            <?php if ($project['image']) : ?>
                                <img src="<?php echo esc_url($project['image']); ?>" alt="<?php echo esc_attr($project['title']); ?>" loading="lazy" decoding="async">
                            <?php endif; ?>
                            <h4><?php echo esc_html($project['title']); ?></h4>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="carousel-slide">
                        <div style="background: #f0f0f0; height: 400px; display: flex; align-items: center; justify-content: center; color: #999; text-align: center; padding: 24px;">
                            Solo visible para editores: añade proyectos en Páginas → Inicio → «CRISBAPRO - Configuración Completa» → pestaña Proyectos.
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <button class="carousel-control next" aria-label="Siguiente">❯</button>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- PROCESO SECTION -->
<section id="proceso" class="proceso">
    <div class="container">
        <h2>Nuestro Proceso</h2>
        <div class="process-steps">
            <div class="process-step">
                <div class="step-number">01</div>
                <h4>Consultoría</h4>
                <p>Análisis de tu marca y necesidades específicas</p>
            </div>
            <div class="process-step">
                <div class="step-number">02</div>
                <h4>Diseño</h4>
                <p>Propuestas creativas y personalizadas</p>
            </div>
            <div class="process-step">
                <div class="step-number">03</div>
                <h4>Fabricación</h4>
                <p>Materiales premium con tecnología avanzada</p>
            </div>
            <div class="process-step">
                <div class="step-number">04</div>
                <h4>Instalación</h4>
                <p>Equipo profesional garantizando perfecta ejecución</p>
            </div>
            <div class="process-step">
                <div class="step-number">05</div>
                <h4>Soporte</h4>
                <p>Mantenimiento y garantía extendida disponible</p>
            </div>
        </div>
    </div>
</section>

<!-- SECTORES SECTION -->
<section id="sectores" class="sectores">
    <div class="container">
        <h2>Sectores Especializados</h2>
        <div class="sectors-grid">
            <div class="sector-card">
                <h4>🏢 Inmobiliario</h4>
                <p>Identidad visual para agencias y promotoras</p>
            </div>
            <div class="sector-card">
                <h4>🏨 Hotelería</h4>
                <p>Señalética y rotulación para hoteles y restaurantes</p>
            </div>
            <div class="sector-card">
                <h4>🏥 Sanidad</h4>
                <p>Señalización profesional para clínicas y hospitales</p>
            </div>
            <div class="sector-card">
                <h4>💼 Corporativo</h4>
                <p>Identidad empresarial para grandes compañías</p>
            </div>
            <div class="sector-card">
                <h4>🛍️ Retail</h4>
                <p>Rotulación para tiendas y centros comerciales</p>
            </div>
            <div class="sector-card">
                <h4>🎓 Educación</h4>
                <p>Señalización para colegios y universidades</p>
            </div>
        </div>
    </div>
</section>

<!-- CONTACT FORM SECTION -->
<section id="contacto" class="contact-section">
    <div class="container">
        <h2>Solicita tu Presupuesto</h2>
        <form class="quote-form" id="presupuesto-form" method="POST" action="">
            <input type="hidden" name="crisbapro_form" value="contacto">
            <div aria-hidden="true" style="position:absolute;left:-9999px;top:auto;width:1px;height:1px;overflow:hidden;">
                <label for="web">No rellenar este campo</label>
                <input type="text" id="web" name="web" tabindex="-1" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="nombre">Nombre Completo *</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="email">Email *</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="tel" id="telefono" name="telefono">
            </div>
            <div class="form-group">
                <label for="servicio">Tipo de Servicio *</label>
                <select id="servicio" name="servicio" required>
                    <option value="">-- Selecciona un servicio --</option>
                    <?php foreach (crisbapro_service_options() as $label) : ?>
                        <option value="<?php echo esc_attr($label); ?>"><?php echo esc_html($label); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="presupuesto">Descripción del Proyecto *</label>
                <textarea id="presupuesto" name="presupuesto" rows="5" required></textarea>
            </div>
            <div class="form-privacy">
                <div class="form-privacy-info" role="group" aria-label="Información básica sobre protección de datos">
                    <p class="form-privacy-title">Información básica sobre protección de datos</p>
                    <?php echo crisbapro_privacy_first_layer_html(); ?>
                </div>
                <label class="form-privacy-check" for="privacidad">
                    <input type="checkbox" id="privacidad" name="privacidad" value="1" required>
                    <span>He leído y acepto la <a href="<?php echo esc_url(home_url('/politica-de-privacidad')); ?>" target="_blank" rel="noopener">Política de Privacidad</a> *</span>
                </label>
            </div>
            <button type="submit" class="btn btn-lg btn-primary">Solicitar Presupuesto</button>
        </form>
    </div>
</section>

<?php
get_footer();
?>
