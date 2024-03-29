<a href="{{ route('clients.show', $client) }}">
    <x-primary-button>Show</x-primary-button>
</a>
<a href="{{ route('clients.edit', $client) }}">
    <x-secondary-button>Edit</x-secondary-button>
</a>
<x-danger-button
    x-on:click.prevent="$dispatch('open-modal', 'confirm-client-{{ $client->id }}-deletion')"
>Delete</x-danger-button>

<x-modal :name="'confirm-client-' . $client->id . '-deletion'" focusable class="mt-32">
    <form method="POST" action="{{ route('clients.destroy', $client) }}">
        @csrf
        @method('delete')

        <header class="p-4 sm:px-6">
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete client ' . $client->name . '?') }}
            </h2>
        </header>

        <div class="text-gray-900 p-4 sm:px-6">
            <p>Also delete all associated projects:</p>
            <x-toggle :name="'bw_toggle'" />
        </div>

        <hr class="border-gray-300">

        <div class="p-4 sm:px-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ms-3">
                {{ __('Delete client') }}
            </x-danger-button>
        </div>
    </form>
</x-modal>