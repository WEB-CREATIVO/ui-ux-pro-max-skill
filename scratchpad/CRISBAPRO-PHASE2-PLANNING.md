# FASE 2 — PLANIFICACIÓN CRISBAPRO
**Diseño, Wireframes, Contenidos y Sistema Visual**

---

## 📊 INFORMACIÓN CONFIRMADA

| Campo | Valor |
|-------|-------|
| **Empresa** | CRISBAPRO |
| **Contacto** | Cristian (608 78 20 15 / cristian@crisbapro.com) |
| **Servicios** | Todos 7: Rótulos luminosos, Letras corpóreas, Rotulación fachadas, Vinilos adhesivos, Vehículos, Señalética, Impresión gran formato |
| **Cobertura** | Madrid + España |
| **Logotipo** | Texto (CRISBAPRO) - diseño personalizado en FASE 4 |
| **Proyectos** | [PLACEHOLDER - Subirán después] |
| **Experiencia** | 10 años (diferenciador clave) |
| **Propuesta** | Especialista consolidado en rotulación integral |

---

## 🗺️ SITEMAP VISUAL

```
CRISBAPRO.COM
│
├─ 01. INICIO (/)
│   └─ Hero potente + Propuesta de valor + Servicios + Proyectos + CTA + Proceso
│
├─ 02. SERVICIOS (/servicios/)
│   ├─ 02a. Rótulos Luminosos (/servicios/rotulos-luminosos/)
│   ├─ 02b. Letras Corpóreas (/servicios/letras-corpóreas/)
│   ├─ 02c. Rotulación Fachadas (/servicios/rotulacion-fachadas/)
│   ├─ 02d. Vinilos Adhesivos (/servicios/vinilos-adhesivos/)
│   ├─ 02e. Rotulación Vehículos (/servicios/rotulacion-vehiculos/)
│   ├─ 02f. Señalética (/servicios/senaletica/)
│   └─ 02g. Impresión Gran Formato (/servicios/impresion-gran-formato/)
│
├─ 03. PROYECTOS (/proyectos/)
│   ├─ Galería filtrable (por servicio, sector, ubicación)
│   └─ [Proyectos individuales con metadata]
│
├─ 04. SECTORES (/sectores/)
│   ├─ Comercios
│   ├─ Restauración & Hostelería
│   ├─ Oficinas & Empresas
│   ├─ Clínicas & Centros Profesionales
│   ├─ Franquicias
│   ├─ Flotas de Vehículos
│   ├─ Eventos & Ferias
│   └─ Centros Comerciales
│
├─ 05. NUESTRO PROCESO (/como-trabajamos/)
│   └─ 5 pasos: Briefing → Asesoramiento → Diseño → Fabricación → Instalación
│
├─ 06. SOBRE CRISBAPRO (/nosotros/)
│   └─ Historia, equipo, valores, certificaciones
│
├─ 07. PRESUPUESTO (/solicitar-presupuesto/)
│   └─ Formulario optimizado + FAQ
│
├─ 08. CONTACTO (/contacto/)
│   └─ Teléfono, WhatsApp, Email, Mapa, Horario
│
├─ 09. BLOG (/blog/)
│   └─ Artículos SEO (12-15 posts para posicionar)
│
└─ 10. LEGAL
    ├─ /aviso-legal/
    ├─ /privacidad/
    └─ /cookies/
```

---

## 🎨 SISTEMA DE DISEÑO

### Paleta de Colores Definitiva

```css
/* Primary: Navy profesional */
--color-navy: #1E3A8A;
--color-navy-light: #3B82F6;
--color-navy-lighter: #DBEAFE;

/* Accent: Rojo energía (CTA) */
--color-accent: #EF4444;
--color-accent-light: #FCA5A5;
--color-accent-lighter: #FEE2E2;

/* Neutrals */
--color-slate-50: #F8FAFC;
--color-slate-100: #F1F5F9;
--color-slate-200: #E2E8F0;
--color-slate-300: #CBD5E1;
--color-slate-400: #94A3B8;
--color-slate-500: #64748B;
--color-slate-600: #475569;
--color-slate-700: #334155;
--color-slate-800: #1E293B;
--color-slate-900: #0F172A;

/* Semantic */
--color-success: #10B981;
--color-warning: #F59E0B;
--color-error: #EF4444;
--color-info: #3B82F6;
```

### Tipografía

```css
/* Headlines */
--font-heading: "Inter", "Segoe UI", -apple-system, BlinkMacSystemFont, sans-serif;
--font-weight-heading: 700; /* Bold */

/* Body */
--font-body: "Inter", "Segoe UI", -apple-system, BlinkMacSystemFont, sans-serif;
--font-weight-body: 400; /* Regular */
--font-weight-medium: 500; /* Medium para labels */

/* Monospace */
--font-mono: "JetBrains Mono", "Courier New", monospace;

/* Scale */
--text-h1: 48px / 1.2; /* mobile: 32px */
--text-h2: 36px / 1.3; /* mobile: 28px */
--text-h3: 24px / 1.4; /* mobile: 20px */
--text-h4: 20px / 1.4;
--text-body: 16px / 1.6;
--text-small: 14px / 1.6;
--text-label: 12px / 1.4;

/* Letter spacing */
--tracking-tight: -0.02em;
--tracking-normal: 0;
--tracking-wide: 0.02em;
```

### Componentes Clave

#### Botón Primario (CTA)
```
Tamaño: 48px altura (móvil), 44px mínimo
Color: #EF4444 (rojo)
Texto: 16px bold white
Padding: 12px 24px
Border-radius: 6px
Hover: #DC2626 (rojo más oscuro)
Active: #991B1B
Focus: Ring 2px #F97316
Transición: 150ms ease-out
```

#### Botón Secundario
```
Color: #3B82F6 (azul)
Borde: 1px #3B82F6
Fondo: transparent
Texto: #3B82F6
Hover: Fondo #EFF6FF
```

#### Tarjeta de Servicio
```
Fondo: white
Borde: 1px #E2E8F0
Border-radius: 8px
Padding: 24px
Sombra: 0 1px 3px rgba(0,0,0,0.1)
Hover: Sombra 0 10px 25px rgba(0,0,0,0.1), Escala 1.02
Transición: 200ms ease-out
Contenido: Imagen + H3 + Descripción + Link "Ver servicio"
```

#### Formulario
```
Input height: 44px (toque accesible)
Label: 12px bold, obligatorio: *
Placeholder: #94A3B8
Borde: 1px #E2E8F0
Focus: Borde 2px #3B82F6, Sombra azul 0 0 0 3px
Error: Borde 2px #EF4444
Helper text: 12px #475569 (bajo campo)
```

---

## 📄 WIREFRAME TEXTUAL: PÁGINA DE INICIO

### 1. HEADER (Sticky)
```
┌─────────────────────────────────────────────────┐
│ CRISBAPRO      [Menu]    608 78 20 15  [Presupuesto] │
│ (Logo texto)   Servicios  WhatsApp      (Rojo)       │
│                Proyectos  [CTA primario]             │
│                Sectores                               │
│                Nosotros                               │
└─────────────────────────────────────────────────┘
Móvil: CRISBAPRO [≡] 608 78 20 15
       (Hamburger abre drawer)
```

### 2. HERO
```
┌─────────────────────────────────────────────────┐
│                                                  │
│    [IMAGEN PLACEHOLDER - Rótulo real potente]  │
│                                                  │
│    H1: "Rotulación Profesional en Madrid"       │
│    (48px bold navy)                             │
│                                                  │
│    Subtítulo:                                   │
│    "Diseñamos, fabricamos e instalamos          │
│    soluciones que hacen visible tu negocio"     │
│    (20px regular slate-700)                     │
│                                                  │
│    ┌──────────────────┐  ┌─────────────────┐  │
│    │ Solicitar        │  │ Ver Proyectos   │  │
│    │ Presupuesto      │  │ (secundario)    │  │
│    │ (CTA rojo)       │  │                 │  │
│    └──────────────────┘  └─────────────────┘  │
│                                                  │
└─────────────────────────────────────────────────┘
```

### 3. BLOQUE DE CONFIANZA (3 columnas)
```
┌─────────────────────────────────────────────────┐
│                                                  │
│  ✓ Especialistas desde 2014      ✓ Gestión      ✓ Cobertura España  │
│    (10 años de experiencia)       integral:     (Madrid + territorio)│
│    Proyectos realizados en        Diseño,       Envío, instalación  │
│    Madrid, España y Europa.       fabricación   a cualquier punto.  │
│                                   e instalación                      │
│                                                                       │
└─────────────────────────────────────────────────┘
(3 tarjetas con icono + título + descripción)
```

### 4. SERVICIOS PRINCIPALES (6-8 tarjetas)
```
┌──────────┬──────────┬──────────┐
│          │          │          │
│ [IMG]    │ [IMG]    │ [IMG]    │
│ Rótulos  │ Letras   │Rotulación│
│Luminosos │Corpóreas │ Fachadas │
│Ver →     │ Ver →    │ Ver →    │
└──────────┴──────────┴──────────┘
┌──────────┬──────────┬──────────┐
│ [IMG]    │ [IMG]    │ [IMG]    │
│ Vinilos  │Vehículos │Señalética│
│Adhesivos │          │          │
│ Ver →    │ Ver →    │ Ver →    │
└──────────┴──────────┴──────────┘
```

### 5. PROYECTOS DESTACADOS (Carrusel)
```
┌─────────────────────────────────────────────────┐
│ PROYECTOS REALIZADOS                            │
│ (Filtrable por: Servicio | Sector | Ubicación)  │
│                                                  │
│ [◄]  ┌──────────────┐ ┌──────────┐  [►]        │
│      │ [PLACEHOLDER]│ │[PLACEHOLD│            │
│      │ Rótulo Comercio│ │Vinilo Restaurant    │
│      │ Tipo: Luminoso│ │Sector: Hostelería   │
│      │ Ubicación: MAD│ │Ubicación: MAD       │
│      └──────────────┘ └──────────┘            │
│                                                  │
│           [Ver todos los proyectos →]           │
└─────────────────────────────────────────────────┘
```

### 6. PROCESO DE TRABAJO (5 pasos)
```
1. BRIEFING        2. ASESORAMIENTO    3. DISEÑO
   "Cuéntanos tu   "Visitamos y       "Propuesta
    proyecto"      medimos"           personalizada"
         ↓              ↓                  ↓
    
                4. FABRICACIÓN      5. INSTALACIÓN
                   "Producción         "Montaje
                    profesional"       profesional"
                         ↓                 ↓
```

### 7. SECTORES (8 logos/icono + título)
```
Comercios | Restaurantes | Oficinas | Clínicas |
Franquicias | Flotas Vehículos | Eventos | Centros Comerciales
```

### 8. TESTIMONIOS O CTA CONFIANZA
```
Si NO hay testimonios:
┌─────────────────────────────────┐
│ ¿Necesitas rotulación?           │
│ Contáctanos para una propuesta   │
│ personalizada sin compromiso.    │
│                                  │
│    [Solicitar Presupuesto]       │
└─────────────────────────────────┘

Si SÍ hay testimonios (después):
┌─────────────────────────────────┐
│ "Profesionalidad de principio a fin" │
│ - Marta García, Restaurante Madrid   │
│                                  │
│ "Instalación rápida y perfecta"      │
│ - Juan López, Empresa Servicios      │
└─────────────────────────────────┘
```

### 9. CTA FINAL (Dark section)
```
┌─────────────────────────────────────────────────┐
│ Fondo: #1E293B (navy oscuro)                    │
│ Texto: white                                    │
│                                                  │
│  H2: "Cuéntanos qué necesitas"                  │
│  "Prepararemos una propuesta adaptada a tu      │
│   proyecto"                                      │
│                                                  │
│      ┌──────────────────────┐                   │
│      │ Solicitar Presupuesto │                  │
│      │ (Rojo)               │                   │
│      └──────────────────────┘                   │
│      ┌──────────────┐                           │
│      │ Hablar WhatsApp                          │
│      │ (Secundario) │                           │
│      └──────────────┘                           │
└─────────────────────────────────────────────────┘
```

### 10. FOOTER
```
┌─────────────────────────────────────────────────┐
│                                                  │
│ CRISBAPRO            Info                Ayuda  │
│ Rotulación integral  608 78 20 15        Blog   │
│                      cristian@crisbapro  FAQ    │
│                      Madrid, España      Legal  │
│                      Horario: [hrs]      Cookies│
│                                                  │
│ © 2024 CRISBAPRO. Todos los derechos reservados│
│ Síguenos: LinkedIn | Instagram                 │
│                                                  │
└─────────────────────────────────────────────────┘
```

---

## 📝 CONTENIDOS REDACTADOS

### HOME PAGE

#### H1 Principal
```
"Rotulación Profesional en Madrid"
(Único H1 por página. Ubiquidad: Hero section)
```

#### Subtítulo Hero
```
"Diseñamos, fabricamos e instalamos soluciones 
de comunicación visual que hacen visible tu negocio. 
Especialistas en rotulación desde 2014."
```

#### Meta Description (160 caracteres)
```
"Rotulación profesional en Madrid y España. 
Rótulos luminosos, letras corpóreas, vinilos, 
señalética. Diseño, fabricación e instalación. 
10 años de experiencia. Solicita presupuesto."
```

#### Bloque de Confianza
```
✓ ESPECIALISTAS DESDE 2014
Más de 10 años diseñando, fabricando e 
instalando soluciones de rotulación en 
Madrid, España y resto de Europa.

✓ GESTIÓN COMPLETA
Asesoramiento personalizado, diseño a medida, 
fabricación profesional e instalación especializada. 
Un único contacto para todo tu proyecto.

✓ COBERTURA MADRID + ESPAÑA
Soluciones de rotulación en Madrid, comunidad 
autónoma y territorio nacional. Envío y 
instalación profesional a cualquier ubicación.
```

#### CTA Primario (Hero)
```
Botón: "Solicitar Presupuesto"
Color: Rojo #EF4444
Tamaño: 48px (móvil 44px)
Link: /solicitar-presupuesto/
Analytics: event("click_cta_primary_hero")
```

---

### PÁGINA DE SERVICIO (Template reutilizable)
**Ej: /servicios/rotulos-luminosos/**

#### H1
```
"Rótulos Luminosos en Madrid"
(Único H1. SEO keyword inclusion)
```

#### Meta Description
```
"Rótulos luminosos personalizados para tu negocio 
en Madrid y España. Diseño, fabricación e instalación 
profesional. Consigue tu presupuesto hoy."
```

#### Estructura
```
1. Hero + CTA
2. Introducción (problema cliente)
   "Poca visibilidad nocturna? Nosotros lo solucionamos"
3. Beneficios del servicio
   - Visibilidad 24/7
   - Consumo energético optimizado
   - Diseño profesional
   - Instalación segura
4. Materiales disponibles
   - Neón
   - LED
   - Acrílico
5. Aplicaciones habituales
   - Comercios
   - Restaurantes
   - Gasolineras
   - Farmacias
6. Proceso de trabajo (5 pasos)
7. FAQ (6-8 preguntas)
8. Servicios relacionados
   "También te podría interesar: Letras corpóreas"
9. CTA final
10. Breadcrumbs
```

---

## 📊 REDACCIÓN SEO PARA BLOG (15 artículos iniciales)

| # | Título | Palabra clave | Ubicación |
|---|--------|--------------|-----------|
| 1 | Guía completa de rótulos luminosos para comercios | rótulos luminosos madrid | /blog/rotulos-luminosos-comercios |
| 2 | Cómo elegir el material adecuado para tu rotulación | rotulación madrid | /blog/material-rotulacion |
| 3 | Rotulación de fachadas: mejora la identidad visual | rotulación fachadas madrid | /blog/rotulacion-fachadas |
| 4 | Vinilos adhesivos: solución económica para tu marca | vinilos adhesivos madrid | /blog/vinilos-adhesivos |
| 5 | Rotulación de vehículos: publicidad móvil efectiva | rotulación vehículos madrid | /blog/rotulacion-vehiculos |
| 6 | Señalética profesional: guía completa | señalética madrid | /blog/senaletica-profesional |
| 7 | Impresión en gran formato: usos y beneficios | impresión gran formato | /blog/impresion-gran-formato |
| 8 | Procesos de rotulación: de la idea al resultado | procesos rotulación | /blog/procesos-rotulacion |
| 9 | Restaurantes: cómo mejorar tu imagen con rotulación | rotulación restaurantes | /blog/rotulacion-restaurantes |
| 10 | Oficinas profesionales: señalética corporativa | señalética corporativa madrid | /blog/senaletica-corporativa |
| 11 | Franquicias: identidad visual consistente | rotulación franquicias | /blog/rotulacion-franquicias |
| 12 | Flotas de vehículos: rotulación profesional | rotulación flotas vehículos | /blog/rotulacion-flotas |
| 13 | Cuidados de la rotulación exterior | mantenimiento rotulación | /blog/mantenimiento-rotulacion |
| 14 | Presupuesto de rotulación: qué esperar | presupuesto rotulación madrid | /blog/presupuesto-rotulacion |
| 15 | Tendencias en diseño de rotulación 2024-2025 | tendencias rotulación | /blog/tendencias-rotulacion |

---

## 📱 EXPERIENCIA MÓVIL

### Bottom Bar (móvil)
```
┌─────────────────────────────────────┐
│                                     │
│  [☎] Llamar  [💬] WhatsApp [✓] Presupuesto │
│                                     │
└─────────────────────────────────────┘
Posición: Fixed bottom
Altura: 56px
Botones: Accesibles 44x44px
Analytics: event("click_mobile_cta_[tipo]")
```

### Responsive Breakpoints
```
Mobile: 375px (iPhone SE)
  - H1: 32px
  - Padding: 16px
  - Bottom bar CTA visible
  
Tablet: 768px (iPad)
  - H1: 40px
  - 2-column grid (servicios)
  - Padding: 24px
  
Desktop: 1024px+
  - H1: 48px
  - 3-column grid
  - Padding: 40px
  
Large desktop: 1440px+
  - Max-width contenedor: 1280px
```

---

## 🔍 SEO LOCAL - SCHEMA.ORG

### LocalBusiness
```json
{
  "@context": "https://schema.org",
  "@type": "LocalBusiness",
  "name": "CRISBAPRO",
  "image": "https://crisbapro.com/logo.png",
  "description": "Empresa especializada en rotulación profesional",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "[PENDIENTE]",
    "addressLocality": "Madrid",
    "addressRegion": "Madrid",
    "postalCode": "[PENDIENTE]",
    "addressCountry": "ES"
  },
  "telephone": "608782015",
  "url": "https://crisbapro.com",
  "priceRange": "[PENDIENTE]",
  "areaServed": ["Madrid", "España"],
  "serviceArea": {
    "@type": "City",
    "name": "Madrid"
  },
  "knowsAbout": [
    "Rótulos luminosos",
    "Letras corpóreas",
    "Rotulación fachadas",
    "Vinilos adhesivos",
    "Rotulación vehículos",
    "Señalética",
    "Impresión gran formato"
  ]
}
```

### Service (para cada servicio)
```json
{
  "@context": "https://schema.org/",
  "@type": "Service",
  "name": "Rótulos Luminosos",
  "provider": {
    "@type": "LocalBusiness",
    "name": "CRISBAPRO"
  },
  "areaServed": {
    "@type": "City",
    "name": "Madrid"
  },
  "hasOfferCatalog": {
    "@type": "OfferCatalog",
    "name": "Rotulación",
    "itemListElement": [
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "Rótulos Luminosos"
        }
      }
    ]
  }
}
```

---

## 📋 SISTEMA DE GESTIÓN DE CONTENIDO (WordPress + ACF)

### Custom Post Type: "Proyecto"
```
Campos:
- Título
- Descripción breve
- Contenido (editor)
- Imágenes (galería)
- Sector (taxonomía)
- Tipo servicio (taxonomía)
- Ubicación
- Año realización
- Cliente (opcional)
- Enlace portfolio
```

### Custom Post Type: "Servicio"
```
Campos:
- H1 (Título único)
- Meta description
- Contenido principal
- Beneficios (repeater)
- Materiales (repeater)
- Aplicaciones (repeater)
- FAQ (repeater - pregunta/respuesta)
- Imagen destacada
- Servicios relacionados (link)
```

### Página (WordPress estándar)
```
Home, Nosotros, Contacto, Proceso, Sectores
Editables vía Gutenberg blocks personalizados
```

---

## ⏱️ CRONOGRAMA IMPLEMENTACIÓN

| Fase | Duración | Deliverables |
|------|----------|--------------|
| **FASE 2** | Semana 1 | ✅ Sitemap + Wireframes + Contenidos (AHORA) |
| **FASE 3** | Semana 2 | Redacción completa + Recursos gráficos |
| **FASE 4** | Semana 3 | Implementación HTML/CSS/JS |
| **FASE 5** | Semana 4 | Testing + QA + Optimización SEO |
| **Lanzamiento** | Semana 5 | Deploy + Monitoreo |

---

## 📂 DATOS PENDIENTES DE CRISTIAN

- [ ] Logotipo personalizado (diseño)
- [ ] Fotografías de proyectos (mín. 12)
- [ ] Dirección física completa
- [ ] Horario de atención
- [ ] Referencias de clientes (para testimonios)
- [ ] Certificaciones/acreditaciones
- [ ] Política de precios (si quiere mostrar)
- [ ] Redes sociales (LinkedIn, Instagram)

---

## ✅ CHECKLIST FASE 2

- [x] Sitemap visual definido (12 páginas)
- [x] Wireframes textuales (inicio + servicio)
- [x] Contenidos redactados (H1, descripciones, CTA)
- [x] Sistema de diseño (colores, tipografía, componentes)
- [x] SEO local planificado (Schema.org, keywords)
- [x] Gestión contenidos (WordPress + ACF)
- [x] Cronograma realista (5 semanas)
- [x] Datos pendientes identificados

---

## 🚀 SIGUIENTE: FASE 3 — CONTENIDOS

**Próxima entrega:**
1. Artículos de blog completamente redactados (15)
2. Descripciones de servicios detalladas (7 páginas)
3. FAQ completa
4. Especificaciones técnicas exactas (header height, spacing, etc.)
5. Guía de estilos en Figma (exportable)

¿Confirmas que avancemos a FASE 3?

---

**Planificación completada por:** WebMasterPro Master-Skill + ui-ux-pro-max  
**Fecha:** 2026-09-12  
**Estado:** ✅ LISTO PARA FASE 3
