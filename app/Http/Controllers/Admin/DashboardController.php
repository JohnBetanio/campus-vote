<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Election;
use App\Models\Position;
use App\Models\Candidate;
use App\Models\Vote;

class DashboardController extends Controller
{
    public function index()
    {
        $activeElection = Election::where('status', 'active')->with(['positions.candidates.votes'])->first();
        
        $totalPositions = $activeElection ? $activeElection->positions->count() : 0;
        $totalNominees = $activeElection ? $activeElection->candidates->count() : 0;
        $totalVoted = $activeElection ? Vote::where('election_id', $activeElection->id)->distinct('voter_id')->count('voter_id') : 0;

        $results = [];
        if ($activeElection) {
            foreach ($activeElection->positions as $position) {
                $candidates = $position->candidates()->withCount('votes')->get();
                $totalVotes = $candidates->sum('votes_count');
                
                $results[$position->name] = $candidates->map(function ($candidate) use ($totalVotes) {
                    return [
                        'name' => $candidate->name,
                        'votes' => $candidate->votes_count,
                        'percentage' => $totalVotes > 0 ? round(($candidate->votes_count / $totalVotes) * 100) : 0,
                    ];
                })->sortByDesc('votes');
            }
        }

        return view('admin.dashboard', compact('totalPositions', 'totalNominees', 'totalVoted', 'results'));
    }
}