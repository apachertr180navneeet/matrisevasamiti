<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\DonationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Static & Information Pages
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/programs', [PageController::class, 'programs'])->name('programs');
Route::get('/projects', [PageController::class, 'projects'])->name('projects');
Route::get('/impact', [PageController::class, 'impact'])->name('impact');
Route::get('/certificate', [PageController::class, 'certificate'])->name('certificate');
Route::get('/grants', [PageController::class, 'grants'])->name('grants');
Route::get('/gallery', [PageController::class, 'gallery'])->name('gallery');
Route::get('/media', [PageController::class, 'media'])->name('media');
Route::get('/news', [PageController::class, 'news'])->name('news');
Route::get('/career', [PageController::class, 'career'])->name('career');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');
Route::get('/privacy', [PageController::class, 'privacy'])->name('privacy');
Route::get('/terms', [PageController::class, 'terms'])->name('terms');
Route::get('/disclaimer', [PageController::class, 'disclaimer'])->name('disclaimer');

// Volunteer Routes
Route::get('/volunteer', [VolunteerController::class, 'index'])->name('volunteer.index');
Route::post('/volunteer', [VolunteerController::class, 'submit'])->name('volunteer.submit');
Route::post('/process-volunteer', [VolunteerController::class, 'submit']); // Legacy fallback

// Contact Routes
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
Route::post('/process-contact', [ContactController::class, 'submit']); // Legacy fallback

// Donation & CCAvenue Gateway Routes
Route::get('/donate', [DonationController::class, 'index'])->name('donate.index');
Route::post('/donate/process', [DonationController::class, 'process'])->name('donate.process');
Route::post('/ccavRequestHandler', [DonationController::class, 'process']); // Legacy fallback
Route::match(['get', 'post'], '/donate/response', [DonationController::class, 'response'])->name('donate.response');
Route::match(['get', 'post'], '/ccavResponseHandler', [DonationController::class, 'response']); // Legacy fallback
