<?php

namespace App\Http\Controllers;

use App\Services\NewsTickerService;
use App\Services\YouTubeService;
use Illuminate\Support\Facades\Cache;

class VideoController extends Controller
{
    public function showLatest(YouTubeService $yt)
    {
        $videos = $yt->getLatestVideos(7);

        return view('video.latest', [
            'latestVideo' => $videos->first(),
            'videos' => $videos->slice(1),
        ]);
    }

    // ✅ Videos archive page
    public function index(YouTubeService $yt, NewsTickerService $newsTicker)
    {
        $videos = $yt->getLatestVideos(12);

        $headlines = Cache::remember(
            'news_ticker_headlines',
            now()->addMinutes(30),
            fn () => $newsTicker->fetchHeadlines()
        );

        return view('videos', [
            'latestVideo' => $videos->first(),
            'videos' => $videos->slice(1),
            'headlines' => collect($headlines),
        ]);
    }
}
