<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\HireMeController;
use App\Mail\HireMe;

// Base of client page
Route::get('baseClientPage', [BaseController::class, 'baseClientPage']);

// Dasboard of client page
Route::get('/', [BaseController::class, 'mainContentPage']);

// Route::get('hire-me', [HireMeController::class, 'sentEmail'])->name('hireMe');
Route::post('/hire-me', [HireMeController::class, 'sentEmail'])->name('hireMe');
