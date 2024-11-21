<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\auth\RegisteredUserController;
use App\Http\Controllers\auth\AuthenticatedSessionController;

Route::get('/', [EventController::class, 'home'])->name('home'); // Homepage

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login');
});

// Events
Route::middleware('auth')->group(function () {
    Route::get('/events', [EventController::class, 'index'])->name('events.index'); // Events Index
    Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show'); // Event Details
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create'); // Create Event Form
    Route::post('/events', [EventController::class, 'store'])->name('events.store'); // Store New Event
    Route::post('/events/{id}/register', [EventController::class, 'registerForEvent'])->name('events.register'); // Register for an Event
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Breeze Authentication Routes (Pre-configured by Breeze)
require __DIR__.'/auth.php';