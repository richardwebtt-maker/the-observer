<?php

function getOptimizedImagePath($path)
{
    $basePath = storage_path('app/public/'.$path);
    $dir = dirname($basePath);
    $filename = pathinfo($basePath, PATHINFO_FILENAME);
    $extension = pathinfo($basePath, PATHINFO_EXTENSION);
    $webp = "$dir/{$filename}.webp";
    $avif = "$dir/{$filename}.avif";

    if (file_exists($webp)) {
        return asset('storage/'.dirname($path).'/'.$filename.'.webp');
    } elseif (file_exists($avif)) {
        return asset('storage/'.dirname($path).'/'.$filename.'.avif');

        return asset('storage/'.$path);
    }
}
