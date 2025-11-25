@extends('layouts.app')

@section('title', 'Admin Login - CampusVote')

@section('content')
    <div class="auth-container">
        <div class="auth-left">
            <div class="logo-box">
                <div class="logo-icon">
                    <img src="{{ asset('images/download.webp') }}" alt="Campusvote-logo">
                </div>
            </div>


            <div class="info-description">
                Manage the Campus Vote platform, monitor voting activities, and oversee candidate information. Ensure a fair
                and secure election process for all students.
            </div>
        </div>

        <div class="auth-right">
            <div class="login-card">
                <h1 class="login-title">Admin Login</h1>

                @if ($errors->any())
                    <div class="error-message">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.login') }}">
                    @csrf
                    <div class="form-group">
                        <input type="email" name="email" class="form-input" placeholder="Admin Email"
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
                    <a href="{{ route('voter.login') }}" class="login-link">← Back to User Login</a>
                </div>
            </div>
        </div>
    </div>
@endsection
