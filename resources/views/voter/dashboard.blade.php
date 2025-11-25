
@extends('layouts.dashboard')

@section('title', 'Voter Dashboard')

@section('page-title', 'Welcome')

@section('content')
<div class="welcome-section">
    <h1 class="welcome-title">Welcome, <em>{{ $voter->name }}</em>!</h1>
    <p class="welcome-subtitle">"Cast your vote and make your voice heard."</p>
</div>

<div class="feature-grid">
    <div class="feature-card">
        <h3 class="feature-title">Vote Now</h3>
        <p class="feature-description">Cast your vote in active elections and make your voice heard.</p>
        @if($activeElection)
            @php
                $hasVoted = \App\Models\Vote::where('voter_id', $voter->id)
                    ->where('election_id', $activeElection->id)
                    ->exists();
            @endphp
            
            @if(!$hasVoted)
                <a href="{{ route('voter.vote') }}" class="btn btn-primary">Start Voting</a>
            @else
                <button class="btn btn-secondary" disabled>Already Voted</button>
            @endif
        @else
            <button class="btn btn-secondary" disabled>No Active Election</button>
        @endif
    </div>

    <div class="feature-card">
        <h3 class="feature-title">View Vote</h3>
        <p class="feature-description">Check your voting history and verify your submissions.</p>
        <a href="{{ route('voter.votes') }}" class="btn btn-success">View History</a>
    </div>

    <div class="feature-card">
        <h3 class="feature-title">View Results</h3>
        <p class="feature-description">See real-time results and election outcomes.</p>
        <a href="{{ route('voter.results') }}" class="btn btn-purple">View Results</a>
    </div>
</div>

<div class="announcements-section">
    <div class="announcements-header">
        <span class="announcements-icon">📢</span>
        <h2 class="announcements-title">Announcements</h2>
    </div>

    @forelse($announcements as $announcement)
        <div class="announcement-item">
            <p class="announcement-text">{{ $announcement->content }}</p>
        </div>
    @empty
        <p style="text-align: center; color: #666;">No announcements at this time.</p>
    @endforelse
</div>
@endsection