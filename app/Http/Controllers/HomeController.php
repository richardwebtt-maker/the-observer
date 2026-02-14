<?php

namespace App\Http\Controllers;

use App\Services\NewsTickerService;
use App\Services\YouTubeService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index(
        YouTubeService $yt,
        NewsTickerService $newsTicker
    ) {
        $question = Storage::exists('question.txt')
            ? Storage::get('question.txt')
            : 'What do you call a flying monkey?';

        // YouTube videos
        $videos = $yt->getLatestVideos(7);

        // News ticker headlines (cached)
        $headlines = collect(
            Cache::remember(
                'news_ticker_headlines',
                now()->addMinutes(30),
                fn () => $newsTicker->fetchHeadlines()
            )
        );

        logger('Headlines fetched at: '.now());

        return view('index', [
            'latestVideo' => $videos->first(),
            'videos' => $videos->slice(1),
            'question' => $question,
            'headlines' => $headlines,
        ]);
    }
}
