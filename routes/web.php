<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\TournamentController;

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', action: [HomeController::class, 'index'])->name('admin.dashboard');
});

Route::middleware(['auth', 'role:coach'])->group(function () {
    Route::get('/teams', [TeamController::class, 'index'])->name('teams.index');
    Route::get('/teams/create', [TeamController::class, 'create'])->name('teams.create');
    Route::post('/teams', [TeamController::class, 'store'])->name('teams.store');
});


Route::middleware(['auth', 'role:referee'])->group(function () {
    Route::get('/referee', [HomeController::class, 'index'])->name('referee.dashboard');
    Route::get('/tournaments/{id}/edit', [TournamentController::class, 'edit'])->name('referee.tournaments.edit');
    Route::patch('/tournaments/{id}', [TournamentController::class, 'update'])->name('referee.tournaments.update');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::get('/', function () {
    return view('index');
})->name('index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';
