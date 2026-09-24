<?php
/**
 * CRISBAPRO Theme - Main Template
 * Landing Page rendered with ACF fields
 */

get_header();
?>

<!-- HERO SECTION -->
<section id="inicio" class="hero" style="background-image: url('<?php echo esc_url(crisbapro_get_hero_image()); ?>');">
    <div class="container">
        <div class="hero-content">
            <h1 class="hero-title"><?php echo wp_kses_post(crisbapro_get_hero_title()); ?></h1>
            <p class="hero-subtitle"><?php echo wp_kses_post(crisbapro_get_hero_subtitle()); ?></p>
            <div class="hero-cta">
                <a href="#servicios" class="btn btn-primary">
                    <?php echo esc_html(get_field('hero_cta_primary') ?: 'Solicitar Presupuesto'); ?>
                </a>
                <a href="#servicios" class="btn btn-secondary">
                    <?php echo esc_html(get_field('hero_cta_secondary') ?: 'Ver Servicios'); ?>
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
                        <?php echo esc_html(get_field('trust_title_' . $i) ?: 'Título'); ?>
                    </h3>
                    <p class="trust-description">
                        <?php echo esc_html(get_field('trust_desc_' . $i) ?: 'Descripción'); ?>
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
            <?php
            $services = get_field('services_list');
            if ($services && is_array($services)) {
                foreach ($services as $service) {
                    $image = $service['service_image'];
                    $title = $service['service_title'];
                    $description = $service['service_description'];
                    ?>
                    <div class="service-card">
                        <?php if ($image) : ?>
                            <div class="service-image">
                                <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>">
                            </div>
                        <?php endif; ?>
                        <h3><?php echo esc_html($title); ?></h3>
                        <p><?php echo esc_html($description); ?></p>
                        <button class="btn-link" data-scroll-to="contacto">Pide Presupuesto →</button>
                    </div>
                    <?php
                }
            } else {
                // Fallback con servicios por defecto
                ?>
                <div class="service-card">
                    <div style="background: #f0f0f0; height: 200px; display: flex; align-items: center; justify-content: center; color: #999;">
                        Sin servicios. Añade en ACF "Servicios"
                    </div>
                    <h3>Servicio no configurado</h3>
                    <p>Por favor, agrega los servicios desde la sección ACF en el admin.</p>
                    <a href="#contacto" class="btn-link">Pide Presupuesto →</a>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>

<!-- CAROUSEL SECTION -->
<section id="portfolio" class="carousel-section">
    <div class="container">
        <h2>Proyectos Destacados</h2>
        <div class="carousel-wrapper">
            <button class="carousel-control prev" aria-label="Anterior">❮</button>
            <div class="carousel">
                <?php
                $projects = get_field('portfolio_projects');
                if ($projects && is_array($projects)) {
                    foreach ($projects as $project) {
                        $image = $project['project_image'];
                        $title = $project['project_title'];
                        ?>
                        <div class="carousel-slide">
                            <?php if ($image) : ?>
                                <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>">
                            <?php endif; ?>
                            <h4><?php echo esc_html($title); ?></h4>
                        </div>
                        <?php
                    }
                } else {
                    // Fallback con proyectos por defecto
                    ?>
                    <div class="carousel-slide">
                        <div style="background: #f0f0f0; height: 400px; display: flex; align-items: center; justify-content: center; color: #999;">
                            Sin proyectos. Añade en ACF "Proyectos Destacados"
                        </div>
                        <h4>Proyecto no configurado</h4>
                    </div>
                    <?php
                }
                ?>
            </div>
            <button class="carousel-control next" aria-label="Siguiente">❯</button>
        </div>
    </div>
</section>

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
                    <option value="rotulos-luminosos">Rótulos Luminosos</option>
                    <option value="letras-metalicas">Letras Metálicas</option>
                    <option value="vinilos">Vinilos Decorativos</option>
                    <option value="senaletica">Señalética</option>
                    <option value="fachadas">Fachadas</option>
                    <option value="rotulacion-artistica">Rotulación Artística</option>
                    <option value="impresion">Impresión Gran Formato</option>
                </select>
            </div>
            <div class="form-group">
                <label for="presupuesto">Descripción del Proyecto *</label>
                <textarea id="presupuesto" name="presupuesto" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-lg btn-primary">Solicitar Presupuesto</button>
        </form>
    </div>
</section>

<?php
get_footer();
?>
