<?php

namespace App\Http\Controllers\Voter;

use App\Models\Vote;
use App\Models\Election;
use App\Models\Candidate;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class VotingController extends Controller
{
   

    /**
     * Show the voter dashboard.
     */
    public function dashboard()
    {
        $voter = Auth::guard('voter')->user();
        $announcements = Announcement::orderBy('created_at', 'desc')->limit(4)->get();
        $activeElection = Election::where('status', 'active')->first();
        
        return view('voter.dashboard', compact('voter', 'announcements', 'activeElection'));
    }

    /**
     * Show the voting page.
     */
    public function vote()
    {
        $voter = Auth::guard('voter')->user();
        $election = Election::where('status', 'active')->with(['positions.candidates'])->first();
        
        if (!$election) {
            return redirect()->route('voter.dashboard')->with('error', 'No active election at the moment.');
        }

        // Check if voter has already voted
        $hasVoted = Vote::where('voter_id', $voter->id)
            ->where('election_id', $election->id)
            ->exists();
        
        if ($hasVoted) {
            return redirect()->route('voter.votes')->with('info', 'You have already voted in this election.');
        }

        return view('voter.vote', compact('election'));
    }

    /**
     * Submit the vote.
     */
   public function submitVote(Request $request)
{
    $voter = Auth::guard('voter')->user();
    $election = Election::where('status', 'active')
        ->with(['positions.candidates'])
        ->first();
    
    if (!$election) {
        return redirect()
            ->route('voter.dashboard')
            ->with('error', 'No active election found.');
    }

    // Check if already voted (prevent duplicate)
    $hasVoted = Vote::where('voter_id', $voter->id)
        ->where('election_id', $election->id)
        ->exists();

    if ($hasVoted) {
        return redirect()
            ->route('voter.votes')
            ->with('error', 'You have already voted in this election.');
    }

    // Validate votes
    $request->validate([
        'votes' => 'required|array',
        'votes.*' => 'required|exists:candidates,id',
    ]);
    
    // Validate that one vote per position
    $positionIds = $election->positions->pluck('id')->toArray();
    
    if (count($request->votes) !== count($positionIds)) {
        return back()->with('error', 'You must vote for all positions.');
    }

    DB::beginTransaction();
    try {
        foreach ($request->votes as $positionId => $candidateId) {
            // Verify candidate belongs to the position
            $candidate = Candidate::where('id', $candidateId)
                ->where('position_id', $positionId)
                ->first();
                
            if (!$candidate) {
                throw new \Exception('Invalid candidate for position.');
            }
            
            Vote::create([
                'voter_id' => $voter->id,
                'candidate_id' => $candidateId,
                'election_id' => $election->id,
            ]);
        }
        DB::commit();
        
        return redirect()
            ->route('voter.votes')
            ->with('success', 'Your vote has been submitted successfully!');
    } catch (\Exception $e) {
        DB::rollBack();
        return back()->with('error', 'An error occurred while submitting your vote. Please try again.');
    }
}

    /**
     * Show voter's submitted votes.
     */
    public function showVotes()
    {
        $voter = Auth::guard('voter')->user();
        $election = Election::where('status', 'active')->first();
        
        if (!$election) {
            return view('voter.votes', ['votes' => collect(), 'election' => null]);
        }

        $votes = Vote::where('voter_id', $voter->id)
            ->where('election_id', $election->id)
            ->with(['candidate.position'])
            ->get()
            ->groupBy('candidate.position.name');

        return view('voter.votes', compact('votes', 'election'));
    }

    /**
     * Show election results.
     */
    public function results()
    {
        $election = Election::where('status', 'active')->with(['positions.candidates.votes'])->first();
        
        if (!$election) {
            return view('voter.results', ['election' => null, 'results' => []]);
        }

        $results = [];
        foreach ($election->positions as $position) {
            $candidates = $position->candidates()->withCount('votes')->get();
            $totalVotes = $candidates->sum('votes_count');
            
            $results[$position->name] = $candidates->map(function ($candidate) use ($totalVotes) {
                return [
                    'id' => $candidate->id,
                    'name' => $candidate->name,
                    'votes' => $candidate->votes_count,
                    'percentage' => $totalVotes > 0 ? round(($candidate->votes_count / $totalVotes) * 100) : 0,
                ];
            })->sortByDesc('votes')->values();
        }

        return view('voter.results', compact('election', 'results'));
    }

    /**
     * Show voter profile.
     */
    public function profile()
    {
        $voter = Auth::guard('voter')->user();
        return view('voter.profile', compact('voter'));
    }
}