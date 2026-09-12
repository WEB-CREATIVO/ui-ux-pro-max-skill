/**
 * CRISBAPRO - Animations Framework (Emil Kowalski)
 * Purposeful animations based on 7-step decision pattern:
 * 1. Frequency Gate (animation justified?)
 * 2. Purpose (why animate?)
 * 3. Tool (what tool for animation?)
 * 4. Properties (what specifically animates?)
 * 5. Easing (how does it move?)
 * 6. Interruption (user interaction?)
 * 7. Reduced Motion (accessibility)
 */

class CrisbaproAnimations {
  constructor() {
    this.prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    this.observerOptions = {
      root: null,
      rootMargin: '0px 0px -100px 0px',
      threshold: 0.1
    };

    this.init();
  }

  init() {
    if (this.prefersReducedMotion) return;

    this.setupScrollAnimations();
    this.setupHoverAnimations();
    this.setupStaggerAnimations();
  }

  // ─────────────────────────────────────
  // SCROLL ANIMATIONS
  // Fade in + Slide Up on scroll
  // ─────────────────────────────────────

  setupScrollAnimations() {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          this.animateElementOnScroll(entry.target);
          observer.unobserve(entry.target);
        }
      });
    }, this.observerOptions);

    // Seleccionar elementos para animar
    const elementsToAnimate = [
      ...document.querySelectorAll('.service-card'),
      ...document.querySelectorAll('.sector-card'),
      ...document.querySelectorAll('.process-step'),
      ...document.querySelectorAll('.trust-item'),
    ];

    elementsToAnimate.forEach(el => observer.observe(el));
  }

  /**
   * PURPOSE: Reveal element smoothly when it comes into view
   * TOOL: CSS transforms (translateY + opacity)
   * PROPERTIES: opacity (0→1), transform (translateY 20px→0)
   * EASING: ease-out (quick start, slow end)
   * INTERRUPTION: user can scroll, animation completes
   */
  animateElementOnScroll(element) {
    // Apply animation class
    element.style.animation = this.prefersReducedMotion
      ? 'none'
      : 'slideInUp 0.6s ease-out forwards';

    // Add stagger delay based on sibling position
    const siblings = Array.from(element.parentElement.children);
    const index = siblings.indexOf(element);
    element.style.animationDelay = this.prefersReducedMotion
      ? '0ms'
      : `${Math.min(index * 50, 400)}ms`;
  }

  // ─────────────────────────────────────
  // HOVER ANIMATIONS
  // Button + Card hover effects
  // ─────────────────────────────────────

  setupHoverAnimations() {
    // Buttons
    this.setupElementHover('button, .btn', {
      scale: 1.02,
      shadowLevel: 'lg'
    });

    // Service cards
    this.setupElementHover('.service-card', {
      translateY: -4,
      shadowLevel: 'lg'
    });

    // Sector cards
    this.setupElementHover('.sector-card', {
      translateY: -2,
      shadowLevel: 'md'
    });

    // Process steps
    this.setupElementHover('.process-step', {
      scale: 1.05,
      shadowLevel: 'md'
    });
  }

  /**
   * PURPOSE: Provide immediate visual feedback on hover
   * TOOL: CSS transforms + transitions
   * PROPERTIES: scale, transform, box-shadow
   * EASING: ease-out (responsive feeling)
   * INTERRUPTION: Auto-reverses on mouse leave
   */
  setupElementHover(selector, options = {}) {
    const elements = document.querySelectorAll(selector);

    elements.forEach(el => {
      el.addEventListener('mouseenter', () => {
        if (this.prefersReducedMotion) return;

        // Apply transform
        if (options.scale) {
          el.style.transform = `scale(${options.scale})`;
        }
        if (options.translateY) {
          const current = el.style.transform || '';
          el.style.transform = `${current} translateY(${options.translateY}px)`.trim();
        }

        // Apply shadow
        if (options.shadowLevel) {
          el.style.boxShadow = `var(--shadow-${options.shadowLevel})`;
        }

        el.style.transition = 'all var(--transition-medium)';
      });

      el.addEventListener('mouseleave', () => {
        el.style.transform = 'none';
        el.style.boxShadow = '';
        el.style.transition = 'all var(--transition-medium)';
      });
    });
  }

  // ─────────────────────────────────────
  // STAGGER ANIMATIONS
  // Sequential reveal for lists/grids
  // ─────────────────────────────────────

  setupStaggerAnimations() {
    // Service cards grid - stagger entrance
    const servicesGrid = document.querySelector('.services-grid');
    if (servicesGrid) {
      this.staggerGridItems(servicesGrid.querySelectorAll('.service-card'), 50);
    }

    // Sectors grid - stagger entrance
    const sectorsGrid = document.querySelector('.sectors-grid');
    if (sectorsGrid) {
      this.staggerGridItems(sectorsGrid.querySelectorAll('.sector-card'), 50);
    }

    // Process steps - stagger entrance
    const processSteps = document.querySelectorAll('.process-step');
    if (processSteps.length > 0) {
      this.staggerGridItems(processSteps, 100);
    }
  }

  /**
   * PURPOSE: Create visual rhythm and hierarchy
   * TOOL: Staggered animation delays
   * PROPERTIES: opacity + translateY
   * EASING: ease-out (feels natural)
   * INTERRUPTION: Sequential, user can scroll through
   */
  staggerGridItems(items, delayInterval = 50) {
    items.forEach((item, index) => {
      const delay = index * delayInterval;
      item.style.animation = this.prefersReducedMotion
        ? 'none'
        : `slideInUp 0.6s ease-out forwards`;
      item.style.animationDelay = this.prefersReducedMotion
        ? '0ms'
        : `${delay}ms`;
    });
  }

  // ─────────────────────────────────────
  // FORM INTERACTIONS
  // Input focus animations
  // ─────────────────────────────────────

  setupFormAnimations() {
    const formInputs = document.querySelectorAll('input, select, textarea');

    formInputs.forEach(input => {
      // Focus animation
      input.addEventListener('focus', () => {
        if (this.prefersReducedMotion) return;

        input.style.transition = 'all var(--transition-fast)';
        // CSS handles focus state, just ensure smooth transition
      });

      // Add label animation
      const label = input.closest('.form-group')?.querySelector('label');
      if (label) {
        input.addEventListener('focus', () => {
          label.style.color = 'var(--color-primary-900)';
        });

        input.addEventListener('blur', () => {
          label.style.color = 'var(--color-text-primary)';
        });
      }
    });
  }

  // ─────────────────────────────────────
  // SCROLL-LINKED ANIMATIONS
  // Header shadow, parallax effects
  // ─────────────────────────────────────

  setupScrollLinkedAnimations() {
    const hero = document.querySelector('.hero');
    if (!hero) return;

    window.addEventListener('scroll', () => {
      if (this.prefersReducedMotion) return;

      const scrolled = window.scrollY;
      const parallaxFactor = scrolled * 0.5;

      // Subtle parallax on hero (if supported)
      hero.style.backgroundPosition = `center calc(50% + ${parallaxFactor}px)`;
    });
  }

  // ─────────────────────────────────────
  // PAGE TRANSITION ANIMATIONS
  // Fade in on page load
  // ─────────────────────────────────────

  animatePageLoad() {
    if (this.prefersReducedMotion) return;

    const body = document.body;
    body.style.animation = 'fadeIn 0.5s ease-out forwards';

    // Animate hero content
    const heroContent = document.querySelector('.hero-content');
    if (heroContent) {
      heroContent.style.animation = 'fadeInUp 0.8s ease-out forwards';
    }
  }

  // ─────────────────────────────────────
  // ACCESSIBILITY: Respect prefers-reduced-motion
  // ─────────────────────────────────────

  listenForMotionPreferences() {
    const mediaQuery = window.matchMedia('(prefers-reduced-motion: reduce)');
    mediaQuery.addListener((e) => {
      this.prefersReducedMotion = e.matches;
      if (this.prefersReducedMotion) {
        this.disableAllAnimations();
      }
    });
  }

  disableAllAnimations() {
    const style = document.createElement('style');
    style.textContent = `
      * {
        animation: none !important;
        transition: none !important;
      }
    `;
    document.head.appendChild(style);
  }

  // ─────────────────────────────────────
  // CSS KEYFRAMES (injected at runtime)
  // ─────────────────────────────────────

  injectKeyframes() {
    if (this.prefersReducedMotion) return;

    const style = document.createElement('style');
    style.textContent = `
      @keyframes fadeIn {
        from {
          opacity: 0;
        }
        to {
          opacity: 1;
        }
      }

      @keyframes fadeInUp {
        from {
          opacity: 0;
          transform: translateY(20px);
        }
        to {
          opacity: 1;
          transform: translateY(0);
        }
      }

      @keyframes slideInUp {
        from {
          opacity: 0;
          transform: translateY(20px);
        }
        to {
          opacity: 1;
          transform: translateY(0);
        }
      }

      @keyframes scaleIn {
        from {
          opacity: 0;
          transform: scale(0.95);
        }
        to {
          opacity: 1;
          transform: scale(1);
        }
      }

      @keyframes slideInLeft {
        from {
          opacity: 0;
          transform: translateX(-20px);
        }
        to {
          opacity: 1;
          transform: translateX(0);
        }
      }

      @keyframes slideInRight {
        from {
          opacity: 0;
          transform: translateX(20px);
        }
        to {
          opacity: 1;
          transform: translateX(0);
        }
      }

      @keyframes pulse {
        0%, 100% {
          opacity: 1;
        }
        50% {
          opacity: 0.5;
        }
      }
    `;
    document.head.appendChild(style);
  }
}

// Initialize animations when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
  window.animations = new CrisbaproAnimations();
  window.animations.injectKeyframes();
  window.animations.listenForMotionPreferences();
  window.animations.animatePageLoad();

  // Setup form animations if form exists
  if (document.querySelector('.quote-form')) {
    window.animations.setupFormAnimations();
  }

  console.log('Animation framework initialized (Emil Kowalski)');
});
