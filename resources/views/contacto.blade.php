@extends('layouts.app')

@section('title', 'Contáctenos')

@section('content')
    <section class="mb-8 rounded-xl bg-gradient-to-r from-slate-900 to-blue-900 p-8 text-white shadow-lg">
        <h1 class="text-3xl font-bold mb-2">Contáctenos</h1>
        <p class="text-slate-300 max-w-2xl">
            Propuesta de diseño personal de <strong>{{ $presenter['full_name'] }}</strong>.
            ¿Consultas sobre el proyecto o deseas una demostración? Completa el formulario o revisa la información de contacto.
        </p>
    </section>

    <div class="grid gap-8 lg:grid-cols-2">
        <section class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
            <h2 class="text-lg font-semibold text-slate-900 mb-4">Formulario de contacto</h2>
            <form action="#" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="nombre" class="block text-sm font-medium text-slate-700 mb-1">Nombre completo</label>
                    <input type="text" id="nombre" name="nombre" required
                           placeholder="Tu nombre"
                           class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-slate-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition">
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-slate-700 mb-1">Correo electrónico</label>
                    <input type="email" id="email" name="email" required
                           placeholder="correo@ejemplo.com"
                           class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-slate-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition">
                </div>
                <div>
                    <label for="asunto" class="block text-sm font-medium text-slate-700 mb-1">Asunto</label>
                    <input type="text" id="asunto" name="asunto" required
                           placeholder="Consulta sobre FreelanceTasks"
                           class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-slate-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition">
                </div>
                <div>
                    <label for="mensaje" class="block text-sm font-medium text-slate-700 mb-1">Mensaje</label>
                    <textarea id="mensaje" name="mensaje" rows="5" required
                              placeholder="Escribe tu mensaje aquí..."
                              class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-slate-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition resize-y"></textarea>
                </div>
                <button type="submit"
                        class="w-full rounded-lg bg-blue-600 px-4 py-2.5 font-medium text-white hover:bg-blue-500 focus:ring-4 focus:ring-blue-200 transition">
                    Enviar mensaje
                </button>
                <p class="text-xs text-slate-500 text-center">
                    * El envío de correos se implementará en una fase posterior del proyecto.
                </p>
            </form>
        </section>

        <section class="space-y-6">
            <article class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
                <div class="mb-4 flex items-center gap-2">
                    <span class="h-8 w-1 rounded bg-blue-600"></span>
                    <h2 class="text-lg font-semibold text-slate-900">Alumno presentador del sistema</h2>
                </div>
                <div class="text-sm text-slate-600 space-y-3">
                    <div class="rounded-lg bg-slate-50 p-4 border border-slate-100">
                        <p class="text-lg font-bold text-slate-900">{{ $presenter['full_name'] }}</p>
                        <p class="text-blue-600 font-medium mt-1">{{ $presenter['career'] }}</p>
                    </div>
                    <ul class="space-y-2">
                        <li class="flex items-start gap-2">
                            <svg class="h-4 w-4 mt-0.5 text-blue-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <span><strong class="text-slate-800">Correo:</strong> {{ $presenter['contact_email'] }}</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="h-4 w-4 mt-0.5 text-blue-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <span><strong class="text-slate-800">Teléfono:</strong> {{ $presenter['phone'] }}</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="h-4 w-4 mt-0.5 text-blue-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                            <span><strong class="text-slate-800">Materia:</strong> Desarrollo Web — Proyecto grupal</span>
                        </li>
                    </ul>
                    <p class="pt-1 text-slate-500 leading-relaxed">
                        Sustentación del sistema <strong>FreelanceTasks</strong>: gestor de tareas para freelancers
                        con autenticación Laravel Breeze, base MySQL y diseño responsive con Tailwind CSS.
                    </p>
                </div>
            </article>

            <article class="rounded-lg border border-slate-200 bg-white overflow-hidden shadow-sm">
                <div class="border-b border-slate-200 bg-slate-50 px-6 py-3">
                    <h3 class="font-semibold text-slate-900 flex items-center gap-2">
                        <svg class="h-5 w-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        Ubicación de referencia
                    </h3>
                </div>
                <div class="p-4">
                    <p class="text-sm text-slate-600 mb-3">
                        <strong class="text-slate-800">Universidad Americana</strong><br>
                        Asunción, Paraguay
                    </p>
                    <div class="relative overflow-hidden rounded-lg border border-slate-200 bg-slate-100 aspect-video">
                        <iframe
                            title="Mapa — Universidad Americana, Asunción, Paraguay"
                            src="https://maps.google.com/maps?q=Universidad+Americana+Asuncion+Paraguay&z=15&output=embed"
                            class="absolute inset-0 h-full w-full border-0"
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </article>

            <article class="rounded-lg bg-slate-900 p-6 text-white">
                <h3 class="font-semibold mb-3">Datos de contacto adicionales</h3>
                <ul class="text-sm text-slate-300 space-y-2">
                    <li class="flex items-center gap-2">
                        <span class="h-2 w-2 rounded-full bg-blue-400"></span>
                        Proyecto: FreelanceTasks — Gestor de tareas
                    </li>
                    
                    <li class="flex items-center gap-2">
                        <span class="h-2 w-2 rounded-full bg-blue-400"></span>
                        Año académico: 2026
                    </li>
                </ul>
            </article>
        </section>
    </div>
@endsection
