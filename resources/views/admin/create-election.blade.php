@extends('layouts.dashboard')

@section('title', 'Create Election')

@section('page-title', 'Create Election')

@section('content')
@if($activeElection)
    <div class="card">
        <h2 class="card-title">Active Election</h2>
        <div style="background: #22863a; color: white; padding: 20px; border-radius: 6px; margin-bottom: 20px;">
            <h3 style="font-size: 18px; margin-bottom: 10px;">{{ $activeElection->title }}</h3>
            <p style="opacity: 0.9; margin-bottom: 15px;">Creation Time: {{ $activeElection->created_at->format('m/d/Y, g:i:s A') }}</p>
            
            <div style="display: flex; gap: 10px;">
                <a href="{{ route('admin.elections.edit', $activeElection) }}" class="btn-dark">Edit Election</a>
                <form method="POST" action="{{ route('admin.elections.destroy', $activeElection) }}" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-dark" style="background-color: #c82333;" onclick="return confirm('Are you sure?')">Delete Election</button>
                </form>
                <a href="{{ route('admin.elections.create') }}" class="btn-dark">Create New Election</a>
            </div>
        </div>
    </div>
@endif

<div class="card">
    <form method="POST" action="{{ route('admin.elections.store') }}" id="electionForm">
        @csrf
        
        <div style="background: #e8e8e8; padding: 20px; border-radius: 6px; margin-bottom: 20px;">
            <label class="form-label">Election Title:</label>
            <input type="text" name="title" class="form-control" placeholder="Enter election name" required style="margin-bottom: 15px;">
            
            <button type="button" class="btn btn-success" onclick="addPosition()">+ Add Position</button>
        </div>
        
        <div id="positionsContainer"></div>
        
        <div class="form-actions">
            <a href="{{ route('admin.elections.index') }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-success">Create Election</button>
        </div>
    </form>
</div>

@push('scripts')
<script>
let positionCount = 0;

function addPosition() {
    positionCount++;
    const container = document.getElementById('positionsContainer');
    const positionDiv = document.createElement('div');
    positionDiv.className = 'position-section';
    positionDiv.id = `position-${positionCount}`;
    positionDiv.innerHTML = `
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
            <div style="flex: 1; margin-right: 10px;">
                <label class="form-label">Position Name:</label>
                <input type="text" name="positions[${positionCount}][name]" class="form-control" placeholder="Enter position name" required>
            </div>
            <button type="button" class="btn btn-danger btn-sm" onclick="removePosition(${positionCount})" style="margin-top: 25px;">Delete</button>
        </div>
        
        <div id="candidates-${positionCount}">
            <div class="candidate-input-group">
                <input type="text" name="positions[${positionCount}][candidates][]" class="form-control" placeholder="Candidate 1 Name" required>
            </div>
        </div>
        
        <button type="button" class="btn btn-add btn-sm" onclick="addCandidate(${positionCount})">+ Add Candidate</button>
    `;
    container.appendChild(positionDiv);
}

function removePosition(id) {
    document.getElementById(`position-${id}`).remove();
}

function addCandidate(positionId) {
    const container = document.getElementById(`candidates-${positionId}`);
    const candidateCount = container.querySelectorAll('.candidate-input-group').length + 1;
    const candidateDiv = document.createElement('div');
    candidateDiv.className = 'candidate-input-group';
    candidateDiv.innerHTML = `
        <input type="text" name="positions[${positionId}][candidates][]" class="form-control" placeholder="Candidate ${candidateCount} Name" required>
        <button type="button" class="btn btn-danger btn-sm" onclick="this.parentElement.remove()">Delete</button>
    `;
    container.appendChild(candidateDiv);
}

// Add at least one position on load
document.addEventListener('DOMContentLoaded', function() {
    addPosition();
});
</script>
@endpush
@endsection