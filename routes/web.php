<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Frontend.index');
});
Route::get('/about-company', function () {
    return view('Frontend.AboutCompany');
});
Route::get('/contact', function () {
    return view('Frontend.Contact');
});
Route::get('/project', function () {
    return view('Frontend.Project');
});
Route::get('/service', function () {
    return view('Frontend.Service');
});
Route::get('/team', function () {
    return view('Frontend.Team');
});
Route::get('/Testimonial', function () {
    return view('Frontend.Testimonial');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
