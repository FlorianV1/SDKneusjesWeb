<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\TournamentController;


Route::get('/', [HomeController::class, 'index'])->name('index');


Route::get('/test', function () {
    return view('test');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/tournaments', function () {
//     return view('tournaments');
// })->middleware(['auth', 'verified'])->name('tournaments');

Route::get('/tournament-create', function () {
    return view('tournament-create');
})->middleware(['auth', 'verified'])->name('tournament-create');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/tournaments', [TournamentController::class, 'index'])->name('tournaments.index');
Route::get('/tournament/{id}', [TournamentController::class, 'show'])->name('tournaments.show');
Route::post('/tournament', [TournamentController::class, 'store'])->name('tournaments.store');

require __DIR__.'/auth.php';
