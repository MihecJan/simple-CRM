<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('clients.index', [
            'clients' => auth()->user()->clients,
        ]);
    }

    /**
     * Display the form for creating new client.
     */
    public function create(): View
    {
        return view('clients.create');
    }

    /**
     * Store a newly created client in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'description' => 'string|max:65535',
        ]);

        $request->user()->clients()->create($validated);

        return redirect(route('clients.index'));
    }

    /**
     * Display a specific client.
     */
    public function show(Client $client): View
    {
        return view('clients.show', [
            'client' => $client,
        ]);
    }

    /**
     * Show the form for editing the specified client.
     */
    public function edit(Client $client): View
    {
        $this->authorize('update', $client);

        return view('clients.edit', [
            'client' => $client
        ]);
    }

    /**
     * Update the specified client in storage.
     */
    public function update(Request $request, Client $client): RedirectResponse
    {
        $this->authorize('update', $client);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'description' => 'string|max:65535',
        ]);

        $client->update($validated);

        return redirect(route('clients.index'));
    }

    /**
     * Remove the specified client from storage.
     */
    public function destroy(Client $client): RedirectResponse
    {
        $this->authorize('delete', $client);

        $client->delete();

        return redirect(route('clients.index'));
    }
}
