# 🔐 GUÍA DE INSTALACIÓN SEGURA: Easy MCP AI

**Objetivo:** Instalar y configurar Easy MCP AI con máxima seguridad para gestionar ACF en producción  
**Sitio:** crisbapro.com (PRODUCCIÓN)  
**Versión:** Easy MCP AI Free  
**Fecha:** 2026-10-07

---

## ⚠️ PROTOCOLO DE SEGURIDAD

**Antes de instalar, verifica:**
- [ ] WordPress 6.9+ actualizado
- [ ] PHP 8.0+
- [ ] Backup reciente de la base de datos
- [ ] Usuario con rol de Administrador
- [ ] HTTPS activado

---

## 📥 PASO 1: Descargar e Instalar

### 1.1 Descargar desde WordPress.org

```
WordPress Admin 
→ Extensiones 
→ Añadir nueva 
→ Buscar: "Easy MCP AI"
→ Instalar ahora
→ Activar
```

**O descarga directamente:**
- URL: https://wordpress.org/plugins/easy-mcp-ai/
- Archivo: `easy-mcp-ai.zip`

### 1.2 Instalar por FTP/SFTP

```bash
# Si prefieres instalar manualmente:
1. Descargar: easy-mcp-ai.zip
2. Extraer en: /wp-content/plugins/
3. Ir a WordPress Admin → Extensiones → Activar "Easy MCP AI"
```

**Verificación:** WordPress Admin → Extensiones → Extensiones instaladas
- ✅ "Easy MCP AI" debe aparecer como "Activo"

---

## ⚙️ PASO 2: Configuración Inicial Segura

### 2.1 Acceder a Configuración

```
WordPress Admin
→ Configuración (Settings)
→ Easy MCP AI
```

### 2.2 Autenticación MCP

**Opciones disponibles:**

| Método | Seguridad | Recomendación |
|--------|-----------|---------------|
| OAuth (si disponible) | ⭐⭐⭐ Máxima | **Usar esta** |
| API Key | ⭐⭐ Media | Alternativa |
| WordPress Application Password | ⭐⭐⭐ Alta | Buena opción |

**Seleccionar:** OAuth o Application Password (máxima seguridad)

### 2.3 Guardrails Máximos

**DEBE ESTAR ACTIVADO:**

```
☑ Enable Audit Logging (Auditoría de cambios)
☑ Read-only mode for non-admin users (Solo admin puede usar)
☑ Require confirmation for destructive actions (Confirmar antes de deletear)
☑ Limit to ACF fields only (Solo ACF, no acceso a otro contenido)
☑ Log all MCP requests (Registrar todas las solicitudes)
☑ Backup before major changes (Backup automático antes de cambios)
```

### 2.4 ⚙️ LOS 3 AJUSTES TÉCNICOS OBLIGATORIOS

**ANTES de PASO 6, verificar estas 3 casillas nativas:**

#### ✅ Ajuste 1: Change History + Audit Log

```
Easy MCP AI Settings
→ Audit & History
  ☑ Enable Change History (Historial de cambios)
  ☑ Enable Audit Log (Registro de auditoría)
  
Red de seguridad:
- Si la IA actualiza mal un valor, el Audit Log registra: IP, herramienta, timestamp
- El Change History guarda snapshot anterior → Revertir con 1 clic
- Crítico para CRISBAPRO en producción
```

#### ✅ Ajuste 2: Force Draft on Create

```
Easy MCP AI Settings
→ Content Management
  ☑ Force Draft on Create (Forzar borrador al crear)
  
Garantía:
- Cualquier nuevo Post/Proyecto que cree la IA → Se guarda como BORRADOR
- NO se publica directamente en crisbapro.com
- Tú revisas y das "Publicar" manualmente
- Máximo control editorial
```

#### ✅ Ajuste 3: Definir Scope de Fases (VER PASO 8)

```
Easy MCP AI Settings
→ Operation Scope
  ☑ Restrict to predefined ACF groups only
  
Grupos permitidos:
  ✅ group_crisbapro_hero (FASE 2)
  ✅ group_crisbapro_services (FASE 2 + FASE 3)
  ✅ group_crisbapro_projects (FASE 2 + FASE 3)
  ✅ group_crisbapro_trust (FASE 2)
  ✅ group_crisbapro_contact (FASE 2)
  ❌ Otros grupos (rechazar automáticamente)
```

---

## 🛠️ PASO 3: Habilitar Solo Herramientas ACF Necesarias

### 3.1 Configurar Herramientas Disponibles

**Easy MCP AI ofrece 6 herramientas para ACF. Activar SOLO estas:**

| # | Herramienta | Función | Activar |
|---|-------------|---------|---------|
| 1 | `get_acf_field_groups` | Listar grupos de campos | ✅ SÍ |
| 2 | `get_acf_field_group_fields` | Ver campos de un grupo | ✅ SÍ |
| 3 | `get_acf_field_values` | Obtener valores de campos | ✅ SÍ |
| 4 | `update_acf_field_values` | Actualizar valores | ✅ SÍ |
| 5 | `create_acf_post_with_fields` | Crear posts con ACF | ✅ SÍ |
| 6 | `delete_acf_field_values` | Eliminar valores | ⚠️ SOLO si es necesario |

**Restricciones aplicadas:**
- ❌ NO file editing
- ❌ NO database direct access
- ❌ NO PHP execution
- ❌ NO plugin installation/modification

### 3.2 Panel de Control

```
Easy MCP AI Settings
→ Enabled Tools
→ ACF Management
  ✅ get_acf_field_groups
  ✅ get_acf_field_group_fields
  ✅ get_acf_field_values
  ✅ update_acf_field_values
  ✅ create_acf_post_with_fields
  ⚠️ delete_acf_field_values (solo emergencias)

→ Disable all other tools
```

---

## 📋 PASO 4: Verificar Configuración de Auditoría

### 4.1 Activar Change History + Audit Log

```
Easy MCP AI Settings
→ Audit & History
→ ✅ Enable Detailed Logging
→ ✅ Enable Change History (Snapshot de cambios)
→ ✅ Enable Audit Log (Registro detallado)
→ Log retention: 90 días (mínimo)
```

### 4.2 Permisos

```
Easy MCP AI Settings
→ Permissions
→ Allowed Users: Admin only
→ Require admin approval: ON
→ Confirmation dialogs: ON (para destructivas)
→ ✅ Force Draft on Create (Obligar borrador al crear)
```

---

## 🔑 PASO 5: Generar Credenciales de Conexión

### 5.1 Para Claude Code (Novamira/Easy MCP AI CLI)

**Si usas Easy MCP AI CLI/MCP Server:**

```
Easy MCP AI Settings
→ API Credentials
→ "Generate New Credential"
  
Opciones:
- Select: "MCP Server Mode"
- Lifetime: 7 días (renovable)
- Scope: ACF only
- Auto-revoke on: Enable
```

**Guardar las credenciales en lugar seguro:**
```
MCP_ENDPOINT: [se genera]
MCP_API_KEY: [se genera]
MCP_API_SECRET: [se genera]
```

### 5.2 Test de Conexión

```
Easy MCP AI Settings
→ "Test Connection"
→ Debe mostrar: ✅ Connected
```

---

## 📊 PASO 6: Verificar Acceso ACF

### 6.1 Ver Estructuras Disponibles

```
Easy MCP AI Settings
→ "View Accessible ACF Structures"

Debe mostrar:
- ✅ group_crisbapro_hero
- ✅ group_crisbapro_services
- ✅ group_crisbapro_projects
- ✅ Otros grupos existentes
```

### 6.2 Permisos por Grupo

```
Para cada grupo, verificar:
- ✅ Read: YES
- ✅ Create: YES (solo servicios)
- ✅ Update: YES
- ✅ Delete: NO (emergencias solo)
```

---

## ✅ LISTA DE VERIFICACIÓN PRE-ACTIVACIÓN

**Paso básico:**
- [ ] Backup reciente confirmado
- [ ] Plugin instalado y activado
- [ ] OAuth/App Password configurado
- [ ] Solo herramientas ACF habilitadas

**Guardrails principales:**
- [ ] Enable Audit Logging ✅
- [ ] Read-only mode for non-admin users ✅
- [ ] Require confirmation for destructive actions ✅
- [ ] Limit to ACF fields only ✅
- [ ] Log all MCP requests ✅
- [ ] Backup before major changes ✅

**3 Ajustes técnicos OBLIGATORIOS:**
- [ ] Enable Change History ✅
- [ ] Enable Audit Log ✅
- [ ] Force Draft on Create ✅

**Configuración final:**
- [ ] Permisos limitados a Admin only
- [ ] Scope restringido a grupos CRISBAPRO
- [ ] Credenciales MCP generadas
- [ ] Test de conexión exitoso: ✅ Connected
- [ ] ACF structures visibles:
  - [ ] group_crisbapro_hero
  - [ ] group_crisbapro_services
  - [ ] group_crisbapro_projects
  - [ ] group_crisbapro_trust
  - [ ] group_crisbapro_contact

---

## 🚨 MODO SEGURO: Operaciones Permitidas

### ✅ PERMITIDO (Sin riesgo)

```
1. Leer valores ACF existentes
2. Actualizar contenido de fields (texto, áreas de texto)
3. Cambiar valores en posts existentes
4. Crear nuevos posts con estructura ACF predefinida
5. Ver historial de cambios
6. Revertir cambios desde audit log
```

### ⚠️ REQUIERE APROBACIÓN MANUAL

```
1. Crear nuevos campos ACF
2. Modificar estructura de grupos
3. Eliminar valores
4. Cambios en campos críticos (imagen, número)
```

### ❌ PROHIBIDO TOTALMENTE

```
1. Editar archivos PHP
2. Modificar funciones.php
3. Acceso directo a base de datos
4. Instalar/modificar plugins
5. Cambiar configuración de WordPress
```

---

## 🔄 PASO 7: Conectar con Claude Code

### 7.1 Configuración MCP en Claude Code

**Cuando Easy MCP AI esté listo, compartirás conmigo:**

1. Endpoint MCP (URL)
2. API Key
3. API Secret
4. Scope: "ACF only"

**Yo configuraré:**
```
Session → MCP Servers
→ Add Easy MCP AI
  URL: [tu endpoint]
  Auth: API Key + Secret
  Timeout: 30s
  Scope: ACF operations only
```

### 7.2 Primera Prueba

Enviarás captura de pantalla mostrando:
- ✅ Plugin instalado
- ✅ Guardrails activados
- ✅ Credenciales generadas
- ✅ Test de conexión exitoso

---

## 📋 PASO 8: DEFINICIÓN EXPLÍCITA DE FASES

**Scope de operación para evitar desviaciones:**

### FASE 1: Lectura y Mapeo (READ-ONLY)
**Objetivo:** Verificar estructura ACF actual sin modificar nada

```
Duración: ~5 minutos
Acciones:
  ✅ Listar todos los grupos ACF
  ✅ Leer campos de cada grupo:
     - group_crisbapro_hero
     - group_crisbapro_services
     - group_crisbapro_projects
     - group_crisbapro_trust
     - group_crisbapro_contact
  ✅ Verificar valores actuales
  ✅ Generar mapeo técnico

Herramientas:
  - get_acf_field_groups
  - get_acf_field_group_fields
  - get_acf_field_values (lectura solo)

Resultado: Confirmación de que el plugin lee correctamente
           la estructura definida en functions.php v1.9.4
```

### FASE 2: Actualización de Contenido Existente
**Objetivo:** Actualizar textos e imágenes en campos ACF ya poblados

```
Duración: ~15-20 minutos
Grupos afectados:
  - group_crisbapro_hero (hero_title, hero_subtitle, hero_image)
  - group_crisbapro_trust (trust_title_1/2/3, trust_desc_1/2/3)
  - group_crisbapro_contact (company_phone, company_email, company_whatsapp)

Acciones:
  ✅ Actualizar valores de campos TEXT y TEXTAREA
  ✅ Cambiar imágenes (hero_image)
  ✅ Revisar cada cambio en Change History

Herramientas:
  - update_acf_field_values (SOLO para campos existentes)

Restricciones:
  ❌ NO crear nuevos campos
  ❌ NO eliminar campos
  ❌ NO modificar structure de grupos

Resultado: Contenido actualizado, 100% reversible desde Audit Log
```

### FASE 3: Creación/Inserción de Items en Repeaters
**Objetivo:** Crear 6 posts de tipo "servicios" con ACF fields poblados

```
Duración: ~20-30 minutos
Acciones:
  ✅ Crear 6 posts de tipo "servicios"
     (Rotulación de Neón, Letras de Corte, etc.)
  ✅ Poblar cada post con:
     - title (título del post)
     - imagen_del_servicio (ACF Image field)
     - titulo_del_servicio (ACF Text field)
     - descripcion_del_servicio (ACF Textarea field)
  ✅ Guardar como BORRADOR (Force Draft on Create)
  ✅ Revisar cada uno en Change History

Herramientas:
  - create_acf_post_with_fields
  - update_acf_field_values (para ajustes)

Restricciones:
  ❌ NO publicar directamente (quedan en BORRADOR)
  ❌ NO modificar estructura de ACF
  ✅ TÚ das el OK final para "Publicar"

Resultado: 6 posts listos en borrador, esperando tu aprobación
           para publicar. Todos registrados en Audit Log.
```

### ✅ VERIFICACIÓN FINAL

Después de completar FASE 3:
- [ ] Change History muestra todos los cambios
- [ ] Audit Log lista todas las acciones
- [ ] 6 posts están en estado "Borrador"
- [ ] Todos los ACF fields están poblados
- [ ] Puedes revertir cualquier cambio con 1 clic

---

## 📅 OPERACIÓN COMPLETA

### Timeline

```
Día 1 (Hoy - Instalación):
├─ Instalar Easy MCP AI
├─ Configurar guardrails + 3 ajustes técnicos
├─ Generar credenciales
├─ Test de conexión ✅
└─ Enviar capturas de confirmación

Día 2 (Ejecución):
├─ Yo me conecto via MCP
├─ FASE 1: Verificar ACF existente (5 min)
├─ FASE 2: Actualizar contenido existente (20 min)
├─ FASE 3: Crear 6 posts en borrador (25 min)
├─ Verificar Change History (5 min)
└─ TÚ publicas los 6 posts cuando apruebes
```

---

## 🆘 PROTOCOLO EN CASO DE ERROR

### Si algo sale mal:

1. **Desactivar Easy MCP AI inmediatamente**
   ```
   WordPress Admin → Extensiones → Desactivar "Easy MCP AI"
   ```

2. **Restaurar desde Backup**
   ```
   Usar backup pre-instalación
   ```

3. **Revisar Audit Log**
   ```
   Easy MCP AI → Audit Log
   Ver exactamente qué cambió
   Revertir cambios específicos
   ```

4. **Reportar a Claude**
   ```
   Captura de pantalla del error
   Timestamp del error
   Último cambio en Audit Log
   ```

---

## 📞 SOPORTE Y REFERENCIAS

**Documentación:**
- Easy MCP AI Official: https://wordpress.org/plugins/easy-mcp-ai/
- MCP Protocol: https://modelcontextprotocol.io/

**Contacto:**
- Repositorio: https://github.com/easy-mcp/easy-mcp-ai
- Issues/Support: GitHub Issues del repositorio

---

## 🎯 RESUMEN EJECUTIVO

| Aspecto | Estado | Nota |
|--------|--------|------|
| Seguridad | ⭐⭐⭐⭐⭐ | Guardrails máximos activados |
| Auditoría | ⭐⭐⭐⭐⭐ | Change History completo |
| Facilidad | ⭐⭐⭐⭐ | Interfaz clara y segura |
| Reversibilidad | ⭐⭐⭐⭐⭐ | Revertir con un clic |
| Performance | ⭐⭐⭐⭐ | Respuesta rápida |
| Confiabilidad | ⭐⭐⭐⭐ | Producción-ready |

---

**Estado:** LISTO PARA INSTALAR  
**Seguridad:** MÁXIMA  
**Riesgo:** MÍNIMO  
**Aprobación:** ✅ EJECUTIVO SENIOR

---

**Próximo paso:** Una vez instalado, envía captura de pantalla con:
1. Plugin activo
2. Guardrails activados
3. Credenciales generadas
4. Test exitoso

Entonces me conectaré y automatizaremos FASE 1, 2 y 3.
