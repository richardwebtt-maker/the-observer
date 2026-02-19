<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title', 'The Observer')</title>
    <meta name="description"
        content="The Observer with Mikee K delivers news, interviews, and engaging media content. Advertise with us to reach viewers through video, audio, and digital platforms.">
    <meta name="keywords"
        content="The Observer, Mikee K, news show, interviews, media platform, advertising opportunities, digital media, Caribbean news, talk show, Michael Kerr, The Observer with Mikee K, Trinidad and Tobago, T&T, Trinidad and Tobago politics, West Indies, WI, UNC, PNM, Elections">

    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1551144550516390"
        crossorigin="anonymous"></script>

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="/assets/img/apple-touch-icon.png">
    <link rel="apple-touch-icon" href="/assets/img/apple-touch-icon.png">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/img/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/img/apple-touch-icon.png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Serif+Text:ital@0;1&family=Lexend:wght@100..900&display=swap"
        rel="stylesheet">

    @vite(['resources/css/custom.css','resources/js/app.js'])
</head>

<body class="index-page">

    <header id="siteHeader" class="site-header compact" role="banner" aria-label="Main header">
        <div class="header-shell">
            <div class="header-inner">
                <!-- left -->
                <a href="{{ route('home') }}" class="logo" aria-label="The Observer home">
                    <img src="{{ asset('assets/img/TheObserver logo.svg') }}" alt="The Observer" class="main-logo" />
                </a>


                <!-- centered-->
                <nav class="nav-left" aria-label="Primary">

                </nav>

                <!-- right controls -->
                <div class="nav-right">
                    <ul class="nav-list">
                        <li><a href="{{ route('home') }}" class="nav-icon" title="Home"><i class="bi bi-house"></i></a>
                        </li>
                        <li><a href="{{ route('videos') }}" class="nav-icon" title="Interviews"><i
                                    class="bi bi-collection-play"></i></a>
                        </li>
                        <li><a href="{{ route('merch') }}" class="nav-icon" title="Merch"><i class="bi bi-bag"></i></a>
                        </li>
                    </ul>
                    <button id="theme-toggle" class="icon-btn theme-toggle" aria-pressed="false" title="Toggle theme">
                        <i class="bi bi-brightness-alt-high-fill"></i>
                    </button>

                    <!-- mobile menu toggle -->
                    <button id="mobileMenuToggle" class="icon-btn" aria-expanded="false" aria-controls="mobileNav"
                        title="Open menu">
                        <i class="bi bi-list" id="mobileToggleIcon"></i>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Mobile backdrop -->
    <div id="mobileBackdrop"></div>

    <!-- Mobile navigation panel -->
    <aside id="mobileNav" class="mobile-nav" aria-hidden="true">
        <nav class="mobile-nav-links">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('videos') }}">Interviews</a>
            <a href="{{ route('merch') }}">Merch</a>
            <a href="{{ route('advertise') }}">Advertise</a>
        </nav>

        <div class="mobile-nav-footer">
            <div class="card-contact">
                <i class="bi bi-envelope"></i>
                observertrinidad@gmail.com<br>
                <i class="bi bi-telephone"></i>
                (868) 494-0938
            </div>
        </div>
    </aside>

    <aside class="right-column" role="complementary">
        <div class="headlines-container">
            <div class="headline-panel hidden lg:block ">
                <h3>HEADLINES</h3>
                <h5>Powered by Google News.<br>Brought to you by Ryanair Auto Air-Conditioning.</h5>
                <ul id="headlineList">
                    @foreach ($headlines->take(3) as $headline)
                    <li class="headline-item">
                        <a href="{{ $headline['link'] }}" target="_blank">
                            {{ $headline['title'] }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="merch-preview">
            <h3><a href="{{ route('merch') }}"
                    style="text-decoration: none; color: var(--heading-color)">MERCHANDISE</a></h3>
            <h5>Brought to you by Mitlin Hardware.</h5>
            <div class="swiper merch-hero-swiper dm-card-swiper">
                <div class="swiper-wrapper dm-card-swiper-wrapper">
                    <!-- Each shirt repeats from here -->
                    <div class="swiper-slide merch-card shrink-0 dm-card-swiper-slide"
                        data-img="{{ asset('assets/img/observer black polo.png') }}" data-name="Observer Black Polo">
                        <div class="card p-2 rounded-lg overflow-hidden">
                            <div class="aspect-[4/5] overflow-hidden rounded-md bg-neutral-900">
                                <img src="{{ asset('assets/img/observer black polo.png') }}" alt="Observer Black Polo"
                                    class="object-cover w-full h-full">
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide merch-card shrink-0 dm-card-swiper-slide"
                        data-img="{{ asset('assets/img/observer blue polo.png') }}" data-name="Observer Blue Polo">
                        <div class="card p-2 rounded-lg overflow-hidden">
                            <div class="aspect-[4/5] overflow-hidden rounded-md bg-neutral-900">
                                <img src="{{ asset('assets/img/observer blue polo.png') }}" alt="Observer Blue Polo"
                                    class="object-cover w-full h-full">
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide merch-card shrink-0 dm-card-swiper-slide"
                        data-img="{{ asset('assets/img/observer white polo.png') }}" data-name="Observer White Polo">
                        <div class="card p-2 rounded-lg overflow-hidden">
                            <div class="aspect-[4/5] overflow-hidden rounded-md bg-neutral-900">
                                <img src="{{ asset('assets/img/observer white polo.png') }}" alt="Observer White Polo"
                                    class="object-cover w-full h-full">
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide merch-card shrink-0 dm-card-swiper-slide"
                        data-img="{{ asset('assets/img/observer grey polyester polo.png') }}"
                        data-name="Observer Grey Polyester Polo">
                        <div class="card p-2 rounded-lg overflow-hidden">
                            <div class="aspect-[4/5] overflow-hidden rounded-md bg-neutral-900">
                                <img src="{{ asset('assets/img/observer grey polyester polo.png') }}"
                                    alt="Observer Grey Polyester Polo" class="object-cover w-full h-full">
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide merch-card shrink-0 dm-card-swiper-slide"
                        data-img="{{ asset('assets/img/observer blue polyester polo.png') }}"
                        data-name="Observer Blue Polyester Polo">
                        <div class="card p-2 rounded-lg overflow-hidden">
                            <div class="aspect-[4/5] overflow-hidden rounded-md bg-neutral-900">
                                <img src="{{ asset('assets/img/observer blue polyester polo.png') }}"
                                    alt="Observer Blue Polyester Polo" class="object-cover w-full h-full">
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide merch-card shrink-0 dm-card-swiper-slide"
                        data-img="{{ asset('assets/img/observer purple polyester polo.png') }}"
                        data-name="Observer Purple Polyester Polo">
                        <div class="card p-2 rounded-lg overflow-hidden">
                            <div class="aspect-[4/5] overflow-hidden rounded-md bg-neutral-900">
                                <img src="{{ asset('assets/img/observer purple polyester polo.png') }}"
                                    alt="Observer Purple Polyester Polo" class="object-cover w-full h-full">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- navigation (optional) -->
                <div class="dm-card-swiper-prev swiper-button-prev"></div>
                <div class="dm-card-swiper-next swiper-button-next"></div>
            </div>
        </div>
        <!-- ABOUT / INFO CARD (drop into where about-half-1 used to be) -->
        <div class="about-half-1">
            <div class="info-card" data-state="#watch">
                <!-- header: Soon On text where 'image' would be; logo below -->
                <div class="card-header">
                    <div class="card-cover" aria-hidden="true"></div>

                    <!-- Large visible "Soon On" where the hero image used to sit -->
                    <h1 class="card-fullname">Soon On</h1>

                    <!-- Logo flows below (keeps layout stable / scalable) -->
                    <img class="card-avatar ttt-logo" src="{{ asset('assets/img/ttt logo.png') }}" alt="TTT Logo">
                </div>

                <!-- main sections -->
                <div class="card-main">
                    <!-- TAB 1: "Watch" / social squircles (default) -->
                    <div class="card-section" id="watch">
                        <div class="card-content">
                            <div class="card-subtitle">WHERE TO WATCH</div>
                            <div class="card-social small-icons">
                                <!-- Squircles: YouTube + Facebook (replace hrefs with real links) -->
                                <a href="https://www.youtube.com/@theobserverwithmikeek" target="_blank"
                                    rel="noopener noreferrer" aria-label="YouTube">
                                    <!-- simple svg circle icon -->
                                    <i class="bi bi-youtube"></i>
                                </a>

                                <a href="https://www.facebook.com/profile.php?id=61577735681361" target="_blank"
                                    rel="noopener noreferrer" aria-label="Facebook">
                                    <i class="bi bi-facebook"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- TAB 2: ABOUT (show description of the show) -->
                    <div class="card-section is-active" id="experience">
                        <div class="card-content">
                            <div class="card-subtitle">ABOUT THE SHOW</div>
                            <p class="card-desc">
                                <!-- Replace this with your show blurb (short & responsive) -->
                                {{ $showDescription ?? "Focusing on the pressing issues affecting T&T, The Observer
                                engages the nation's leading decision-makers and influential figures in search of
                                solutions." }}
                            </p>
                        </div>
                    </div>

                    <!-- TAB 3: CONTACT (keeps original contact layout, optional) -->
                    <div class="card-section" id="contact">
                        <div class="card-content">
                            <div class="card-subtitle">CONTACT</div>
                            <div class="card-contact-wrapper">
                                <div class="card-contact">
                                    <i class="bi bi-envelope-fill"></i>
                                    observertrinidad@gmail.com<br>
                                    <i class="bi bi-telephone-fill"></i>
                                    (868) 494-0938
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tab buttons (keep same data-section flow) -->
                    <div class="card-buttons">
                        <button data-section="#watch">WATCH</button>
                        <button data-section="#experience" class="is-active">ABOUT</button>
                        <button data-section="#contact">CONTACT</button>
                    </div>
                </div>
            </div>
            <div class="spacer"></div>
        </div>

    </aside>

    @yield('content')

    <!-- Modal -->
    <div id="shirtModal" class="modal">
        <div class="modal-content dark-background">
            <span class="close">&times;</span>
            <img id="modalImage" src="" alt="">
            <div id="modalFormContainer">
                <button id="requestBtn">Request Shirt</button>
                <form method="POST" action="{{ route('shirt.request') }}" id="shirtRequestForm" style="display: none;">
                    @csrf
                    <input type="hidden" name="shirtName" id="shirtNameInput">

                    <label>Size:</label>
                    <div class="radio-group">
                        @foreach (['S', 'M', 'L', 'XL', 'XXL'] as $size)
                        <label><input type="radio" name="size" value="{{ $size }}" required> {{ $size }}</label>
                        @endforeach
                    </div>

                    <label>Phone Number:</label>
                    <input type="text" name="phone" required>


                    <label>Location:</label>
                    <select name="location" id="location" required>
                        <option value="">-- Select a Town --</option>
                        @foreach ([
                        'Arima', 'Port of Spain', 'Chaguanas', 'San Fernando', 'Point Fortin',
                        'Tunapuna', 'Sangre Grande', 'Couva', 'Diego Martin', 'Mayaro', 'Other'
                        ] as $location)
                        <option value="{{ $location }}">{{ $location }}</option>
                        @endforeach
                    </select>


                    <button type="submit">Send Request</button>
                </form>
                @if (session('success'))
                <div id="formSuccessMessage" class="success-message">
                    {{ session('success') }}
                </div>
                @endif
            </div>
            <p class="text-center" style="scale: .75; font-style: italic">
                No login or card required.
                <br>
                Merchandise sales are not processed on this site.
                Users can request merchandise for
                purchase and collection after discussion with our merchandising team.
            </p>
        </div>
    </div>

    <footer id="footer" class="footer py-4">
        <div class="card-contact-wrapper d-flex flex-column align-items-center text-center">
            <div class="card-contact">
                <i class="bi bi-envelope-fill"></i>
                observertrinidad@gmail.com<br>
                <i class="bi bi-telephone-fill"></i>
                (868) 494-0938
            </div>
        </div>
        <hr class="mx-auto my-4" style="width: 50%; border-top: 2px solid var(--accent-color);">
        <div class="container d-flex flex-column align-items-center text-center">

            <a href="index.html" class="align-items-center justify-content-center mb-2"
                style="text-decoration: none; color: var(--text-color)">
                <p class="mb-1">© <span>Copyright</span>
                    <strong class="px-1 sitename">
                        <span class="sitename">The Observer</span>
                    </strong>

                    <span>All Rights Reserved</span>
            </a>
            <br>
            <div class="credits small">
                Designed by <a href="https://richvisions.net" style="text-decoration: none;">Rich•Visions</a>
            </div>
        </div>

        <div id="pulse-overlay"></div>
    </footer>


    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>
    <script src="https://cdn.jsdelivr.net/npm/@srexi/purecounterjs/dist/purecounter_vanilla.js"></script>
    @vite(['resources/js/app.js'])
    @stack('scripts')

    <script>
        (() => {
  const sidebar = document.querySelector('.right-column');
  if (!sidebar) return;

  const speed = 0.5;

  window.addEventListener('scroll', () => {
    const scrollY = window.scrollY;

    const maxScroll =
      document.documentElement.scrollHeight - window.innerHeight;

    const maxTranslate =
      sidebar.scrollHeight - window.innerHeight;

    const rawOffset = scrollY * speed;
    const clampedOffset = Math.min(rawOffset, maxTranslate);

    sidebar.style.transform = `translateY(${-clampedOffset}px)`;
  }, { passive: true });
})();
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
  const card = document.querySelector('.about-half-1 .info-card');
  if (!card) return;

  const buttons = card.querySelectorAll('.card-buttons button');
  const sections = card.querySelectorAll('.card-section');

  function handleButtonClick(e) {
    const target = e.currentTarget;
    const targetSection = target.getAttribute('data-section');
    const section = card.querySelector(targetSection);
    if (!section) return;

    // set active classes
    buttons.forEach(b => b.classList.remove('is-active'));
    sections.forEach(s => s.classList.remove('is-active'));

    target.classList.add('is-active');
    section.classList.add('is-active');

    // maintain data-state attribute similar to original template
    card.setAttribute('data-state', targetSection);
  }

  buttons.forEach(btn => btn.addEventListener('click', handleButtonClick));
});
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {

    const modal = document.getElementById("videoModal");
    const frame = document.getElementById("videoFrame");

    document.querySelectorAll(".open-video-modal").forEach(item => {
        item.addEventListener("click", () => {
            const id = item.dataset.videoId;
            frame.src = `https://www.youtube.com/embed/${id}?autoplay=1&rel=0`;
            modal.classList.add("active");
        });
    });

    /* close on click outside */
    modal.addEventListener("click", e => {
        if (!e.target.closest(".video-modal-content")) {
            modal.classList.remove("active");
            frame.src = "";
        }
    });

});
    </script>

    <script>
        function expandSection(button) {
        const wrapper = button.closest('.video-wrapper') || button.closest('.merch-wrapper');

        if (!wrapper) {
            console.error('Wrapper not found for expandSection');
            return;
        }

        wrapper.classList.add('expanded');
    }
    </script>

    <script defer>
        document.addEventListener('DOMContentLoaded', function () {
  const header = document.getElementById('siteHeader');
  const themeToggle = document.getElementById('headerThemeToggle');

  // SCROLL -> toggle scrolled class
  let isScrolled = null;
const SCROLL_THRESHOLD = 48;

const onScroll = () => {
  const shouldBeScrolled = window.scrollY > SCROLL_THRESHOLD;

  if (shouldBeScrolled !== isScrolled) {
    header.classList.toggle('scrolled', shouldBeScrolled);
    header.classList.toggle('compact', !shouldBeScrolled);
    isScrolled = shouldBeScrolled;
  }
};

  onScroll();
  window.addEventListener('scroll', onScroll, { passive: true });
  if (themeToggle) {
    themeToggle.addEventListener('click', () => {
      const isOn = themeToggle.getAttribute('aria-pressed') === 'true';
      themeToggle.setAttribute('aria-pressed', String(!isOn));
      document.body.classList.toggle('light-theme');
    });
  }
});
    </script>

    <script>
        const mobileToggle = document.getElementById('mobileMenuToggle');
    const mobileNav = document.getElementById('mobileNav');
    const backdrop = document.getElementById('mobileBackdrop');

    const toggleMenu = () => {
    const isOpen = mobileNav.classList.toggle('open');
    backdrop.classList.toggle('open', isOpen);
    mobileToggle.setAttribute('aria-expanded', isOpen);
    };

    mobileToggle.addEventListener('click', toggleMenu);
    backdrop.addEventListener('click', toggleMenu);
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
  const videoBox = document.querySelector('.youtube-preview');
  if (!videoBox) return;

  const applyWidthClass = () => {
    if (window.innerWidth < 768) {
      videoBox.classList.remove('w-75');
      videoBox.classList.add('w-100');
    } else {
      videoBox.classList.remove('w-100');
      videoBox.classList.add('w-75');
    }
  };

  applyWidthClass();                 // run on load
  window.addEventListener('resize', applyWidthClass);
});
    </script>

    <script>
        window.HEADLINES = @json($headlines);
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
