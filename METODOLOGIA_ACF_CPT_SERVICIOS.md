# METODOLOGÍA: Sistema de Servicios con ACF + Custom Post Type

**Proyecto:** CRISBAPRO Theme v1.9.4  
**Objetivo:** Crear sistema funcional para poblar 6 servicios en la página Home  
**Fecha:** 2026-10-03  
**Estado:** EN PROGRESO (Fase 1: Configuración de ACF)

---

## 📋 TABLA DE CONTENIDOS

1. [El Problema Original](#el-problema-original)
2. [La Solución](#la-solución)
3. [Plugins Necesarios](#plugins-necesarios)
4. [Arquitectura del Sistema](#arquitectura-del-sistema)
5. [Fase 1: Crear Estructura ACF](#fase-1-crear-estructura-acf)
6. [Fase 2: Crear los 6 Servicios](#fase-2-crear-los-6-servicios)
7. [Fase 3: Mostrar en Front-end](#fase-3-mostrar-en-front-end)
8. [Checklist de Implementación](#checklist-de-implementación)

---

## 🔴 El Problema Original

### Qué intentamos al inicio

En **v1.9.3**, el archivo `functions.php` contenía un grupo de campos ACF con:
```php
'layout' => 'repeater',  // ❌ PROBLEMA
```

### Por qué falló

- **ACF Free (v6.8.10)** NO soporta **Repeater** (solo ACF Pro)
- El cambio a `layout='block'` en v1.9.3 fue un intento fallido
- En v1.9.4 revertimos a `layout='table'`, pero igual no funcionaba
- El botón "+ Añadir Servicio" nunca aparecía en el admin

### Intentos fallidos

| Intento | Solución Propuesta | Resultado |
|---------|-------------------|-----------|
| 1 | Cambiar layout a `'block'` | ❌ Incompatible con ACF Free 6.8.10 |
| 2 | Instalar ACF Extended | ❌ Requería ACF Pro como dependencia |
| 3 | Cambiar layout a `'table'` (revert) | ❌ Repeater igual no disponible en Free |
| 4 | **Usar Custom Post Type** | ✅ **SOLUCIÓN CORRECTA** |

---

## ✅ La Solución: Custom Post Type (CPT)

### ¿Qué es un Custom Post Type?

Un **Custom Post Type** es un tipo de contenido adicional en WordPress (como "Posts" y "Pages"). Permite:
- Crear múltiples instancias de un contenido específico
- Usar ACF Free para agregar campos personalizados
- Mostrarlos dinámicamente en plantillas

### ¿Por qué funciona mejor que Repeater?

| Aspecto | Repeater (ACF Free) | CPT + ACF Free |
|--------|-------------------|-----------------|
| Disponibilidad | ❌ Solo ACF Pro | ✅ Disponible en Free |
| Escalabilidad | Limitado (dentro de 1 page) | Ilimitado (múltiples posts) |
| Gestión | Inline en la página | Admin dedicado (WordPress) |
| Flexibilidad | Fijo a una página | Reutilizable en cualquier página |
| Querys dinámicas | ❌ Difícil | ✅ Fácil con `get_posts()` |

---

## 🔧 Plugins Necesarios

### Instalados y Activos

| Plugin | Versión | Función | Instalación |
|--------|---------|---------|------------|
| **Advanced Custom Fields** | 6.8.10+ | Gestiona campos personalizados | WordPress → Extensiones → Instalar |
| **Custom Post Type UI** | Última | Crear/gestionar CPT sin código | WordPress → Extensiones → Instalar |

### Verificar instalación

1. **WordPress Admin** → **Extensiones** → **Extensiones instaladas**
2. Buscar:
   - ✅ "Advanced Custom Fields" (Activo)
   - ✅ "Custom Post Type UI" (Activo)

---

## 🏗️ Arquitectura del Sistema

```
WordPress Admin
├── Custom Post Type UI (Crear CPT "servicios")
│   └── CPT creado: servicios
│       ├── Slug: servicios
│       ├── Singular: Servicio
│       ├── Plural: Servicios
│       └── Supports: title, editor, thumbnail
│
├── ACF (Agregar campos a CPT)
│   └── Grupo de campos: "Servicios"
│       ├── Campo 1: Imagen del Servicio (Image)
│       ├── Campo 2: Título del Servicio (Text)
│       ├── Campo 3: Descripción del Servicio (Textarea)
│       └── Location: Post Type is equal to "Servicios"
│
└── Servicios (Crear posts)
    ├── Servicio 1: Rotulación de Neón
    ├── Servicio 2: Letras de Corte
    ├── Servicio 3: Vinilos Decorativos
    ├── Servicio 4: Señalética Corporativa
    ├── Servicio 5: Lonas Publicitarias
    └── Servicio 6: Luminosos LED

Front-end
└── index.php (mostrar servicios con get_posts + ACF)
```

---

## 🎯 FASE 1: Crear Estructura ACF

**Ubicación:** WordPress Admin → ACF → Grupos de campos → Añadir nuevo  
**Estado:** EN PROGRESO

### Paso 1.1: Crear grupo de campos

1. Ve a **WordPress Admin** → **ACF** → **Grupos de campos**
2. Haz clic en **"Añadir nuevo"**
3. En el campo "Título del grupo": Escribe `Servicios`
4. Ya debe haber un campo placeholder

### Paso 1.2: Configurar Campo 1 (Imagen)

**Campo a editar:** El que ya existe (debería decir "sin etiqueta")

| Propiedad | Valor |
|-----------|-------|
| Etiqueta del campo | `Imagen del Servicio` |
| Nombre del campo | `imagen_del_servicio` |
| Tipo de campo | **Image** |
| Formato de retorno | **URL de imagen** |
| Biblioteca de medios | Todos |

**Pasos:**
1. Haz clic en el campo para editarlo
2. Rellena las propiedades según la tabla
3. Asegúrate de que "Tipo de campo" esté en **Image**
4. En "Formato de retorno" selecciona **"URL de imagen"** (radio button)

### Paso 1.3: Agregar Campo 2 (Título)

1. Localiza el botón **"+ Añadir campo"** (debajo del campo 1)
2. Haz clic en él
3. Rellena el nuevo campo:

| Propiedad | Valor |
|-----------|-------|
| Etiqueta del campo | `Título del Servicio` |
| Nombre del campo | `titulo_del_servicio` |
| Tipo de campo | **Text** |

### Paso 1.4: Agregar Campo 3 (Descripción)

1. Haz clic en **"+ Añadir campo"** nuevamente
2. Rellena el tercer campo:

| Propiedad | Valor |
|-----------|-------|
| Etiqueta del campo | `Descripción del Servicio` |
| Nombre del campo | `descripcion_del_servicio` |
| Tipo de campo | **Textarea** |

### Paso 1.5: Asignar Location (Ubicación)

**Importante:** Este paso vincula el grupo de campos al CPT "servicios"

1. En la misma pantalla, desplázate hasta encontrar la sección **"Ubicación (Location)"**
2. Donde dice "**Mostrar este grupo si**", configura:
   - **Primer dropdown:** Selecciona `Post Type`
   - **Segundo dropdown:** Selecciona `is equal to`
   - **Tercer dropdown:** Selecciona `Servicios`

3. Haz clic en **"Publicar"** (arriba a la derecha)

**Resultado esperado:** El grupo de campos aparecerá automáticamente cuando crees/edites un post de tipo "Servicio"

---

## 📝 FASE 2: Crear los 6 Servicios

**Ubicación:** WordPress Admin → Servicios → Añadir nuevo  
**Duración:** ~10-15 minutos

### Estructura de cada Servicio

```
Título: [Nombre del servicio]
├── Imagen del Servicio: [Archivo JPG/PNG]
├── Título del Servicio: [Texto corto descriptivo]
└── Descripción del Servicio: [Párrafo de 1-2 líneas]
```

### Los 6 Servicios Recomendados

Para una empresa de rotulación profesional (CRISBAPRO), estos son los servicios típicos:

#### Servicio 1: Rotulación de Neón
- **Título:** Rotulación de Neón
- **Descripción:** Luminosos de neón personalizados, ideales para comercios, bares y locales nocturnos. Brillan las 24 horas.
- **Imagen:** Foto de neón de alta calidad

#### Servicio 2: Letras de Corte
- **Título:** Letras de Corte
- **Descripción:** Letras individuales recortadas en acrílico, metal o PVC. Perfectas para fachadas y señalética corporativa.
- **Imagen:** Foto de letras recortadas

#### Servicio 3: Vinilos Decorativos
- **Título:** Vinilos Decorativos
- **Descripción:** Vinilos adhesivos personalizados para cristales, paredes y vehículos. Instalación profesional incluida.
- **Imagen:** Foto de vinil aplicado

#### Servicio 4: Señalética Corporativa
- **Título:** Señalética Corporativa
- **Descripción:** Señalización profesional para oficinas, hospitales y espacios públicos. Cumple normativas de accesibilidad.
- **Imagen:** Foto de señalética en oficina/edificio

#### Servicio 5: Lonas Publicitarias
- **Título:** Lonas Publicitarias
- **Descripción:** Lonas de gran formato para campañas publicitarias, eventos y construcciones. Impresión de alta calidad.
- **Imagen:** Foto de lona publicitaria grande

#### Servicio 6: Luminosos LED
- **Título:** Luminosos LED
- **Descripción:** Letras y logos iluminados con tecnología LED. Bajo consumo energético y larga durabilidad.
- **Imagen:** Foto de luminosos LED encendidos

### Cómo crear cada Servicio

1. **WordPress Admin** → **Servicios** → **Añadir nuevo**
2. **Título:** Escribe el nombre del servicio (ej: "Rotulación de Neón")
3. **Campos ACF** (aparecerán debajo del editor):
   - **Imagen del Servicio:** Haz clic en "Seleccionar imagen" y sube/selecciona
   - **Título del Servicio:** Repite el título o una variante
   - **Descripción del Servicio:** Pega la descripción de arriba
4. **Publicar** (botón azul arriba a la derecha)

**Repetir para los 6 servicios**

---

## 🎨 FASE 3: Mostrar en Front-end

**Ubicación:** `CRISBAPRO-TEMA-v1.0/index.php` (o el template que muestre la página Home)  
**Responsable:** Después de crear los 6 servicios

### Código para mostrar servicios dinámicamente

```php
<?php
// Obtener todos los posts de tipo "servicios"
$servicios = get_posts( array(
    'post_type'      => 'servicios',
    'posts_per_page' => 6,
    'orderby'        => 'menu_order',
    'order'          => 'ASC'
) );

if ( $servicios ) {
    echo '<section class="servicios-section">';
    echo '<h2>Nuestros Servicios</h2>';
    echo '<div class="servicios-grid">';
    
    foreach ( $servicios as $servicio ) {
        $image = get_field( 'imagen_del_servicio', $servicio->ID );
        $titulo = get_field( 'titulo_del_servicio', $servicio->ID );
        $descripcion = get_field( 'descripcion_del_servicio', $servicio->ID );
        ?>
        <div class="servicio-card">
            <?php if ( $image ) { ?>
                <div class="servicio-image">
                    <img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $titulo ); ?>">
                </div>
            <?php } ?>
            <div class="servicio-content">
                <h3><?php echo esc_html( $titulo ); ?></h3>
                <p><?php echo esc_html( $descripcion ); ?></p>
            </div>
        </div>
        <?php
    }
    
    echo '</div>';
    echo '</section>';
}
?>
```

### CSS recomendado (agregar a `style.css` o `assets/css/main.css`)

```css
.servicios-section {
    padding: 40px 20px;
    background: #f5f5f5;
}

.servicios-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
    max-width: 1200px;
    margin: 0 auto;
}

.servicio-card {
    background: white;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.servicio-card:hover {
    transform: translateY(-5px);
}

.servicio-image {
    width: 100%;
    height: 250px;
    overflow: hidden;
}

.servicio-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.servicio-content {
    padding: 20px;
}

.servicio-content h3 {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 10px;
    color: #333;
}

.servicio-content p {
    font-size: 14px;
    line-height: 1.6;
    color: #666;
}
```

---

## ✅ Checklist de Implementación

### FASE 1: ACF Fields (EN PROGRESO)

- [ ] Instalado: Custom Post Type UI
- [ ] Instalado: Advanced Custom Fields (v6.8.10+)
- [ ] CPT "servicios" creado en Custom Post Type UI
- [ ] Grupo de campos "Servicios" creado en ACF
  - [ ] Campo 1: Imagen del Servicio (Image)
  - [ ] Campo 2: Título del Servicio (Text)
  - [ ] Campo 3: Descripción del Servicio (Textarea)
- [ ] Location configurado: Post Type is equal to "Servicios"
- [ ] Grupo de campos guardado

### FASE 2: Crear Servicios

- [ ] Servicio 1: Rotulación de Neón ✓
- [ ] Servicio 2: Letras de Corte ✓
- [ ] Servicio 3: Vinilos Decorativos ✓
- [ ] Servicio 4: Señalética Corporativa ✓
- [ ] Servicio 5: Lonas Publicitarias ✓
- [ ] Servicio 6: Luminosos LED ✓

### FASE 3: Front-end

- [ ] Código PHP agregado a index.php
- [ ] CSS agregado a style.css o main.css
- [ ] Servicios visibles en la página Home
- [ ] Diseño responsive en móvil

### FASE 4: Finalización

- [ ] Probar en diferentes navegadores
- [ ] Verificar imágenes cargan correctamente
- [ ] Revisar SEO/metadatos
- [ ] Actualizar versión a v1.9.5 en style.css
- [ ] Crear nuevo ZIP del tema

---

## 🚀 Próximos Pasos Inmediatos

**Responsable:** Usuario actual (Emil)  
**Tiempo estimado:** 5-10 minutos

1. ✅ Completar Fase 1.1-1.2: Campos ACF (EN PROGRESO)
2. ⬜ Completar Fase 1.3-1.5: Terminar configuración ACF
3. ⬜ Fase 2: Crear 6 servicios
4. ⬜ Fase 3: Actualizar template front-end

---

## 📞 Contacto y Referencias

**Proyecto:** CRISBAPRO Theme v1.9.4  
**Repositorio:** `/home/user/ui-ux-pro-max-skill`  
**Tema:** `/home/user/ui-ux-pro-max-skill/scratchpad/CRISBAPRO-TEMA-v1.0/`

**Documentación:**
- ACF Docs: https://www.advancedcustomfields.com/resources/
- Custom Post Type UI: https://www.wordpress.org/plugins/custom-post-type-ui/
- WordPress get_posts(): https://developer.wordpress.org/reference/functions/get_posts/

---

**Última actualización:** 2026-10-03  
**Versión del documento:** 1.0  
**Estado:** METODOLOGÍA COMPLETA - IMPLEMENTACIÓN EN PROGRESO
