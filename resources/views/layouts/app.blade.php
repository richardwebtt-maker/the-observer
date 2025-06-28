<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title', 'The Observer')</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/Mikee K Logo png.png')}}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Arsenal+SC:ital,wght@0,400;0,700;1,400;1,700&family=Karla:ital,wght@0,200..800;1,200..800&family=Noto+Serif+Display:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <!-- Vendor CSS Files -->


    @vite(['resources/css/custom.css'])
    <!-- =======================================================
  * Template Name: Dewi
  * Template URL: https://bootstrapmade.com/dewi-free-multi-purpose-html-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

    <header id="header" class="custom-header fixed-top">
        <div class="header-inner d-flex flex-column align-items-center position-relative">
            <a href="/" class="logo d-flex align-items-center justify-content-center">
                <img src="{{ asset('assets/img/TheObserver logo.png') }}" class="main-logo" alt="Logo">
            </a>

            <button class="menu-toggle mt-2" id="menuToggle" aria-label="Toggle Navigation">
                <i class="bi bi-list" id="toggleIcon"></i>
            </button>

            <div class="menu-popup" id="menuPopup">
                <div class="menu-half logo-invert-area">
                    <img src="{{ asset('assets/img/TheObserver logo.png') }}" class="logo-inverted" alt="Inverted Logo">
                </div>
                <div class="menu-half menu-links-area">
                    <ul class="menu-links">
                        <li><a href="#about">About</a></li>
                        <li><a href="#features">Services</a></li>
                        <li><a href="#contact">Contact</a></li>
                        <li><a href="#portfolio">Portfolio</a></li>
                    </ul>
                    <div class="theme-toggle-switch" id="theme-toggle">
                        <div class="switch-track">
                            <div class="switch-icon moon"><i class="bi bi-moon"></i></div>
                            <div class="switch-icon sun"><i class="bi bi-sun"></i></div>
                            <div class="switch-thumb"></div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </header>



    @yield('content')

    <footer id="footer" class="footer py-4">
        <hr class="mx-auto my-4" style="width: 50%; border-top: 2px solid var(--accent-color);">
        <div class="container d-flex flex-column align-items-center text-center">
            <a href="index.html" class="logo d-flex align-items-center justify-content-center mb-2">
                <span class="sitename">The Observer</span>
            </a>

            <div class="social-links d-flex justify-content-center">
                <a href="#"><i class="bi bi-youtube"></i></a>
                <a href="#"><i class="bi bi-facebook"></i></a>
            </div>

            <p class="mb-1">© <span>Copyright</span>
                <strong class="px-1 sitename">The Observer</strong>
                <span>All Rights Reserved</span>
            </p>

            <div class="credits small">
                Designed by <a href="https://bootstrapmade.com/">Rich•Visions</a>
            </div>
        </div>

        <div id="pulse-overlay"></div>
    </footer>


    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <!-- Button -->
    <button class="mobile-nav-button" id="mobileNavToggle" aria-label="Toggle navigation">
        <i class="bi bi-list" id="toggleIcon"></i>
    </button>

    <!-- Preloader -->
    <div id="preloader"></div>
    <script src="https://cdn.jsdelivr.net/npm/@srexi/purecounterjs/dist/purecounter_vanilla.js"></script>
    @vite(['resources/js/app.js'])

    <script defer>
        window.addEventListener('DOMContentLoaded', function () {
        const header = document.getElementById('header');

        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });

        // Initial state
        header.classList.remove('scrolled');
    });
    </script>
    <script>
        window.addEventListener('load', () => {
    console.log('✅ Window fully loaded');
    document.getElementById('preloader')?.remove();
  });
    </script>

</body>

</body>

</html>
