<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Vote - Login</title>
    <link rel="stylesheet" href="{{ asset('css/admin-style.css') }}">
</head>
<body>
    <div class="container">
        <!-- LEFT SIDE -->
        <div class="left">
            <img src="{{ asset('images/download.webp') }}" alt="Campus Vote Logo">
            <h1>Campus Vote</h1>
            <p>
                Campus Vote is your online student election platform. Log in to view
                candidates, cast your vote securely, and make your voice heard on
                campus decisions. Your vote counts!
            </p>
        </div>

        <!-- RIGHT SIDE -->
        <div class="right">
            <div class="login-box">
                <h2>Student Login</h2>
                <form id="studentForm">
                    <input type="email" id="studentEmail" placeholder="Student Email" required>
                    <input type="password" id="studentPassword" placeholder="Password" required>
                    <button type="submit">Login</button>
                </form>
                <a href="{{ route('admin.login') }}" id="loginAsAdmin">Login as Admin</a>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>