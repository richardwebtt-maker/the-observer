<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $question = Storage::exists('question.txt')
            ? Storage::get('question.txt')
            : 'What do you call a flying monkey? In your opinion is Government rightfully doing enough by the victims of assalt and black pepper?';

        // Fetch latest videos (sorted newest first)
        $videos = Video::orderBy('published_at', 'desc')->get();

        return view('index', [
            'latestVideo' => $videos->first(), // Most recent for featured section
            'videos' => $videos->skip(1)->take(5), // 5 latest interviews after featured
            'question' => $question,
        ]);
    }
}
