<!--@extends('layouts.app')

@section('title', 'Home')

@section('content')
<main class="main">
-->
    <!-- Page Title -->
{{--    <div class="page-title dark-background" data-aos="fade"
        style="background-image: url(assets/img/page-title-bg.webp);">
        <div class="container position-relative">
            <h1>Project Details</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="current">{{ $project->short_title }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Portfolio Details Section -->
    <section id="portfolio-details" class="portfolio-details section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="project-details-layout">
                <!-- Image Carousel (Restored) -->
                <div class="project-images swiper init-swiper">
                    <script type="application/json" class="swiper-config">
                        {
                          "loop": true,
                          "speed": 600,
                          "autoplay": {
                            "delay": 5000,
                            "disableOnInteraction": false
                          },
                          "slidesPerView": 1,
                          "pagination": {
                            "el": ".swiper-pagination",
                            "clickable": true
                          }
                        }
                    </script>

                    @if (!empty($project->images))
                    @php $images = json_decode($project->images, true); @endphp
                    @if (is_array($images))
                    <div class="swiper-wrapper">
                        @foreach ($images as $image)
                        <div class="swiper-slide">
                            <img src="{{ getOptimizedImagePath($image) }}" alt="Project image" loading="lazy"
                                decoding="async">
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                    @else
                    <p>⚠️ Failed to decode images.</p>
                    @endif
                    @else
                    <p>No images found.</p>
                    @endif
                </div>

                <!-- Info Section -->
                <div class="project-info">
                    <div class="info-chips">
                        <div class="chip"><strong>Category:</strong> {{ $project->category }}</div>
                        <div class="chip"><strong>Client:</strong> {{ $project->client }}</div>
                        <div class="chip"><strong>Date:</strong> {{
                            \Carbon\Carbon::parse($project->project_date)->format('d F, Y') }}</div>
                        <div class="chip"><strong>URL:</strong> <a href="{{ $project->project_url }}" target="_blank">{{
                                $project->project_url }}</a></div>
                    </div>

                    <div class="project-description">
                        <h2>{{ $project->title }}</h2>
                        <p>{{ $project->description }}</p>
                    </div>
                </div>
            </div>

        </div>
    </section>

</main>
<!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll('.init-swiper').forEach(swiperEl => {
            // Fallback config if swiper-config is missing or ignored
            let config = {
                loop: true,
                speed: 600,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false
                },
                slidesPerView: 1,
                pagination: {
                    el: swiperEl.querySelector('.swiper-pagination'),
                    clickable: true
                }
            };

            // Try to load JSON config if present
            const configEl = swiperEl.querySelector('.swiper-config');
            if (configEl) {
                try {
                    const parsed = JSON.parse(configEl.textContent);
                    config = Object.assign(config, parsed);
                } catch (e) {
                    console.warn('Invalid swiper-config JSON:', e);
                }
            }

            new Swiper(swiperEl, config);
        });
    });
</script>
@endsection
--}}
