<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionAnswerController;
use App\Http\Controllers\ShirtRequestController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('/shirt-request', [ShirtRequestController::class, 'send'])->name('shirt.request');
Route::post('/question-answer', [QuestionAnswerController::class, 'send'])->name('question.answer');
// Public pages
Route::view('/privacy', 'static.privacy')->name('privacy');
Route::view('/advertise', 'advertise')->name('advertise');

Route::get('/videos', [VideoController::class, 'index'])->name('videos');

Route::view('/merch', 'merchandise')->name('merch');
