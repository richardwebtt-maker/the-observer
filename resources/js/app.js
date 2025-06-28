import './bootstrap';
import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

import AOS from 'aos';
import GLightbox from 'glightbox';
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';
import 'swiper/css';
import 'swiper/css/navigation';
import imagesLoaded from 'imagesloaded';
import Isotope from 'isotope-layout';
import Typed from 'typed.js';
import VanillaTilt from 'vanilla-tilt';
import 'bootstrap-icons/font/bootstrap-icons.css';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap';


document.addEventListener('DOMContentLoaded', () => {
    const menuToggle = document.getElementById('menuToggle');
    const menuPopup = document.getElementById('menuPopup');
    const toggleIcon = document.getElementById('toggleIcon');
    const logoImg = document.querySelector('.logo img');

    const topHalf = menuPopup.querySelector('.logo-invert-area');
    const bottomHalf = menuPopup.querySelector('.menu-links-area');

    if (menuToggle && menuPopup && toggleIcon && logoImg && topHalf && bottomHalf) {
        menuToggle.addEventListener('click', () => {
            const isActive = menuPopup.classList.contains('active');

            if (!isActive) {
                // Open sequence
                logoImg.classList.add('hide-logo');
                setTimeout(() => {
                    menuPopup.classList.add('active');
                }, 100);
            } else {
                // Close sequence
                // Trigger transition reversals
                bottomHalf.style.transition = 'transform 0.3s ease, opacity 0.3s ease';
                topHalf.style.transition = 'opacity 0.2s ease';

                menuPopup.classList.remove('active');

                // Restore logo after transitions
                setTimeout(() => {
                    logoImg.classList.remove('hide-logo');
                    // Reset inline transitions to use default from CSS
                    bottomHalf.style.transition = '';
                    topHalf.style.transition = '';
                }, 400);
            }

            toggleIcon.classList.toggle('bi-list');
            toggleIcon.classList.toggle('bi-x');
        });

        document.addEventListener('click', (e) => {
            if (!menuPopup.contains(e.target) && !menuToggle.contains(e.target)) {
                if (menuPopup.classList.contains('active')) {
                    bottomHalf.style.transition = 'transform 0.3s ease, opacity 0.3s ease';
                    topHalf.style.transition = 'opacity 0.2s ease';

                    menuPopup.classList.remove('active');

                    setTimeout(() => {
                        logoImg.classList.remove('hide-logo');
                        bottomHalf.style.transition = '';
                        topHalf.style.transition = '';
                    }, 400);

                    toggleIcon.classList.add('bi-list');
                    toggleIcon.classList.remove('bi-x');
                }
            }
        });
    }

    // Header scroll effect
    const header = document.getElementById('custom-header');
    if (header) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    }
});



// Scroll top button
const scrollTop = document.querySelector('.scroll-top');
if (scrollTop) {
    scrollTop.addEventListener('click', (e) => {
        e.preventDefault();
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    function toggleScrollTop() {
        scrollTop.classList.toggle('active', window.scrollY > 100);
    }
    window.addEventListener('scroll', toggleScrollTop);
    toggleScrollTop(); // run once
}

// Init AOS
AOS.init({
    duration: 600,
    easing: 'ease-in-out',
    once: true,
    mirror: false
});

// Lightbox
GLightbox({ selector: '.glightbox' });

// Counter
new PureCounter();

//Swiper Sliders
const swiper = new Swiper(".latest-videos-swiper", {
    slidesPerView: 3,
    spaceBetween: 20,
    loop: true,
    centeredSlides: true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    on: {
        slideChangeTransitionEnd() {
            document.querySelectorAll('.swiper-slide .glow-target').forEach(el => el.classList.remove('glow-pulse-hover'));
            const active = document.querySelector('.swiper-slide-active');
            active?.querySelectorAll('.glow-target').forEach(el => el.classList.add('glow-pulse-hover'));
        }
    }
});

// Auto-scroll every 15 seconds
setInterval(() => {
    swiper.slideNext();
}, 15000);

// Typed text
const typed = document.querySelector('.typed');
if (typed) {
    const strings = typed.getAttribute('data-typed-items').split(',');
    new Typed('.typed', {
        strings,
        loop: true,
        typeSpeed: 100,
        backSpeed: 50,
        backDelay: 2000
    });
}

// Isotope layout
document.querySelectorAll('.isotope-layout').forEach(isotopeItem => {
    const container = isotopeItem.querySelector('.isotope-container');
    if (!container) return;
    const layout = isotopeItem.dataset.layout || 'masonry';
    const filter = isotopeItem.dataset.defaultFilter || '*';
    const sort = isotopeItem.dataset.sort || 'original-order';

    imagesLoaded(container, () => {
        const iso = new Isotope(container, {
            itemSelector: '.isotope-item',
            layoutMode: layout,
            filter,
            sortBy: sort
        });

        isotopeItem.querySelectorAll('.isotope-filters li').forEach(btn => {
            btn.addEventListener('click', () => {
                isotopeItem.querySelector('.filter-active')?.classList.remove('filter-active');
                btn.classList.add('filter-active');
                iso.arrange({ filter: btn.getAttribute('data-filter') });
            });
        });
    });
});

// Scrollspy
const navmenulinks = document.querySelectorAll('.navmenu a');
const navmenuScrollspy = () => {
    const scrollY = window.scrollY + 200;
    navmenulinks.forEach(link => {
        const section = document.querySelector(link.hash);
        if (!section) return;
        if (scrollY >= section.offsetTop && scrollY <= section.offsetTop + section.offsetHeight) {
            link.classList.add('active');
        } else {
            link.classList.remove('active');
        }
    });
};
window.addEventListener('scroll', navmenuScrollspy);
navmenuScrollspy();

// Parallax effect
const parallaxItems = document.querySelectorAll('.parallax-item');
document.addEventListener('mousemove', (e) => {
    const x = (e.clientX / window.innerWidth) - 0.5;
    const y = (e.clientY / window.innerHeight) - 0.5;
    parallaxItems.forEach(item => {
        const intensity = parseFloat(item.dataset.intensity || 5);
        const moveX = -x * intensity;
        const moveY = -y * intensity;
        item.style.transform = `translate(${moveX}px, ${moveY}px)`;
    });
});
document.addEventListener('mouseleave', () => {
    parallaxItems.forEach(item => item.style.transform = 'translate(0, 0)');
});

// Theme Toggle
const themeToggle = document.getElementById('theme-toggle');
const themeRoot = document.body;

const setTheme = (light) => {
    themeRoot.classList.toggle('light-theme', light);
    localStorage.setItem('theme', light ? 'light' : 'dark');
};

const initializeTheme = () => {
    const saved = localStorage.getItem('theme') === 'light';
    setTheme(saved);
};

themeToggle.addEventListener('click', () => {
    const isLight = !themeRoot.classList.contains('light-theme');
    setTheme(isLight);
});

initializeTheme();

document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('shirtModal');
    const modalImage = document.getElementById('modalImage');
    const requestBtn = document.getElementById('requestBtn');
    const shirtRequestForm = document.getElementById('shirtRequestForm');
    const shirtNameInput = document.getElementById('shirtNameInput');
    const closeModal = document.querySelector('.close');

    // Open modal when a shirt is clicked
    document.querySelectorAll('.shirt-item').forEach(item => {
        item.addEventListener('click', () => {
            const imgSrc = item.getAttribute('data-img');
            const name = item.getAttribute('data-name');

            modalImage.src = imgSrc;
            shirtNameInput.value = name;

            requestBtn.style.display = 'block';
            shirtRequestForm.style.display = 'none';

            modal.style.display = 'block'; // <-- SHOW MODAL
        });
    });

    // Close modal
    closeModal.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    // Show form when Request button clicked
    requestBtn.addEventListener('click', (e) => {
        e.preventDefault();
        requestBtn.style.display = 'none';
        shirtRequestForm.style.display = 'block';
    });

    // Close modal if clicked outside
    window.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.style.display = 'none';
        }
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const showButton = document.getElementById('showAnswerForm');
    const formContainer = document.getElementById('answerFormContainer');

    showButton?.addEventListener('click', () => {
        showButton.style.display = 'none';
        formContainer.style.display = 'block';
    });
});


