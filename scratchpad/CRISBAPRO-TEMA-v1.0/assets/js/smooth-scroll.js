/**
 * CRISBAPRO Theme - Smooth Scroll
 * Smooth scrolling for anchor links and CTA buttons
 * Uses scrollIntoView for maximum reliability
 */

// Handle anchor links with hash href
document.addEventListener('click', function(e) {
  const anchor = e.target.closest('a[href^="#"]');

  if (anchor) {
    const href = anchor.getAttribute('href');
    if (href === '#' || !href) return;

    const target = document.querySelector(href);
    if (!target) return;

    e.preventDefault();
    scrollToElement(target);
  }
});

// Handle buttons with data-scroll-to attribute
document.addEventListener('click', function(e) {
  const button = e.target.closest('[data-scroll-to]');

  if (button) {
    const elementId = button.getAttribute('data-scroll-to');
    if (!elementId) return;

    const target = document.getElementById(elementId);
    if (!target) return;

    e.preventDefault();
    scrollToElement(target);
  }
});

/**
 * Scroll to element with smooth behavior
 */
function scrollToElement(element) {
  if (!element) return;

  try {
    // Use scrollIntoView with smooth behavior for maximum compatibility
    element.scrollIntoView({ behavior: 'smooth', block: 'start' });

    // Update URL
    const elementId = element.id;
    if (elementId) {
      window.history.pushState(null, null, '#' + elementId);
    }
  } catch (err) {
    // Fallback: manual scroll calculation
    const header = document.querySelector('.header');
    const headerHeight = header ? header.offsetHeight : 0;
    const targetRect = element.getBoundingClientRect();
    const targetPosition = targetRect.top + window.pageYOffset - headerHeight - 20;

    window.scrollTo({
      top: Math.max(0, targetPosition),
      behavior: 'smooth'
    });

    const elementId = element.id;
    if (elementId) {
      window.history.pushState(null, null, '#' + elementId);
    }
  }
}

/**
 * Scroll to top functionality
 */
function scrollToTop() {
  window.scrollTo({
    top: 0,
    behavior: 'smooth'
  });
}

/**
 * Scroll to element by ID
 */
function scrollToElementById(elementId) {
  const element = document.getElementById(elementId);
  if (element) {
    scrollToElement(element);
  }
}
