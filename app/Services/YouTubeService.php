<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class YouTubeService
{
    protected string $apiKey;
    protected string $playlistId;

    public function __construct()
    {
        $this->apiKey = config('services.youtube.key');
        $this->playlistId = config('services.youtube.playlist_id');
    }

    public function getLatestVideos(int $limit = 7)
    {
        return Cache::remember("youtube.playlist.$limit", now()->addMinutes(60), function () use ($limit) {
            $response = Http::get('https://www.googleapis.com/youtube/v3/playlistItems', [
                'key' => $this->apiKey,
                'playlistId' => $this->playlistId,
                'part' => 'snippet',
                'maxResults' => $limit,
            ]);

            if (!$response->ok()) {
                return collect();
            }

            return collect($response->json('items'))
                ->filter(fn ($item) => isset($item['snippet']['resourceId']['videoId']))
                ->map(function ($item) {
                    return [
                        'videoId' => $item['snippet']['resourceId']['videoId'],
                        'title' => $item['snippet']['title'],
                        'description' => $item['snippet']['description'],
                        'thumbnail' => $item['snippet']['thumbnails']['high']['url'],
                    ];
                })
                ->values();
        });
    }
}
