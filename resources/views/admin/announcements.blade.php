@extends('layouts.dashboard')

@section('title', 'Announcements')

@section('page-title', 'Announcements')

@section('content')
<div style="display: flex; justify-content: flex-end; margin-bottom: 20px;">
    <button class="btn btn-success" onclick="document.getElementById('announcementModal').style.display='flex'">+ Make Announcement</button>
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
                    </td>
                    <td>
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

<!-- Modal -->
<div id="announcementModal" class="modal-overlay" style="display: none;">
    <div class="modal">
        <h2 class="modal-title">New Announcement</h2>
        <form method="POST" action="{{ route('admin.announcements.store') }}">
            @csrf
            <textarea name="content" class="form-control" rows="5" placeholder="Enter announcement text" required style="resize: vertical;"></textarea>
            <div class="modal-actions">
                <button type="button" class="btn btn-secondary" onclick="document.getElementById('announcementModal').style.display='none'">Cancel</button>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection