/**
* Template Name: Dewi
* Template URL: https://bootstrapmade.com/dewi-free-multi-purpose-html-template/
* Updated: Aug 07 2024 with Bootstrap v5.3.3
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/

(function () {
    "use strict";

    /**
     * Apply .scrolled class to the body as the page is scrolled down
     */
    function toggleScrolled() {
        const selectBody = document.querySelector('body');
        const selectHeader = document.querySelector('#header');
        if (!selectHeader.classList.contains('scroll-up-sticky') && !selectHeader.classList.contains('sticky-top') && !selectHeader.classList.contains('fixed-top')) return;
        window.scrollY > 100 ? selectBody.classList.add('scrolled') : selectBody.classList.remove('scrolled');
    }

    document.addEventListener('scroll', toggleScrolled);
    window.addEventListener('load', toggleScrolled);

    const toggleButton = document.getElementById('mobileNavToggle');
    const toggleIcon = document.getElementById('toggleIcon');
    const mobileNavPanel = document.getElementById('mobileNavPanel');
    const body = document.body;

    toggleButton.addEventListener('click', () => {
        body.classList.toggle('mobile-nav-active');
        mobileNavPanel.classList.toggle('active');

        if (toggleIcon.classList.contains('bi-list')) {
            toggleIcon.classList.remove('bi-list');
            toggleIcon.classList.add('bi-x');
        } else {
            toggleIcon.classList.remove('bi-x');
            toggleIcon.classList.add('bi-list');
        }
    });

    // Close nav & reset icon when clicking a link inside mobile nav panel
    mobileNavPanel.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            if (body.classList.contains('mobile-nav-active')) {
                body.classList.remove('mobile-nav-active');
                mobileNavPanel.classList.remove('active');
                toggleIcon.classList.remove('bi-x');
                toggleIcon.classList.add('bi-list');
            }
        });
    });




    /**
     * Preloader
     */
    const preloader = document.querySelector('#preloader');
    if (preloader) {
        window.addEventListener('load', () => {
            preloader.remove();
        });
    }

    /**
     * Scroll top button
     */
    let scrollTop = document.querySelector('.scroll-top');

    function toggleScrollTop() {
        if (scrollTop) {
            window.scrollY > 100 ? scrollTop.classList.add('active') : scrollTop.classList.remove('active');
        }
    }
    scrollTop.addEventListener('click', (e) => {
        e.preventDefault();
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    window.addEventListener('load', toggleScrollTop);
    document.addEventListener('scroll', toggleScrollTop);


    /**
     * Animation on scroll function and init
     */
    function aosInit() {
        AOS.init({
            duration: 600,
            easing: 'ease-in-out',
            once: true,
            mirror: false
        });
    }
    window.addEventListener('load', aosInit);

    /**
     * Initiate glightbox
     */
    const glightbox = GLightbox({
        selector: '.glightbox'
    });

    /**
     * Initiate Pure Counter
     */
    new PureCounter();

    /**
     * Init swiper sliders
     */
    function initSwiper() {
        document.querySelectorAll(".init-swiper").forEach(function (swiperElement) {
            let config = JSON.parse(
                swiperElement.querySelector(".swiper-config").innerHTML.trim()
            );

            if (swiperElement.classList.contains("swiper-tab")) {
                initSwiperWithCustomPagination(swiperElement, config);
            } else {
                new Swiper(swiperElement, config);
            }
        });
    }

    window.addEventListener("load", initSwiper);
    /**
    * Ani About us.js
    */
    document.addEventListener("DOMContentLoaded", () => {
        const wrapper = document.getElementById("aboutWrapper");
        const svg = wrapper.querySelector("svg");
        const rect = svg.querySelector("rect");

        // Resize the SVG rect to match the wrapper
        const resizeSvg = () => {
            const width = wrapper.offsetWidth;
            const height = wrapper.offsetHeight;
            svg.setAttribute("viewBox", `0 0 ${width} ${height}`);
            rect.setAttribute("width", width);
            rect.setAttribute("height", height);

            // Recalculate perimeter for dashed animation
            const borderRadius = 20;
            const perimeter =
                2 * (width + height) - 8 * borderRadius + 2 * Math.PI * borderRadius;
            rect.style.strokeDasharray = perimeter;
            rect.style.strokeDashoffset = perimeter;
        };

        resizeSvg();
        window.addEventListener("resize", resizeSvg); // Adjust on window resize

        const observer = new IntersectionObserver(
            ([entry]) => {
                if (entry.isIntersecting) {
                    wrapper.classList.add("active");

                    setTimeout(() => {
                        wrapper.classList.add("animate");
                        rect.style.strokeDashoffset = 0;
                    }, 600);
                }
            },
            {
                threshold: 0.5,
            }
        );

        observer.observe(wrapper);
    });


    /**
   * Ani About us.js
   */
    /**
    * Init typed.js
    */
    function initTypedText() {
        const selectTyped = document.querySelector('.typed');
        if (selectTyped) {
            let typed_strings = selectTyped.getAttribute('data-typed-items');
            typed_strings = typed_strings.split(',');
            new Typed('.typed', {
                strings: typed_strings,
                loop: true,
                typeSpeed: 100,
                backSpeed: 50,
                backDelay: 2000
            });
        }
    }

    window.addEventListener("load", initTypedText);

    /**
     * Init isotope layout and filters
     */
    document.querySelectorAll('.isotope-layout').forEach(function (isotopeItem) {
        let layout = isotopeItem.getAttribute('data-layout') ?? 'masonry';
        let filter = isotopeItem.getAttribute('data-default-filter') ?? '*';
        let sort = isotopeItem.getAttribute('data-sort') ?? 'original-order';

        let initIsotope;
        imagesLoaded(isotopeItem.querySelector('.isotope-container'), function () {
            initIsotope = new Isotope(isotopeItem.querySelector('.isotope-container'), {
                itemSelector: '.isotope-item',
                layoutMode: layout,
                filter: filter,
                sortBy: sort
            });
        });

        isotopeItem.querySelectorAll('.isotope-filters li').forEach(function (filters) {
            filters.addEventListener('click', function () {
                isotopeItem.querySelector('.isotope-filters .filter-active').classList.remove('filter-active');
                this.classList.add('filter-active');
                initIsotope.arrange({
                    filter: this.getAttribute('data-filter')
                });
                if (typeof aosInit === 'function') {
                    aosInit();
                }
            }, false);
        });

    });

    /**
     * Correct scrolling position upon page load for URLs containing hash links.
     */
    /*window.addEventListener('load', function (e) {
      if (window.location.hash) {
        if (document.querySelector(window.location.hash)) {
          setTimeout(() => {
            let section = document.querySelector(window.location.hash);
            let scrollMarginTop = getComputedStyle(section).scrollMarginTop;
            window.scrollTo({
              top: section.offsetTop - parseInt(scrollMarginTop),
              behavior: 'smooth'
            });
          }, 100);
        }
      }
    });*/


    const themeToggle = document.getElementById('theme-toggle');
    const themeRoot = document.body;
    const pulse = document.getElementById('pulse-overlay');
    const icon = themeToggle.querySelector('i');

    function triggerPulseFromButton(button) {
        const rect = button.getBoundingClientRect();
        const x = rect.left + rect.width / 2;
        const y = rect.top + rect.height / 2;

        const pulse = document.getElementById('pulse-overlay');
        pulse.style.left = `${x - 50}px`;
        pulse.style.top = `${y - 50}px`;

        pulse.classList.remove('active'); // reset in case it's still active
        void pulse.offsetWidth; // force reflow to restart animation
        pulse.classList.add('active');

        // Optional cleanup: remove class after animation
        setTimeout(() => {
            pulse.classList.remove('active');
        }, 700); // match animation duration
    }


    function updateIcon() {
        if (themeRoot.classList.contains('light-theme')) {
            icon.classList.remove('bi-sun');
            icon.classList.add('bi-moon');
        } else {
            icon.classList.remove('bi-moon');
            icon.classList.add('bi-sun');
        }
    }
    themeToggle.addEventListener('click', (e) => {
        e.preventDefault();
        triggerPulseFromButton(themeToggle);

        addTemporaryTransition();

        setTimeout(() => {
            themeRoot.classList.toggle('light-theme');
            localStorage.setItem('theme', themeRoot.classList.contains('light-theme') ? 'light' : 'dark');
            updateIcon();

            // Remove the transition style after it completes
            setTimeout(removeTemporaryTransition, 500);
        }, 200); // wait for pulse before switching
    });


    window.addEventListener('DOMContentLoaded', () => {
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme === 'light') {
            themeRoot.classList.add('light-theme');
        }
        updateIcon();
    });

    function addTemporaryTransition() {
        const style = document.createElement('style');
        style.id = 'theme-transition-style';
        style.innerHTML = `
      * {
        transition: background-color 0.4s ease, color 0.4s ease, border-color 0.4s ease !important;
      }
    `;
        document.head.appendChild(style);
    }

    function removeTemporaryTransition() {
        const style = document.getElementById('theme-transition-style');
        if (style) {
            style.remove();
        }
    }

    function updateThemeClass() {
        const label = document.querySelector('.about-label');
        if (document.body.classList.contains('light-theme')) {
            label.classList.add('glow-light');
        } else {
            label.classList.remove('glow-light');
        }
    }

    updateThemeClass();

    document.addEventListener('mousemove', (e) => {
        const items = document.querySelectorAll('.parallax-item');
        const centerX = window.innerWidth / 2;
        const centerY = window.innerHeight / 2;

        const offsetX = (e.clientX - centerX) / centerX;
        const offsetY = (e.clientY - centerY) / centerY;

        items.forEach(item => {
            const intensity = item.dataset.intensity || 3; // You can control the depth per element
            const moveX = -offsetX * intensity;
            const moveY = -offsetY * intensity;

            item.style.transform = `translate(${moveX}px, ${moveY}px)`;
        });
    });
    document.addEventListener('mouseleave', () => {
        document.querySelectorAll('.parallax-item').forEach(item => {
            item.style.transform = `translate(0, 0)`;
        });
    });
    document.addEventListener('mousemove', (e) => {
        const x = e.clientX / window.innerWidth - 0.5;
        const y = e.clientY / window.innerHeight - 0.5;

        document.querySelectorAll('.parallax-item').forEach((item) => {
            const intensity = item.dataset.intensity || 5;

            const moveX = -x * intensity;
            const moveY = -y * intensity;

            item.style.transform = `translate(${moveX}px, ${moveY}px)`;

            // Apply dynamic shadow that moves with it (reverse direction for realism)
            const shadowX = x * intensity * 2; // amplify a bit for effect
            const shadowY = y * intensity * 2;

            item.style.textShadow = `${shadowX}px ${shadowY}px 20px rgba(101, 63, 176, 0.42)`;
        });
    });


    /**
     * Navmenu Scrollspy
     */
    let navmenulinks = document.querySelectorAll('.navmenu a');

    function navmenuScrollspy() {
        navmenulinks.forEach(navmenulink => {
            if (!navmenulink.hash) return;
            let section = document.querySelector(navmenulink.hash);
            if (!section) return;
            let position = window.scrollY + 200;
            if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
                document.querySelectorAll('.navmenu a.active').forEach(link => link.classList.remove('active'));
                navmenulink.classList.add('active');
            } else {
                navmenulink.classList.remove('active');
            }
        })
    }
    window.addEventListener('load', navmenuScrollspy);
    document.addEventListener('scroll', navmenuScrollspy);

})();
