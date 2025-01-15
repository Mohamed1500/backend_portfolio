<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');
Route::post('/faq/messages', [MessageController::class, 'store'])->name('messages.store');
Route::patch('/faq/messages/{id}', [MessageController::class, 'update'])->name('messages.update');
Route::delete('/faq/messages/{id}', [MessageController::class, 'destroy'])->name('messages.destroy');
Route::get('/faq/messages/{id}/answer', [FaqController::class, 'showAnswerForm'])->name('faq.showAnswerForm');
Route::patch('/faq/messages/{id}/answer', [FaqController::class, 'answer'])->name('faq.answer');

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/change-birthdate', [ProfileController::class, 'editBirthdate'])->name('profile.editBirthdate');
    Route::patch('/profile/change-birthdate', [ProfileController::class, 'updateBirthdate'])->name('profile.updateBirthdate');
    Route::patch('/profile/{id}/upgrade', [ProfileController::class, 'upgradeToAdmin'])->name('profile.upgrade');
    Route::patch('/profile/{id}/downgrade', [ProfileController::class, 'downgradeToUser'])->name('profile.downgrade');
    
    // Routes voor nieuwsberichten
    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/news', [NewsController::class, 'store'])->name('news.store');
    Route::post('/news/{id}/comments', [NewsController::class, 'storeComment'])->name('news.comment.store');
    Route::delete('/news/{id}', [NewsController::class, 'destroy'])->name('news.destroy');

    Route::post('/admin/users', [ProfileController::class, 'storeUser'])->name('admin.users.store');
});

Route::get('/activities', [ActivityController::class, 'index'])->name('activities.index');
Route::get('/activities/create', [ActivityController::class, 'create'])->name('activities.create');
Route::post('/activities', [ActivityController::class, 'store'])->name('activities.store');

Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');

Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');

require __DIR__.'/auth.php';