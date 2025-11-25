<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Results - CampusVote</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="sidebar">
        <div>
            <h2>View Results</h2>
            <ul class="nav-links">
                <li><a href="{{ route('user.index') }}">Home</a></li>
                <li><a href="{{ route('user.vote-now') }}">Vote Now</a></li>
                <li><a href="{{ route('user.view-votes') }}">View Votes</a></li>
                <li><a href="{{ route('user.view-results') }}" class="active">View Results</a></li>
                <li><a href="{{ route('user.profile') }}">Profile</a></li>
            </ul>
        </div>
        <button class="logout-btn">Log out</button>
        <p class="footer-text">© 2025 CampusVote. All rights reserved.</p>
    </div>

    <div class="main-content">
        <div class="header">CampusVote</div>

        <div class="card" style="text-align: center">
            <h3>Election Results</h3>
            <p><b>Classroom Officers (3A1)</b></p>
            <p>
                📅 October 4, 2025 &nbsp;&nbsp; 🕒 Last Updated: 7:30 PM &nbsp;&nbsp;
                👥 267 Total Votes
            </p>
        </div>

        <div class="card result-item">
            <h4>President</h4>
            <p>
                <img src="{{ asset('images/user-icon.png') }}" alt=""> Nominee1 - 45% (120 votes)
            </p>
            <div class="result-bar"><span style="width: 45%"></span></div>
            <p>
                <img src="{{ asset('images/user-icon.png') }}" alt=""> Nominee2 - 35% (94 votes)
            </p>
            <div class="result-bar">
                <span style="width: 35%; background: #888"></span>
            </div>
            <p>
                <img src="{{ asset('images/user-icon.png') }}" alt=""> Nominee3 - 20% (53 votes)
            </p>
            <div class="result-bar">
                <span style="width: 20%; background: #ccc"></span>
            </div>
        </div>

        <div class="card result-item">
            <h4>Vice President</h4>
            <p>
                <img src="{{ asset('images/user-icon.png') }}" alt=""> Nominee1 - 60% (158 votes)
            </p>
            <div class="result-bar"><span style="width: 60%"></span></div>
            <p>
                <img src="{{ asset('images/user-icon.png') }}" alt=""> Nominee2 - 25% (65 votes)
            </p>
            <div class="result-bar">
                <span style="width: 25%; background: #888"></span>
            </div>
            <p>
                <img src="{{ asset('images/user-icon.png') }}" alt=""> Nominee3 - 15% (44 votes)
            </p>
            <div class="result-bar">
                <span style="width: 15%; background: #ccc"></span>
            </div>
        </div>

        <div class="card result-item">
            <h4>Secretary</h4>
            <p>
                <img src="{{ asset('images/user-icon.png') }}" alt=""> Nominee1 - 45% (130 votes)
            </p>
            <div class="result-bar"><span style="width: 42%"></span></div>
            <p>
                <img src="{{ asset('images/user-icon.png') }}" alt=""> Nominee2 - 35% (24 votes)
            </p>
            <div class="result-bar">
                <span style="width: 30%; background: #888"></span>
            </div>
            <p>
                <img src="{{ asset('images/user-icon.png') }}" alt=""> Nominee3 - 20% (43 votes)
            </p>
            <div class="result-bar">
                <span style="width: 24%; background: #ccc"></span>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>