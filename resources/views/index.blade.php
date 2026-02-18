@extends('layouts.app')

@section('title', 'The Observer')

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

                <div class="thumb-container ratio ratio-16x9 shadow-lg glow-target" data-aos="zoom-out"
                    data-aos-delay="150">
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
            <div class="ad-slot video-side-panel" data-aos="flip-right" data-aos-delay="200">
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

            <div class="video-list" data-aos="fade-down" data-aos-delay="150">
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
            <div class="video-list-mobile" data-aos="fade-down" data-aos-delay="200">
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

    <!-- Schedule Section-->
    <section id="schedule" class="schedule section">
        <div class="live-info-container text-center" data-aos="zoom-out" data-aos-delay="200">
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
        <div class="question-container mt-4" data-aos="fade-up" data-aos-delay="200">
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