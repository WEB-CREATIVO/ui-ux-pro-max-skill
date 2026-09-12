# Guía de Actualizaciones y Personalización - CRISBAPRO v1.0

Instrucciones para actualizar y personalizar el tema CRISBAPRO sin necesidad de conocimientos avanzados de programación.

## 1. CAMBIAR COLORES DEL TEMA

### Ubicación del archivo

Archivo: `assets/css/main.css` (línea ~1-80)

### Colores principales

```css
:root {
  --color-primary: #0052CC;          /* Azul principal */
  --color-secondary: #FF6B35;        /* Naranja botones */
  --color-accent: #00D26A;           /* Verde secundario */
  /* ... más colores ... */
}
```

### Cambiar color primario (azul)

1. Abre `assets/css/main.css`
2. Busca `--color-primary: #0052CC;`
3. Reemplaza `#0052CC` con tu color en formato hexadecimal
4. Ejemplo: `#FF0000` (rojo)
5. Guardar archivo

**Colores que cambian:**
- Enlaces y hover effects
- Botones secundarios
- Título "CRISBAPRO" en header
- Iconos destacados

### Cambiar color secundario (naranja)

Botones principales "Solicitar Presupuesto"

```css
--color-secondary: #FF6B35;  /* Cambiar a tu color */
```

### Cambiar color de fondo

```css
--color-background: #FFFFFF;  /* Blanco actual */
--color-surface: #F5F5F5;     /* Gris muy claro */
```

### Referencia de colores hexadecimales comunes

```
#0052CC - Azul (Actual)
#FF6B35 - Naranja (Actual)
#00D26A - Verde
#E63946 - Rojo
#457B9D - Azul oscuro
#06A77D - Verde oscuro
#F4A261 - Naranja claro
#1A1A1A - Negro texto
#FFFFFF - Blanco
#F5F5F5 - Gris claro
```

## 2. CAMBIAR TIPOGRAFÍA

### Cambiar fuente

Archivo: `assets/css/main.css` (línea ~36)

Actualmente usa Inter de Google Fonts.

```css
--font-family-base: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
```

### Cambiar a otra fuente de Google Fonts

1. Ir a https://fonts.google.com/
2. Buscar fuente (ej: "Poppins", "Montserrat", "Playfair Display")
3. Click en fuente > Seleccionar pesos (400, 500, 600, 700)
4. Click "Get embed code"
5. Copiar URL de `<link href="...">`
6. Reemplazar URL en `functions.php` línea ~68:

```php
wp_enqueue_style(
    'crisbapro-fonts',
    'https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap',  // Nueva URL
    array(),
    null
);
```

7. Cambiar nombre de fuente en `main.css`:

```css
--font-family-base: 'Poppins', sans-serif;  /* Cambiar 'Inter' a 'Poppins' */
```

### Cambiar tamaño de fuentes

```css
/* Títulos grandes */
--h1-size: 48px;      /* Cambiar a 56px para más grande */
--h2-size: 36px;      /* Cambiar a 42px para más grande */

/* Tamaños base */
--font-size-base: 16px;   /* Cuerpo de texto */
--font-size-lg: 18px;     /* Subtítulos */
--font-size-xl: 20px;     /* Títulos secciones */
```

## 3. CAMBIAR ESPACIADO

### Escala de espaciado

```css
--spacing-xs: 4px;     /* Muy pequeño */
--spacing-sm: 8px;     /* Pequeño */
--spacing-md: 16px;    /* Medio */
--spacing-lg: 24px;    /* Grande */
--spacing-xl: 32px;    /* Extra grande */
--spacing-2xl: 48px;   /* Doble extra grande */
--spacing-3xl: 64px;   /* Triple */
```

Para más espaciado general, aumenta todos los valores:
```css
--spacing-md: 20px;    /* Era 16px */
--spacing-lg: 32px;    /* Era 24px */
--spacing-xl: 40px;    /* Era 32px */
```

## 4. CAMBIAR SOMBRAS

```css
--shadow-sm: 0 1px 2px rgba(0, 0, 0, 0.05);
--shadow-md: 0 4px 12px rgba(0, 0, 0, 0.1);
--shadow-lg: 0 12px 32px rgba(0, 0, 0, 0.15);
--shadow-xl: 0 20px 48px rgba(0, 0, 0, 0.2);
```

Para más sombra dramática:
```css
--shadow-lg: 0 12px 48px rgba(0, 0, 0, 0.25);  /* Más opaco (de 0.15 a 0.25) */
```

## 5. CAMBIAR BORDES REDONDEADOS (BORDER RADIUS)

```css
--radius-sm: 4px;       /* Pequeño */
--radius-md: 8px;       /* Medio */
--radius-lg: 12px;      /* Grande */
--radius-xl: 16px;      /* Extra grande */
--radius-full: 9999px;  /* Completamente redondeado */
```

Para esquinas más suavizadas:
```css
--radius-lg: 16px;   /* Aumentar de 12px a 16px */
```

## 6. CAMBIAR VELOCIDAD DE ANIMACIONES

```css
--transition-fast: 150ms ease-in-out;    /* Rápido (botones) */
--transition-base: 250ms ease-in-out;    /* Normal (transiciones) */
--transition-slow: 350ms ease-in-out;    /* Lento (efectos) */
```

Para animaciones más lentas y suaves:
```css
--transition-base: 400ms ease-in-out;    /* Era 250ms */
```

## 7. CAMBIAR ALTURA DE HEADER

```css
--header-height-desktop: 80px;    /* Desktop */
--header-height-mobile: 64px;     /* Mobile */
```

## 8. CAMBIAR BREAKPOINTS RESPONSIVOS

Archivo: `assets/css/responsive.css`

Breakpoints actuales:
- `max-width: 767px` - Móvil
- `min-width: 768px` - Tablet
- `min-width: 1024px` - Desktop
- `min-width: 1440px` - Desktop grande

Para cambiar, reemplaza en las media queries.

## 9. CAMBIAR TEXTOS ESTÁTICOS (HOME)

### En la HOME (editable desde WordPress)

1. WordPress Admin > Home (página)
2. En CRISBAPRO Settings edita:
   - Título hero
   - Subtítulo
   - Textos de botones
   - Bloques de confianza

### En el código (index.php)

Para cambiar textos de secciones que no editable:

Archivo: `index.php`

Busca la sección y cambia el texto:

```php
<h3>Rótulos Luminosos</h3>        <!-- Cambiar texto -->
<p>Diseño y fabricación...</p>    <!-- Cambiar descripción -->
```

## 10. CAMBIAR ESTRUCTURA DE SECCIONES

### Agregar sección nueva

1. Abre `index.php`
2. Busca donde quieres agregar (ej: después de SERVICIOS)
3. Copia una sección similar
4. Modifica HTML, clases CSS, y contenido
5. Asegúrate que el CSS tiene clases para la nueva sección

### Ejemplo: Agregar sección de testimonios

```php
<!-- NEW TESTIMONIOS SECTION -->
<section class="testimonios">
    <div class="container">
        <h2>Lo que dicen nuestros clientes</h2>
        <div class="testimonios-grid">
            <div class="testimonial-card">
                <p>"Excelente trabajo y profesionalismo"</p>
                <strong>Juan García</strong>
                <span>Director Marketing</span>
            </div>
            <!-- Más testimonios... -->
        </div>
    </div>
</section>
```

Luego agrega CSS en `main.css`:

```css
.testimonios {
    background-color: var(--color-surface);
}

.testimonios-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: var(--spacing-2xl);
}

.testimonial-card {
    padding: var(--spacing-2xl);
    background-color: var(--color-background);
    border-radius: var(--radius-lg);
}
```

## 11. CAMBIAR COMPORTAMIENTO DE FORMULARIO

Archivo: `assets/js/main.js`

El formulario envía datos por email. Para integrarlo con servicios:

### Integrar con Formspree

```javascript
fetch('https://formspree.io/f/YOUR_ID', {
    method: 'POST',
    body: formData
})
```

### Integrar con EmailJS

```javascript
emailjs.send('service_id', 'template_id', {
    nombre: document.getElementById('nombre').value,
    email: document.getElementById('email').value,
    mensaje: document.getElementById('presupuesto').value
})
```

## 12. AGREGAR GOOGLE ANALYTICS

Archivo: `template-parts/header.php`

Agrega en la sección `<head>` antes de `wp_head()`:

```php
<!-- Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'GA_MEASUREMENT_ID');
</script>
```

Reemplaza `GA_MEASUREMENT_ID` con tu ID de Google Analytics.

## 13. AGREGAR FACEBOOK PIXEL

Archivo: `template-parts/header.php`

```php
<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  // ... código del pixel ...
}
</script>
```

Copia el código completo de Facebook Events Manager.

## 14. VERSIONAMIENTO FUTURO

Para v1.1 o v2.0:

1. **Copia la carpeta actual:**
   ```
   CRISBAPRO-TEMA-v1.0 → CRISBAPRO-TEMA-v1.1
   ```

2. **Actualiza versión en style.css:**
   ```
   Version: 1.1.0
   ```

3. **En functions.php actualiza:**
   ```php
   wp_enqueue_style(..., '1.1.0');  // Cambiar versión
   ```

4. **Realiza cambios en la nueva versión**

5. **Usa git para tracking:**
   ```bash
   git checkout -b version/1.1
   git add -A
   git commit -m "CRISBAPRO v1.1 - Mejoras diseño"
   git push origin version/1.1
   ```

## 15. SOPORTE Y PREGUNTAS

### Archivo de configuración recomendado para cambios frecuentes

Crear archivo `config.php` personalizado:

```php
<?php
// config.php - Cambios centralizados
define('CRISBAPRO_PRIMARY_COLOR', '#0052CC');
define('CRISBAPRO_SECONDARY_COLOR', '#FF6B35');
define('CRISBAPRO_HEADER_HEIGHT', '80px');
define('CRISBAPRO_PHONE', '608 78 20 15');
?>
```

Luego usar en CSS con JavaScript para aplicar dinámicamente.

---

**Consejo:** Siempre haz backup antes de realizar cambios. Usa control de versiones (Git) para rastrear cambios.

**Próximo paso:** Instala el tema y comienza con pequeños cambios de color. ¡El resto vendrá naturalmente!
