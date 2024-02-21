<?php

namespace App\Http\Controllers;

use App\Models\User;
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
            'project' => 'exists:project,id,user_id,' . auth()->user()->id,
        ]);

        $selectedClient = isset($validated['project'])
            ? auth()->user()->clients->find($validated['project'])
            : null;

        return view('tasks.create', [
            'project' => auth()->user()->clients,
            'passed_project' => $selectedClient,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return 'store';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return 'show';
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
