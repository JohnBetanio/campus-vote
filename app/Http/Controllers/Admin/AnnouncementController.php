<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::orderBy('created_at', 'desc')->get();
        return view('admin.announcements', compact('announcements'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        Announcement::create([
            'content' => $request->input('content')
        ]);
        
        return redirect()->route('admin.announcements.index')->with('success', 'Announcement created successfully!');
    }

    public function destroy(Announcement $announcement)
    {
        $announcement->delete();
        return redirect()->route('admin.announcements.index')->with('success', 'Announcement deleted successfully!');
    }
}