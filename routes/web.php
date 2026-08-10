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
