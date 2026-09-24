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

      // Get header height for offset calculation
      const header = document.querySelector('.header');
      const headerHeight = header ? header.offsetHeight : 0;

      // Calculate target position with extra padding
      const targetRect = target.getBoundingClientRect();
      const targetPosition = targetRect.top + window.pageYOffset - headerHeight - 20;

      // Smooth scroll with fallback
      try {
        window.scrollTo({
          top: Math.max(0, targetPosition),
          behavior: 'smooth'
        });
      } catch (err) {
        // Fallback for browsers that don't support smooth scrolling
        window.scrollTo(0, Math.max(0, targetPosition));
      }

      // Update URL without page reload
      window.history.pushState(null, null, href);
    });
  });
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
