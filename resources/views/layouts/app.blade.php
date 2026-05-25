<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'FreelanceTasks') }} — @yield('title', 'Inicio')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-['Roboto'] antialiased bg-slate-100 text-slate-800">
    <header class="bg-slate-900 text-white shadow-lg sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between h-16">
            <div class="flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-600 font-bold text-lg">
                    FT
                </div>
                <div>
                    <p class="text-sm font-semibold tracking-wide">FreelanceTasks</p>
                    <p class="text-xs text-slate-400">Gestor de tareas para freelancers</p>
                </div>
            </div>

            <nav class="flex items-center gap-4 text-sm font-medium">
                <a href="{{ route('dashboard') }}"
                   class="{{ request()->routeIs('dashboard') ? 'text-blue-400' : 'text-slate-300 hover:text-white' }} transition">
                    Inicio
                </a>
                <a href="{{ route('contacto') }}"
                   class="{{ request()->routeIs('contacto') ? 'text-blue-400' : 'text-slate-300 hover:text-white' }} transition">
                    Contáctenos
                </a>
                @auth
                    <span class="hidden sm:inline text-slate-400">|</span>
                    <span class="hidden sm:inline text-slate-300">{{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-slate-300 hover:text-white transition">
                            Cerrar sesión
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-slate-300 hover:text-white transition">Iniciar sesión</a>
                    <a href="{{ route('register') }}" class="rounded-md bg-blue-600 px-3 py-1.5 text-white hover:bg-blue-500 transition">
                        Registrarse
                    </a>
                @endauth
            </nav>
        </div>
    </header>

    <main class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @yield('content')
    </main>

    <footer class="mt-12 border-t border-slate-200 bg-white py-6 text-center">
        <p class="text-sm font-normal tracking-wide text-slate-600">
            &copy; 2026 FreelanceTasks — {{ $presenter['footer_name'] }} — {{ $presenter['career'] }}
        </p>
    </footer>
</body>
</html>
