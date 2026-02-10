@extends('layouts.app')

@section('content')

<div class="welcome-container">

    <div style="display: flex; flex-direction: column; align-items: center; width: 100%;">

        @if(session('success'))
            <div style="width: 100%; max-width: 500px; margin-bottom: 15px;">
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            </div>
        @endif
    <div class="welcome-card">
        <h1 class="welcome-title">Welcome to Almagest</h1>
        <p class="welcome-text">
            Discover our features and join our community.<br>
            You can create an account or login to continue.
        </p>

        {{-- <div class="welcome-buttons">
            <a class="btn-welcome" href="{{ route('datesCompany') }}">Datos empresa</a>
            <a class="btn-welcome btn-outline">Pedidos</a>

        </div> --}}
    </div>
    </div>
</div>
@endsection
