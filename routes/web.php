<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\TournamentController;
use App\Http\Controllers\MatchController;

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [HomeController::class, 'index'])->name('admin.dashboard');
    Route::get('/tournaments', [TournamentController::class, 'index'])->name('tournaments.index');
    Route::post('/tournaments/create', [TournamentController::class, 'create'])->name('tournaments.create');
    Route::get('/tournaments/create', [TournamentController::class, 'create'])->name('tournaments.create');
    Route::post('/tournaments', [TournamentController::class, 'store'])->name('tournaments.store');
    Route::get('/tournaments/{id}', [TournamentController::class, 'show'])->name('tournaments.show');
    Route::post('/tournaments/{id}/start', [TournamentController::class, 'startTournament'])->name('tournaments.start');
    Route::get('/tournaments/{id}/edit', [TournamentController::class, 'edit'])->name('tournaments.edit');
    Route::patch('/tournaments/{id}', [TournamentController::class, 'update'])->name('tournaments.update');
    Route::delete('/tournaments/{id}', [TournamentController::class, 'destroy'])->name('tournaments.destroy');
    Route::post('/tournaments/{tournament}/signup', [TournamentController::class, 'signup'])->name('tournaments.signup');
    Route::post('/tournaments/{tournament}/signup', [TournamentController::class, 'signupTeam'])->name('tournaments.signup');
    Route::delete('/tournaments/{tournament}/teams/{team}', [TournamentController::class, 'removeTeam'])->name('tournaments.removeTeam');

    Route::get('/matches/{match}/edit-admin', [MatchController::class, 'editForAdmin'])->name('matches.editForAdmin');
    Route::put('/matches/{match}/update-admin', [MatchController::class, 'updateForAdmin'])->name('matches.updateForAdmin');
    Route::get('/matches/{match}/edit', [MatchController::class, 'edit'])->name('matches.edit');
    Route::put('/matches/{match}/update', [MatchController::class, 'update'])->name('matches.update');
    Route::post('/matches', [MatchController::class, 'store'])->name('matches.store');
    Route::delete('/matches/{match}', [MatchController::class, 'destroy'])->name('matches.destroy');
    Route::get('/matches/{match}', [MatchController::class, 'show'])->name('matches.show');
    Route::post('/matches/{match}/start', [MatchController::class, 'startMatch'])->name('matches.start');
});

Route::middleware(['auth', 'role:coach'])->group(function () {
    Route::get('/teams', [TeamController::class, 'index'])->name('teams.index');
    Route::get('/teams/create', [TeamController::class, 'create'])->name('teams.create');
    Route::patch('/teams/{team}', [TeamController::class, 'update'])->name('teams.update');
    Route::post('/teams', [TeamController::class, 'store'])->name('teams.store');
    Route::post('/tournaments/{tournament}/signup', [TournamentController::class, 'signup'])->name('tournaments.signup');
});

Route::middleware(['auth'])->group(function (){
    Route::get('/tournaments/{id}', [TournamentController::class, 'show'])->name('tournaments.show');
});

Route::middleware(['auth', 'role:referee'])->group(function () {
    Route::get('/dashboard', [TournamentController::class, 'dashboard'])->name('referee.dashboard');
    Route::get('/referee', [HomeController::class, 'index'])->name('referee.dashboard');
    Route::get('/referee/matches', [MatchController::class, 'index'])->name('referee.matches');
    Route::get('/referee/matches/{match}', [MatchController::class, 'showForReferee'])->name('referee.matches.show');
    Route::post('/referee/matches/{match}/start', [MatchController::class, 'startMatch'])->name('referee.matches.start');
    Route::get('/matches/{match}/edit-referee', [MatchController::class, 'editForReferee'])->name('matches.editForReferee');
    Route::patch('/matches/{match}/update-referee', [MatchController::class, 'updateForReferee'])->name('matches.updateForReferee');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/dashboard', [TournamentController::class, 'dashboard'])->name('dashboard');
Route::get('/tournaments', [TournamentController::class, 'index'])->name('tournaments.index');
Route::get('/', [TournamentController::class, 'home'])->name('index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
