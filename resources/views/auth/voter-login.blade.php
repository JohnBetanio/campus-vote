@extends('layouts.app')

@section('title', 'Student Login - CampusVote')

@section('content')
    <div class="auth-container">
        <div class="auth-left">
            <div class="logo-box">
                <div class="logo-icon">
                    <img src="{{ asset('images/download.webp') }}" alt="Campusvote-logo">
                </div>
            </div>


            <div class="info-description">
                Campus Vote is your online student election platform. Log in to view candidates, cast your vote securely,
                and make your voice heard on campus decisions. Your vote counts!
            </div>
        </div>

        <div class="auth-right">
            <div class="login-card">
                <h1 class="login-title">Student Login</h1>

                @if ($errors->any())
                    <div class="error-message">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('voter.login') }}">
                    @csrf
                    <div class="form-group">
                        <input type="email" name="email" class="form-input" placeholder="Student Email"
                            value="{{ old('email') }}" required autofocus>
                    </div>

                    <div class="form-group">
                        <input type="password" name="password" class="form-input" placeholder="Password" required>
                    </div>

                    <button type="submit" class="btn-login">Login</button>
                </form>

                <div class="login-footer">
                    <a href="{{ route('voter.register.form') }}" class="login-link">Don't have an account? Register</a>
                    <br>
                    <a href="{{ route('admin.login') }}" class="login-link">Login as Admin</a>
                </div>
            </div>
        </div>
    </div>
@endsection
