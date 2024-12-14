let dropdowns = document.querySelectorAll('.navbar .dropdown-toggler');
let dropdownIsOpen = false;

// Handle dropdown menus
if (dropdowns.length) {
  dropdowns.forEach((dropdown) => {
    dropdown.addEventListener('click', (event) => {
      let target = document.querySelector(`#${event.target.dataset.dropdown}`);

      if (target) {
        if (target.classList.contains('show')) {
          target.classList.remove('show');
          dropdownIsOpen = false;
        } else {
          target.classList.add('show');
          dropdownIsOpen = true;
        }
      }
    });
  });
}

// Handle closing dropdowns if a user clicked the body
window.addEventListener('mouseup', (event) => {
  if (dropdownIsOpen) {
    dropdowns.forEach((dropdownButton) => {
      let dropdown = document.querySelector(`#${dropdownButton.dataset.dropdown}`);
      let targetIsDropdown = dropdown == event.target;

      if (dropdownButton == event.target) {
        return;
      }

      if (!targetIsDropdown && !dropdown.contains(event.target)) {
        dropdown.classList.remove('show');
      }
    });
  }
});

// Open links in mobiles
function handleSmallScreens() {
  document.querySelector('.navbar-toggler').addEventListener('click', () => {
    let navbarMenu = document.querySelector('.navbar-menu');

    if (!navbarMenu.classList.contains('active')) {
      navbarMenu.classList.add('active');
    } else {
      navbarMenu.classList.remove('active');
    }
  });
}

handleSmallScreens();

//curosell
document.addEventListener('DOMContentLoaded', () => {
  const slides = document.querySelectorAll('.slide');
  const prevBtn = document.getElementById('prevBtn');
  const nextBtn = document.getElementById('nextBtn');
  let currentSlide = 0;
  let autoSlideInterval;

  function updateSlides() {
    slides.forEach((slide) => {
      slide.classList.remove('active');
    });
    slides[currentSlide].classList.add('active');
  }

  function nextSlide() {
    currentSlide = (currentSlide + 1) % slides.length;
    updateSlides();
  }

  function prevSlide() {
    currentSlide = (currentSlide - 1 + slides.length) % slides.length;
    updateSlides();
  }

  function startAutoSlide() {
    
    autoSlideInterval = setInterval(nextSlide, 8000);
  }

  function stopAutoSlide() {
    clearInterval(autoSlideInterval);
  }

  prevBtn.addEventListener('click', () => {
    stopAutoSlide();
    prevSlide();
    startAutoSlide();
  });

  nextBtn.addEventListener('click', () => {
    stopAutoSlide();
    nextSlide();
    startAutoSlide();
  });

  // Initialize the first slide and start auto-sliding
  updateSlides();
  startAutoSlide();
});
