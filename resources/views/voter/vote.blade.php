@extends('layouts.dashboard')

@section('title', 'Vote Now')

@section('page-title', 'Vote now')

@section('content')
<div class="election-header">
    <h1 class="election-title">Ongoing Election</h1>
    <a href="#" class="election-link">{{ $election->title }}</a>
    <p class="election-instruction">(Select one candidate per position)</p>
</div>

<form method="POST" action="{{ route('voter.submit') }}" id="voteForm">
    @csrf
    <div class="positions-grid">
        @foreach($election->positions as $position)
            <div class="position-card">
                <h2 class="position-title">{{ $position->name }}</h2>
                
                @foreach($position->candidates as $candidate)
                    <label class="candidate-item">
                        <div class="candidate-avatar">
                            <svg viewBox="0 0 24 24">
                                <path fill="white" d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                            </svg>
                        </div>
                        <span class="candidate-name">{{ $candidate->name }}</span>
                        <input type="radio" name="votes[{{ $position->id }}]" value="{{ $candidate->id }}" class="candidate-checkbox" required>
                    </label>
                @endforeach
            </div>
        @endforeach
    </div>

    <div style="text-align: center; margin-top: 30px;">
        <button type="submit" class="btn btn-success" style="padding: 15px 40px; font-size: 16px;">Submit Vote</button>
    </div>
</form>

@push('scripts')
<script>
document.getElementById('voteForm').addEventListener('submit', function(e) {
    const positions = document.querySelectorAll('.position-card');
    let allSelected = true;
    
    positions.forEach(position => {
        const radios = position.querySelectorAll('input[type="radio"]');
        const checked = Array.from(radios).some(radio => radio.checked);
        if (!checked) {
            allSelected = false;
        }
    });
    
    if (!allSelected) {
        e.preventDefault();
        alert('Please select one candidate for each position.');
    } else {
        if (!confirm('Are you sure you want to submit your vote? This action cannot be undone.')) {
            e.preventDefault();
        }
    }
});
</script>
@endpush
@endsection