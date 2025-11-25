@extends('layouts.dashboard')

@section('title', 'Manage Election')

@section('page-title', 'Manage Election')

@section('top-bar-right', 'CampusVote')

@section('content')
<div class="stats-grid">
    <div class="stat-card green">
        <div class="stat-number">{{ $stats['active_positions'] }}</div>
        <div class="stat-label">Active Positions</div>
    </div>
    
    <div class="stat-card blue">
        <div class="stat-number">{{ $stats['total_candidates'] }}</div>
        <div class="stat-label">Total Candidates</div>
    </div>
    
    <div class="stat-card red">
        <div class="stat-number">{{ $stats['votes_cast'] }}</div>
        <div class="stat-label">Votes Cast</div>
    </div>
    
    <div class="stat-card orange">
        <div class="stat-number">{{ $stats['participation_rate'] }}%</div>
        <div class="stat-label">Participation Rate</div>
    </div>
</div>

@if($activeElection)
    <div class="card">
        <h2 class="card-title">Active Election</h2>
        
        <div style="background: white; border-left: 4px solid #22863a; padding: 20px; border-radius: 6px; margin-bottom: 20px;">
            <h3 style="font-size: 20px; font-weight: 600; margin-bottom: 10px;">{{ $activeElection->title }}</h3>
            <p style="color: #666; margin-bottom: 10px;">Created: {{ $activeElection->created_at->format('m/d/Y, g:i:s A') }}</p>
            <p style="color: #666; margin-bottom: 15px;">Positions: {{ $activeElection->positions->count() }} | Candidates: {{ $activeElection->candidates->count() }}</p>
            <p style="color: #666; margin-bottom: 15px;">Total Votes: {{ $stats['votes_cast'] }}</p>
            <span class="badge badge-success">ACTIVE</span>
            
            <div style="margin-top: 20px; display: flex; gap: 10px;">
                <a href="{{ route('admin.elections.edit', $activeElection) }}" class="btn btn-success">Edit Election</a>
                <a href="{{ route('admin.results.show', $activeElection) }}" class="btn btn-secondary">View Live Results</a>
                <form method="POST" action="{{ route('admin.elections.end', $activeElection) }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to end this election?')">End Election</button>
                </form>
            </div>
        </div>
    </div>
    
    <div class="card">
        <h2 class="card-title">Election Details</h2>
        
        @foreach($activeElection->positions as $position)
            <div style="background: white; border-left: 4px solid #22863a; padding: 20px; border-radius: 6px; margin-bottom: 15px;">
                <h4 style="font-weight: 600; margin-bottom: 10px;">{{ $position->name }}</h4>
                <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                    @foreach($position->candidates as $candidate)
                        <span style="background: #f8f9fa; padding: 6px 12px; border-radius: 4px; font-size: 14px;">{{ $candidate->name }}</span>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="card">
        <div class="empty-state">
            <p class="empty-state-title">No Active Election</p>
            <p class="empty-state-text">There is currently no active election to manage.</p>
            <a href="{{ route('admin.elections.create') }}" class="btn btn-success">Create New Election</a>
        </div>
    </div>
@endif
@endsection