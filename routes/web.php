<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionAnswerController;
use App\Http\Controllers\ShirtRequestController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('/shirt-request', [ShirtRequestController::class, 'send'])->name('shirt.request');
Route::post('/question-answer', [QuestionAnswerController::class, 'send'])->name('question.answer');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/upload', [VideoController::class, 'showUploadForm'])->name('video.upload.form');
    Route::post('/admin/upload', [VideoController::class, 'upload'])->name('video.upload');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
