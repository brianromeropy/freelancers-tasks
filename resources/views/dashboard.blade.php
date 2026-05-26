@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
    <section class="mb-8 overflow-hidden rounded-xl border border-slate-200 bg-white shadow-lg">
        <div class="grid gap-0 lg:grid-cols-2">
            <div class="bg-gradient-to-r from-slate-900 to-blue-900 p-8 text-white flex flex-col justify-center">
                <h1 class="text-3xl font-bold mb-2">Panel de inicio</h1>
                <p class="text-slate-300 mb-6">
                    Bienvenido a <strong>FreelanceTasks</strong>, una plataforma inspirada en herramientas como Kanban DevOps,
                    orientada a freelancers que necesitan organizar su trabajo de forma ágil y visual.
                </p>
                <div>
                    <a href="https://freelancerstasksua.blogspot.com/?presentador={{ urlencode($presenter['full_name'] ?? auth()->user()->name) }}" target="_blank" class="inline-flex items-center gap-2 rounded-lg bg-blue-500 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-400 transition shadow-md">
                        Novedades y Noticias (Blog)
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    </a>
                </div>
            </div>
            <div class="relative min-h-[220px] overflow-hidden border-l border-slate-200 bg-gradient-to-br from-slate-50 via-blue-50 to-slate-100">
                <div class="absolute inset-0 opacity-40">
                    <div class="absolute -right-8 -top-8 h-40 w-40 rounded-full bg-blue-400/30 blur-2xl"></div>
                    <div class="absolute -bottom-10 left-4 h-32 w-32 rounded-full bg-slate-400/20 blur-2xl"></div>
                </div>
                <div class="relative flex h-full min-h-[220px] flex-col items-center justify-center p-6 text-center">
                    <div class="mb-4 flex h-20 w-20 items-center justify-center rounded-2xl bg-blue-600 text-3xl font-bold text-white shadow-lg shadow-blue-600/30">
                        FT
                    </div>
                    <p class="text-lg font-bold text-slate-800">FreelanceTasks</p>
                    <p class="mt-1 max-w-xs text-sm text-slate-500">Gestor de proyectos y tareas para freelancers</p>
                    <div class="mt-5 flex items-end justify-center gap-2">
                        <div class="flex w-14 flex-col rounded-lg border border-slate-200 bg-white/90 p-2 shadow-sm">
                            <span class="mb-2 h-1.5 w-full rounded bg-slate-300"></span>
                            <span class="mb-1.5 h-6 w-full rounded bg-red-100"></span>
                            <span class="h-5 w-full rounded bg-slate-100"></span>
                            <p class="mt-2 text-[9px] font-semibold uppercase text-slate-500">Por hacer</p>
                        </div>
                        <div class="flex w-14 flex-col rounded-lg border border-blue-200 bg-white/90 p-2 shadow-md ring-1 ring-blue-100">
                            <span class="mb-2 h-1.5 w-full rounded bg-blue-400"></span>
                            <span class="mb-1.5 h-6 w-full rounded bg-amber-100"></span>
                            <span class="h-5 w-full rounded bg-blue-50"></span>
                            <p class="mt-2 text-[9px] font-semibold uppercase text-blue-600">Progreso</p>
                        </div>
                        <div class="flex w-14 flex-col rounded-lg border border-emerald-200 bg-white/90 p-2 shadow-sm">
                            <span class="mb-2 h-1.5 w-full rounded bg-emerald-400"></span>
                            <span class="mb-1.5 h-6 w-full rounded bg-emerald-100 line-through decoration-emerald-400"></span>
                            <span class="h-5 w-full rounded bg-slate-100"></span>
                            <p class="mt-2 text-[9px] font-semibold uppercase text-emerald-600">Listo</p>
                        </div>
                    </div>
                    <svg class="mt-4 h-8 w-8 text-blue-500/60" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                    </svg>
                </div>
            </div>
        </div>
    </section>

    <section class="mb-8">
        <h2 class="text-xl font-bold text-slate-900 mb-4 flex items-center gap-2">
            <span class="h-8 w-1 rounded bg-blue-600"></span>
            Integrantes del grupo
        </h2>
        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ([
                ['nombre' => 'Brian Romero', 'inicial' => 'B'],
                ['nombre' => 'Junior Ortiz', 'inicial' => 'J'],
                ['nombre' => 'Rodney Melgarejo', 'inicial' => 'R'],
                ['nombre' => 'Gaston Pereira', 'inicial' => 'G'],
            ] as $integrante)
                <article class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm transition hover:shadow-md">
                    <div class="mb-3 flex h-12 w-12 items-center justify-center rounded-full bg-blue-100 text-blue-700 font-semibold">
                        {{ $integrante['inicial'] }}
                    </div>
                    <h3 class="font-semibold text-slate-900">{{ $integrante['nombre'] }}</h3>
                    <p class="text-sm text-slate-500">Integrante</p>
                </article>
            @endforeach
        </div>
    </section>

    <section class="mb-8 rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
        <h2 class="text-xl font-bold text-slate-900 mb-3">Descripción general del proyecto</h2>
        <p class="text-slate-600 leading-relaxed">
            <strong>FreelanceTasks</strong> es un gestor de tareas web diseñado para profesionales independientes
            (freelancers). Sigue un <strong>modelo jerárquico: Proyecto → Tareas → Estados</strong> (pendiente,
            en progreso, finalizado), permitiendo organizar el trabajo por cliente o entrega y visualizarlo en un tablero Kanban.
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

    <section class="mb-8 rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
        <h2 class="text-xl font-bold text-slate-900 mb-2">Funcionalidades del sistema</h2>
        <p class="text-sm text-slate-600 mb-4">
            Modelo jerárquico <strong>Proyecto → Tareas → Estados</strong>, alineado con <em>Freelance Tracker Lite</em>.
        </p>
        <div class="grid gap-4 md:grid-cols-3">
            <article class="rounded-lg border-l-4 border-emerald-500 bg-slate-50 p-4">
                <div class="mb-2 flex items-center justify-between gap-2">
                    <h3 class="font-semibold text-slate-900">Tablero Kanban por proyecto</h3>
                    <span class="shrink-0 rounded-full bg-emerald-100 px-2 py-0.5 text-xs font-medium text-emerald-700">Activo</span>
                </div>
                <p class="text-sm text-slate-600">
                    Crear proyectos, dividir en tareas y visualizar el flujo en columnas
                    <strong>Pendiente</strong>, <strong>En progreso</strong> y <strong>Finalizado</strong>.
                    Cada proyecto tiene su propio tablero dinámico en MySQL.
                </p>
            </article>
            <article class="rounded-lg border-l-4 border-emerald-500 bg-slate-50 p-4">
                <div class="mb-2 flex items-center justify-between gap-2">
                    <h3 class="font-semibold text-slate-900">Prioridad en tareas</h3>
                    <span class="shrink-0 rounded-full bg-emerald-100 px-2 py-0.5 text-xs font-medium text-emerald-700">Activo</span>
                </div>
                <p class="text-sm text-slate-600">
                    Cada tarea se registra con prioridad <strong>Alta</strong>, <strong>Media</strong> o <strong>Baja</strong>,
                    visible en el tablero con etiquetas de color para identificar lo más urgente.
                </p>
            </article>
            <article class="rounded-lg border-l-4 border-amber-400 bg-slate-50 p-4">
                <div class="mb-2 flex items-center justify-between gap-2">
                    <h3 class="font-semibold text-slate-900">Control de tiempos</h3>
                    <span class="shrink-0 rounded-full bg-amber-100 px-2 py-0.5 text-xs font-medium text-amber-700">Próxima fase</span>
                </div>
                <p class="text-sm text-slate-600">
                    Registro de horas estimadas y reales por tarea para medir productividad y facturación al cliente.
                    Previsto como mejora futura del módulo de proyectos.
                </p>
            </article>
        </div>
    </section>

    @php
        $columns = [
            'pendiente' => [
                'label' => 'Pendiente',
                'header' => 'text-slate-700',
                'border' => 'border-slate-200',
                'bg' => 'bg-slate-50/80',
                'badge' => 'bg-slate-200 text-slate-600',
            ],
            'en_progreso' => [
                'label' => 'En progreso',
                'header' => 'text-blue-800',
                'border' => 'border-blue-200',
                'bg' => 'bg-blue-50/40',
                'badge' => 'bg-blue-100 text-blue-700',
            ],
            'finalizado' => [
                'label' => 'Finalizado',
                'header' => 'text-emerald-800',
                'border' => 'border-emerald-200',
                'bg' => 'bg-emerald-50/40',
                'badge' => 'bg-emerald-100 text-emerald-700',
            ],
        ];
    @endphp

    <section class="mb-8 rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
        <h2 class="text-xl font-bold text-slate-900 mb-2 flex items-center gap-2">
            <span class="h-8 w-1 rounded bg-blue-600"></span>
            Mis proyectos
        </h2>
        <p class="text-sm text-slate-500 mb-4">Crear proyectos y elegir uno para ver su tablero Kanban.</p>

        <form method="POST" action="{{ route('projects.store') }}" class="mb-6 grid gap-4 md:grid-cols-3">
            @csrf
            <div class="md:col-span-1">
                <label for="project_name" class="block text-sm font-medium text-slate-700 mb-1">Nombre del proyecto</label>
                <input type="text" id="project_name" name="name" value="{{ old('name') }}" required
                       placeholder="Ej: App móvil cliente X"
                       class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none">
                @error('name')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
            </div>
            <div class="md:col-span-1">
                <label for="project_description" class="block text-sm font-medium text-slate-700 mb-1">Descripción</label>
                <input type="text" id="project_description" name="description" value="{{ old('description') }}"
                       placeholder="Opcional"
                       class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none">
            </div>
            <div class="flex items-end">
                <button type="submit"
                        class="w-full rounded-lg bg-slate-800 px-4 py-2 text-sm font-medium text-white hover:bg-slate-700 transition">
                    Crear proyecto
                </button>
            </div>
        </form>

        @if ($projects->isNotEmpty())
            <div class="flex flex-wrap gap-2">
                @foreach ($projects as $project)
                    <a href="{{ route('dashboard', ['project' => $project->id]) }}#kanban"
                       @class([
                           'inline-flex items-center gap-2 rounded-lg border px-4 py-2 text-sm font-medium transition',
                           'border-blue-600 bg-blue-50 text-blue-800 ring-2 ring-blue-200' => $activeProject && $activeProject->id === $project->id,
                           'border-slate-200 bg-white text-slate-700 hover:border-blue-300 hover:bg-slate-50' => ! $activeProject || $activeProject->id !== $project->id,
                       ])>
                        <span>{{ $project->name }}</span>
                        <span class="rounded-full bg-slate-200 px-2 py-0.5 text-xs text-slate-600">{{ $project->tasks_count }} tareas</span>
                    </a>
                @endforeach
            </div>
        @else
            <p class="rounded-lg border border-dashed border-slate-300 bg-slate-50 p-4 text-sm text-slate-500 text-center">
                Creá tu primer proyecto para comenzar a agregar tareas.
            </p>
        @endif
    </section>

    @if ($activeProject)
    <section class="mb-8 rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
        <h2 class="text-xl font-bold text-slate-900 mb-1 flex items-center gap-2">
            <span class="h-8 w-1 rounded bg-blue-600"></span>
            Nueva tarea
        </h2>
        <p class="text-sm text-slate-500 mb-4">Proyecto activo: <strong class="text-slate-800">{{ $activeProject->name }}</strong></p>
        <form method="POST" action="{{ route('tasks.store') }}" class="grid gap-4 md:grid-cols-2 lg:grid-cols-4">
            @csrf
            <input type="hidden" name="project_id" value="{{ $activeProject->id }}">
            <div class="lg:col-span-1">
                <label for="title" class="block text-sm font-medium text-slate-700 mb-1">Título</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" required
                       placeholder="Ej: Diseño de wireframes"
                       class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none">
                @error('title')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
            </div>
            <div class="lg:col-span-1">
                <label for="description" class="block text-sm font-medium text-slate-700 mb-1">Descripción</label>
                <input type="text" id="description" name="description" value="{{ old('description') }}"
                       placeholder="Opcional"
                       class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none">
            </div>
            <div>
                <label for="priority" class="block text-sm font-medium text-slate-700 mb-1">Prioridad</label>
                <select id="priority" name="priority" required
                        class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none">
                    <option value="alta" @selected(old('priority') === 'alta')>Alta</option>
                    <option value="media" @selected(old('priority', 'media') === 'media')>Media</option>
                    <option value="baja" @selected(old('priority') === 'baja')>Baja</option>
                </select>
            </div>
            <div class="flex items-end">
                <button type="submit"
                        class="w-full rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-500 transition">
                    Crear tarea
                </button>
            </div>
        </form>
    </section>
    @endif

    <section id="kanban" class="mb-8 scroll-mt-24">
        @if (session('success'))
            <div class="mb-4 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800">
                {{ session('success') }}
            </div>
        @endif
        <div class="mb-5 flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <h2 class="text-xl font-bold text-slate-900 flex items-center gap-2">
                    <span class="h-8 w-1 rounded bg-blue-600"></span>
                    Tablero Kanban
                </h2>
                <p class="mt-1 text-sm text-slate-500 pl-3">
                    @if ($activeProject)
                        Proyecto: <strong>{{ $activeProject->name }}</strong> — modelo Proyecto → Tareas → Estados
                    @else
                        Seleccioná o creá un proyecto para ver el tablero
                    @endif
                </p>
            </div>
            @if ($activeProject)
            <span class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white px-3 py-1 text-xs font-medium text-slate-500 shadow-sm">
                <span class="h-2 w-2 rounded-full bg-blue-500"></span>
                {{ $tasks->flatten()->count() }} tareas
            </span>
            @endif
        </div>

        @if ($activeProject)
        <div class="grid gap-5 lg:grid-cols-3">
            @foreach ($columns as $status => $column)
                @php $columnTasks = $tasks->get($status, collect()); @endphp
                <div @class(['flex flex-col rounded-xl border shadow-md', $column['border'], $column['bg']])>
                    <div @class(['flex items-center justify-between border-b bg-white px-4 py-3 rounded-t-xl', $column['border']])>
                        <h3 @class(['text-sm font-bold uppercase tracking-wide', $column['header']])>{{ $column['label'] }}</h3>
                        <span @class(['flex h-6 w-6 items-center justify-center rounded-full text-xs font-semibold', $column['badge']])>{{ $columnTasks->count() }}</span>
                    </div>
                    <div class="flex flex-col gap-3 p-4">
                        @forelse ($columnTasks as $task)
                            <x-task-card :task="$task" />
                        @empty
                            <p class="rounded-lg border border-dashed border-slate-300 bg-white/60 p-4 text-center text-xs text-slate-400">
                                Sin tareas en esta columna
                            </p>
                        @endforelse
                    </div>
                </div>
            @endforeach
        </div>
        @else
            <p class="rounded-lg border border-dashed border-slate-300 bg-slate-50 p-8 text-center text-slate-500">
                No hay proyecto seleccionado. Creá uno en la sección <strong>Mis proyectos</strong>.
            </p>
        @endif
    </section>
@endsection
