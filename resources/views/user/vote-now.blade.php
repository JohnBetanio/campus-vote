<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vote Now - CampusVote</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="sidebar">
        <div>
            <h2>Vote now</h2>
            <ul class="nav-links">
                <li><a href="{{ route('user.index') }}">Home</a></li>
                <li><a href="{{ route('user.vote-now') }}" class="active">Vote Now</a></li>
                <li><a href="{{ route('user.view-votes') }}">View Votes</a></li>
                <li><a href="{{ route('user.view-results') }}">View Results</a></li>
                <li><a href="{{ route('user.profile') }}">Profile</a></li>
            </ul>
        </div>
        <button class="logout-btn">Log out</button>
        <p class="footer-text">© 2025 CampusVote. All rights reserved.</p>
    </div>

    <div class="main-content">
        <div class="header">CampusVote</div>

        <div class="card" style="text-align: center">
            <h3><b>Ongoing Election</b></h3>
            <p><a href="#" style="color: #3366cc">Classroom Officers – 3A1</a></p>
            <p>(Select one candidate per position)</p>
        </div>

        <div class="vote-section">
            <div class="position-box">
                <h3>President</h3>
                <div class="candidate">
                    <label><img src="{{ asset('images/user-icon.png') }}" alt=""> Nominee1</label>
                    <input type="checkbox">
                </div>
                <div class="candidate">
                    <label><img src="{{ asset('images/user-icon.png') }}" alt=""> Nominee2</label>
                    <input type="checkbox">
                </div>
                <div class="candidate">
                    <label><img src="{{ asset('images/user-icon.png') }}" alt=""> Nominee3</label>
                    <input type="checkbox">
                </div>
            </div>

            <div class="position-box">
                <h3>Secretary</h3>
                <div class="candidate">
                    <label><img src="{{ asset('images/user-icon.png') }}" alt=""> Nominee1</label>
                    <input type="checkbox">
                </div>
                <div class="candidate">
                    <label><img src="{{ asset('images/user-icon.png') }}" alt=""> Nominee2</label>
                    <input type="checkbox">
                </div>
                <div class="candidate">
                    <label><img src="{{ asset('images/user-icon.png') }}" alt=""> Nominee3</label>
                    <input type="checkbox">
                </div>
            </div>

            <div class="position-box">
                <h3>Vice-President</h3>
                <div class="candidate">
                    <label><img src="{{ asset('images/user-icon.png') }}" alt=""> Nominee1</label>
                    <input type="checkbox">
                </div>
                <div class="candidate">
                    <label><img src="{{ asset('images/user-icon.png') }}" alt=""> Nominee2</label>
                    <input type="checkbox">
                </div>
                <div class="candidate">
                    <label><img src="{{ asset('images/user-icon.png') }}" alt=""> Nominee3</label>
                    <input type="checkbox">
                </div>
            </div>

            <div class="position-box">
                <h3>Treasurer</h3>
                <div class="candidate">
                    <label><img src="{{ asset('images/user-icon.png') }}" alt=""> Nominee1</label>
                    <input type="checkbox">
                </div>
                <div class="candidate">
                    <label><img src="{{ asset('images/user-icon.png') }}" alt=""> Nominee2</label>
                    <input type="checkbox">
                </div>
                <div class="candidate">
                    <label><img src="{{ asset('images/user-icon.png') }}" alt=""> Nominee3</label>
                    <input type="checkbox">
                </div>
            </div>

            <div class="position-box">
                <h3>Auditor</h3>
                <div class="candidate">
                    <label><img src="{{ asset('images/user-icon.png') }}" alt=""> Nominee1</label>
                    <input type="checkbox">
                </div>
                <div class="candidate">
                    <label><img src="{{ asset('images/user-icon.png') }}" alt=""> Nominee2</label>
                    <input type="checkbox">
                </div>
                <div class="candidate">
                    <label><img src="{{ asset('images/user-icon.png') }}" alt=""> Nominee3</label>
                    <input type="checkbox">
                </div>
            </div>

            <div class="position-box">
                <h3>PIO</h3>
                <div class="candidate">
                    <label><img src="{{ asset('images/user-icon.png') }}" alt=""> Nominee1</label>
                    <input type="checkbox">
                </div>
                <div class="candidate">
                    <label><img src="{{ asset('images/user-icon.png') }}" alt=""> Nominee2</label>
                    <input type="checkbox">
                </div>
                <div class="candidate">
                    <label><img src="{{ asset('images/user-icon.png') }}" alt=""> Nominee3</label>
                    <input type="checkbox">
                </div>
            </div>
        </div>

        <button class="submit-btn">Submit vote</button>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>