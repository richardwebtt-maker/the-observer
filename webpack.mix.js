const mix = require('laravel-mix');

mix
    // Combine and minify all vendor CSS + main.css into one CSS file
    .styles([
        'public/assets/vendor/bootstrap/css/bootstrap.min.css',
        'public/assets/vendor/bootstrap-icons/bootstrap-icons.css',
        'public/assets/vendor/aos/aos.css',
        'public/assets/vendor/glightbox/css/glightbox.min.css',
        'public/assets/vendor/swiper/swiper-bundle.min.css',
        'public/assets/css/main.css'
    ], 'public/css/vendor-and-main.css')

    // Combine and minify all vendor JS + main.js into one JS file
    .scripts([
        'public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js',
        'public/assets/vendor/php-email-form/validate.js',
        'public/assets/vendor/aos/aos.js',
        'public/assets/vendor/glightbox/js/glightbox.min.js',
        'public/assets/vendor/purecounter/purecounter_vanilla.js',
        'public/assets/vendor/swiper/swiper-bundle.min.js',
        'public/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js',
        'public/assets/vendor/isotope-layout/isotope.pkgd.min.js',
        'public/assets/vendor/typed.js/typed.umd.js',
        'public/assets/vendor/vanilla-tilt/dist/vanilla-tilt.min.js',
        'public/assets/js/main.js'
    ], 'public/js/vendor-and-main.js')

    // Enable versioning (cache busting)
    .version();
