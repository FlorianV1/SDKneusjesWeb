<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use App\Models\Team;
use App\Models\Match;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
    public function index()
    {
        $tournaments = Tournament::with('user')->get();
        return view('tournaments', compact('tournaments'));
    }

    public function show($id)
    {
        $tournament = Tournament::with(['matches.team1', 'matches.team2', 'matches.winner'])->findOrFail($id);
        $rounds = $tournament->matches->groupBy('round');
        return view('tournaments.show', compact('tournament', 'rounds'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string']);

        $tournament = Tournament::create([
            'name' => $request->name,
            'user_id' => auth()->id(),
            'type' => 'single-elimination',
        ]);

        return redirect()->route('tournaments.show', $tournament->id);
    }
}
