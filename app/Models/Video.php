<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    // Allow mass assignment of these fields
    protected $fillable = [
        'title',
        'description',
        'cloudflare_video_id',
        'published_at',
    ];

    protected $dates = ['published_at'];
}
