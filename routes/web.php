<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\Backend\ProjectController;
use App\Http\Controllers\Backend\TeamController;
use App\Http\Controllers\Backend\ClientController;
use App\Http\Controllers\Backend\SettingsController;
use App\Http\Controllers\ProfileController;

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/About-Company', [FrontendController::class, 'aboutCompany'])->name('about.company');
Route::get('/Service', [FrontendController::class, 'service'])->name('service');
Route::get('/Project', [FrontendController::class, 'project'])->name('project');
Route::get('/Team', [FrontendController::class, 'team'])->name('team');
Route::get('/Testimonial', [FrontendController::class, 'testimonial'])->name('testimonial');
Route::get('/Contact', [FrontendController::class, 'contact'])->name('contact');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [BackendController::class, 'dashboard'])->name('dashboard');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Backend admin resources (auth protected)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
    
    Route::resource('/projects', ProjectController::class);
    Route::resource('/teams', TeamController::class);
    Route::resource('/clients', ClientController::class);
});
require __DIR__ . '/auth.php';
