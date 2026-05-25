@php
    $priorityStyles = [
        'alta' => ['label' => 'Alta', 'class' => 'bg-red-100 text-red-700'],
        'media' => ['label' => 'Media', 'class' => 'bg-amber-100 text-amber-700'],
        'baja' => ['label' => 'Baja', 'class' => 'bg-emerald-100 text-emerald-700'],
    ];
    $priority = $priorityStyles[$task->priority] ?? $priorityStyles['media'];
    $isDone = $task->status === 'finalizado';
@endphp

<article @class([
    'rounded-lg border bg-white p-4 shadow-sm transition',
    'border-slate-200 hover:shadow-md' => ! $isDone,
    'border-emerald-100 opacity-90' => $isDone,
])>
    <div class="mb-2 flex items-start justify-between gap-2">
        <h4 @class([
            'text-sm font-semibold leading-snug',
            'text-slate-900' => ! $isDone,
            'text-slate-700 line-through decoration-slate-300' => $isDone,
        ])>{{ $task->title }}</h4>
        <span class="shrink-0 rounded px-2 py-0.5 text-xs font-medium {{ $priority['class'] }}">
            {{ $priority['label'] }}
        </span>
    </div>

    @if ($task->description)
        <p class="text-xs text-slate-500 mb-3">{{ $task->description }}</p>
    @endif

    <div class="flex flex-wrap items-center justify-between gap-2">
        @if ($isDone)
            <span class="flex items-center gap-1 text-xs text-emerald-600">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                Finalizado
            </span>
        @else
            <span class="text-xs text-slate-400">{{ auth()->user()->name }}</span>
        @endif

        <form method="POST" action="{{ route('tasks.update', $task) }}" class="flex items-center gap-1">
            @csrf
            @method('PATCH')
            <select name="status"
                    onchange="this.form.submit()"
                    class="rounded border border-slate-200 bg-slate-50 px-2 py-1 text-xs text-slate-600 focus:border-blue-500 focus:outline-none">
                <option value="pendiente" @selected($task->status === 'pendiente')>Pendiente</option>
                <option value="en_progreso" @selected($task->status === 'en_progreso')>En progreso</option>
                <option value="finalizado" @selected($task->status === 'finalizado')>Finalizado</option>
            </select>
        </form>
    </div>

    <form method="POST" action="{{ route('tasks.destroy', $task) }}" class="mt-2 text-right">
        @csrf
        @method('DELETE')
        <button type="submit"
                onclick="return confirm('¿Eliminar esta tarea?')"
                class="text-xs text-red-500 hover:text-red-700 transition">
            Eliminar
        </button>
    </form>
</article>
