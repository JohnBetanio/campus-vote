@extends('layouts.dashboard')

@section('title', 'Announcements')
@section('page-title', 'Announcements')

@section('content')
<div style="display: flex; justify-content: flex-end; margin-bottom: 20px;">
    <button class="btn btn-success" onclick="openCreateModal()">+ Make Announcement</button>
</div>

<div class="card">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Announcement</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($announcements as $announcement)
                <tr>
                    <td>
                        <div style="font-weight: 600; margin-bottom: 5px;">{{ $announcement->content }}</div>
                        <div style="font-size: 14px; color: #666;">Posted: {{ $announcement->created_at->format('M j, Y, g:i A') }}</div>
                        @if($announcement->created_at != $announcement->updated_at)
                            <div style="font-size: 12px; color: #999; font-style: italic;">Edited: {{ $announcement->updated_at->format('M j, Y, g:i A') }}</div>
                        @endif
                    </td>
                    <td>
                        <button onclick="openEditModal({{ $announcement->id }}, '{{ addslashes($announcement->content) }}')" 
                                class="btn btn-primary btn-sm" 
                                style="margin-right: 10px;">
                            Edit
                        </button>
                        <form method="POST" action="{{ route('admin.announcements.destroy', $announcement) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2" style="text-align: center; padding: 40px;">No announcements yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Create Announcement Modal -->
<div id="createAnnouncementModal" class="modal-overlay" style="display: none;">
    <div class="modal">
        <h2 class="modal-title">New Announcement</h2>
        <form method="POST" action="{{ route('admin.announcements.store') }}">
            @csrf
            <textarea name="content" class="form-control" rows="5" placeholder="Enter announcement text" required style="resize: vertical;"></textarea>
            <div class="modal-actions">
                <button type="button" class="btn btn-secondary" onclick="closeCreateModal()">Cancel</button>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>
    </div>
</div>

<!-- Edit Announcement Modal -->
<div id="editAnnouncementModal" class="modal-overlay" style="display: none;">
    <div class="modal">
        <h2 class="modal-title">Edit Announcement</h2>
        <form method="POST" id="editAnnouncementForm">
            @csrf
            @method('PUT')
            <textarea name="content" id="editContent" class="form-control" rows="5" placeholder="Enter announcement text" required style="resize: vertical;"></textarea>
            <div class="modal-actions">
                <button type="button" class="btn btn-secondary" onclick="closeEditModal()">Cancel</button>
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
// Create Modal Functions
function openCreateModal() {
    document.getElementById('createAnnouncementModal').style.display = 'flex';
}

function closeCreateModal() {
    document.getElementById('createAnnouncementModal').style.display = 'none';
}

// Edit Modal Functions
function openEditModal(id, content) {
    // Set form action
    const form = document.getElementById('editAnnouncementForm');
    form.action = `/admin/announcements/${id}`;
    
    // Set content
    document.getElementById('editContent').value = content;
    
    // Show modal
    document.getElementById('editAnnouncementModal').style.display = 'flex';
}

function closeEditModal() {
    document.getElementById('editAnnouncementModal').style.display = 'none';
}

// Close modal when clicking outside
document.getElementById('createAnnouncementModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeCreateModal();
    }
});

document.getElementById('editAnnouncementModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeEditModal();
    }
});

// Close modal with Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeCreateModal();
        closeEditModal();
    }
});
</script>
@endpush
@endsection