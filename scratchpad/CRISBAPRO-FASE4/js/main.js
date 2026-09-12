/**
 * CRISBAPRO - Main Interactivity
 * Mobile Navigation, Carousel, Smooth Scrolling
 * Accessibility-first implementation
 */

class CrisbaproApp {
  constructor() {
    this.header = document.getElementById('header');
    this.menuToggle = document.getElementById('menuToggle');
    this.nav = document.getElementById('nav');
    this.carousel = document.getElementById('carousel');
    this.prevBtn = document.getElementById('prevBtn');
    this.nextBtn = document.getElementById('nextBtn');

    this.currentSlide = 0;
    this.slides = [];

    this.init();
  }

  init() {
    this.setupMenu();
    this.setupCarousel();
    this.setupSmoothScroll();
    this.setupHeaderScroll();
    this.setupNavLinks();
  }

  // ─────────────────────────────────────
  // MENÚ MÓVIL
  // ─────────────────────────────────────

  setupMenu() {
    if (!this.menuToggle) return;

    this.menuToggle.addEventListener('click', () => {
      this.toggleMenu();
    });

    // Cerrar menú al hacer click en un enlace
    this.nav.querySelectorAll('.nav-link').forEach(link => {
      link.addEventListener('click', () => {
        this.closeMenu();
      });
    });

    // Cerrar menú al hacer click fuera
    document.addEventListener('click', (e) => {
      if (!e.target.closest('.header') && this.nav.classList.contains('active')) {
        this.closeMenu();
      }
    });
  }

  toggleMenu() {
    this.menuToggle.classList.toggle('active');
    this.nav.classList.toggle('active');
  }

  closeMenu() {
    this.menuToggle.classList.remove('active');
    this.nav.classList.remove('active');
  }

  // ─────────────────────────────────────
  // CARRUSEL DE PROYECTOS
  // ─────────────────────────────────────

  setupCarousel() {
    if (!this.carousel) return;

    this.slides = this.carousel.querySelectorAll('.carousel-slide');
    if (this.slides.length === 0) return;

    // Mostrar primer slide
    this.showSlide(0);

    // Event listeners para botones
    this.prevBtn?.addEventListener('click', () => this.prevSlide());
    this.nextBtn?.addEventListener('click', () => this.nextSlide());

    // Auto-advance cada 8 segundos (si no hay preferencia de reduced motion)
    if (!this.prefersReducedMotion()) {
      setInterval(() => this.nextSlide(), 8000);
    }

    // Soporte para teclado (arrow keys)
    document.addEventListener('keydown', (e) => {
      if (e.key === 'ArrowLeft') this.prevSlide();
      if (e.key === 'ArrowRight') this.nextSlide();
    });
  }

  showSlide(index) {
    // Remover clase active de todos
    this.slides.forEach(slide => {
      slide.classList.remove('active');
    });

    // Agregar clase active al slide actual
    this.slides[index].classList.add('active');
    this.currentSlide = index;

    // Anunciar para screen readers
    const slideNumber = index + 1;
    const total = this.slides.length;
    this.announceToScreenReader(`Proyecto ${slideNumber} de ${total}`);
  }

  nextSlide() {
    const nextIndex = (this.currentSlide + 1) % this.slides.length;
    this.showSlide(nextIndex);
  }

  prevSlide() {
    const prevIndex = (this.currentSlide - 1 + this.slides.length) % this.slides.length;
    this.showSlide(prevIndex);
  }

  // ─────────────────────────────────────
  // SCROLL SUAVE (Smooth Scroll)
  // ─────────────────────────────────────

  setupSmoothScroll() {
    // Los navegadores modernos soportan scroll-behavior: smooth en CSS
    // Este código es fallback para navegadores antiguos

    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', (e) => {
        const href = anchor.getAttribute('href');
        if (href === '#') return;

        const target = document.querySelector(href);
        if (!target) return;

        e.preventDefault();
        const offsetTop = target.getBoundingClientRect().top + window.scrollY - 80;

        window.scrollTo({
          top: offsetTop,
          behavior: 'smooth'
        });
      });
    });
  }

  // ─────────────────────────────────────
  // HEADER DINÁMICO AL SCROLL
  // ─────────────────────────────────────

  setupHeaderScroll() {
    let lastScrollTop = 0;

    window.addEventListener('scroll', () => {
      const scrollTop = window.scrollY;

      // Agregar sombra al header cuando se hace scroll
      if (scrollTop > 0) {
        this.header.style.boxShadow = '0 2px 8px rgba(0, 0, 0, 0.1)';
      } else {
        this.header.style.boxShadow = 'var(--shadow-sm)';
      }

      lastScrollTop = scrollTop;
    });
  }

  // ─────────────────────────────────────
  // NAVEGACIÓN
  // ─────────────────────────────────────

  setupNavLinks() {
    const navLinks = document.querySelectorAll('.nav-link');

    navLinks.forEach(link => {
      link.addEventListener('click', (e) => {
        // Remover clase active de todos
        navLinks.forEach(l => l.classList.remove('active'));
        // Agregar a actual
        link.classList.add('active');
      });
    });

    // Actualizar nav link activo según sección visible
    window.addEventListener('scroll', () => {
      this.updateActiveNavLink();
    });
  }

  updateActiveNavLink() {
    const sections = document.querySelectorAll('section[id]');
    let current = '';

    sections.forEach(section => {
      const sectionTop = section.offsetTop;
      const sectionHeight = section.clientHeight;

      if (scrollY >= sectionTop - 100) {
        current = section.getAttribute('id');
      }
    });

    const navLinks = document.querySelectorAll('.nav-link');
    navLinks.forEach(link => {
      link.classList.remove('active');
      if (link.getAttribute('href') === `#${current}`) {
        link.classList.add('active');
      }
    });
  }

  // ─────────────────────────────────────
  // ACCESIBILIDAD
  // ─────────────────────────────────────

  prefersReducedMotion() {
    return window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  }

  announceToScreenReader(message) {
    const ariaLive = document.querySelector('[aria-live="polite"]') || this.createAriaLive();
    ariaLive.textContent = message;
  }

  createAriaLive() {
    const div = document.createElement('div');
    div.setAttribute('aria-live', 'polite');
    div.setAttribute('aria-atomic', 'true');
    div.style.position = 'absolute';
    div.style.left = '-10000px';
    div.style.width = '1px';
    div.style.height = '1px';
    div.style.overflow = 'hidden';
    document.body.appendChild(div);
    return div;
  }

  // ─────────────────────────────────────
  // UTILITARIOS
  // ─────────────────────────────────────

  log(message) {
    console.log('[CRISBAPRO]', message);
  }

  error(message) {
    console.error('[CRISBAPRO ERROR]', message);
  }
}

// Inicializar app cuando DOM está listo
document.addEventListener('DOMContentLoaded', () => {
  window.crisbapro = new CrisbaproApp();
  console.log('CRISBAPRO App initialized');
});
