<?php
/**
 * CRISBAPRO Theme - Main Template
 * Landing Page rendered with ACF fields
 */

get_header();
?>

<!-- HERO SECTION -->
<section class="hero" style="background-image: url('<?php echo esc_url(crisbapro_get_hero_image()); ?>');">
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
<section class="trust-block">
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
            <div class="service-card">
                <div class="service-icon">💡</div>
                <h3>Rótulos Luminosos</h3>
                <p>Diseño y fabricación de rótulos luminosos LED de alta eficiencia energética</p>
                <a href="#" class="btn-link">Ver Proyecto →</a>
            </div>
            <div class="service-card">
                <div class="service-icon">✨</div>
                <h3>Letras Metálicas</h3>
                <p>Letras 3D en acero inoxidable, aluminio y bronce con acabados premium</p>
                <a href="#" class="btn-link">Ver Proyecto →</a>
            </div>
            <div class="service-card">
                <div class="service-icon">📋</div>
                <h3>Vinilos Decorativos</h3>
                <p>Vinilos corporativos, decorativos y publicitarios de alta durabilidad</p>
                <a href="#" class="btn-link">Ver Proyecto →</a>
            </div>
            <div class="service-card">
                <div class="service-icon">🏪</div>
                <h3>Señalética</h3>
                <p>Señalización profesional para oficinas, tiendas y espacios públicos</p>
                <a href="#" class="btn-link">Ver Proyecto →</a>
            </div>
            <div class="service-card">
                <div class="service-icon">🖼️</div>
                <h3>Fachadas</h3>
                <p>Revestimientos y fachadas corporativas con diseño personalizado</p>
                <a href="#" class="btn-link">Ver Proyecto →</a>
            </div>
            <div class="service-card">
                <div class="service-icon">🎨</div>
                <h3>Rotulación Artística</h3>
                <p>Diseños artísticos y personalizados para marcas únicas</p>
                <a href="#" class="btn-link">Ver Proyecto →</a>
            </div>
            <div class="service-card">
                <div class="service-icon">📱</div>
                <h3>Impresión Gran Formato</h3>
                <p>Impresión digital de alta calidad para vallas, lona y banners</p>
                <a href="#" class="btn-link">Ver Proyecto →</a>
            </div>
        </div>
    </div>
</section>

<!-- CAROUSEL SECTION -->
<section class="carousel-section">
    <div class="container">
        <h2>Proyectos Destacados</h2>
        <div class="carousel-wrapper">
            <button class="carousel-control prev" aria-label="Anterior">❮</button>
            <div class="carousel">
                <div class="carousel-slide">
                    <img src="https://via.placeholder.com/600x400?text=Proyecto+1" alt="Proyecto 1">
                    <h4>Rótulos Luminosos - Centro Comercial</h4>
                </div>
                <div class="carousel-slide">
                    <img src="https://via.placeholder.com/600x400?text=Proyecto+2" alt="Proyecto 2">
                    <h4>Letras Metálicas - Marca Luxury</h4>
                </div>
                <div class="carousel-slide">
                    <img src="https://via.placeholder.com/600x400?text=Proyecto+3" alt="Proyecto 3">
                    <h4>Fachada Corporativa - Oficinas</h4>
                </div>
            </div>
            <button class="carousel-control next" aria-label="Siguiente">❯</button>
        </div>
    </div>
</section>

<!-- PROCESO SECTION -->
<section class="proceso">
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
<section class="sectores">
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
<section class="contact-section">
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
