<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VideoController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'video' => 'required|file|mimes:mp4,mov,avi,webm',
        ]);

        $response = Http::withToken(config('services.cloudflare.api_token'))
            ->attach('file', fopen($request->file('video'), 'r'), $request->file('video')->getClientOriginalName())
            ->post(config('services.cloudflare.base_url').'/'.config('services.cloudflare.account_id').'/stream');

        if ($response->failed()) {
            return back()->withErrors(['error' => 'Upload failed']);
        }

        $uid = $response['result']['uid'];

        Video::create([
            'title' => $request->title,
            'cloudflare_video_id' => $uid,
            'published_at' => now(),
        ]);

        return back()->with('success', 'Video uploaded');
    }

    public function showUploadForm()
    {
        return view('videos.upload'); // Blade file at resources/views/videos/upload.blade.php
    }
}
