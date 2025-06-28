<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class YouTubeService
{
    protected $apiKey;
    protected $channelId;

    public function __construct()
    {
        $this->apiKey = config('services.youtube.key');
        $this->channelId = config('services.youtube.channel_id');
    }

    public function getLatestVideos($maxResults = 6)
    {
        return Cache::remember("youtube.latest_videos.$maxResults", now()->addMinutes(30), function () use ($maxResults) {
            $response = Http::get('https://www.googleapis.com/youtube/v3/search', [
                'key' => $this->apiKey,
                'channelId' => $this->channelId,
                'part' => 'snippet',
                'order' => 'date',
                'maxResults' => $maxResults,
                'type' => 'video',
            ]);

            if (!$response->ok()) {
                return collect();
            }

            return collect($response->json('items'))->filter(function ($item) {
                return isset($item['id']['videoId']);
            })->map(function ($item) {
                return [
                    'title' => $item['snippet']['title'],
                    'description' => $item['snippet']['description'],
                    'videoId' => $item['id']['videoId'],
                    'thumbnail' => $item['snippet']['thumbnails']['high']['url'],
                ];
            });
        });
    }

    public function getLatestVideo()
    {
        return Cache::remember('youtube.latest_video', now()->addMinutes(30), function () {
            $response = Http::get('https://www.googleapis.com/youtube/v3/search', [
                'key' => $this->apiKey,
                'channelId' => $this->channelId,
                'part' => 'snippet',
                'order' => 'date',
                'maxResults' => 1,
                'type' => 'video',
            ]);

            if ($response->ok() && isset($response['items'][0])) {
                $item = $response['items'][0];

                return [
                    'videoId' => $item['id']['videoId'],
                    'title' => $item['snippet']['title'],
                    'description' => $item['snippet']['description'],
                    'thumbnail' => $item['snippet']['thumbnails']['high']['url'],
                ];
            }

            return null;
        });
    }

    public function getVideoData($videoId)
    {
        return Cache::remember("youtube.video_data.$videoId", now()->addHours(6), function () use ($videoId) {
            $response = Http::get('https://www.googleapis.com/youtube/v3/videos', [
                'key' => $this->apiKey,
                'part' => 'snippet',
                'id' => $videoId,
            ]);

            if ($response->ok() && isset($response['items'][0])) {
                return [
                    'title' => $response['items'][0]['snippet']['title'],
                    'description' => $response['items'][0]['snippet']['description'],
                ];
            }

            return null;
        });
    }
}
