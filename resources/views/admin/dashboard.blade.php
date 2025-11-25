@extends('layouts.dashboard')

@section('title', 'Admin Dashboard')

@section('page-title', 'Welcome, Admin!')

@section('top-bar-right', 'CampusVote Dashboard')

@section('content')
<div class="stats-grid">
    <div class="stat-card green">
        <div class="stat-number">{{ $totalPositions }}</div>
        <div class="stat-label">Total Positions</div>
    </div>
    
    <div class="stat-card red">
        <div class="stat-number">{{ $totalNominees }}</div>
        <div class="stat-label">Total Nominees</div>
    </div>
    
    <div class="stat-card blue">
        <div class="stat-number">{{ $totalVoted }}</div>
        <div class="stat-label">Total Voted</div>
    </div>
</div>

<div class="card">
    <h2 class="card-title">Current Election Results</h2>
    
    @if(count($results) > 0)
        @foreach($results as $positionName => $candidates)
            <div style="margin-bottom: 30px;">
                <h3 style="color: #22863a; font-size: 18px; margin-bottom: 15px;">{{ $positionName }}</h3>
                
                @foreach($candidates as $candidate)
                    <div style="margin-bottom: 15px;">
                        <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                            <span style="font-weight: 600;">{{ $candidate['name'] }}</span>
                            <span style="font-weight: 700; color: #22863a;">{{ $candidate['percentage'] }}%</span>
                        </div>
                        <div style="font-size: 14px; color: #666; margin-bottom: 5px;">{{ $candidate['votes'] }} votes</div>
                        <div class="progress-bar-container">
                            <div class="progress-bar" style="width: {{ $candidate['percentage'] }}%; background-color: #22863a;"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    @else
        <div class="empty-state">
            <p class="empty-state-title">No Active Election</p>
            <p class="empty-state-text">Create an election to see results here.</p>
            <a href="{{ route('admin.elections.create') }}" class="btn btn-success">Create Election</a>
        </div>
    @endif
</div>
@endsection