<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use App\Models\Team;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
    public function index()
    {
        $tournaments = Tournament::with('user')->where('user_id', auth()->id())->get();
        return view('tournaments', compact('tournaments'));
    }

    public function show($id)
    {
        $tournament = Tournament::with(['matches.team1', 'matches.team2', 'matches.winner'])->findOrFail($id);
        $rounds = $tournament->matches->groupBy('round');
        return view('tournaments/show', compact('tournament', 'rounds'));
    }

    public function create()
    {
        $teams = Team::all();
        return view('tournaments/create', compact('teams'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'teams' => 'required|array|min:2',
            'teams.*' => 'exists:teams,id',
        ]);

        $tournament = Tournament::create([
            'name' => $request->name,
            'description' => $request->description ?? null,
            'user_id' => auth()->id(),
            'type' => 'single-elimination',
        ]);

        $tournament->teams()->attach($request->teams);

        return redirect()->route('tournaments.show', $tournament->id)
        ->with('success', 'Tournament created successfully!');
    }
}
