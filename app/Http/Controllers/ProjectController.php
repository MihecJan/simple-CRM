<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{ Client, Project };
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('projects.index', [
            'projects' => auth()->user()->projects->sortByDesc('updated_at'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $validated = $request->validate([
            'client' => 'nullable|exists:clients,id,user_id,' . auth()->user()->id,
        ]);

        $selectedClient = isset($validated['client'])
            ? auth()->user()->clients->find($validated['client'])
            : null;

        return view('projects.create', [
            'clients' => auth()->user()->clients,
            'passed_client' => $selectedClient,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'client_id' => 'nullable|exists:clients,id,user_id,' . auth()->user()->id,
            'deadline' => 'nullable|date',
            'description' => 'nullable|string|max:65535',
        ]);

        $request->user()->projects()->create($validated);

        return redirect(route('projects.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project): View
    {
        return view('projects.show', [
            'project' => $project,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project): View
    {
        $this->authorize('update', $project);

        return view('projects.edit', [
            'project' => $project,
            'clients' => auth()->user()->clients,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project): RedirectResponse
    {
        $this->authorize('update', $project);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'client_id' => 'nullable|exists:clients,id,user_id,' . auth()->user()->id,
            'deadline' => 'nullable|date',
            'description' => 'nullable|string|max:65535',
        ]);

        $project->update($validated);
        return redirect(route('projects.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $this->authorize('delete', $project);

        $project->delete();

        return redirect(route('projects.index'));
    }
}
