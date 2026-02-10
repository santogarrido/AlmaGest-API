<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel Admin') }}</title>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">

        <!-- Topbar -->
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm fixed-top">
            <div class="container-fluid d-flex align-items-center">
                <!-- Nombre de la app -->
                <span class="navbar-brand mb-0 me-3 fs-3">{{ config('app.name', 'Laravel Admin') }}</span>
                <!-- Botón para toggle sidebar -->
                <button class="btn btn-outline-light" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar">
                    <i class="fa-solid fa-bars mt-1 mb-1"></i>
                </button>

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="fa-solid fa-user text-light fs-4 me-3" href="#" data-bs-toggle="dropdown">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="d-flex"> <!-- Ajusta margin-top al alto del navbar -->

            <!-- Sidebar lateral -->
            <nav id="sidebar" class="bg-dark text-white vh-100 p-3 collapse" style="width: 220px;">
                <ul class="nav flex-column mt-4">
                    <br>
                    <br/>
                    <li class="nav-item mb-2">
                        <a class="nav-link text-white" href="{{ route('admin.index') }}">Users</a>
                    </li>
                    {{-- <li class="nav-item mb-2">
                        <a class="nav-link text-white" href="{{ route('admin.articles.index') }}">Articles</a>
                    </li> --}}
                </ul>
            </nav>

            <!-- Contenido principal -->
            <div class="flex-grow-1 p-5" id="main-content">
                @yield('content')
            </div>

        </div>
    </div>
</body>
</html>
