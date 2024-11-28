<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\auth\RegisteredUserController;
use App\Http\Controllers\auth\AuthenticatedSessionController;
use App\Http\Controllers\PageController;

Route::get('/about', [PageController::class, 'about'])->name('about');

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('auth.login'); // Ensure this points to your login view
    })->name('login'); // Make sure the name matches the route expected by Breeze
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');
});


// Events
Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return redirect()->route('events.index'); // Redirect to events.index or another preferred page
    });

    // Move the create route before the show route
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::get('/events/registered', [EventController::class, 'registeredEvents'])->name('events.registered');
    Route::get('/events/my', [EventController::class, 'myEvents'])->name('events.my');
    Route::get('/events', [EventController::class, 'index'])->name('events.index');
    Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');
    Route::get('/events/{id}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::patch('/events/{id}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('events.destroy');
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
    Route::post('/events/{id}/register', [EventController::class, 'register'])->name('events.register');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Breeze Authentication Routes (Pre-configured by Breeze)
require __DIR__.'/auth.php';