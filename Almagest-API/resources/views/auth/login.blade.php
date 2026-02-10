@extends('layouts.app')

@section('content')
<div class="login-container">

    <div class="login-card">
        <h2 class="login-title">{{ __('Login') }}</h2>

        {{-- Mensaje de éxito email--}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        {{-- Mensaje de warning --}}
        @if(session('warning'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('warning') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        {{-- Mensaje de info --}}
        @if(session('info'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                {{ session('info') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- Email --}}
            <div class="form-group">
                <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                <label for="email">{{ __('Email') }}</label>
                @error('email') <p class="error">{{ $message }}</p> @enderror
            </div>

            {{-- Password --}}
            <div class="form-group">
                <input id="password" type="password" name="password" required>
                <label for="password">{{ __('Password') }}</label>
                @error('password') <p class="error">{{ $message }}</p> @enderror
            </div>

            {{-- Remember Me --}}
            <div class="checkbox-group">
                <label class="remember-label">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    {{ __('Remember Me') }}
                </label>
            </div>

            {{-- Submit Button --}}
            <div class="form-group">
                <button type="submit" class="btn-login">
                    {{ __('Login') }}
                </button>
            </div>

            {{-- Forgot Password --}}
            @if (Route::has('password.request'))
                <p class="login-link">
                    <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                </p>
            @endif

            {{-- Link to Register --}}
            <p class="login-link">
                {{ __("Don't have an account?") }} <a href="{{ route('register') }}">Sign up</a>
            </p>
        </form>
    </div>
</div>
@endsection
