/**
 * CRISBAPRO Theme - Smooth Scroll
 * Smooth scrolling for anchor links and CTA buttons
 */

document.addEventListener('DOMContentLoaded', function() {
  // Handle all anchor links with smooth scroll
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
      const href = this.getAttribute('href');

      // Skip if it's just a hash
      if (href === '#') return;

      const target = document.querySelector(href);
      if (!target) return;

      e.preventDefault();

      // Calculate scroll position accounting for fixed header
      const headerHeight = document.querySelector('.header')?.offsetHeight || 0;
      const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - headerHeight;

      // Smooth scroll
      window.scrollTo({
        top: targetPosition,
        behavior: 'smooth'
      });

      // Update URL without page reload
      window.history.pushState(null, null, href);
    });
  });

  // Add scroll indicator for arrow buttons
  const arrowButtons = document.querySelectorAll('[href^="#"]');
  if (arrowButtons.length > 0) {
    // Already handled above with smooth scroll to element
  }
});

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
function scrollToElement(elementId) {
  const element = document.getElementById(elementId);
  if (element) {
    const headerHeight = document.querySelector('.header')?.offsetHeight || 0;
    const targetPosition = element.getBoundingClientRect().top + window.pageYOffset - headerHeight;

    window.scrollTo({
      top: targetPosition,
      behavior: 'smooth'
    });
  }
}
