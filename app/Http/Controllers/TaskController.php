<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use App\Models\{ User, Task };
use Illuminate\Http\Request;
use Illuminate\View\View;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $userId = auth()->user()->id;
        $user = User::with('projects.tasks')->find($userId);
        $tasks = $user->projects->flatMap(function ($project) {
            return $project->tasks;
        });

        return view('tasks.index', [
            'tasks' => $tasks,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $validated = $request->validate([
            'project' => 'exists:projects,id,user_id,' . auth()->user()->id,
        ]);

        $selectedProject = isset($validated['project'])
            ? auth()->user()->projects->find($validated['project'])
            : null;

        return view('tasks.create', [
            'projects' => auth()->user()->projects,
            'passed_project' => $selectedProject,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'task' => 'required|string|max:255',
            'project_id' => 'exists:projects,id,user_id,' . auth()->user()->id,
            'deadline' => 'nullable|date',
            'description' => 'nullable|string|max:65535',
        ],
        [
            'project_id.exists' => 'Please select a project.',
        ]);

        $user = $request->user();
        $project = $user->projects()->find($validated['project_id']);
        $project->tasks()->create($validated);

        return redirect(route('tasks.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task): View
    {
        return view('tasks.show', [
            'task' => $task,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task): View
    {
        $this->authorize('update', $task);

        return view('tasks.edit', [
            'task' => $task,
            'projects' => auth()->user()->projects,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task): RedirectResponse
    {
        $this->authorize('update', $task);

        $validated = $request->validate([
            'task' => 'required|string|max:255',
            'project_id' => 'exists:projects,id,user_id,' . auth()->user()->id,
            'deadline' => 'nullable|date',
            'description' => 'nullable|string|max:65535',
        ],
        [
            'project_id.exists' => 'Please select a project.',
        ]);

        $task->update($validated);
        return redirect(route('tasks.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);

        $task->delete();

        return redirect(route('tasks.index'));
    }
}
