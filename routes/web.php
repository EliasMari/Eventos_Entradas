<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReservationController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Ruta para crear una nueva reserva con un ID de evento específico
Route::get('reservations/{event_id}', [ReservationController::class, 'store'])->name('reservations.store');
Route::post('/events/{id}/reserveTickets', [ReservationController::class, 'reserveTickets'])->name('reservations.reserveTickets');

// Ruta de recurso para las reservas
Route::resource('reservations', ReservationController::class)->except(['create']);

Route::get('/dashboard', [EventController::class, 'index'])->name('dashboard');
Route::resource('events', EventController::class);

require __DIR__.'/auth.php';
