<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'CampusVote')</title>
    @include('layouts.styles')
    @stack('styles')
</head>

<body>
    <div class="dashboard-container">
        <aside class="sidebar">
            <div class="sidebar-header">
                <a href="{{ auth()->guard('voter')->check() ? route('voter.dashboard') : route('admin.dashboard') }}"
                    class="sidebar-logo">
                    CampusVote
                </a>
            </div>

            @if (auth()->guard('voter')->check())
                {{-- VOTER SIDEBAR --}}

                <nav class="sidebar-nav">
                    <a href="{{ route('voter.dashboard') }}"
                        class="nav-item {{ request()->routeIs('voter.dashboard') ? 'active' : '' }}">
                        Home
                    </a>
                    <a href="{{ route('voter.vote') }}"
                        class="nav-item {{ request()->routeIs('voter.vote') ? 'active' : '' }}">
                        Vote Now
                    </a>
                    <a href="{{ route('voter.votes') }}"
                        class="nav-item {{ request()->routeIs('voter.votes') ? 'active' : '' }}">
                        View Votes
                    </a>
                    <a href="{{ route('voter.results') }}"
                        class="nav-item {{ request()->routeIs('voter.results') ? 'active' : '' }}">
                        View Results
                    </a>
                    <a href="{{ route('voter.profile') }}"
                        class="nav-item {{ request()->routeIs('voter.profile') ? 'active' : '' }}">
                        Profile
                    </a>
                </nav>

                <div class="sidebar-footer">
                    <form method="POST" action="{{ route('voter.logout') }}">
                        @csrf
                        <button type="submit" class="btn-logout">Log out</button>
                    </form>
                    <div class="copyright">© 2025 CampusVote. All rights reserved.</div>
                </div>
            @elseif(auth()->guard('admin')->check())
                {{-- ADMIN SIDEBAR --}}

                <nav class="sidebar-nav">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        Home
                    </a>
                    <a href="{{ route('admin.elections.index') }}"
                        class="nav-item {{ request()->routeIs('admin.elections.index') || request()->routeIs('admin.elections.edit') ? 'active' : '' }}">
                        Manage Election
                    </a>
                    <a href="{{ route('admin.elections.create') }}"
                        class="nav-item {{ request()->routeIs('admin.elections.create') ? 'active' : '' }}">
                        Create Election
                    </a>
                    <a href="{{ route('admin.voters.index') }}"
                        class="nav-item {{ request()->routeIs('admin.voters.*') ? 'active' : '' }}">
                        Voters
                    </a>
                    <a href="{{ route('admin.results.index') }}"
                        class="nav-item {{ request()->routeIs('admin.results.*') ? 'active' : '' }}">
                        Results
                    </a>
                    <a href="{{ route('admin.announcements.index') }}"
                        class="nav-item {{ request()->routeIs('admin.announcements.*') ? 'active' : '' }}">
                        Announcements
                    </a>
                </nav>

                <div class="sidebar-footer">
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit" class="btn-logout">Logout</button>
                    </form>
                    <div class="copyright">© 2025 CampusVote. All rights reserved.</div>
                </div>
            @endif
        </aside>

        <main class="main-content">
            <div class="top-bar">
                <div class="top-bar-title">@yield('page-title')</div>
                <div class="top-bar-right">
                    @if (auth()->guard('voter')->check())
                        <input type="search" placeholder="Search" class="search-box">
                    @else
                        @yield('top-bar-right', 'CampusVote Dashboard')
                    @endif
                </div>
            </div>

            <div class="content-area">
                @if (session('success'))
                    <div
                        style="background: #d4edda; color: #155724; padding: 15px; border-radius: 6px; margin-bottom: 20px; border-left: 4px solid #28a745;">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div
                        style="background: #f8d7da; color: #721c24; padding: 15px; border-radius: 6px; margin-bottom: 20px; border-left: 4px solid #dc3545;">
                        {{ session('error') }}
                    </div>
                @endif

                @if (session('info'))
                    <div
                        style="background: #d1ecf1; color: #0c5460; padding: 15px; border-radius: 6px; margin-bottom: 20px; border-left: 4px solid #17a2b8;">
                        {{ session('info') }}
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>

    @stack('scripts')
</body>

</html>
