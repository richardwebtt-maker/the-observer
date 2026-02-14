@extends('layouts.app')

@section('content')
<br>
<br>
<br>
<br>
<br>
<div class="container py-5">

    <h1 class="mb-4" style="color: var(--heading-color)">Interview Archive</h1>

    @if($videos->isEmpty())
    <p>No interviews have been added yet.</p>
    @else
    <div class="row g-4">
        @foreach($videos as $video)
        <div class="col-md-4" style="background-color: #00000000">
            <div class="card shadow-sm" style="background-color: #00000000">
                <div class="video-slide open-video-modal" data-video-id="{{ $video['videoId'] }}"
                    style="cursor: pointer; background-color: #00000000;">
                    <div class="video-box flex items-center rounded-lg overflow-hidden backdrop-blur-md p-2"
                        style="color: var(--default-color); background-color: var(--surface-color)">
                        <div
                            class="thumbnail-container w-48 flex-shrink-0 aspect-video rounded-md overflow-hidden glow-target video-thumb">
                            <img src="{{ $video['thumbnail'] }}" alt="{{ $video['title'] }}"
                                class="w-full h-full object-cover glow-target">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title" style="font-weight: 700">{{ $video['title'] }}</h5>
                            <p class="card-text">{{ $video['description'] }}</p>
                            <p class="small">Published {{ $video['published_at'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>
@endsection
