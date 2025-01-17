<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::get('/', function () {
    return view('welcome');
});

// Openbaar toegankelijke routes
Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');
Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');
Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/activities', [ActivityController::class, 'index'])->name('activities.index');
Route::get('/faq/messages/{id}/answer', [FaqController::class, 'showAnswerForm'])->name('faq.showAnswerForm');

// **Dashboard Route toegankelijk voor iedereen**
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Routes voor activiteiten (alleen voor ingelogde gebruikers)
Route::middleware('auth')->group(function () {
    Route::post('/faq/messages', [MessageController::class, 'store'])->name('messages.store');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/change-birthdate', [ProfileController::class, 'editBirthdate'])->name('profile.editBirthdate');
    Route::patch('/profile/change-birthdate', [ProfileController::class, 'updateBirthdate'])->name('profile.updateBirthdate');

    Route::post('/news/{id}/comments', [NewsController::class, 'storeComment'])->name('news.comment.store');
   
});

// Routes voor activiteiten (alle gebruikers kunnen deze bekijken)

Route::middleware(['auth','isAdmin'])->group(function () {
    Route::get('/activities/create', [ActivityController::class, 'create'])->name('activities.create');
    Route::post('/activities', [ActivityController::class, 'store'])->name('activities.store');
    Route::post('/admin/users', [ProfileController::class, 'storeUser'])->name('admin.users.store');
    Route::delete('/news/{id}', [NewsController::class, 'destroy'])->name('news.destroy');
    Route::post('/news', [NewsController::class, 'store'])->name('news.store');
    Route::get('/news/create/h', [NewsController::class, 'create'])->name('news.create');
    Route::patch('/profile/{id}/upgrade', [ProfileController::class, 'upgradeToAdmin'])->name('profile.upgrade');
    Route::patch('/profile/{id}/downgrade', [ProfileController::class, 'downgradeToUser'])->name('profile.downgrade');
    Route::patch('/faq/messages/{id}/answer', [FaqController::class, 'answer'])->name('faq.answer');
    Route::delete('/faq/messages/{id}', [MessageController::class, 'destroy'])->name('messages.destroy');
    Route::patch('/faq/messages/{id}', [MessageController::class, 'update'])->name('messages.update');
    Route::delete('/activities/{id}', [ActivityController::class, 'destroy'])->name('activities.destroy');


});

// Routes voor nieuws (alle gebruikers kunnen deze bekijken)

require __DIR__.'/auth.php';
