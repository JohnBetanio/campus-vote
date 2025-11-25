<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Votes - CampusVote</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="sidebar">
        <div>
            <h2>View Votes</h2>
            <ul class="nav-links">
                <li><a href="{{ route('user.index') }}">Home</a></li>
                <li><a href="{{ route('user.vote-now') }}">Vote Now</a></li>
                <li><a href="{{ route('user.view-votes') }}" class="active">View Votes</a></li>
                <li><a href="{{ route('user.view-results') }}">View Results</a></li>
                <li><a href="{{ route('user.profile') }}">Profile</a></li>
            </ul>
        </div>
        <button class="logout-btn">Log out</button>
        <p class="footer-text">© 2025 CampusVote. All rights reserved.</p>
    </div>

    <div class="main-content">
        <div class="header">CampusVote</div>

        <div class="card">
            <h3>Your Submitted Votes</h3>
            <p>
                Election:
                <a href="#" style="color: #3366cc">Classroom Officers – 3A1</a>
            </p>
        </div>

        <div class="card">
            <h4>Your Vote Summary</h4>
            <p>Review the candidates you selected for each position</p>
            <table class="table">
                <tr>
                    <th>Position</th>
                    <th>Voted Candidate</th>
                    <th>Status</th>
                </tr>
                <tr>
                    <td>President</td>
                    <td><img src="{{ asset('images/user-icon.png') }}" alt=""> Nominee 2</td>
                    <td class="status">✓ Voted</td>
                </tr>
                <tr>
                    <td>Vice President</td>
                    <td><img src="{{ asset('images/user-icon.png') }}" alt=""> Nominee 1</td>
                    <td class="status">✓ Voted</td>
                </tr>
                <tr>
                    <td>Secretary</td>
                    <td><img src="{{ asset('images/user-icon.png') }}" alt=""> Nominee 3</td>
                    <td class="status">✓ Voted</td>
                </tr>
                <tr>
                    <td>Treasurer</td>
                    <td><img src="{{ asset('images/user-icon.png') }}" alt=""> Nominee 1</td>
                    <td class="status">✓ Voted</td>
                </tr>
            </table>
        </div>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>