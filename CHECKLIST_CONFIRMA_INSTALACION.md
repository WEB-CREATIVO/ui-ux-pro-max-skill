# ✅ CHECKLIST DE CONFIRMACIÓN PRE-CONEXIÓN MCP

**Documento obligatorio a completar ANTES de que Claude se conecte via Easy MCP AI**

**Fecha de instalación:** ________________  
**URL de crisbapro.com:** ________________  
**Usuario Admin:** ________________

---

## 📋 INSTRUCCIONES

Después de instalar Easy MCP AI y aplicar la guía `GUIA_INSTALACION_EASY_MCP_AI.md`:

1. Completa este checklist ✅
2. Toma capturas de pantalla de cada sección
3. Envía este documento + capturas a Claude
4. Claude verificará y confirmará la conexión

**NO me conectaré hasta que TODAS las casillas estén marcadas ✅**

---

## 🔍 SECCIÓN 1: Plugin Instalado y Activo

```
☑ Ir a: WordPress Admin → Extensiones → Extensiones instaladas
☑ Buscar: "Easy MCP AI"
☑ Estado: ACTIVO (en verde)
```

**📸 CAPTURA REQUERIDA:** Pantalla mostrando Easy MCP AI ACTIVO

```
Nombre: captura-1-plugin-activo.png
Descripción: Screenshot de WordPress → Extensiones → Easy MCP AI ACTIVO
```

---

## ⚙️ SECCIÓN 2: Guardrails Principales Activados

Ir a: `WordPress Admin → Configuración → Easy MCP AI → General Settings`

```
☑ Enable Audit Logging: ACTIVADO
☑ Read-only mode for non-admin users: ACTIVADO  
☑ Require confirmation for destructive actions: ACTIVADO
☑ Limit to ACF fields only: ACTIVADO
☑ Log all MCP requests: ACTIVADO
☑ Backup before major changes: ACTIVADO
```

**📸 CAPTURA REQUERIDA:** Pantalla de General Settings mostrando todos activados

```
Nombre: captura-2-guardrails-principales.png
Descripción: Screenshot de Easy MCP AI Settings → General (todos marcados)
```

---

## 🔐 SECCIÓN 3: Los 3 Ajustes Técnicos Obligatorios

Ir a: `WordPress Admin → Configuración → Easy MCP AI`

### Ajuste 1: Change History + Audit Log

```
Tab/Sección: Audit & History
☑ Enable Change History: ACTIVADO
☑ Enable Audit Log: ACTIVADO
Log retention: 90 días (o más)
```

**📸 CAPTURA:** Pantalla Audit & History completa

```
Nombre: captura-3a-change-history-audit-log.png
Descripción: Screenshot de Easy MCP AI → Audit & History (Change History + Audit Log activados)
```

### Ajuste 2: Force Draft on Create

```
Tab/Sección: Content Management (o Permissions)
☑ Force Draft on Create: ACTIVADO
```

**📸 CAPTURA:** Pantalla Content Management/Permissions

```
Nombre: captura-3b-force-draft-on-create.png
Descripción: Screenshot de Easy MCP AI → Content Management (Force Draft ON)
```

### Ajuste 3: Restrict to Predefined ACF Groups

```
Tab/Sección: Operation Scope
☑ Restrict to predefined ACF groups only: ACTIVADO

Grupos permitidos (marca los que veas):
☑ group_crisbapro_hero
☑ group_crisbapro_services
☑ group_crisbapro_projects
☑ group_crisbapro_trust
☑ group_crisbapro_contact
❌ Otros grupos: DESACTIVADOS o no listados
```

**📸 CAPTURA:** Pantalla Operation Scope

```
Nombre: captura-3c-operation-scope.png
Descripción: Screenshot de Easy MCP AI → Operation Scope (solo grupos CRISBAPRO)
```

---

## 🔑 SECCIÓN 4: Credenciales MCP Generadas

Ir a: `WordPress Admin → Configuración → Easy MCP AI → API Credentials`

```
Sección: "Generate New Credential"
☑ Credential type: MCP Server Mode
☑ Lifetime: 7 días (o renovable)
☑ Scope: ACF only
☑ Auto-revoke on: ACTIVADO
```

**Credenciales generadas:**
```
MCP_ENDPOINT: ___________________________________
MCP_API_KEY: ___________________________________
MCP_API_SECRET: ___________________________________
```

**⚠️ IMPORTANTE:** Guarda estas credenciales en un lugar seguro (no las publiques)

**📸 CAPTURA:** Pantalla de Credentials (puedes ocultar valores sensibles)

```
Nombre: captura-4-mcp-credentials.png
Descripción: Screenshot de Easy MCP AI → API Credentials (valores ocultos si es necesario)
```

---

## ✅ SECCIÓN 5: Test de Conexión Exitoso

Ir a: `WordPress Admin → Configuración → Easy MCP AI → Connection Test`

Haz clic en: **"Test Connection"**

```
☑ Resultado: ✅ Connected
☑ Status: "Plugin is working correctly"
☑ Timestamp: [se mostrará]
```

**📸 CAPTURA:** Pantalla mostrando ✅ Connected

```
Nombre: captura-5-test-connection.png
Descripción: Screenshot de Easy MCP AI → Connection Test (mostrando ✅ Connected)
```

---

## 🎯 SECCIÓN 6: ACF Structures Visibles

Ir a: `WordPress Admin → Configuración → Easy MCP AI → View Accessible ACF Structures`

Haz clic en: **"View Accessible ACF Structures"**

Debe mostrar TODOS estos grupos:

```
☑ group_crisbapro_hero
  └─ Fields: hero_title, hero_subtitle, hero_image, hero_cta_primary, hero_cta_secondary
  
☑ group_crisbapro_services
  └─ Fields: services_list (servicios con image, title, description)
  
☑ group_crisbapro_projects  
  └─ Fields: portfolio_projects (proyectos con image, title)
  
☑ group_crisbapro_trust
  └─ Fields: trust_title_1, trust_desc_1, trust_title_2, trust_desc_2, trust_title_3, trust_desc_3
  
☑ group_crisbapro_contact
  └─ Fields: company_phone, company_email, company_whatsapp, company_location
```

**📸 CAPTURA:** Pantalla mostrando estructura ACF completa

```
Nombre: captura-6-acf-structures.png
Descripción: Screenshot de Easy MCP AI → Accessible ACF Structures (mostrando todos los grupos)
```

---

## 📋 SECCIÓN 7: Permisos Configurados Correctamente

Ir a: `WordPress Admin → Configuración → Easy MCP AI → Permissions`

```
☑ Allowed Users: Admin only
☑ Require admin approval: ON
☑ Confirmation dialogs: ON (para destructivas)
☑ Read permissions: TODOS los grupos
☑ Update permissions: TODOS los grupos
☑ Delete permissions: DESACTIVADO (emergencias solo)
```

**📸 CAPTURA:** Pantalla de Permissions

```
Nombre: captura-7-permissions.png
Descripción: Screenshot de Easy MCP AI → Permissions (Admin only, confirmations ON)
```

---

## 🚀 SECCIÓN 8: CONFIRMACIÓN FINAL

Completa esta sección cuando TODAS las verificaciones anteriores estén ✅

```
¿Has completado TODOS los pasos? ☑ SÍ ☐ NO

¿El plugin muestra "Activo"? ☑ SÍ ☐ NO

¿Test Connection dice "✅ Connected"? ☑ SÍ ☐ NO

¿Todos los guardrails están activados? ☑ SÍ ☐ NO

¿Los 3 ajustes técnicos están configurados? ☑ SÍ ☐ NO

¿Tienes las 7 capturas de pantalla? ☑ SÍ ☐ NO

¿Tienes las credenciales MCP guardadas? ☑ SÍ ☐ NO
```

---

## 📤 CÓMO ENVIAR ESTE CHECKLIST A CLAUDE

**Cuando tengas TODO completado:**

1. Completa este documento (todas las casillas ✅)
2. Recopila las 7 capturas de pantalla
3. Envía a Claude:
   - Este documento completado
   - Las 7 capturas en la secuencia indicada
   - Las credenciales MCP (en mensaje privado si es necesario)

**Mensaje de ejemplo:**

```
✅ INSTALACIÓN COMPLETA - LISTO PARA CONEXIÓN MCP

Adjunto:
- CHECKLIST_CONFIRMA_INSTALACION.md (completado)
- captura-1-plugin-activo.png
- captura-2-guardrails-principales.png
- captura-3a-change-history-audit-log.png
- captura-3b-force-draft-on-create.png
- captura-3c-operation-scope.png
- captura-4-mcp-credentials.png (valores ocultos)
- captura-5-test-connection.png
- captura-6-acf-structures.png
- captura-7-permissions.png

Credenciales MCP (por privado si es necesario):
[enviar por mensaje seguro]
```

---

## ✅ PROTOCOLO DE VERIFICACIÓN DE CLAUDE

Una vez recibas este checklist + capturas, Claude:

1. **Verificará** que todas las casillas estén ✅
2. **Revisará** cada captura para confirmar configuración
3. **Validará** que las credenciales MCP son válidas
4. **Confirmará** que está listo para conectar

Si TODO está correcto:
```
✅ VERIFICACIÓN COMPLETADA
✅ CONFIGURACIÓN APROBADA
✅ INICIANDO CONEXIÓN MCP...
```

Si hay algo faltante:
```
⚠️ Falta completar: [sección X]
📋 Acción requerida: [descripción]
🔄 Reintenta y reenvía
```

---

## 🎯 RESUMEN

| Paso | Acción | Captura Requerida |
|------|--------|-------------------|
| 1 | Plugin activo | captura-1-plugin-activo.png |
| 2 | Guardrails | captura-2-guardrails-principales.png |
| 3a | Change History | captura-3a-change-history-audit-log.png |
| 3b | Force Draft | captura-3b-force-draft-on-create.png |
| 3c | Operation Scope | captura-3c-operation-scope.png |
| 4 | Credenciales | captura-4-mcp-credentials.png |
| 5 | Test Connection | captura-5-test-connection.png |
| 6 | ACF Structures | captura-6-acf-structures.png |
| 7 | Permissions | captura-7-permissions.png |

---

**Estado:** LISTO PARA INSTALAR  
**Responsable:** Tú (Emil)  
**Verificación:** Claude (cuando envíes este checklist completo)

**Próximo paso:** Instala Easy MCP AI, completa este checklist, toma las capturas y envía.

🚀 **¡Nos vemos cuando esté todo listo!**
