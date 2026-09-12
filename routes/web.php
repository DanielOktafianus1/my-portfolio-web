<?php

use App\Mail\HireMe;
use Faker\Provider\Base;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HireMeController;
use App\Http\Controllers\BaseAdminController;
use App\Http\Controllers\SkillsController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use function Pest\Laravel\patch;

// Base of client page
// Route::get('/', [BaseController::class, 'baseClientPage']);

// Dasboard of client page
Route::get('/', [BaseController::class, 'mainContentPage']);

Route::get('/about-me', [BaseController::class, 'aboutMe'])->name('aboutMe');

// Sent email
Route::post('/hire-me', [HireMeController::class, 'sentEmail'])->name('hireMe');



// Download DV
Route::get('/cdljvfsbiurfcvsbfcda3r3', function () {
    $user = User::first();
    $cv = $user->cv;
    $fileCV = storage_path('app/public/' . $cv);

    if (!file_exists($fileCV)) {
        abort(404, 'CV tidak ditemukan.');
    }

    $cvName = 'CV_' . str_replace(' ', '_', $user->name) . '.' . pathinfo($cv, PATHINFO_EXTENSION);
    return response()->download($fileCV, $cvName);
})->name('downloadCv');



// // ADMIN
// Login / Register page
Route::get('/andfah6q3rgfad7', [BaseAdminController::class, 'loginPage'])->name('login');

// Register action
Route::post('/ndakjfvgdafy8y0', [BaseAdminController::class, 'actionRegister'])->name('actionRegister');

// Login action
Route::post('/andfah6q3rgfad7', [BaseAdminController::class, 'actionLogin'])->name('actionLogin');


Route::prefix('cdjshfuv7sf4rtghf')->middleware(['web', 'auth'])->group(function () {
    // Base layout page
    Route::get('/dfskjvseryq83qrd', [BaseAdminController::class, 'basePage'])->name('basePage');

    // Dashboard page
    Route::get('/dashboard', [BaseAdminController::class, 'dashboard'])->name('dashboard');

    // User CRUD
    Route::resources([
        '/users' => UserController::class,
        '/skills' => SkillsController::class,
    ]);

    // // Rest API
    Route::post('/dafurt47gfrw4325rrfds', [ApiController::class, "postProfileImage"]);
    Route::delete('/dsbfggsgfiurfitg934r', [ApiController::class, "deleteProfileImage"]);

    // Logout action
    Route::get('/logout', [BaseAdminController::class, 'logout'])->name('logout');
});
