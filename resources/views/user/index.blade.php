<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CampusVote | Home</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <div>
            <h2>Welcome</h2>
            <ul class="nav-links">
                <li><a href="{{ route('user.index') }}" class="active">Home</a></li>
                <li><a href="{{ route('user.vote-now') }}">Vote Now</a></li>
                <li><a href="{{ route('user.view-votes') }}">View Votes</a></li>
                <li><a href="{{ route('user.view-results') }}">View Results</a></li>
                <li><a href="{{ route('user.profile') }}">Profile</a></li>
            </ul>
        </div>

        <button class="logout-btn">Log out</button>
        <p class="footer-text">© 2025 CampusVote. All rights reserved.</p>
    </aside>

    <!-- Main Page Content -->
    <main class="main-content">
        <!-- Header / Search -->
        <div class="top-bar">
            <h1>CampusVote</h1>
            <div class="search-box">
                <input type="text" placeholder="Search">
            </div>
        </div>

        <!-- Welcome Text -->
        <section class="welcome-section">
            <h2>
                <strong>Welcome, <em>User Name!</em></strong>
            </h2>
            <p><em>"Cast your vote and make your voice heard."</em></p>
        </section>

        <!-- Content Layout -->
        <div class="content-grid">
            <!-- 3 Cards -->
            <div class="cards-section">
                <div class="card" id="voteNowCard">
                    <h3>Vote Now</h3>
                    <p>Cast your vote in active elections and make your voice heard.</p>
                    <button class="btn blue">Start Voting</button>
                </div>

                <div class="card" id="viewVotesCard">
                    <h3>View Vote</h3>
                    <p>Check your voting history and verify your submissions.</p>
                    <button class="btn green">View History</button>
                </div>

                <div class="card" id="viewResultsCard">
                    <h3>View Results</h3>
                    <p>See real-time results and election outcomes.</p>
                    <br>
                    <button class="btn purple">View Results</button>
                </div>
            </div>

            <!-- Announcements -->
            <aside class="announcements">
                <h4>📢 Announcements</h4>
                <ul>
                    <li class="blue-box">
                        Each student can only vote once per election.
                    </li>
                    <li class="red-box">
                        Election closes on <b>November 20, 2025</b> at 11:59 PM.
                    </li>
                    <li class="green-box">
                        Use your Google Account to log in securely.
                    </li>
                    <li class="yellow-box">
                        Contact admin if you encounter login or voting issues.
                    </li>
                </ul>
            </aside>
        </div>
    </main>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>