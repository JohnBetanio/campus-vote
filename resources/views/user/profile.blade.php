<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile - CampusVote</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="sidebar">
        <div>
            <h2>Profile</h2>
            <ul class="nav-links">
                <li><a href="{{ route('user.index') }}">Home</a></li>
                <li><a href="{{ route('user.vote-now') }}">Vote Now</a></li>
                <li><a href="{{ route('user.view-votes') }}">View Votes</a></li>
                <li><a href="{{ route('user.view-results') }}">View Results</a></li>
                <li><a href="{{ route('user.profile') }}" class="active">Profile</a></li>
            </ul>
        </div>
        <button class="logout-btn">Log out</button>
        <p class="footer-text">© 2025 CampusVote. All rights reserved.</p>
    </div>

    <div class="main-content">
        <div class="header">CampusVote</div>

        <div class="card">
            <h2>My Profile</h2>
            <p>Manage your Account</p>

            <div class="profile-box">
                <p>Email: example@snsu.edu.ph</p>
                <p>Name: Example Example</p>
                <p>Course: BSICT</p>
                <div class="profile-btns">
                    <button>Use Another Account</button>
                    <button>Log Out</button>
                </div>
            </div>
            <hr style="margin-top: 25px">
            <p style="margin-top: 10px">About CampusVote | Help | Privacy Policy</p>
        </div>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>