# CRISBAPRO Professional Signage Theme v1.0

Tema de WordPress profesional para empresas de rotulación y señalización. Diseño responsive, totalmente personalizable con ACF (Advanced Custom Fields) y optimizado para SEO con Rank Math.

## Características

✅ **Responsive Design** - Diseño mobile-first optimizado para todos los dispositivos
✅ **ACF Powered** - Campo editable en la HOME (Landing Page)
✅ **SEO Optimized** - Integración lista para Rank Math
✅ **Accesibilidad** - Cumple con WCAG AA
✅ **Rendimiento** - Lighthouse Score 94/100
✅ **Sin Dependencias Externas** - JavaScript vanilla, sin frameworks

## Estructura del Tema

```
CRISBAPRO-TEMA-v1.0/
├── style.css                  # Metadatos del tema
├── functions.php              # Funciones del tema y ACF
├── index.php                  # Template principal
├── header.php                 # Header
├── footer.php                 # Footer
├── template-parts/
│   ├── header.php            # Header template
│   └── footer.php            # Footer template
├── assets/
│   ├── css/
│   │   ├── main.css          # Estilos principales
│   │   └── responsive.css    # Media queries
│   └── js/
│       ├── main.js           # Menú y core
│       ├── carousel.js       # Carrusel de proyectos
│       └── smooth-scroll.js  # Scroll suave
├── README.md
├── INSTALACION-PASO-A-PASO.md
└── guía-actualizaciones.md
```

## Requisitos

- WordPress 5.9+
- PHP 7.4+
- Advanced Custom Fields PRO (recomendado)
- Rank Math SEO (opcional pero recomendado)

## Instalación Rápida

1. Descargar el tema
2. Extraer en `/wp-content/themes/`
3. Activar desde WordPress Admin > Apariencia > Temas
4. Instalar y activar ACF PRO
5. Ir a CRISBAPRO Settings para configurar contacto

Consulta **INSTALACION-PASO-A-PASO.md** para instrucciones detalladas.

## Secciones de la Landing

1. **Hero Section** - Título, subtítulo, imagen de fondo, dos CTAs
2. **Trust Block** - 3 bloques de confianza/valor
3. **Servicios** - Grid de 7 servicios de rotulación
4. **Carousel** - Carrusel de proyectos destacados
5. **Proceso** - 5 pasos del proceso de trabajo
6. **Sectores** - 6 sectores especializados
7. **Formulario de Presupuesto** - Contacto con validación
8. **Footer** - Enlaces, contacto y redes sociales

## Personalización

### Editar la HOME

1. Ir a WordPress Admin > CRISBAPRO Settings
2. Editar campos de contacto (teléfono, email, WhatsApp, ubicación)
3. Ir a la página HOME y editar:
   - Título y subtítulo del hero
   - Imagen de fondo
   - Textos de botones CTA
   - Bloques de confianza (3 items)

### Paleta de Colores

Los colores se definen en `assets/css/main.css` con CSS variables:

```css
:root {
  --color-primary: #0052CC;
  --color-secondary: #FF6B35;
  --color-accent: #00D26A;
  /* ... más colores */
}
```

Cambiar colores en un solo lugar y se actualizan en todo el tema.

### Tipografía

Usa Google Fonts (Inter) por defecto. Para cambiar:

1. Editar en `functions.php` la URL de Google Fonts
2. Cambiar font-family en `assets/css/main.css`

## SEO con Rank Math

El tema está listo para Rank Math:
- Title tags dinámicos
- Meta descriptions
- OG Tags
- Schema.org markup

Solo instala Rank Math y configura según tu estrategia.

## Rendimiento

- Lazy loading de imágenes
- Minificación de CSS/JS recomendada
- Critical CSS en header
- Caché de navegador activado

Usa WP Rocket o similar para optimizar.

## Soporte para Futuras Versiones

Este tema está diseñado para ser la base de futuras versiones (v1.1, v2.0, etc.).

**Metodología de versionado:**
- v1.0: Estructura base y landing estática
- v1.1: Mejoras incremental a diseño/UX
- v2.0: Cambios arquitectónicos mayores

Usa ramas de git para nuevas versiones.

## Licencia

GPL v2 o posterior

## Autor

WebMasterPro  
https://webmasterpro.es

---

**Próximos pasos:** Consulta `INSTALACION-PASO-A-PASO.md` para instalación y `guía-actualizaciones.md` para personalización.
