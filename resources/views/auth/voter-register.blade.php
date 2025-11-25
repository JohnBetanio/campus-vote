@extends('layouts.app')

@section('title', 'Student Registration - CampusVote')

@section('content')
<div class="auth-container">
    <div class="auth-left">
        <div class="logo-box">
            <div class="logo-icon">
                <svg viewBox="0 0 24 24">
                    <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 2c1.93 0 3.5 1.57 3.5 3.5S13.93 12 12 12s-3.5-1.57-3.5-3.5S10.07 5 12 5zm7 13H5v-.23c0-.62.28-1.2.76-1.58C7.47 15.14 9.64 14.5 12 14.5s4.53.64 6.24 1.69c.48.38.76.97.76 1.58V18z"/>
                </svg>
            </div>
            <div class="logo-text">Campus Vote</div>
        </div>
        
        <div class="info-title">Join Campus Vote</div>
        <div class="info-description">
            Register your account to participate in campus elections. Your voice matters!
        </div>
    </div>
    
    <div class="auth-right">
        <div class="login-card">
            <h1 class="login-title">Student Registration</h1>
            
            @if ($errors->any())
                <div class="error-message">
                    <ul style="margin: 0; padding-left: 20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form method="POST" action="{{ route('voter.register') }}">
                @csrf
                
                <div class="form-group">
                    <input type="text" name="name" class="form-input" 
                           placeholder="Full Name" 
                           value="{{ old('name') }}" 
                           required autofocus>
                </div>
                
                <div class="form-group">
                    <input type="email" name="email" class="form-input" 
                           placeholder="Student Email" 
                           value="{{ old('email') }}" 
                           required>
                </div>
                
                <div class="form-group">
                    <input type="text" name="course" class="form-input" 
                           placeholder="Course (e.g., BSIT)" 
                           value="{{ old('course') }}" 
                           required>
                </div>
                
                <div class="form-group">
                    <input type="password" name="password" class="form-input" 
                           placeholder="Password" 
                           required>
                </div>
                
                <div class="form-group">
                    <input type="password" name="password_confirmation" class="form-input" 
                           placeholder="Confirm Password" 
                           required>
                </div>
                
                <button type="submit" class="btn-login">Register</button>
            </form>
            
            <div class="login-footer">
                <a href="{{ route('voter.login') }}" class="login-link">Already have an account? Login</a>
            </div>
        </div>
    </div>
</div>
@endsection