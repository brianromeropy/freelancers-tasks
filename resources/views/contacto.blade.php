@extends('layouts.app')

@section('title', 'Contáctenos')

@section('content')
    <section class="mb-8">
        <h1 class="text-3xl font-bold text-slate-900 mb-2">Contáctenos</h1>
        <p class="text-slate-600">
            ¿Tienes consultas sobre el proyecto o deseas una demostración? Completa el formulario o revisa la información del presentador.
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
                           placeholder="Consulta sobre el proyecto"
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
                <h2 class="text-lg font-semibold text-slate-900 mb-4">Alumno que presenta el sistema</h2>
                <div class="flex flex-col sm:flex-row gap-6">
                    <div class="flex-shrink-0">
                        <div class="flex h-40 w-40 items-center justify-center rounded-lg border-2 border-dashed border-slate-300 bg-slate-50 text-center p-4">
                            <div>
                                <svg class="mx-auto h-10 w-10 text-slate-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                          d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <p class="text-xs text-slate-500 font-medium">[Imagen técnica del software]</p>
                                <p class="text-xs text-slate-400 mt-1">Diagrama / captura / arquitectura</p>
                            </div>
                        </div>
                    </div>
                    <div class="text-sm text-slate-600 space-y-2">
                        <p><strong class="text-slate-800">Nombre:</strong> [Nombre del alumno presentador]</p>
                        <p><strong class="text-slate-800">Legajo / ID:</strong> [Número de legajo]</p>
                        <p><strong class="text-slate-800">Carrera:</strong> [Nombre de la carrera]</p>
                        <p><strong class="text-slate-800">Materia:</strong> Desarrollo Web — Proyecto grupal</p>
                        <p><strong class="text-slate-800">Correo:</strong> [correo@institucion.edu]</p>
                        <p class="pt-2 text-slate-500">
                            Sustentación del sistema <strong>FreelanceTasks</strong>: gestor de tareas para freelancers
                            con autenticación Laravel Breeze, base MySQL y diseño responsive con Tailwind CSS.
                        </p>
                    </div>
                </div>
            </article>

            <article class="rounded-lg bg-slate-900 p-6 text-white">
                <h3 class="font-semibold mb-2">Información de contacto institucional</h3>
                <ul class="text-sm text-slate-300 space-y-1">
                    <li>Facultad: [Nombre de la facultad]</li>
                    <li>Turno / Comisión: [Comisión]</li>
                    <li>Año académico: {{ date('Y') }}</li>
                </ul>
            </article>
        </section>
    </div>
@endsection
