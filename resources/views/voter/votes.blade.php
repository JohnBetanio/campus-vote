@extends('layouts.dashboard')

@section('title', 'View Votes')

@section('page-title', 'Votes')

@section('content')
    <div class="card">
        <h2 class="card-title">Your Submitted Votes</h2>

        @if ($election)
            <p style="margin-bottom: 20px;">Election: <a href="#" class="election-link">{{ $election->title }}</a></p>
        @endif
    </div>

    <div class="card">
        <h3 class="card-title">Your Vote Summary</h3>
        <p style="color: #666; margin-bottom: 20px;">Review the candidates you selected for each position</p>

        @if ($votes->count() > 0)
            <table class="vote-table">
                <thead>
                    <tr>
                        <th>Position</th>
                        <th>Voted Candidate</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($votes as $positionName => $positionVotes)
                        @foreach ($positionVotes as $vote)
                            <tr>
                                <td>{{ $positionName }}</td>
                                <td>
                                    <div class="voted-candidate">
                                        <div class="candidate-avatar">
                                            <svg viewBox="0 0 24 24">
                                                <path fill="white"
                                                    d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                                            </svg>
                                        </div>
                                        {{ $vote->candidate->name }}
                                    </div>
                                </td>
                                <td>
                                    <span class="voted-status">
                                        ✓ Voted
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="empty-state">
                <p class="empty-state-title">No Votes Yet</p>
                <p class="empty-state-text">You haven't cast any votes yet. Visit the Vote Now page to participate in the
                    active election.</p>
                <a href="{{ route('voter.vote') }}" class="btn btn-primary">Vote Now</a>
            </div>
        @endif
    </div>
@endsection
