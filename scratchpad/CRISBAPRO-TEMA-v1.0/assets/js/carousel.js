/**
 * CRISBAPRO Theme - Carousel
 * Project carousel navigation
 */

document.addEventListener('DOMContentLoaded', function() {
  const carousel = document.querySelector('.carousel');
  const prevBtn = document.querySelector('.carousel-control.prev');
  const nextBtn = document.querySelector('.carousel-control.next');

  if (!carousel || !prevBtn || !nextBtn) return;

  const scrollAmount = 420; // Slide width + gap

  // Navigation buttons
  prevBtn.addEventListener('click', function() {
    carousel.scrollBy({
      left: -scrollAmount,
      behavior: 'smooth'
    });
  });

  nextBtn.addEventListener('click', function() {
    carousel.scrollBy({
      left: scrollAmount,
      behavior: 'smooth'
    });
  });

  // Auto-scroll indicator
  updateCarouselButtons();
  carousel.addEventListener('scroll', debounce(updateCarouselButtons, 150));

  // Keyboard navigation
  carousel.addEventListener('keydown', function(e) {
    if (e.key === 'ArrowLeft') {
      prevBtn.click();
    } else if (e.key === 'ArrowRight') {
      nextBtn.click();
    }
  });
});

/**
 * Update carousel button states based on scroll position
 */
function updateCarouselButtons() {
  const carousel = document.querySelector('.carousel');
  const prevBtn = document.querySelector('.carousel-control.prev');
  const nextBtn = document.querySelector('.carousel-control.next');

  if (!carousel || !prevBtn || !nextBtn) return;

  const isAtStart = carousel.scrollLeft === 0;
  const isAtEnd = carousel.scrollLeft >= carousel.scrollWidth - carousel.clientWidth - 10;

  prevBtn.style.opacity = isAtStart ? '0.5' : '1';
  prevBtn.disabled = isAtStart;

  nextBtn.style.opacity = isAtEnd ? '0.5' : '1';
  nextBtn.disabled = isAtEnd;
}

/**
 * Debounce function
 */
function debounce(func, delay) {
  let timeoutId;
  return function(...args) {
    clearTimeout(timeoutId);
    timeoutId = setTimeout(() => func(...args), delay);
  };
}
