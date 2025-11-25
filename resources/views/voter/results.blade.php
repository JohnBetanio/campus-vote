@extends('layouts.dashboard')

@section('title', 'View Results')

@section('page-title', 'Results')

@section('content')
    <div class="results-header">
        <h1 class="election-title">Election Results</h1>

        @if ($election)
            <h2 style="font-size: 20px; color: #666; margin-top: 10px;">{{ $election->title }}</h2>

            <div class="results-meta">
                <div class="results-meta-item">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="#666">
                        <path
                            d="M19 3h-1V1h-2v2H8V1H6v2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V8h14v11z" />
                    </svg>
                    {{ $election->created_at->format('F j, Y') }}
                </div>
                <div class="results-meta-item">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="#666">
                        <path
                            d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z" />
                    </svg>
                    Last Updated: {{ now()->format('g:i A') }}
                </div>
                <div class="results-meta-item">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="#666">
                        <path
                            d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z" />
                    </svg>
                    267 Total Votes
                </div>
            </div>
        @endif
    </div>

    @if ($election && count($results) > 0)
        @foreach ($results as $positionName => $candidates)
            <div class="position-results">
                <h3 class="position-results-title">{{ $positionName }}</h3>

                @foreach ($candidates as $index => $candidate)
                    <div class="candidate-result">
                        <div class="candidate-avatar">
                            <svg viewBox="0 0 24 24">
                                <path fill="white"
                                    d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                            </svg>
                        </div>

                        <div class="result-info">
                            <div class="result-name">{{ $candidate['name'] }} - {{ $candidate['percentage'] }}%
                                ({{ $candidate['votes'] }} votes)</div>
                            <div class="progress-bar-container">
                                <div class="progress-bar {{ $index == 0 ? 'first' : ($index == 1 ? 'second' : 'third') }}"
                                    style="width: {{ $candidate['percentage'] }}%"></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    @else
        <div class="card">
            <div class="empty-state">
                <p class="empty-state-title">No Results Available</p>
                <p class="empty-state-text">There are no election results to display at this time.</p>
            </div>
        </div>
    @endif
@endsection
