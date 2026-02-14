<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use App\Services\NewsTickerService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    public function boot(NewsTickerService $newsTicker)
{
    View::composer('*', function ($view) use ($newsTicker) {
        $headlines = Cache::remember(
            'news_ticker_headlines',
            now()->addMinutes(30),
            fn () => $newsTicker->fetchHeadlines()
        );

        $view->with('headlines', collect($headlines));
    });
}
}

