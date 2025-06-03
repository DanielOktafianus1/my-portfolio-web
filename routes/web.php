<?php

use App\Http\Controllers\BaseAdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\HireMeController;
use App\Http\Controllers\UserController;
use App\Mail\HireMe;
use Faker\Provider\Base;

// Base of client page
Route::get('baseClientPage', [BaseController::class, 'baseClientPage']);

// Dasboard of client page
Route::get('/', [BaseController::class, 'mainContentPage']);

// Sent email
Route::post('/hire-me', [HireMeController::class, 'sentEmail'])->name('hireMe');

// // ADMIN
// Login / Register page
Route::get('/andfah6q3rgfad7', [BaseAdminController::class, 'loginPage'])->name('login');

// Register action
Route::post('/ndakjfvgdafy8y0', [BaseAdminController::class, 'actionRegister'])->name('actionRegister');

// Login action
Route::post('/andfah6q3rgfad7', [BaseAdminController::class, 'actionLogin'])->name('actionLogin');



Route::prefix('cdjshfuv7sf4rtghf')->middleware('auth')->group(function () {
    // Base layout page
    Route::get('/dfskjvseryq83qrd', [BaseAdminController::class, 'basePage'])->name('basePage');

    // Dashboard page
    Route::get('/dashboard', [BaseAdminController::class, 'dashboard'])->name('dashboard');

    // User CRUD
    Route::resources([
        '/users' => UserController::class,
    ]);

    // Logout action
    Route::get('/logout', [BaseAdminController::class, 'logout'])->name('logout');
});
