/**
 * CRISBAPRO - Form Validation & Handling
 * Accessible form with real-time validation
 * Following WCAG AA standards
 */

class CrisbaproForm {
  constructor() {
    this.form = document.getElementById('quoteForm');
    if (!this.form) return;

    this.fields = {
      nombre: { required: true, type: 'text' },
      empresa: { required: true, type: 'text' },
      telefono: { required: true, type: 'tel', pattern: /^[0-9\s\-\+\(\)]{9,}$/ },
      email: { required: true, type: 'email' },
      servicio: { required: true, type: 'select' },
      descripcion: { required: false, type: 'textarea', maxLength: 500 }
    };

    this.errors = {};
    this.isSubmitting = false;

    this.init();
  }

  init() {
    this.setupValidation();
    this.setupFormSubmit();
    this.setupTextareaCounter();
  }

  // ─────────────────────────────────────
  // VALIDACIÓN EN TIEMPO REAL
  // ─────────────────────────────────────

  setupValidation() {
    Object.keys(this.fields).forEach(fieldName => {
      const fieldElement = document.getElementById(fieldName);
      if (!fieldElement) return;

      // Validar en blur (después de que el usuario termine de escribir)
      fieldElement.addEventListener('blur', () => {
        this.validateField(fieldName);
      });

      // Limpiar error en input (mientras escribe)
      fieldElement.addEventListener('input', () => {
        if (this.errors[fieldName]) {
          delete this.errors[fieldName];
          this.clearFieldError(fieldName);
        }
      });
    });
  }

  /**
   * Validar un campo individual
   * @param {string} fieldName - Nombre del campo
   * @returns {boolean} - Es válido?
   */
  validateField(fieldName) {
    const fieldElement = document.getElementById(fieldName);
    const value = fieldElement.value.trim();
    const rules = this.fields[fieldName];

    // Validación de requerido
    if (rules.required && !value) {
      this.setFieldError(fieldName, 'Este campo es obligatorio');
      return false;
    }

    // Validación de email
    if (rules.type === 'email' && value) {
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailRegex.test(value)) {
        this.setFieldError(fieldName, 'Por favor, ingresa un email válido');
        return false;
      }
    }

    // Validación de teléfono
    if (rules.type === 'tel' && value) {
      const phoneRegex = rules.pattern || /^[0-9\s\-\+\(\)]{9,}$/;
      if (!phoneRegex.test(value)) {
        this.setFieldError(fieldName, 'Por favor, ingresa un teléfono válido (mínimo 9 dígitos)');
        return false;
      }
    }

    // Validación de max length
    if (rules.maxLength && value.length > rules.maxLength) {
      this.setFieldError(fieldName, `Máximo ${rules.maxLength} caracteres`);
      return false;
    }

    // Campo válido
    this.clearFieldError(fieldName);
    return true;
  }

  /**
   * Validar todos los campos del formulario
   * @returns {boolean} - Formulario válido?
   */
  validateForm() {
    this.errors = {};
    let isValid = true;

    Object.keys(this.fields).forEach(fieldName => {
      if (!this.validateField(fieldName)) {
        isValid = false;
      }
    });

    return isValid;
  }

  // ─────────────────────────────────────
  // GESTIÓN DE ERRORES
  // ─────────────────────────────────────

  /**
   * Mostrar error en un campo
   * @param {string} fieldName
   * @param {string} message
   */
  setFieldError(fieldName, message) {
    const fieldElement = document.getElementById(fieldName);
    const errorElement = document.getElementById(`error-${fieldName}`);

    if (!fieldElement || !errorElement) return;

    this.errors[fieldName] = message;

    // Agregar clase de error
    fieldElement.setAttribute('aria-invalid', 'true');
    fieldElement.setAttribute('aria-describedby', `error-${fieldName}`);

    // Mostrar mensaje de error
    errorElement.textContent = message;
    errorElement.classList.add('show');

    // Anunciar error a screen readers
    this.announceToScreenReader(`Error en ${this.getFieldLabel(fieldName)}: ${message}`);
  }

  /**
   * Limpiar error de un campo
   * @param {string} fieldName
   */
  clearFieldError(fieldName) {
    const fieldElement = document.getElementById(fieldName);
    const errorElement = document.getElementById(`error-${fieldName}`);

    if (!fieldElement || !errorElement) return;

    fieldElement.setAttribute('aria-invalid', 'false');
    fieldElement.removeAttribute('aria-describedby');

    errorElement.textContent = '';
    errorElement.classList.remove('show');
  }

  // ─────────────────────────────────────
  // ENVÍO DE FORMULARIO
  // ─────────────────────────────────────

  setupFormSubmit() {
    this.form.addEventListener('submit', (e) => {
      e.preventDefault();
      this.handleSubmit();
    });
  }

  async handleSubmit() {
    if (this.isSubmitting) return;

    // Validar formulario
    if (!this.validateForm()) {
      this.focusFirstError();
      this.announceToScreenReader('Por favor, revisa los errores en el formulario');
      return;
    }

    this.isSubmitting = true;
    const submitBtn = this.form.querySelector('button[type="submit"]');
    const originalText = submitBtn.textContent;

    try {
      // Cambiar estado del botón
      submitBtn.disabled = true;
      submitBtn.textContent = 'Enviando...';

      // Recopilar datos
      const formData = this.collectFormData();

      // Simular envío (en producción, sería un fetch real)
      await this.simulateFormSubmission(formData);

      // Mostrar éxito
      this.showSuccessMessage();
      this.form.reset();

      // Resetear botón
      submitBtn.disabled = false;
      submitBtn.textContent = originalText;

      // Anunciar éxito
      this.announceToScreenReader('Presupuesto enviado exitosamente. Nos contactaremos en 24 horas.');

    } catch (error) {
      this.showErrorMessage(error.message);
      submitBtn.disabled = false;
      submitBtn.textContent = originalText;
    } finally {
      this.isSubmitting = false;
    }
  }

  /**
   * Recopilar datos del formulario
   * @returns {Object}
   */
  collectFormData() {
    const formData = {};

    Object.keys(this.fields).forEach(fieldName => {
      const element = document.getElementById(fieldName);
      if (element) {
        formData[fieldName] = element.value.trim();
      }
    });

    return formData;
  }

  /**
   * Simular envío del formulario
   * En producción, esto sería un fetch POST a un servidor
   * @param {Object} formData
   */
  simulateFormSubmission(formData) {
    return new Promise((resolve, reject) => {
      // Simular delay de envío
      setTimeout(() => {
        // Log de datos (en producción, sería enviado al servidor)
        console.log('Form Data:', formData);

        // Simular respuesta exitosa
        resolve({
          success: true,
          message: 'Presupuesto enviado correctamente'
        });

        // En un error (descomentar para simular error):
        // reject(new Error('Error al enviar el presupuesto. Intenta de nuevo.'));
      }, 1500);
    });
  }

  // ─────────────────────────────────────
  // FEEDBACK VISUAL
  // ─────────────────────────────────────

  showSuccessMessage() {
    const message = document.createElement('div');
    message.className = 'form-message success-message';
    message.setAttribute('role', 'alert');
    message.innerHTML = `
      <div style="
        background-color: var(--color-success-100);
        color: var(--color-success-500);
        padding: 16px;
        border-radius: 6px;
        margin-bottom: 24px;
        border-left: 4px solid var(--color-success-500);
      ">
        <strong>✓ ¡Presupuesto enviado!</strong>
        <p style="margin: 8px 0 0 0; font-size: 14px;">
          Nos contactaremos en 24 horas hábiles al teléfono que proporcionaste.
        </p>
      </div>
    `;

    this.form.insertBefore(message, this.form.firstChild);

    // Remover después de 5 segundos
    setTimeout(() => {
      message.remove();
    }, 5000);
  }

  showErrorMessage(errorText) {
    const message = document.createElement('div');
    message.className = 'form-message error-message';
    message.setAttribute('role', 'alert');
    message.innerHTML = `
      <div style="
        background-color: var(--color-error-100);
        color: var(--color-error-500);
        padding: 16px;
        border-radius: 6px;
        margin-bottom: 24px;
        border-left: 4px solid var(--color-error-500);
      ">
        <strong>✗ Error al enviar</strong>
        <p style="margin: 8px 0 0 0; font-size: 14px;">
          ${errorText || 'Intenta de nuevo más tarde.'}
        </p>
      </div>
    `;

    this.form.insertBefore(message, this.form.firstChild);

    // Remover después de 6 segundos
    setTimeout(() => {
      message.remove();
    }, 6000);
  }

  focusFirstError() {
    const errorField = Object.keys(this.errors)[0];
    if (errorField) {
      const element = document.getElementById(errorField);
      if (element) {
        element.focus();
        element.scrollIntoView({ behavior: 'smooth', block: 'center' });
      }
    }
  }

  // ─────────────────────────────────────
  // TEXTAREA CHARACTER COUNTER
  // ─────────────────────────────────────

  setupTextareaCounter() {
    const textarea = document.getElementById('descripcion');
    if (!textarea) return;

    const fieldGroup = textarea.closest('.form-group');
    const helperText = fieldGroup?.querySelector('.helper-text');

    if (!helperText) return;

    const maxLength = this.fields.descripcion.maxLength;

    textarea.addEventListener('input', () => {
      const remaining = maxLength - textarea.value.length;
      helperText.textContent = `${remaining} caracteres restantes`;

      // Cambiar color si se acerca al límite
      if (remaining < 50) {
        helperText.style.color = 'var(--color-error-500)';
      } else {
        helperText.style.color = 'var(--color-text-tertiary)';
      }
    });
  }

  // ─────────────────────────────────────
  // ACCESIBILIDAD
  // ─────────────────────────────────────

  getFieldLabel(fieldName) {
    const labelMap = {
      nombre: 'Nombre',
      empresa: 'Empresa',
      telefono: 'Teléfono',
      email: 'Email',
      servicio: 'Servicio',
      descripcion: 'Descripción'
    };
    return labelMap[fieldName] || fieldName;
  }

  announceToScreenReader(message) {
    const ariaLive = document.querySelector('[aria-live="polite"]');
    if (ariaLive) {
      ariaLive.textContent = message;
    } else {
      console.log('[SCREEN READER]', message);
    }
  }
}

// Inicializar formulario cuando DOM está listo
document.addEventListener('DOMContentLoaded', () => {
  window.form = new CrisbaproForm();
  console.log('Form validation initialized');
});
