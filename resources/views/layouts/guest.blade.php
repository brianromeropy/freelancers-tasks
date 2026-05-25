<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'FreelanceTasks') }} — Acceso</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-['Roboto'] text-slate-800 antialiased">
    <div class="min-h-screen flex flex-col justify-between items-center py-12 px-4 bg-gradient-to-br from-slate-50 via-blue-50 to-slate-100">
        {{-- Marca superior --}}
        <header class="text-center">
            <a href="{{ route('login') }}"
               class="inline-flex h-16 w-16 items-center justify-center rounded-2xl bg-slate-900 text-white text-2xl font-bold shadow-lg shadow-slate-900/25 ring-4 ring-white/80 transition hover:bg-slate-800">
                FT
            </a>
            <p class="mt-3 text-lg font-bold tracking-tight text-slate-900">FreelanceTasks</p>
            <p class="mt-1 text-xs font-medium uppercase tracking-widest text-blue-600/90">
                Gestión de proyectos · DevOps Lite
            </p>
        </header>

        {{-- Tarjeta del formulario --}}
        <main class="w-full sm:max-w-md flex-1 flex flex-col justify-center my-8">
            <div class="overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-xl shadow-slate-200/50">
                <div class="h-1 bg-gradient-to-r from-slate-900 via-blue-600 to-slate-900"></div>
                <div class="px-8 py-8 sm:px-10 sm:py-9">
                    {{ $slot }}
                </div>
            </div>
        </main>

        {{-- Pie discreto --}}
        <footer class="text-center">
            <p class="text-xs text-slate-500">
                &copy; {{ date('Y') }} FreelanceTasks — Desarrollo Web
            </p>
        </footer>
    </div>
</body>
</html>
