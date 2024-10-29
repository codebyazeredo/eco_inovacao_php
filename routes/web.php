<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->prefix('user')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->prefix('events')->group(function () {
    Route::post('/', [EventController::class, 'createEvent'])->name('events.create');
    Route::get('/', [EventController::class, 'getAllEvents'])->name('events.index');
    Route::get('/{id}', [EventController::class, 'getEventById'])->name('events.show');
    Route::put('/{id}', [EventController::class, 'updateEvent'])->name('events.update');
    Route::delete('/{id}', [EventController::class, 'deleteEvent'])->name('events.destroy');
    Route::get('/user/{userId}', [EventController::class, 'findByUserId'])->name('events.user');
    Route::post('/interval', [EventController::class, 'findEventByIntervalData'])->name('events.interval');
    Route::post('/local-interval', [EventController::class, 'findByLocalAndIntervalData'])->name('events.localInterval');
});

Route::prefix('auth')->group(function () {
    require __DIR__.'/auth.php';
});
