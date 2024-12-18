<?php

namespace App\Http\Controllers;

use App\Models\Matches;
use App\Models\Tournament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MatchController extends Controller
{
    // List all matches for referee
    public function index()
    {
        // Ensure only referees can access this
        if (Auth::user()->role !== 'referee') {
            abort(403, 'Unauthorized action.');
        }

        $tournaments = Tournament::where('status', 'In_progress')->get();

        return view('matches.index', compact('tournaments'));
    }

    // Show specific match details for referee
    public function showForReferee(Matches $match)
    {
        // Ensure only referees can access this
        if (Auth::user()->role !== 'referee') {
            abort(403, 'Unauthorized action.');
        }

        return view('matches.show', compact('match'));
    }

    // Start a match (if needed)
    public function startMatch(Matches $match)
    {
        // Ensure only referees can start matches
        if (Auth::user()->role !== 'referee') {
            abort(403, 'Unauthorized action.');
        }

        $match->update(['status' => 'In Progress']);

        return redirect()->route('referee.matches.show', $match)
            ->with('success', 'Match started successfully!');
    }

    // Edit match for referee
    public function editForReferee($id)
    {
        $match = Matches::findOrFail($id);

        // Ensure only referees can access this
        if (Auth::user()->role !== 'referee') {
            abort(403, 'Unauthorized action.');
        }

        return view('matches.edit-referee', compact('match'));
    }

    // Update match results
    public function updateForReferee(Request $request, $id)
    {
        $match = Matches::findOrFail($id);

        // Ensure only referees can update
        if (Auth::user()->role !== 'referee') {
            abort(403, 'Unauthorized action.');
        }

        // Validate the input
        $validatedData = $request->validate([
            'team1_score' => 'required|numeric|min:0',
            'team2_score' => 'required|numeric|min:0',
            'status' => 'required|in:Pending,Completed'
        ]);

        // Determine the winner
        if ($validatedData['team1_score'] > $validatedData['team2_score']) {
            $winnerId = $match->team1_id;
        } elseif ($validatedData['team1_score'] < $validatedData['team2_score']) {
            $winnerId = $match->team2_id;
        } else {
            $winnerId = null; // Draw
        }

        // Update the match
        $match->update([
            'team1_score' => $validatedData['team1_score'],
            'team2_score' => $validatedData['team2_score'],
            'winner_id' => $winnerId,
            'status' => $validatedData['status']
        ]);

        return redirect()->route('referee.matches')
            ->with('success', 'Match results updated successfully!');
    }
}
