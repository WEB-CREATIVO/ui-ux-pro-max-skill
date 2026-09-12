# INSTALACIÓN CRISBAPRO TEMA v1.0

Guía completa para instalar y configurar el tema CRISBAPRO en WordPress.

## Paso 1: Preparar WordPress

### Requisitos previos

✓ WordPress 5.9 o superior
✓ PHP 7.4 o superior
✓ Acceso FTP o SSH (o File Manager en hosting)
✓ Acceso al Panel de WordPress Admin

## Paso 2: Descargar e Instalar el Tema

### Opción A: Instalación Manual

1. **Descargar el tema**
   - Descargar archivo `CRISBAPRO-TEMA-v1.0.zip`

2. **Extraer y subir por FTP**
   - Extraer el ZIP
   - Conectar por FTP a tu servidor
   - Navegar a `/wp-content/themes/`
   - Subir carpeta `CRISBAPRO-TEMA-v1.0/`

3. **O usar File Manager del hosting**
   - File Manager > wp-content > themes
   - Upload > Seleccionar ZIP
   - Extraer en carpeta

### Opción B: Instalación por WordPress Admin

1. WordPress Admin > Apariencia > Temas
2. Subir tema > Seleccionar ZIP > Instalar
3. Activar tema

## Paso 3: Instalar y Activar Plugins Requeridos

### ACF (Advanced Custom Fields) - Versión Gratuita

1. WordPress Admin > Plugins > Agregar nuevo
2. Buscar "Advanced Custom Fields"
3. Instalar y activar la versión gratuita

**Nota:** La versión gratuita es completamente suficiente para este tema. Los campos básicos (texto, textarea, imagen, email) funcionan perfectamente. Solo necesitarías ACF PRO si en el futuro quieres agregar campos más complejos como repeater fields o flexible content.

**Sin ACF, los campos de HOME no funcionarán.**

### Rank Math (Recomendado)

1. WordPress Admin > Plugins > Agregar nuevo
2. Buscar "Rank Math"
3. Instalar y activar
4. Seguir setup wizard

## Paso 4: Configurar el Tema

### Configurar Información de Contacto

1. **Ir a CRISBAPRO Settings**
   - WordPress Admin > CRISBAPRO Settings

2. **Completar campos obligatorios:**
   - Teléfono: `608 78 20 15` (o tu teléfono)
   - Email: `tu-email@tusite.com`
   - WhatsApp: `+34 608 78 20 15` (con código país)
   - Ubicación: `Madrid, España` (tu ubicación)

3. **Guardar cambios**

### Configurar Logo

1. WordPress Admin > Personalizar (Customizer)
2. Identidad del sitio
3. Logo del sitio
4. Subir logo en formato PNG o SVG
5. Guardar y publicar

### Configurar Menú Principal

1. WordPress Admin > Apariencia > Menús
2. Crear nuevo menú "Menú Principal"
3. Agregar enlaces:
   - Inicio (Home)
   - Servicios (#servicios)
   - Proceso (#proceso)
   - Contacto (#contacto)
4. Asignar menú a "Menú Principal"
5. Guardar

## Paso 5: Editar la HOME (Landing Page)

### Habilitar página como portada

1. WordPress Admin > Ajustes > Lectura
2. "La página de inicio muestra": Seleccionar una página estática
3. Página de inicio: Crear nueva página llamada "Home"
4. Guardar cambios

### Editar contenido de la HOME

1. Ir a la página "Home"
2. Editar > Editores ACF aparecen a la derecha
3. **Hero Section:**
   - Título Principal
   - Subtítulo
   - Imagen de Fondo (recomendado: 1200x500px)
   - CTA Primario (Botón 1)
   - CTA Secundario (Botón 2)

4. **Bloque de Confianza:**
   - Título 1 y Descripción 1
   - Título 2 y Descripción 2
   - Título 3 y Descripción 3

5. **Guardar cambios**

### Editar servicios, proceso, sectores

El template de la HOME carga:
- 7 servicios con títulos e iconos
- 5 pasos del proceso
- 6 sectores especializados

Para cambiar estos textos, edita el archivo `index.php` en la sección correspondiente o crea campos ACF adicionales según necesites.

## Paso 6: Configurar Rank Math (Opcional)

1. WordPress Admin > Rank Math
2. Setup Wizard
3. Configurar:
   - Title Tags
   - Meta Descriptions
   - Sitemap XML
   - Focus Keywords por página

## Paso 7: Verificar que todo funciona

✓ Visita la HOME y verifica:
  - Header con logo y menú visible
  - Hero section con imagen y texto
  - Todos los elementos se ven correctamente
  - Botones CTA funcionan (scroll)
  - Formulario de presupuesto

✓ Test en móvil:
  - Menú hamburguesa funciona
  - Texto legible sin zoom
  - Botones son clickeables

✓ Test de SEO:
  - Page Title es correcto
  - Meta description aparece
  - Favicon se ve en pestaña

## Paso 8: Optimización de Rendimiento

### Instalar caché

1. WordPress Admin > Plugins > Agregar nuevo
2. Instalar: "WP Rocket" o "W3 Total Cache"
3. Configurar según recomendaciones

### Optimizar imágenes

1. Subir imágenes en formato WebP
2. O instalar plugin "ShortPixel Image Optimizer"
3. Comprimir imágenes automaticamente

### Minificar CSS/JS

En WP Rocket:
- Habilitar minificación de CSS
- Habilitar minificación de JavaScript
- Habilitar caché del navegador

## Solución de Problemas

### "Error: La función get_field no existe"
- **Causa:** ACF PRO no instalado
- **Solución:** Instalar y activar ACF PRO

### Los campos de HOME no aparecen
- **Causa:** ACF PRO no activado
- **Solución:** Ir a Plugins y activar ACF PRO

### Menú móvil no funciona
- **Causa:** JavaScript desactivado o conflicto
- **Solución:** 
  - Verificar que main.js se carga (Ver fuente HTML)
  - Desactivar plugins de caché temporalmente
  - Probar con otro navegador

### Los estilos no se ven correctamente
- **Causa:** Caché de navegador
- **Solución:** 
  - Limpiar caché del navegador (Ctrl+F5)
  - O usar navegación privada

### Imagen hero no aparece
- **Causa:** URL incorrecta o imagen muy grande
- **Solución:**
  - Verificar URL en CRISBAPRO Settings
  - Comprimir imagen a máx 2MB
  - Usar formato JPG o WebP

## Próximos Pasos

1. Consulta `README.md` para características y estructura
2. Consulta `guía-actualizaciones.md` para personalizar colores, fuentes, etc.
3. Configura Rank Math para SEO
4. Prueba en Google Mobile-Friendly Test

---

**¿Necesitas ayuda?** Revisa los comentarios en el código o contacta a tu desarrollador.
