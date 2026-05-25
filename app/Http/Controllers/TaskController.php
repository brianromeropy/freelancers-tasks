<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'project_id' => ['required', 'exists:projects,id'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'priority' => ['required', 'in:baja,media,alta'],
        ], [], [
            'project_id' => 'proyecto',
            'title' => 'título',
            'description' => 'descripción',
            'priority' => 'prioridad',
        ]);

        $project = $this->authorizeProject($validated['project_id']);

        $project->tasks()->create([
            'user_id' => $request->user()->id,
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'priority' => $validated['priority'],
            'status' => 'pendiente',
        ]);

        return $this->redirectToKanban($project->id, 'Tarea creada correctamente.');
    }

    public function update(Request $request, Task $task): RedirectResponse
    {
        $project = $this->authorizeTask($task);

        $validated = $request->validate([
            'status' => ['required', 'in:pendiente,en_progreso,finalizado'],
        ]);

        $task->update($validated);

        return $this->redirectToKanban($project->id, 'Estado de la tarea actualizado.');
    }

    public function destroy(Task $task): RedirectResponse
    {
        $project = $this->authorizeTask($task);

        $task->delete();

        return $this->redirectToKanban($project->id, 'Tarea eliminada.');
    }

    private function authorizeProject(int $projectId): Project
    {
        $project = Project::where('user_id', auth()->id())->findOrFail($projectId);

        return $project;
    }

    private function authorizeTask(Task $task): Project
    {
        if ($task->user_id !== auth()->id()) {
            abort(403);
        }

        return $task->project ?? abort(404);
    }

    private function redirectToKanban(int $projectId, string $message): RedirectResponse
    {
        return redirect()
            ->route('dashboard', ['project' => $projectId])
            ->withFragment('kanban')
            ->with('success', $message);
    }
}
