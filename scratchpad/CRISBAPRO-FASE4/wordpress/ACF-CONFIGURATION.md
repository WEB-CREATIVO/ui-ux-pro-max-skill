# CRISBAPRO - WordPress & ACF Configuration Guide
**Fase 4 Implementation | Editable Content Architecture**

---

## 📋 RESUMEN ARQUITECTURA

```
Separación Estructura ↔ Contenido:
├── Tema (HTML/CSS/JS) - FIJO, actualizable sin afectar contenido
├── Custom Post Types - Define estructura de datos
├── ACF Fields - Almacena contenido editable en base de datos
└── Gutenberg Blocks - Interfaz visual para contenido
```

---

## 🔧 INSTALACIÓN REQUERIDA

### Plugins Obligatorios
1. **Advanced Custom Fields Pro** (ACF) - https://www.advancedcustomfields.com
2. **Custom Post Types UI** - Para registrar post types (o hacerlo en code)
3. **Yoast SEO** - Para meta descriptions y análisis SEO

### Plugins Recomendados
- **Contact Form 7** - Alternativa a formulario custom
- **Elementor** - Si se desea interfaz visual avanzada
- **WP Super Cache** - Performance/caching

---

## 📝 CUSTOM POST TYPES REQUERIDOS

### 1. POST TYPE: "Proyecto" (Projects)

```php
// Registrar en functions.php del tema
register_post_type('proyecto', array(
  'labels' => array(
    'name' => 'Proyectos',
    'singular_name' => 'Proyecto',
  ),
  'public' => true,
  'has_archive' => true,
  'rewrite' => array('slug' => 'proyectos'),
  'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
  'menu_icon' => 'dashicons-format-gallery',
));
```

#### ACF Fields para "Proyecto":

```
📦 Proyecto
├── titulo (Text) - Título del proyecto
├── descripcion (Text Area) - Breve descripción
├── cliente (Text) - Nombre del cliente
├── sector (Repeater) - Sectors aplicables
│   ├── sector_nombre (Select: Comercios, Restaurantes, etc.)
│   └── sector_icono (Text)
├── servicios (Repeater) - Servicios incluidos
│   └── servicio (Checkbox: Rótulos Luminosos, Letras, etc.)
├── galeria (Image) - Galería de imágenes
│   ├── foto_principal (Image)
│   ├── foto_proceso (Image)
│   └── foto_resultado (Image)
├── problema (Text Area) - Problema que resolvimos
├── solucion (Text Area) - Solución implementada
├── resultado (Text Area) - Resultado obtenido
├── duracion_dias (Number) - Duración en días
├── presupuesto_estimado (Text) - Ej: "3.500€ - 5.000€"
└── fecha_proyecto (Date) - Fecha de realización
```

---

### 2. POST TYPE: "Servicio" (Services)

```php
register_post_type('servicio', array(
  'labels' => array(
    'name' => 'Servicios',
    'singular_name' => 'Servicio',
  ),
  'public' => true,
  'has_archive' => true,
  'rewrite' => array('slug' => 'servicios'),
  'supports' => array('title', 'editor', 'thumbnail'),
  'menu_icon' => 'dashicons-hammer',
));
```

#### ACF Fields para "Servicio":

```
📦 Servicio
├── titulo_h1 (Text) - H1 único para SEO
├── meta_description (Text Area) - 160 caracteres
├── introduccion (Text Area) - Párrafo introductorio
├── beneficios (Repeater) - Lista de ventajas
│   ├── beneficio_titulo (Text)
│   ├── beneficio_descripcion (Text Area)
│   └── beneficio_icono (Text)
├── materiales (Repeater) - Opciones de material
│   ├── material_nombre (Text)
│   ├── material_descripcion (Text Area)
│   ├── durabilidad (Text)
│   ├── precio_rango (Text)
│   └── uso_ideal (Text)
├── aplicaciones (Repeater) - Casos de uso
│   ├── aplicacion_titulo (Text)
│   ├── aplicacion_descripcion (Text Area)
│   └── aplicacion_icono (Text)
├── proceso_pasos (Repeater) - 5 pasos del proceso
│   ├── paso_numero (Number)
│   ├── paso_titulo (Text)
│   ├── paso_descripcion (Text Area)
│   └── paso_icono (Text)
├── faq (Repeater) - Preguntas frecuentes
│   ├── faq_pregunta (Text)
│   └── faq_respuesta (Text Area)
├── servicios_relacionados (Relationship) - Links a otros servicios
└── imagen_principal (Image) - Hero image
```

---

### 3. CUSTOM POST TYPE: "Sector" (Industries)

```php
register_post_type('sector', array(
  'labels' => array(
    'name' => 'Sectores',
    'singular_name' => 'Sector',
  ),
  'public' => true,
  'rewrite' => array('slug' => 'sectores'),
  'supports' => array('title', 'editor', 'thumbnail'),
));
```

#### ACF Fields:
```
📦 Sector
├── nombre (Text) - Nombre del sector
├── icono (Text) - Emoji o SVG
├── descripcion (Text Area)
├── servicios_aplicables (Repeater)
│   ├── servicio_id (Relationship)
│   └── caso_uso (Text Area)
└── proyectos (Relationship) - Links a proyectos de este sector
```

---

## 🎨 TAXONOMÍAS

### 1. Category: "Sector" (para Proyectos)
```
Taxonomía: proyecto-sector
├── 🏪 Comercios y Tiendas
├── 🍽️ Restaurantes y Bares
├── ⚕️ Sanidad
├── 🏢 Empresas
├── ⛽ Industria
├── 🚗 Flotas
└── 📊 Otros
```

### 2. Category: "Tipo Proyecto"
```
Taxonomía: proyecto-tipo
├── Iluminación
├── Señalética
├── Rotulación Fachada
├── Vehículos
└── Impresión
```

---

## 📄 PÁGINAS ESTÁTICAS (Pages)

### Home (Página Principal)
- Template: Home
- ACF Fields:
  ```
  ├── hero_titulo (Text)
  ├── hero_subtitulo (Text Area)
  ├── hero_imagen (Image)
  ├── hero_cta_primario_texto (Text)
  ├── hero_cta_primario_link (URL)
  ├── hero_cta_secundario_texto (Text)
  ├── hero_cta_secundario_link (URL)
  └── [sections dinámicas]
  ```

### Página de Servicio (Template)
- Slug pattern: `/servicios/[servicio-slug]/`
- Asociar Post Type "Servicio"
- Mostrar: H1 único, meta description, contenido dinámico desde ACF

### Página de Contacto
- Template: Contact
- ACF Fields:
  ```
  ├── telefono (Text)
  ├── email (Email)
  ├── whatsapp (Text)
  ├── ubicacion_texto (Text Area)
  ├── horario (Text Area)
  └── ubicacion_mapa_embed (Text - Google Maps embed)
  ```

### Página de Proyectos (Archive)
- Slug: `/proyectos/`
- Mostrar: Grid filtrable por sector/tipo
- Pagination: 12 proyectos por página

---

## 🔗 RELACIONES Y LINKS

### Breadcrumb Navigation
```
Home > Servicios > [Nombre Servicio]
Home > Proyectos > [Nombre Proyecto]
Home > Sectores > [Nombre Sector]
```

### Related Posts
- Proyectos relacionados en página de Servicio
- Servicios relacionados en página de Proyecto

---

## 🖼️ CONFIGURACIÓN DE IMÁGENES

### Tamaños de Imagen (Image Sizes)

```php
// En functions.php
add_image_size('hero-lg', 1280, 500, true);      // Hero desktop
add_image_size('hero-md', 768, 400, true);       // Hero tablet
add_image_size('hero-sm', 375, 300, true);       // Hero mobile
add_image_size('card-lg', 400, 300, true);       // Service cards
add_image_size('card-md', 300, 225, true);       // Smaller cards
add_image_size('thumb-sm', 150, 150, true);      // Thumbnails
```

### Optimización
- Usar plugin: ShortPixel o Smush para compresión
- Formatos: WebP + JPG fallback
- Alt text: Obligatorio en ACF con validación

---

## 📊 SCHEMA.ORG STRUCTURED DATA

### Inyectar en `wp_head`

```php
// LocalBusiness Schema
add_action('wp_head', function() {
  $schema = array(
    '@context' => 'https://schema.org',
    '@type' => 'LocalBusiness',
    'name' => 'CRISBAPRO',
    'description' => 'Rotulación profesional en Madrid',
    'telephone' => '608782015',
    'email' => 'cristian@crisbapro.com',
    'address' => array(
      '@type' => 'PostalAddress',
      'addressLocality' => 'Madrid',
      'addressCountry' => 'ES'
    ),
    'areaServed' => 'Madrid, España',
  );
  echo '<script type="application/ld+json">' . json_encode($schema) . '</script>';
});

// Service Schema (en loop de servicios)
// Product/Service Schema (en proyectos)
```

---

## 🔐 PERMISOS Y ROLES

### Editor
- Permiso completo: Proyectos, Servicios, Páginas
- NO acceso a: Configuración, Plugins, Tema

### Author
- Permiso: Solo Proyectos
- NO acceso a: Servicios, Páginas

### Subscriber
- Solo lectura (opcional)

---

## 🚀 CONFIGURACIÓN SEO (Yoast)

Por cada Servicio y Proyecto:

1. **Focus Keyphrase**
   - Servicio: "rótulos luminosos madrid"
   - Proyecto: "[tipo proyecto] madrid"

2. **Meta Description**
   - 155-160 caracteres
   - Incluir CTA

3. **SEO Title**
   - Max 60 caracteres
   - Incluir ubicación (Madrid)

4. **Readability**
   - Párrafos cortos
   - Listas con viñetas
   - Subheadings cada 300 palabras

---

## 📱 MOBILE OPTIMIZATION

### WordPress
- Plugin: WP Mobile Detector
- Test: Google Mobile-Friendly Test
- ViewPort Meta: Automático en WP

### Performance
- Lazy load imágenes: Lazy Load by WP Rocket
- Minificar CSS/JS: Autoptimize
- Cache: WP Super Cache

---

## 📈 ANALYTICS & TRACKING

### Google Analytics 4
```php
// Agregar GA4 ID en header
add_action('wp_head', function() {
  echo '<!-- Google Analytics -->';
  echo '<script async src="https://www.googletagmanager.com/gtag/js?id=G-XXXXXXXX"></script>';
  echo '<script>window.dataLayer=[...]; gtag(...);</script>';
});
```

### Event Tracking
- Click en "Solicitar Presupuesto"
- Envío de formulario
- Click en WhatsApp
- Scroll en secciones clave

---

## 🔄 WORKFLOW DE ACTUALIZACIÓN

### Para Editor/Admin:

**Agregar Nuevo Proyecto:**
1. Ir a: Proyectos → Añadir Nuevo
2. Completar campos ACF (título, imágenes, descripción)
3. Asignar Sector y Tipo
4. Publicar
5. El sitio web se actualiza automáticamente

**Agregar Nuevo Servicio:**
1. Ir a: Servicios → Añadir Nuevo
2. Completar H1 y meta description
3. Llenar campos de beneficios, materiales, FAQ
4. Publicar
5. Se genera URL automáticamente: `/servicios/[slug]/`

---

## ✅ CHECKLIST IMPLEMENTACIÓN

- [ ] Instalar ACF Pro
- [ ] Crear Custom Post Types (Proyecto, Servicio, Sector)
- [ ] Configurar ACF Fields según especificación
- [ ] Crear Templates WordPress (Home, Servicio, Contacto)
- [ ] Registrar Image Sizes
- [ ] Configurar Yoast SEO
- [ ] Inyectar Schema.org
- [ ] Configurar Google Analytics 4
- [ ] Crear Taxonomías (Sector, Tipo)
- [ ] Crear páginas estáticas base
- [ ] Testar en mobile
- [ ] Verificar accesibilidad (WCAG AA)

---

**Próximo paso:** Exportar ACF Fields como JSON para importar en otros ambientes (development → staging → production)
