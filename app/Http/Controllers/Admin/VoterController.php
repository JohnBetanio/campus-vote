<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Voter;

class VoterController extends Controller
{
    public function index()
    {
        $voters = Voter::orderBy('name')->get();
        return view('admin.voters', compact('voters'));
    }

    public function destroy(Voter $voter)
    {
        $voter->delete();
        return redirect()->route('admin.voters.index')->with('success', 'Voter deleted successfully!');
    }
}