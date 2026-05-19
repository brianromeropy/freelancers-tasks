@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <section class="mb-8 rounded-xl bg-gradient-to-r from-slate-900 to-blue-900 p-8 text-white shadow-lg">
        <h1 class="text-3xl font-bold mb-2">Panel de inicio</h1>
        <p class="text-slate-300 max-w-2xl">
            Bienvenido a <strong>FreelanceTasks</strong>, una plataforma inspirada en herramientas como Azure DevOps,
            orientada a freelancers que necesitan organizar su trabajo de forma ágil y visual.
        </p>
    </section>

    <section class="mb-8">
        <h2 class="text-xl font-bold text-slate-900 mb-4 flex items-center gap-2">
            <span class="h-8 w-1 rounded bg-blue-600"></span>
            Integrantes del grupo
        </h2>
        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ([
                ['nombre' => '[Nombre Integrante 1]', 'rol' => 'Líder / Backend'],
                ['nombre' => '[Nombre Integrante 2]', 'rol' => 'Frontend / Diseño'],
                ['nombre' => '[Nombre Integrante 3]', 'rol' => 'Base de datos / QA'],
            ] as $integrante)
                <article class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm hover:shadow-md transition">
                    <div class="mb-3 flex h-12 w-12 items-center justify-center rounded-full bg-blue-100 text-blue-700 font-semibold">
                        {{ substr($integrante['nombre'], 1, 1) }}
                    </div>
                    <h3 class="font-semibold text-slate-900">{{ $integrante['nombre'] }}</h3>
                    <p class="text-sm text-slate-500">{{ $integrante['rol'] }}</p>
                </article>
            @endforeach
        </div>
    </section>

    <section class="mb-8 rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
        <h2 class="text-xl font-bold text-slate-900 mb-3">Descripción general del proyecto</h2>
        <p class="text-slate-600 leading-relaxed">
            <strong>FreelanceTasks</strong> es un gestor de tareas web diseñado para profesionales independientes
            (freelancers) que trabajan en múltiples proyectos simultáneamente. Permite registrar tareas con título,
            descripción, estado y prioridad, asociadas a cada usuario autenticado. El objetivo es centralizar el trabajo
            diario en un tablero claro, similar a un clon simplificado de Azure DevOps, con enfoque en productividad
            y seguimiento del avance.
        </p>
    </section>

    <section class="mb-8 rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
        <h2 class="text-xl font-bold text-slate-900 mb-4">Definición del diseño</h2>
        <div class="grid gap-6 md:grid-cols-3">
            <div class="rounded-lg bg-slate-50 p-4">
                <h3 class="font-semibold text-slate-800 mb-2">Paleta de colores</h3>
                <ul class="space-y-2 text-sm text-slate-600">
                    <li class="flex items-center gap-2">
                        <span class="h-4 w-4 rounded bg-slate-900"></span> Gris oscuro (#0f172a) — cabecera
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="h-4 w-4 rounded bg-blue-600"></span> Azul (#2563eb) — acciones y acentos
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="h-4 w-4 rounded bg-slate-100 border"></span> Gris claro (#f1f5f9) — fondo
                    </li>
                </ul>
            </div>
            <div class="rounded-lg bg-slate-50 p-4">
                <h3 class="font-semibold text-slate-800 mb-2">Tipografía</h3>
                <p class="text-sm text-slate-600">
                    <strong>Roboto</strong> (Google Fonts) en pesos 300, 400, 500 y 700 para títulos, cuerpo y botones.
                </p>
            </div>
            <div class="rounded-lg bg-slate-50 p-4">
                <h3 class="font-semibold text-slate-800 mb-2">Logo</h3>
                <p class="text-sm text-slate-600 mb-3">
                    Monograma <strong>FT</strong> sobre fondo azul, representando <em>FreelanceTasks</em>.
                </p>
                <div class="inline-flex h-14 w-14 items-center justify-center rounded-xl bg-blue-600 text-white text-xl font-bold">
                    FT
                </div>
            </div>
        </div>
    </section>

    <section class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
        <h2 class="text-xl font-bold text-slate-900 mb-4">Funcionalidades propuestas</h2>
        <div class="grid gap-4 md:grid-cols-3">
            <article class="rounded-lg border-l-4 border-blue-600 bg-slate-50 p-4">
                <h3 class="font-semibold text-slate-900 mb-2">Tablero Kanban visual</h3>
                <p class="text-sm text-slate-600">
                    Columnas Por hacer, En progreso y Finalizado para arrastrar tareas y ver el flujo de trabajo al estilo DevOps.
                </p>
            </article>
            <article class="rounded-lg border-l-4 border-blue-600 bg-slate-50 p-4">
                <h3 class="font-semibold text-slate-900 mb-2">Filtro por prioridad</h3>
                <p class="text-sm text-slate-600">
                    Filtrado rápido por prioridad baja, media o alta para enfocarse en lo más urgente del día.
                </p>
            </article>
            <article class="rounded-lg border-l-4 border-blue-600 bg-slate-50 p-4">
                <h3 class="font-semibold text-slate-900 mb-2">Control de tiempos</h3>
                <p class="text-sm text-slate-600">
                    Registro de horas estimadas y reales por tarea para medir productividad y facturación al cliente.
                </p>
            </article>
        </div>
    </section>
@endsection
