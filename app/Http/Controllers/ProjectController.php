<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
        ], [], [
            'name' => 'nombre',
            'description' => 'descripción',
        ]);

        $project = $request->user()->projects()->create($validated);

        return redirect()
            ->route('dashboard', ['project' => $project->id])
            ->withFragment('kanban')
            ->with('success', 'Proyecto creado correctamente.');
    }
}
