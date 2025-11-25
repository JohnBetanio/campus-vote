@extends('layouts.dashboard')

@section('title', 'Voters')

@section('page-title', 'Voters')

@section('content')
<div class="card">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($voters as $voter)
                <tr>
                    <td>
                        <div style="font-weight: 600;">{{ $voter->name }}</div>
                        <div style="font-size: 14px; color: #666;">{{ $voter->email }}</div>
                        <div style="font-size: 14px; color: #666;">Course: {{ $voter->course ?? 'Undecided' }}</div>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('admin.voters.destroy', $voter) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2" style="text-align: center; padding: 40px;">No voters registered yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection