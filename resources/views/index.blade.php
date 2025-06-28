@extends('layouts.app')

@section('title', 'Home')

@section('content')

<main class="main">

    <!-- New Hero Section -->
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <section id="hero" class="featured-interview section py-5">
        <div class="container">
            <div class="row gy-4 justify-content-center">
                <!-- Left Column: Featured Video -->
                <div class="col-12 col-lg-5" data-aos="fade-up" data-aos-delay="100" style="text-align: center">
                    <h3 class="mb-3 text-accent" style="font-style: italic">Featured Interview</h3>
                    <!--@if($latestVideo)
                    <div class="youtube-preview" data-id="{{ $latestVideo['videoId'] }}">
                        <div
                            class="thumb-container relative cursor-pointer aspect-video w-full rounded-lg overflow-hidden shadow-lg glow-target">
                            <img src="https://img.youtube.com/vi/{{ $latestVideo['videoId'] }}/maxresdefault.jpg"
                                alt="{{ $latestVideo['title'] }}" class="w-full h-full object-cover glow-target">
                            <div class="absolute inset-0 flex items-center justify-center">
                                <i
                                    class="bi bi-play-circle-fill text-white text-6xl opacity-80 hover:opacity-100 transition"></i>
                            </div>
                        </div>
                        <h4 class="mt-3 text-lg font-semibold text-heading text-center glow-target">{!!
                            $latestVideo['title'] !!}</h4>
                        <p class="text-sm text-center glow-target">{!! $latestVideo['description'] !!}</p>
                    </div>
                    @else
                    <p class="text-center">No featured interview available.</p>
                    @endif-->
                </div>

                <!-- Right Column: Description -->
                <div class="col-12 col-lg-5" data-aos="fade-up" data-aos-delay="250"
                    style="border-left: 3px solid var(--accent-color); border-radius: 3px;">
                    <div class="content" style="padding-top: 3.5rem;">
                        <h2 class="text-l font-bold mb-3 text-heading" style="font-family: Noto Serif Display">Welcome
                            to</h2>
                        <h1 class="text-2xl font-bold"
                            style="font-weight: 800; font-size: 3.5rem; font-family: Noto Serif Display">The Observer
                        </h1>
                        <ul class="list-unstyled">
                            <br>
                            <br>
                            <li class="glow-pulse-hover mb-3">
                                <span>
                                    Hosted by decorated media personality, Mikee K, The Observer is a primetime media
                                    program targeted toward theLorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Integer dapibus at erat id viverra. Curabitur blandit urna id ex tempus dapibus.
                                    Curabitur lobortis erat ac finibus scelerisque. Maecenas sagittis laoreet mi a
                                    mattis. Vestibulum a arcu neque. Quisque nec tincidunt enim, a placerat eros. Morbi
                                    molestie tempor tortor in ullamcorper. Praesent gravida nunc ut risus suscipit, ut
                                    suscipit nisi dictum. Sed eget lectus in leo fermentum dignissim.
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
    </section>

    <!-- Latest Videos Carousel -->
    <section class="latest-videos-section px-2 py-8">
        <h2 class="text-xl font-bold text-center mb-4" style="font-style: italic; color: var(--heading-color);">Latest
            Interviews</h2>

        <div class="relative px-2">
            <div class="swiper latest-videos-swiper">
                <div class="swiper-wrapper">
                    @foreach ($videos as $video)
                    <div class="swiper-slide youtube-preview cursor-pointer" data-id="{{ $video['videoId'] }}">
                        <div class="video-box flex items-center gap-4 rounded-lg overflow-hidden backdrop-blur-md p-4">
                            <div
                                class="thumbnail-container w-48 flex-shrink-0 aspect-video rounded-md overflow-hidden glow-target">
                                <img src="https://img.youtube.com/vi/{{ $video['videoId'] }}/mqdefault.jpg"
                                    alt="{{ $video['title'] }}" class="w-full h-full object-cover glow-target">
                            </div>
                            <div class="video-info text-left">
                                <h4 class="text-base glow-target">{!! $video['title'] !!}</h4>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Navigation Arrows -->
                <div class="swiper-button-prev !text-white !left-0"></div>
                <div class="swiper-button-next !text-white !right-0"></div>
            </div>
        </div>
    </section>

    <!-- Mobile Video List (Visible Only on Mobile Devices) -->
    <div class="mobile-video-list block">
        @foreach ($videos as $video)
        <div class="video-box flex items-center gap-4 rounded-lg overflow-hidden p-4 mb-4 cursor-pointer youtube-preview"
            data-id="{{ $video['videoId'] }}">
            <div class="thumbnail-container w-32 sm:w-36 md:w-40 flex-shrink-0 aspect-video rounded-md overflow-hidden">
                <img src="https://img.youtube.com/vi/{{ $video['videoId'] }}/mqdefault.jpg" alt="{{ $video['title'] }}"
                    class="w-full h-full object-cover">
            </div>
            <div class="video-info text-left">
                <h4 class="text-base leading-snug">{!! $video['title'] !!}</h4>
            </div>
        </div>
        @endforeach
    </div>

    <section id="merchandise" class="merch-section dark-background">
        <h2 class="text-xl font-bold text-center mb-4" style="font-style: italic; color: var(--heading-color);">Official
            Merchandise</h2>
        <div class="merch-grid">
            <div class="shirt-item" data-img="{{ asset('assets/img/observer black polo.png') }}"
                data-name="Observer Black Polo">
                <img src="{{ asset('assets/img/observer black polo.png') }}" alt="Observer Black Polo">
                <p>Observer Polo Black</p>
                <p>Sizes: S, M, L, XL, XXL</p>
                <p>Material: Cotton</p>
            </div>
            <!-- Add more shirts as needed -->
            <div class="shirt-item" data-img="{{ asset('assets/img/observer blue polo.png') }}"
                data-name="Observer Blue Polo">
                <img src="{{ asset('assets/img/observer blue polo.png') }}" alt="Observer Blue Polo">
                <p>Observer Polo Blue</p>
                <p>Sizes: S, M, L, XL, XXL</p>
                <p>Material: Cotton</p>
            </div>
            <div class="shirt-item" data-img="{{ asset('assets/img/observer white polo.png') }}"
                data-name="Observer White Polo">
                <img src="{{ asset('assets/img/observer White polo.png') }}" alt="Observer White Polo">
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
        <!-- Modal -->
        <div id="shirtModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <img id="modalImage" src="" alt="">
                <div id="modalFormContainer">
                    <button id="requestBtn">Request Shirt</button>
                    <form method="POST" action="{{ route('shirt.request') }}" id="shirtRequestForm"
                        style="display: none;">
                        @csrf
                        <input type="hidden" name="shirtName" id="shirtNameInput">

                        <label>Size:</label>
                        <div class="radio-group">
                            @foreach (['S', 'M', 'L', 'XL', 'XXL'] as $size)
                            <label><input type="radio" name="size" value="{{ $size }}" required> {{ $size }}</label>
                            @endforeach
                        </div>

                        <label>Phone Number:
                            <input type="text" name="phone" required>
                        </label>

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
            </div>
        </div>
        <br>
        <p class="text-center" style="scale: .75; font-style: italic">Merchandise sales are not processed on this site.
            Users can request merchandise for
            purchase and collection after discussion with our merchandising team.</p>
    </section>

    <!--question Section -->
    <section id="question" class="question section"
        style="background-image: linear-gradient(180deg, var(--background-color) 96%, var(--surface-color) 100%)">
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
                {{ $question }}
            </h1>
            <br>
            <button type="button" id="showAnswerForm">Submit your answer</button>

            <div id="answerFormContainer" style="display: none; margin-top: 1rem;">
                <form method="POST" action="{{ route('question.answer') }}" id="questionAnswerForm">
                    @csrf

                    <label for="answer">Your Answer:</label>
                    <textarea name="answer" id="answer" rows="4" required></textarea>

                    <label for="name">Your Name (optional):</label>
                    <input type="text" name="name" id="name">

                    <label for="location">Your Town (optional):</label>
                    <input type="text" name="location" id="location">

                    <button type="submit">Send Answer</button>
                </form>

                @if (session('success'))
                <div class="success-message">{{ session('success') }}</div>
                @endif
            </div>

        </div>
        <br>
        <p class="text-center">Participant answers may be chosen to be displayed during the live show.</p>
    </section>

    <!-- Schedule Section -->
    <section id="schedule" class="schedule section dark-background">

        <h2 class="text-xl font-bold text-center mb-4" style="font-style: italic; color: var(--heading-color);">Where to
            Find Us</h2>

    </section><!-- /schedule Section -->

    <!-- Team Section -->
    <!-- <section id="team" class="team section light-background">-->

    <!-- Section Title -->
    <!--<div class="container section-title" data-aos="flip-up" data-aos-delay="300">
        <h2>Team</h2>
        <p>CHECK OUR TEAM</p>
      </div>-->
    <!-- End Section Title -->

    <!-- <div class="container">

      <div class="row gy-5">

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="member">
            <div class="pic"><img src="assets/img/team/team-1.jpg" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>Walter White</h4>
              <span>Chief Executive Officer</span>
              <div class="social">
                <a href=""><i class="bi bi-twitter-x"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>-->
    <!-- End Team Member -->

    <!--<div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="member">
            <div class="pic"><img src="assets/img/team/team-2.jpg" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>Sarah Jhonson</h4>
              <span>Product Manager</span>
              <div class="social">
                <a href=""><i class="bi bi-twitter-x"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>-->
    <!-- End Team Member -->

    <!--<div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
          <div class="member">
            <div class="pic"><img src="assets/img/team/team-3.jpg" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>William Anderson</h4>
              <span>CTO</span>
              <div class="social">
                <a href=""><i class="bi bi-twitter-x"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>-->
    <!-- End Team Member -->
    <!--
      </div>

    </div>

    </section>-->
    <!-- /Team Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

        <!-- Section Title -->
        <div class="container section-title glow-pulse-hover" data-aos="flip-up" data-aos-delay="300">
            <h2>Contact</h2>
            <p>Necessitatibus eius consequatur</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">
                <div class="col-lg-6 ">
                    <div class="row gy-4">

                        <div class="col-lg-12">
                            <div class="info-item d-flex flex-column justify-content-center align-items-center"
                                data-aos="fade-up" data-aos-delay="200">
                                <i class="bi bi-geo-alt"></i>
                                <h3>Address</h3>
                                <p>A108 Adam Street, New York, NY 535022</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="col-md-6">
                            <div class="info-item d-flex flex-column justify-content-center align-items-center"
                                data-aos="fade-up" data-aos-delay="300">
                                <i class="bi bi-telephone"></i>
                                <h3>Call Us</h3>
                                <p>+1 5589 55488 55</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="col-md-6">
                            <div class="info-item d-flex flex-column justify-content-center align-items-center"
                                data-aos="fade-up" data-aos-delay="400">
                                <i class="bi bi-envelope"></i>
                                <h3>Email Us</h3>
                                <p>info@example.com</p>
                            </div>
                        </div><!-- End Info Item -->

                    </div>
                </div>

                <div class="col-lg-6">
                    <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up"
                        data-aos-delay="500">
                        <div class="row gy-4">

                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                            </div>

                            <div class="col-md-6 ">
                                <input type="email" class="form-control" name="email" placeholder="Your Email"
                                    required="">
                            </div>

                            <div class="col-md-12">
                                <input type="text" class="form-control" name="subject" placeholder="Subject"
                                    required="">
                            </div>

                            <div class="col-md-12">
                                <textarea class="form-control" name="message" rows="4" placeholder="Message"
                                    required=""></textarea>
                            </div>

                            <div class="col-md-12 text-center">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>

                                <button type="submit">Send Message</button>
                            </div>

                        </div>
                    </form>
                </div><!-- End Contact Form -->

            </div>

        </div>

    </section><!-- /Contact Section -->

</main>

@endsection
