@extends('layouts.app')

@section('title', 'Home')

@section('content')



<main class="main">

    <!-- New Hero Section -->
    <br>
    <br>
    <br>
    <br>
    <section id="hero" class="container mx-auto px-4">
        <div class="featured-row d-flex align-items-stretch gap-4" data-aos="fade-up" data-aos-delay="100">
            @if ($latestVideo)
            <div class="youtube-preview w-75 mx-auto">

                <div class="thumb-container ratio ratio-16x9 shadow-lg glow-target">
                    <iframe
                        src="https://www.youtube.com/embed/{{ $latestVideo['videoId'] }}?autoplay=1&mute=1&rel=0&modestbranding=1"
                        allow="autoplay; encrypted-media; picture-in-picture" allowfullscreen
                        class="w-100 h-100 glow-target" style="border: none;">
                    </iframe>
                </div>

                <h6 class="mt-3 text-lg font-semibold text-heading text-center glow-target">
                    {{ $latestVideo['title'] }}
                </h6>

            </div>
            @else
            <p class="text-center">No featured interview available.</p>
            @endif
            <div class="ad-slot video-side-panel">
                <div class="ad-inner">
                    <p>Your brand could be here!</p>
                    <a href="{{ route('advertise') }}" class="ad-link" style="color: var(--heading-color)">
                        <strong>Advertise with us</strong>
                    </a>
                </div>
            </div>
        </div>

        <section id="latest-interviews" class="latest-videos-section px-2 py-4">
            <h2 class="text-xl font-bold text-center mb-3" style="font-style: italic; color: var(--heading-color);">
                <a href="{{ route('videos') }}" style="color: var(--heading-color); text-decoration: none">
                Latest Videos
                </a>
            </h2>

            <div class="video-list">
                @foreach ($videos as $video)
                <div class="video-row open-video-modal" data-video-id="{{ $video['videoId'] }}">

                    <div class="video-thumb">
                        <img src="{{ $video['thumbnail'] }}" alt="{{ $video['title'] }}">
                    </div>

                    <div class="video-meta">
                        <h4>{{ $video['title'] }}</h4>
                    </div>

                </div>
                @endforeach
            </div>
            <div class="video-list-mobile">
                <div class="card">
                    <a href="{{ route('videos') }}" class="card-link">
                        <h4>View All Videos</h4>
                    </a>
                    <div class="video-thumb">
                        <img src="{{ $video['thumbnail'] }}" alt="{{ $video['title'] }}">

                    </div>
                </div>
            </div>
        </section>
        <div id="videoModal" class="video-modal">
            <div class="video-modal-content">
                <iframe id="videoFrame" src="" allow="autoplay; encrypted-media; picture-in-picture" allowfullscreen>
                </iframe>
            </div>
        </div>

    </section>

    <!--<div class="about-preview mt-4" data-aos="slide-up" data-aos-delay="200">

                    <div class="about-half-1">
                        <div class="about-preview-1 p-4">

                            <h5 class="mb-1">Soon On</h5>
                        </div>
                        <div class="items">
                            <div class="about-info">
                                <p class="about-spread">Sundays at 7pm</p>
                            </div>
                        </div>
                    </div>

                    <div class="about-half-2">
                        <div class="about-preview-2 p-4">
                            <h5 class="mb-1">Also Found On</h5>
                        </div>
                    </div>

                </div>



                 Right Column: Description
                <div class="col-12 col-lg-5" data-aos="fade-up" data-aos-delay="250">
                    <div class="content"
                        style="border-left: 3px solid var(--accent-color); border-radius: 3px; padding:3.5rem">
                        <h2 class="text-l font-bold mb-3" style="font-family: DM Serif Text">Page Navigation</h2>
                        <ul class="list-unstyled">
                            <li class="glow-pulse-hover mb-3">
                                <a href="#latest-interviews" style="text-decoration: none">
                                    <h3>∘ Interviews</h3>
                                </a>
                            </li>
                            <li class="glow-pulse-hover mb-3">
                                <a href="#schedule" style="text-decoration: none">
                                    <h3>∘ About The Show</h3>
                                </a>
                            </li>
                            <li class="glow-pulse-hover mb-3">
                                <a href="#question" style="text-decoration: none">
                                    <h3>∘ Question Of The Week</h3>
                                </a>
                            </li>
                            <li class="glow-pulse-hover mb-3">
                                <a href="#merchandise" style="text-decoration: none">
                                    <h3>∘ Merchandise</h3>
                                </a>
                            </li>
                            <li class="glow-pulse-hover mb-3">
                                <a href="#contact" style="text-decoration: none">
                                    <h3>∘ Contact Information</h3>
                                </a>
                            </li>
                        </ul>
                    </div>
    </div>
    </section>-->

    <!-- Mobile Video List (Visible Only on Mobile Devices)
    <div class="video-wrapper">
        <div class="mobile-video-list collapse-container">
            @foreach ($videos as $video)
            <div class="video-box cursor-pointer open-video-modal" data-video-id="{{ $video['videoId'] }}">
                <div class="video-info">
                    <h4 class="text-base leading-snug">{{ $video['title'] }}</h4>
                </div>
                <div
                    class="thumbnail-container w-32 sm:w-36 md:w-40 flex-shrink-0 aspect-video rounded-md overflow-hidden video-thumb">
                    <img src="{{ $video['thumbnail'] }}" alt="{{ $video['title'] }}" class="w-full h-full object-cover">
                </div>
            </div>
            @endforeach
        </div>
        <div class="fade-overlay"></div>
        <button class="expand-button" onclick="expandSection(this)"
            style="border: 2px solid var(--contrast-color); max-width:fit-content">
            <p style="font-family: var(--heading-font); scale: .75; font-weight: 800">More Interviews</p>
            ▼
        </button>
        <br>
    </div>
-->




    <!-- Schedule Section-->
    <section id="schedule" class="schedule section">
        <div class="live-info-container text-center">
            <h3 class="live-info">Live! <br> Every Sunday From 5-7pm!</h3>
        </div>
        <div class="schedule-area">
            <h3 class="">Catch up on</h3>
            <a href="https://www.facebook.com/profile.php?id=61577735681361" target="_blank" rel="noopener"
                class="facebook-link">
                <i class="bi bi-facebook"></i>
                <span class="facebook-text">Facebook</span>
            </a>
            <a href="https://www.youtube.com/@theobserverwithmikeek" target="_blank" rel="noopener"
                class="youtube-link">
                <i class="bi bi-youtube"></i>
                <span class="youtube-text">YouTube</span>
            </a>
        </div>
        <div class="schedule-mobile">
            <h1 class="card-fullname">Soon On</h1>
            <img class="card-avatar ttt-logo" src="{{ asset('assets/img/ttt logo.png') }}" alt="TTT Logo">
        </div>
        </div>
        </div>
        </div>
    </section>
    <!--schedule Section -->


    <!--question Section -->
    <section id="question" class="question section justify-content-center">
        <div class="question-container mt-4" data-aos="fade-up" data-aos-delay="300">
            <div class="question-background">
                <span>?</span>
                <span>?</span>
                <span>?</span>
                <span>?</span>
                <span>?</span>
            </div>
            <h2 class="text-xl font-bold text-center mb-4" style="font-style: italic; color: var(--heading-color);">
                Question of the Week</h2>
            <h1 class="question-text text-2xl font-bold text-center">
                When did Trinidad and Tobago gain Independence?
            </h1>
            <br>
            <div class="button-wrapper">
                <button type="button" id="showAnswerForm" class="question-button">Submit your answer</button>
            </div>

            <div id="answerFormContainer" style="display: none; margin-top: 1rem;">
                <form method="POST" action="{{ route('question.answer') }}" id="questionAnswerForm">
                    @csrf

                    <label for="answer">Your Answer:</label>
                    <textarea name="answer" id="answer" rows="4" required></textarea>

                    <label for="name">Your Name:</label>
                    <input type="text" name="name" id="name">
                    <div style="text-align: center;">
                        <button type="submit" class="question-button">Send Answer</button>
                    </div>
                </form>

                @if (session('success'))
                <div class="success-message">{{ session('success') }}</div>
                @endif
            </div>

        </div>
        <br>
        <p class="text-center">Participant answers may be chosen to be displayed during the live show.</p>
    </section>
    <section id="ad-banner" class="ad-banner swiper sponsored-swiper">
        <div class="swiper-wrapper">
            <!-- Sponsor 1 -->
            <div class="swiper-slide"
                style="background-image:linear-gradient(90deg, rgba(52, 149, 92, 0.2), rgba(118, 200, 129, .2),rgba(31, 67, 136, 0.2))">
                <div class="sponsor-slide">
                    <img src="{{ asset('assets/img/ryanair logo.png') }}" alt="Ryanair Logo" class="sponsor-logo" />
                    <div class="sponsor-text">
                        <h2>For all your auto air-conditioning needs.</h2>
                        <h3>Check them out: (868) 640-5828</h3>
                    </div>
                </div>
            </div>

            <!-- Sponsor 2 -->
            <div class="swiper-slide"
                style="background-image:linear-gradient(90deg, rgba(43, 110, 235, 0.2), rgba(75, 244, 97, 0.2))">
                <div class="sponsor-slide">
                    <img src="{{ asset('assets/img/mitlin logo.png') }}" alt="Mitlin Logo" class="sponsor-logo" />
                    <div class="sponsor-text">
                        <h2>All your hardware and construction needs.</h2>
                        <h3>Call now: (868) 646-2144</h3>
                    </div>
                </div>
            </div>

            <!-- Sponsor 3 -->
            <div class="swiper-slide"
                style="background-image:linear-gradient(90deg, rgba(255, 255, 255, 0.2), rgba(48, 73, 119, 0.2))">
                <div class="sponsor-slide">
                    <img src="{{ asset('assets/img/OmegaXL logo.png') }}" alt="OmegaXL Logo" class="sponsor-logo" />
                    <div class="sponsor-text">
                        <h2>The ultimate joint health and mobility support supplement.</h2>
                        <h3>Get your bottle of OmegaXL today!</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="banner-1" class="banner">
        <h1 class="text-center" style="font-weight: 900">Reach Larger Audiences, <a href="{{ route('advertise') }}"
                style="color: var(--default-color)">Advertise
                with Us</a></h1>
    </section>
    <!--<section id="ad-banner" class="ad-banner swiper sponsored-swiper">
        <div class="ad-banner-title">
            <h2 class="text-xl font-bold text-center" style="font-weight: 900; color: var(--heading-color)">
                Sponsored
            </h2>
        </div>
        <div class="swiper-wrapper">
            <!-- Sponsor 1 -->
    <!--<div class="swiper-slide"
                style="background-image:linear-gradient(90deg, rgba(255, 255, 255, 0.2), rgba(48, 73, 119, 0.2))">
                <div class="sponsor-slide">
                    <img src="{{ asset('assets/img/OmegaXL logo.png') }}" alt="OmegaXL Logo" class="sponsor-logo" />
                    <div class="sponsor-text">
                        <h2>Live long stay strong!</h2>
                        <h3>Get your bottle of OmegaXL today!</h3>
                    </div>
                </div>
            </div>


            <!-- Sponsor 2 -->
    <!--<div class="swiper-slide"
                style="background-image:linear-gradient(90deg, rgba(43, 110, 235, 0.2), rgba(75, 244, 97, 0.2))">
                <div class="sponsor-slide">
                    <img src="{{ asset('assets/img/mitlin logo.png') }}" alt="Mitlin Logo" class="sponsor-logo" />
                    <div class="sponsor-text">
                        <h2>Find all your construction project needs!</h2>
                        <h3>At #97 Eastern Main Rd. Arouca</h3>
                    </div>
                </div>
            </div>

            <!-- Sponsor 3 -->
    <!--<div class="swiper-slide"
                style="background-image:linear-gradient(90deg, rgba(52, 149, 92, 0.2), rgba(118, 200, 129, .2))">
                <div class="sponsor-slide">
                    <img src="{{ asset('assets/img/ryanair logo.png') }}" alt="Ryanair Logo" class="sponsor-logo" />
                    <div class="sponsor-text">
                        <h2>Quick, reliable auto air-conditioning done right!</h2>
                        <h3>Find them at #41 Cane Farm Road, Tacarigua</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="merchandise" class="merch-section dark-background">
        <h2 class="text-xl font-bold text-center mb-4" style="font-style: italic; color: var(--heading-color);">
            Official
            Merchandise</h2>
        <div class="merch-wrapper">
            <div class="merch-grid collapse-container">
                <div class="shirt-item" data-img="{{ asset('assets/img/observer black polo.png') }}"
                    data-name="Observer Black Polo">
                    <img src="{{ asset('assets/img/observer black polo.png') }}" alt="Observer Black Polo">
                    <p>Observer Polo Black</p>
                    <p>Sizes: S, M, L, XL, XXL</p>
                    <p>Material: Cotton</p>
                </div>
                <!-- Add more shirts as needed -->
    <!--<div class="shirt-item" data-img="{{ asset('assets/img/observer blue polo.png') }}"
                    data-name="Observer Blue Polo">
                    <img src="{{ asset('assets/img/observer blue polo.png') }}" alt="Observer Blue Polo">
                    <p>Observer Polo Blue</p>
                    <p>Sizes: S, M, L, XL, XXL</p>
                    <p>Material: Cotton</p>
                </div>
                <div class="shirt-item" data-img="{{ asset('assets/img/observer white polo.png') }}"
                    data-name="Observer White Polo">
                    <img src="{{ asset('assets/img/observer white polo.png') }}" alt="Observer White Polo">
                    <p>Observer Polo White</p>
                    <p>Sizes: S, M, L, XL, XXL</p>
                    <p>Material: Cotton</p>
                </div>
                <div class="shirt-item" data-img="{{ asset('assets/img/observer grey polyester polo.png') }}"
                    data-name="Observer Grey Polyester Polo">
                    <img src="{{ asset('assets/img/observer grey polyester polo.png') }}"
                        alt="Observer Grey Polyester Polo">
                    <p>Observer Polo Grey</p>
                    <p>Sizes: S, M, L, XL, XXL</p>
                    <p>Material: Polyester</p>
                </div>
                <div class="shirt-item" data-img="{{ asset('assets/img/observer purple polyester polo.png') }}"
                    data-name="Observer Purple Polyester Polo">
                    <img src="{{ asset('assets/img/observer purple polyester polo.png') }}"
                        alt="Observer Purple Polyester Polo">
                    <p>Observer Polo Purple</p>
                    <p>Sizes: S, M, L, XL, XXL</p>
                    <p>Material: Polyester</p>
                </div>
                <div class="shirt-item" data-img="{{ asset('assets/img/observer blue polyester polo.png') }}"
                    data-name="Observer Blue Polyester Polo">
                    <img src="{{ asset('assets/img/observer blue polyester polo.png') }}"
                        alt="Observer Blue Polyester Polo">
                    <p>Observer Polo Navy Blue</p>
                    <p>Sizes: S, M, L, XL, XXL</p>
                    <p>Material: Polyester</p>
                </div>
            </div>
            <div class="fade-overlay"></div>
            <button class="expand-button" onclick="expandSection(this)">▼</button>
        </div>

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
    <br>

    </section>

    <!-- Contact Section -->
    <!--<section id="contact" class="contact section">

        <!-- Section Title -->
    <!--<h2 class="text-xl font-bold text-center mb-4" style="font-style: italic; color: var(--heading-color);">
            Contact
            Info</h2>

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">
                <div class="row gy-4">

                    <div class="col-lg-12">
                        <div class="info-item d-flex flex-column justify-content-center align-items-center"
                            data-aos="fade-up" data-aos-delay="200">
                            <i class="bi bi-geo-alt"></i>
                            <h3>Address</h3>
                            <p>#142 Munroe Road</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="info-item d-flex flex-column justify-content-center align-items-center"
                            data-aos="fade-up" data-aos-delay="300">
                            <i class="bi bi-telephone"></i>
                            <h3>Call</h3>
                            <p>+1 868 494-0938</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="info-item d-flex flex-column justify-content-center align-items-center"
                            data-aos="fade-up" data-aos-delay="400">
                            <i class="bi bi-envelope"></i>
                            <h3>Email</h3>
                            <p>observertrinidad@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section> /Contact Section -->

    <!-- Floating Navigation Box
    <nav id="floating-nav"
        style="position: fixed; top: 80px; right: 32px; z-index: 9999; background: var(--surface-color, #fff); border: 2px solid var(--accent-color, #3a7); border-radius: 16px; box-shadow: 0 4px 24px rgba(0,0,0,0.12); padding: 1.2rem 1.5rem; min-width: 180px; transition: box-shadow 0.2s; opacity: 0.95;">
        <ul style="list-style: none; margin: 0; padding: 0;">
            <li style="margin-bottom: 1rem;"><a href="#latest-interviews" class="floating-link">∘ Interviews</a></li>
            <li style="margin-bottom: 1rem;"><a href="#schedule" class="floating-link">∘ About The Show</a></li>
            <li style="margin-bottom: 1rem;"><a href="#question" class="floating-link">∘ Question Of The Week</a></li>
            <li style="margin-bottom: 1rem;"><a href="#merchandise" class="floating-link">∘ Merchandise</a></li>
            <li><a href="#contact" class="floating-link">∘ Contact</a></li>
        </ul>
    </nav>-->

    <style>
        #floating-nav:hover {
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.18);
            opacity: 1;
        }

        #floating-nav .floating-link {
            color: var(--accent-color, #3a7);
            text-decoration: none;
            font-weight: 600;
            font-size: 1rem;
            transition: color 0.2s;
        }

        #floating-nav .floating-link:hover {
            color: var(--heading-color, #222);
            text-decoration: underline;
        }

        @media (max-width: 991px) {
            #floating-nav {
                display: none;
            }
        }
    </style>
</main>

@endsection
