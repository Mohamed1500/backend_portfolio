<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\MessageController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');
Route::post('/faq/messages', [MessageController::class, 'store'])->name('messages.store');
Route::patch('/faq/messages/{id}', [MessageController::class, 'update'])->name('messages.update');
Route::delete('/faq/messages/{id}', [MessageController::class, 'destroy'])->name('messages.destroy');
Route::get('/faq/messages/{id}/answer', [FaqController::class, 'showAnswerForm'])->name('faq.showAnswerForm');
Route::patch('/faq/messages/{id}/answer', [FaqController::class, 'answer'])->name('faq.answer');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Routes voor nieuwsberichten
    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/news', [NewsController::class, 'store'])->name('news.store');
});

Route::get('/activities', [ActivityController::class, 'index'])->name('activities.index');
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show'); // Voeg deze route toe

Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

require __DIR__.'/auth.php';