<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(Request $request): View
    {
        $projects = $request->user()
            ->projects()
            ->withCount('tasks')
            ->latest()
            ->get();

        $activeProject = null;

        if ($request->filled('project')) {
            $activeProject = $projects->firstWhere('id', (int) $request->project)
                ?? Project::where('user_id', $request->user()->id)->find($request->project);
        }

        if (! $activeProject && $projects->isNotEmpty()) {
            $activeProject = $projects->first();
        }

        $tasks = collect();

        if ($activeProject) {
            $tasks = $activeProject->tasks()->latest()->get()->groupBy('status');
        }

        return view('dashboard', compact('projects', 'activeProject', 'tasks'));
    }
}
