<?php
/*
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'short_title',
        'short_description',
        'description',
        'category',
        'category_filter',
        'client',
        'project_date',
        'project_url',
        'thumbnail',
        'images',
    ];

    protected static function booted()
    {
        static::creating(function ($project) {
            $project->slug = static::generateUniqueSlug($project->title);
        });

        static::updating(function ($project) {
            if ($project->isDirty('title')) {
                $project->slug = static::generateUniqueSlug($project->title, $project->id);
            }
        });
    }

    protected static function generateUniqueSlug($title, $ignoreId = null)
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $count = 2;

        while (static::where('slug', $slug)->when($ignoreId, function ($query, $id) {
            return $query->where('id', '!=', $id);
        })->exists()) {
            $slug = $originalSlug.'-'.$count++;
        }

        return $slug;
    }
}
*/
