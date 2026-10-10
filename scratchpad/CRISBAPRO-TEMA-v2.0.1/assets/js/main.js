/**
 * CRISBAPRO Theme - Main JavaScript
 * Mobile Menu & Core Interactions
 */

document.addEventListener('DOMContentLoaded', function() {
  // Mobile Menu Toggle
  const menuToggle = document.getElementById('menu-toggle');
  const mainNav = document.getElementById('main-nav');

  if (menuToggle && mainNav) {
    menuToggle.addEventListener('click', function() {
      mainNav.classList.toggle('active');
      menuToggle.setAttribute('aria-expanded',
        mainNav.classList.contains('active') ? 'true' : 'false'
      );
    });

    // Close menu when clicking on nav links
    const navLinks = mainNav.querySelectorAll('a');
    navLinks.forEach(link => {
      link.addEventListener('click', function() {
        mainNav.classList.remove('active');
        menuToggle.setAttribute('aria-expanded', 'false');
      });
    });

    // Close menu when clicking outside
    document.addEventListener('click', function(event) {
      if (!event.target.closest('.header-container')) {
        mainNav.classList.remove('active');
        menuToggle.setAttribute('aria-expanded', 'false');
      }
    });
  }

  // Form Submission Handler
  const presupuestoForm = document.getElementById('presupuesto-form');
  if (presupuestoForm) {
    presupuestoForm.addEventListener('submit', function(e) {
      e.preventDefault();
      handleFormSubmit(this);
    });
  }
});

/**
 * Handle form submission
 */
function handleFormSubmit(form) {
  // Create FormData object
  const formData = new FormData(form);

  // Get the nonce if available (for WordPress security)
  const nonceField = document.querySelector('input[name="_wpnonce"]');
  if (nonceField) {
    formData.append('_wpnonce', nonceField.value);
  }

  // Show loading state
  const submitButton = form.querySelector('button[type="submit"]');
  const originalText = submitButton.textContent;
  submitButton.textContent = 'Enviando...';
  submitButton.disabled = true;

  // Send form via fetch
  fetch(window.location.href, {
    method: 'POST',
    body: formData
  })
  .then(response => {
    if (response.ok) {
      // Show success message
      showNotification('¡Presupuesto solicitado exitosamente! Nos pondremos en contacto pronto.', 'success');
      form.reset();
    } else {
      // Lee el motivo que devuelve el servidor (WordPress responde JSON con data.message / data.debug)
      return response.json().catch(() => null).then(body => {
        const data = body && body.data ? body.data : {};
        const err = new Error('Error in submission');
        err.userMessage = data.message || '';
        err.debug = data.debug || '';
        throw err;
      });
    }
  })
  .catch(error => {
    const base = error.userMessage || 'Hubo un error al enviar el formulario. Por favor intenta de nuevo.';
    if (error.debug) {
      // Solo los administradores reciben el detalle técnico
      showNotification(base + ' [Detalle técnico: ' + error.debug + ']', 'error', 20000);
    } else {
      showNotification(base, 'error', 8000);
    }
  })
  .finally(() => {
    submitButton.textContent = originalText;
    submitButton.disabled = false;
  });
}

/**
 * Show notification toast
 */
function showNotification(message, type = 'info', duration = 5000) {
  const notification = document.createElement('div');
  notification.className = `notification notification-${type}`;
  notification.textContent = message;
  notification.style.cssText = `
    position: fixed;
    top: 20px;
    right: 20px;
    padding: 16px 24px;
    background-color: ${type === 'success' ? '#06A77D' : '#E63946'};
    color: white;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    z-index: 5000;
    animation: slideIn 0.3s ease-out;
  `;

  document.body.appendChild(notification);

  // Auto-dismiss (5 segundos por defecto)
  setTimeout(() => {
    notification.style.animation = 'slideOut 0.3s ease-in';
    setTimeout(() => notification.remove(), 300);
  }, duration);
}

// Add animation keyframes
if (!document.querySelector('style[data-crisbapro-animations]')) {
  const style = document.createElement('style');
  style.setAttribute('data-crisbapro-animations', 'true');
  style.textContent = `
    @keyframes slideIn {
      from {
        transform: translateX(400px);
        opacity: 0;
      }
      to {
        transform: translateX(0);
        opacity: 1;
      }
    }
    @keyframes slideOut {
      from {
        transform: translateX(0);
        opacity: 1;
      }
      to {
        transform: translateX(400px);
        opacity: 0;
      }
    }
  `;
  document.head.appendChild(style);
}

/**
 * Lightbox: ampliar imágenes de servicios
 * Se cierra con clic fuera de la imagen, botón ×, o tecla ESC.
 */
(function () {
  let overlay = null;
  let imgEl = null;
  let closeBtn = null;
  let lastTrigger = null;
  let clearTimer = null;
  let isOpen = false;

  function build() {
    overlay = document.createElement('div');
    overlay.className = 'lightbox';
    overlay.setAttribute('role', 'dialog');
    overlay.setAttribute('aria-modal', 'true');
    overlay.setAttribute('aria-label', 'Imagen ampliada');
    overlay.setAttribute('aria-hidden', 'true');

    closeBtn = document.createElement('button');
    closeBtn.type = 'button';
    closeBtn.className = 'lightbox-close';
    closeBtn.setAttribute('aria-label', 'Cerrar imagen');
    closeBtn.innerHTML = '&times;';

    imgEl = document.createElement('img');
    imgEl.className = 'lightbox-img';
    imgEl.alt = '';

    overlay.appendChild(closeBtn);
    overlay.appendChild(imgEl);
    document.body.appendChild(overlay);

    // Clic en el fondo o en el botón × cierra; clic sobre la imagen no.
    overlay.addEventListener('click', function (e) {
      if (e.target !== imgEl) {
        closeLightbox();
      }
    });
  }

  function openLightbox(src, alt, trigger) {
    if (!src) return;
    if (!overlay) build();

    clearTimeout(clearTimer);
    lastTrigger = trigger || null;
    imgEl.src = src;
    imgEl.alt = alt || '';

    overlay.setAttribute('aria-hidden', 'false');
    document.documentElement.classList.add('lightbox-open');
    void overlay.offsetWidth; // fuerza reflow para que la transición se anime
    overlay.classList.add('is-open');
    isOpen = true;
    closeBtn.focus({ preventScroll: true });
  }

  function closeLightbox() {
    if (!isOpen) return;
    isOpen = false;

    overlay.classList.remove('is-open');
    overlay.setAttribute('aria-hidden', 'true');
    document.documentElement.classList.remove('lightbox-open');

    if (lastTrigger) {
      lastTrigger.focus({ preventScroll: true });
    }

    clearTimer = setTimeout(function () {
      imgEl.removeAttribute('src');
    }, 300);
  }

  document.addEventListener('click', function (e) {
    const trigger = e.target.closest('[data-lightbox-src]');
    if (!trigger) return;
    e.preventDefault();
    openLightbox(
      trigger.getAttribute('data-lightbox-src'),
      trigger.getAttribute('data-lightbox-alt'),
      trigger
    );
  });

  document.addEventListener('keydown', function (e) {
    if (!isOpen) return;
    if (e.key === 'Escape') {
      closeLightbox();
    } else if (e.key === 'Tab') {
      e.preventDefault(); // el único elemento enfocable del diálogo es el botón ×
      closeBtn.focus({ preventScroll: true });
    }
  });
})();
