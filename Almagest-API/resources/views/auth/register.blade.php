@extends('layouts.app')

@section('content')
<div class="register-container">
    <div class="register-card">
        <h2 class="register-title">{{ __('Create your account') }}</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            {{-- First Name --}}
            <div class="form-group">
                <input id="firstname" type="text" name="firstname" value="{{ old('firstname') }}" required>
                <label for="firstname">{{ __('First Name') }}</label>
                @error('firstname') <p class="error">{{ $message }}</p> @enderror
            </div>

            {{-- Second Name --}}
            <div class="form-group">
                <input id="secondname" type="text" name="secondname" value="{{ old('secondname') }}" required>
                <label for="secondname">{{ __('Second Name') }}</label>
                @error('secondname') <p class="error">{{ $message }}</p> @enderror
            </div>

            {{-- Email --}}
            <div class="form-group">
                <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                <label for="email">{{ __('Email Address') }}</label>
                @error('email') <p class="error">{{ $message }}</p> @enderror
            </div>

            {{-- Password --}}
            <div class="form-group">
                <input id="password" type="password" name="password" required>
                <label for="password">{{ __('Password') }}</label>
                @error('password') <p class="error">{{ $message }}</p> @enderror
            </div>

            {{-- Confirm Password --}}
            <div class="form-group">
                <input id="password-confirm" type="password" name="password_confirmation" required>
                <label for="password-confirm">{{ __('Confirm Password') }}</label>
            </div>

            {{-- Company --}}
            <div class="form-group">
                <select id="company_id" name="company_id" required>
                    <option value="" disabled selected></option>
                    @foreach(\App\Models\Company::all() as $company)
                        <option value="{{ $company->id }}" {{ old('company_id') == $company->id ? 'selected' : '' }}>
                            {{ $company->name }}
                        </option>
                    @endforeach
                </select>
                <label for="company_id">{{ __('Company') }}</label>
                @error('company_id') <p class="error">{{ $message }}</p> @enderror
            </div>

            {{-- Submit Button --}}
            <div class="form-group">
                <button type="submit" class="btn-register">
                    {{ __('Register') }}
                </button>
            </div>

            {{-- Link al login --}}
            <p class="text-center login-link">
                Already have an account? <a href="{{ route('login') }}" class="text-primary fw-medium">Sign in</a>
            </p>
        </form>
    </div>
</div>
@endsection
