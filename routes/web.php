<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
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
use App\Http\Controllers\Admin\GrantController as AdminGrantController;
use App\Http\Controllers\Admin\CareerController as AdminCareerController;
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
Route::get('/news', [PageController::class, 'news'])->name('news');
Route::get('/blogs', [PageController::class, 'blogs'])->name('blogs');
Route::redirect('/ngo-news', '/news', 301);
Route::redirect('/ngo-news.php', '/news', 301);
Route::redirect('/blogs.php', '/blogs', 301);
Route::redirect('/media.php', '/news', 301);
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
| Legacy Website Routes (/perviouswebsite & /public/perviouswebsite)
|--------------------------------------------------------------------------
*/
$handleLegacySite = function ($file = '') {
    $file = ltrim($file, '/');
    if (empty($file) || $file === '/') {
        $file = 'index.php';
    }
    
    // Resolve target path across public and base directories
    $possiblePaths = [
        public_path('perviouswebsite/' . $file),
        public_path('previouswebsite/' . $file),
        base_path('perviouswebsite/' . $file),
    ];
    
    $targetPath = null;
    foreach ($possiblePaths as $p) {
        if (file_exists($p) && is_file($p)) {
            $targetPath = $p;
            break;
        }
        if (file_exists($p . '.php') && is_file($p . '.php')) {
            $targetPath = $p . '.php';
            break;
        }
        if (is_dir($p) && file_exists($p . '/index.php')) {
            $targetPath = $p . '/index.php';
            break;
        }
    }
    
    if (!$targetPath) {
        abort(404, 'Legacy website file not found.');
    }
    
    $extension = strtolower(pathinfo($targetPath, PATHINFO_EXTENSION));
    $staticTypes = [
        'css'   => 'text/css',
        'js'    => 'application/javascript',
        'jpg'   => 'image/jpeg',
        'jpeg'  => 'image/jpeg',
        'png'   => 'image/png',
        'gif'   => 'image/gif',
        'svg'   => 'image/svg+xml',
        'webp'  => 'image/webp',
        'ico'   => 'image/x-icon',
        'pdf'   => 'application/pdf',
        'woff'  => 'font/woff',
        'woff2' => 'font/woff2',
        'ttf'   => 'font/ttf',
    ];
    
    if (isset($staticTypes[$extension])) {
        return response()->file($targetPath, ['Content-Type' => $staticTypes[$extension]]);
    }
    
    // Execute legacy PHP script within its directory context
    chdir(dirname($targetPath));
    ob_start();
    include $targetPath;
    $output = ob_get_clean();
    
    return response($output)->header('Content-Type', 'text/html; charset=UTF-8');
};

Route::any('/perviouswebsite/{file?}', $handleLegacySite)->where('file', '.*');
Route::any('/previouswebsite/{file?}', $handleLegacySite)->where('file', '.*');
Route::any('/public/perviouswebsite/{file?}', $handleLegacySite)->where('file', '.*');
Route::any('/public/previouswebsite/{file?}', $handleLegacySite)->where('file', '.*');


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

    // Home Page Content / Sections Manager
    Route::get('/home-sections', [AdminSettingController::class, 'homeSections'])->name('home-sections.index');
    Route::post('/home-sections', [AdminSettingController::class, 'updateHomeSections'])->name('home-sections.update');

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
    Route::resource('grants', AdminGrantController::class);
    Route::resource('careers', AdminCareerController::class);
    Route::resource('faqs', AdminFaqController::class);
});

/*
|--------------------------------------------------------------------------
| Server Maintenance & Utility Routes (Run without SSH/Terminal)
|--------------------------------------------------------------------------
*/
Route::get('/run-migrate', function () {
    try {
        Artisan::call('migrate', ['--force' => true]);
        return '<pre style="background:#111;color:#0f0;padding:20px;font-size:16px;">Migration Result:<br>' . Artisan::output() . '</pre>';
    } catch (\Exception $e) {
        return '<pre style="background:#111;color:#f33;padding:20px;font-size:16px;">Error:<br>' . $e->getMessage() . '</pre>';
    }
});

Route::get('/run-seed', function () {
    try {
        Artisan::call('db:seed', ['--force' => true]);
        return '<pre style="background:#111;color:#0f0;padding:20px;font-size:16px;">Seeder Result:<br>' . Artisan::output() . '</pre>';
    } catch (\Exception $e) {
        return '<pre style="background:#111;color:#f33;padding:20px;font-size:16px;">Error:<br>' . $e->getMessage() . '</pre>';
    }
});

Route::get('/run-migrate-seed', function () {
    try {
        Artisan::call('migrate', ['--force' => true]);
        $migrateOutput = Artisan::output();
        Artisan::call('db:seed', ['--force' => true]);
        $seedOutput = Artisan::output();
        return '<pre style="background:#111;color:#0f0;padding:20px;font-size:16px;">Migration & Seeder Complete!<br><br>--- MIGRATION OUTPUT ---<br>' . $migrateOutput . '<br>--- SEEDER OUTPUT ---<br>' . $seedOutput . '</pre>';
    } catch (\Exception $e) {
        return '<pre style="background:#111;color:#f33;padding:20px;font-size:16px;">Error:<br>' . $e->getMessage() . '</pre>';
    }
});

Route::get('/run-clear-cache', function () {
    try {
        Artisan::call('optimize:clear');
        return '<pre style="background:#111;color:#0f0;padding:20px;font-size:16px;">Cache Cleared Successfully!<br>' . Artisan::output() . '</pre>';
    } catch (\Exception $e) {
        return '<pre style="background:#111;color:#f33;padding:20px;font-size:16px;">Error:<br>' . $e->getMessage() . '</pre>';
    }
});

Route::get('/run-storage-link', function () {
    try {
        Artisan::call('storage:link');
        return '<pre style="background:#111;color:#0f0;padding:20px;font-size:16px;">Storage Link Created!<br>' . Artisan::output() . '</pre>';
    } catch (\Exception $e) {
        return '<pre style="background:#111;color:#f33;padding:20px;font-size:16px;">Error:<br>' . $e->getMessage() . '</pre>';
    }
});

