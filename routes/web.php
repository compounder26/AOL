<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MyEventsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');
Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth');
Route::get('/home', [HomeController::class, 'index'])->middleware('auth');
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'register'])->middleware('guest');
Route::get('/about', [AboutController::class, 'index']);
Route::get('/allEvents', [EventController::class, 'index'])->middleware('auth');
Route::get('/createEvent', [EventController::class, 'create'])->middleware('auth');
Route::post('/newEvent', [EventController::class, 'createEvent'])->middleware('auth');
Route::get('/myEvent', [MyEventsController::class, 'index'])->middleware('auth');
Route::get('/events', [EventController::class, 'detail'])->middleware('auth');
Route::post('/regEvent', [EventController::class, 'regEvent'])->middleware('auth');
Route::get('/registered', [EventController::class, 'RegisteredEvents'])->middleware('auth');
Route::get('/registeredDetail', [EventController::class, 'registeredDetail'])->middleware('auth');
