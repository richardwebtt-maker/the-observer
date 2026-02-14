@extends('layouts.app')

@section('title', 'Videos')

@section('content')


<style>
    .video-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        gap: 1.5rem;
        max-width: 1100px;
        margin: 0 auto;
    }

    .video-card {
        text-decoration: none;
        color: var(--text-color);
        display: block;
        transition: transform .25s ease, box-shadow .25s ease;
        border-radius: 5px;
    }

    .video-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, .25);
    }

    .video-title {
        margin-top: .5rem;
        font-size: .95rem;
        font-weight: 600;
    }

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

    .video-thumb-wrap {
        position: relative;
        border-radius: 10px;
        overflow: hidden;
        aspect-ratio: 16 / 9;
    }

    .video-thumb-wrap img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .video-card:hover img {
        transform: scale(1.06);
    }

    /* overlay */
    .video-overlay {
        position: absolute;
        inset: 0;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background: rgba(0, 0, 0, .55);
        opacity: 0;
        transition: opacity .25s ease;
    }

    .video-card:hover .video-overlay {
        opacity: 1;
    }

    /* play button */
    .play-btn {
        border: none;
        background: rgba(255, 255, 255, .15);
        backdrop-filter: blur(6px);
        color: white;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        font-size: 1.8rem;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: .8rem;
    }

    /* share row */
    .share-row {
        display: flex;
        gap: .75rem;
    }

    .share-row a,
    .share-row button {
        border: none;
        background: rgba(255, 255, 255, .15);
        backdrop-filter: blur(6px);
        color: white;
        width: 38px;
        height: 38px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        cursor: pointer;
        transition: transform .2s ease, background .2s ease;
    }

    .share-row a:hover,
    .share-row button:hover {
        transform: scale(1.15);
        background: rgba(255, 255, 255, .3);
    }
</style>
<main class="main">

    <!-- New Hero Section -->
    <br>
    <br>
    <br>
    <br>
    <section id="latest-interviews" class="latest-videos-section px-2 py-4">

        <h2 class="text-xl font-bold text-center mb-4" style="font-style: italic; color: var(--heading-color);">
            Recent Interviews
        </h2>

        <div class="video-grid">
            @foreach ($videos as $video)
            <div class="video-card">

                <div class="video-thumb-wrap open-video-modal" data-video-id="{{ $video['videoId'] }}">

                    <img src="{{ $video['thumbnail'] }}" alt="{{ $video['title'] }}">

                    <!-- overlay -->
                    <div class="video-overlay">
                        <button class="play-btn">
                            <i class="bi bi-play-fill"></i>
                        </button>

                        <div class="share-row">
                            <a target="_blank"
                                href="https://wa.me/?text={{ urlencode($video['title'].' https://youtube.com/watch?v='.$video['videoId']) }}">
                                <i class="bi bi-whatsapp"></i>
                            </a>

                            <a target="_blank"
                                href="https://www.facebook.com/sharer/sharer.php?u=https://youtube.com/watch?v={{ $video['videoId'] }}">
                                <i class="bi bi-facebook"></i>
                            </a>

                            <a target="_blank"
                                href="https://twitter.com/intent/tweet?url=https://youtube.com/watch?v={{ $video['videoId'] }}">
                                <i class="bi bi-twitter-x"></i>
                            </a>

                            <button class="copy-link" data-link="https://youtube.com/watch?v={{ $video['videoId'] }}">
                                <i class="bi bi-link-45deg"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <h5 class="video-title">{{ $video['title'] }}</h5>
            </div>
            @endforeach
        </div>


    </section>

    <div id="videoModal" class="video-modal">
        <div class="video-modal-content">
            <iframe id="videoFrame" src="" allow="autoplay; encrypted-media; picture-in-picture" allowfullscreen>
            </iframe>
        </div>
    </div>

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

    <script>
        document.querySelectorAll('.copy-link').forEach(btn => {
    btn.addEventListener('click', e => {
        e.stopPropagation();
        navigator.clipboard.writeText(btn.dataset.link);
        btn.innerHTML = '<i class="bi bi-check-lg"></i>';
        setTimeout(() => {
            btn.innerHTML = '<i class="bi bi-link-45deg"></i>';
        }, 1200);
    });
});

    </script>
