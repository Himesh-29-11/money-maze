<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/insights', [PageController::class, 'insights'])->name('insights');
Route::get('/insights/{slug}', [PageController::class, 'insightDetail'])->name('insights.show');
Route::get('/media-features', [PageController::class, 'media'])->name('media');
Route::get('/books', [PageController::class, 'books'])->name('books');
Route::get('/resources', [PageController::class, 'resources'])->name('resources');
Route::get('/testimonials', [PageController::class, 'testimonials'])->name('testimonials');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/calculators/{slug}', [PageController::class, 'calculator'])->name('calculators.show');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminContentController;
use App\Http\Controllers\Admin\AdminArticleController;
use App\Http\Controllers\Admin\AdminTestimonialController;
use App\Http\Controllers\Admin\AdminMediaController;
use App\Http\Controllers\Admin\AdminBookController;
use App\Http\Controllers\Admin\AdminLinkController;
use App\Http\Controllers\Admin\AdminMessageController;
use App\Http\Controllers\Admin\AdminUploadController;

Route::get('/login', fn () => redirect()->route('admin.login'))->name('login');
Route::get('/admin/login', [AdminAuthController::class, 'show'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.post');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/content', [AdminContentController::class, 'index'])->name('content');
    Route::post('/content', [AdminContentController::class, 'update'])->name('content.update');
    Route::get('/messages', [AdminMessageController::class, 'index'])->name('messages');
    Route::post('/upload', [AdminUploadController::class, 'store'])->name('upload');
    Route::resource('articles', AdminArticleController::class)->parameters(['articles' => 'article']);
    Route::resource('testimonials', AdminTestimonialController::class)->parameters(['testimonials' => 'testimonial']);
    Route::resource('media', AdminMediaController::class)->parameters(['media' => 'media']);
    Route::resource('books', AdminBookController::class)->parameters(['books' => 'book']);
    Route::resource('links', AdminLinkController::class)->except(['create', 'show', 'edit'])->parameters(['links' => 'link']);
});
