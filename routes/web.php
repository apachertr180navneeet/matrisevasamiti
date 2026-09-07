<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\DonationController;

// Admin Controllers
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;
use App\Http\Controllers\Admin\BannerController as AdminBannerController;
use App\Http\Controllers\Admin\CauseController as AdminCauseController;
use App\Http\Controllers\Admin\ProgramController as AdminProgramController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\NewsEventController as AdminNewsEventController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\MemberController as AdminMemberController;
use App\Http\Controllers\Admin\TestimonialController as AdminTestimonialController;
use App\Http\Controllers\Admin\FaqController as AdminFaqController;
use App\Http\Controllers\Admin\CertificateController as AdminCertificateController;
use App\Http\Controllers\Admin\ContactInboxController as AdminContactInboxController;
use App\Http\Controllers\Admin\VolunteerAdminController as AdminVolunteerController;
use App\Http\Controllers\Admin\DonationAdminController as AdminDonationController;

/*
|--------------------------------------------------------------------------
| Public Website Routes
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


/*
|--------------------------------------------------------------------------
| Admin Authentication Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
});


/*
|--------------------------------------------------------------------------
| Protected Admin Dashboard & Management Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/', [AdminDashboardController::class, 'index']);

    // Admin Profile
    Route::get('/profile', [AdminAuthController::class, 'profile'])->name('profile');
    Route::post('/profile', [AdminAuthController::class, 'updateProfile'])->name('profile.update');

    // Site Settings
    Route::get('/settings', [AdminSettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [AdminSettingController::class, 'update'])->name('settings.update');

    // Leads & Communication
    Route::get('/contacts', [AdminContactInboxController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/{contact}', [AdminContactInboxController::class, 'show'])->name('contacts.show');
    Route::post('/contacts/{contact}/status', [AdminContactInboxController::class, 'updateStatus'])->name('contacts.status');
    Route::delete('/contacts/{contact}', [AdminContactInboxController::class, 'destroy'])->name('contacts.destroy');

    Route::get('/volunteers', [AdminVolunteerController::class, 'index'])->name('volunteers.index');
    Route::get('/volunteers/{volunteer}', [AdminVolunteerController::class, 'show'])->name('volunteers.show');
    Route::post('/volunteers/{volunteer}/status', [AdminVolunteerController::class, 'updateStatus'])->name('volunteers.status');
    Route::delete('/volunteers/{volunteer}', [AdminVolunteerController::class, 'destroy'])->name('volunteers.destroy');

    Route::get('/donations', [AdminDonationController::class, 'index'])->name('donations.index');
    Route::get('/donations/{donation}', [AdminDonationController::class, 'show'])->name('donations.show');
    Route::get('/donations/{donation}/receipt', [AdminDonationController::class, 'receipt'])->name('donations.receipt');

    // Content Management CRUD
    Route::resource('banners', AdminBannerController::class);
    Route::resource('causes', AdminCauseController::class);
    Route::resource('programs', AdminProgramController::class);
    Route::resource('projects', AdminProjectController::class);
    Route::resource('news', AdminNewsEventController::class);
    Route::resource('gallery', AdminGalleryController::class);
    Route::resource('members', AdminMemberController::class);
    Route::resource('testimonials', AdminTestimonialController::class);
    Route::resource('certificates', AdminCertificateController::class);
    Route::resource('faqs', AdminFaqController::class);
});
