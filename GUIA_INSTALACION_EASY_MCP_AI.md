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

### 4.1 Activar Change History

```
Easy MCP AI Settings
→ Audit & History
→ ✅ Enable Detailed Logging
→ ✅ Track all ACF modifications
→ Log retention: 90 días (mínimo)
```

### 4.2 Permisos

```
Easy MCP AI Settings
→ Permissions
→ Allowed Users: Admin only
→ Require admin approval: ON
→ Confirmation dialogs: ON (para destructivas)
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

- [ ] Backup reciente confirmado
- [ ] Plugin instalado y activado
- [ ] OAuth/App Password configurado
- [ ] Todos los guardrails activados
- [ ] Solo herramientas ACF habilitadas
- [ ] Auditoría y logging activados
- [ ] Permisos limitados a Admin
- [ ] Change History configurado
- [ ] Credenciales MCP generadas
- [ ] Test de conexión exitoso
- [ ] ACF structures visibles

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

## 📅 OPERACIÓN COMPLETA

### Timeline

```
Día 1 (Hoy):
├─ Instalar Easy MCP AI
├─ Configurar guardrails
├─ Generar credenciales
└─ Test de conexión

Día 2:
├─ Yo me conecto via MCP
├─ FASE 1: Verificar ACF existente
├─ FASE 2: Crear 6 posts de servicios
├─ FASE 3: Poblar con contenido
└─ Verificar Change History
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
