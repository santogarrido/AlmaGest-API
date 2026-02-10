@extends('layouts.app')

@section('content')
<div class="welcome-container">
    <div class="welcome-card">
        <h1 class="welcome-title">Welcome to Almagest</h1>
        <p class="welcome-text">
            Discover our features and join our community.<br>
            You can create an account or login to continue.
        </p>

        <div class="welcome-buttons">
            <a href="{{ route('register') }}" class="btn-welcome">Sign Up</a>
            <a href="{{ route('login') }}" class="btn-welcome btn-outline">Login</a>
        </div>
    </div>
</div>
@endsection
