<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clients') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <a href="{{ route('clients.create') }}">
                <x-primary-button>Create client</x-primary-button>
            </a>

            <div class="bg-white shadow sm:rounded">
                <section>
                    <header class="p-4 sm:px-6">
                        <h2 class="text-lg font-medium text-gray-900">Client list</h2>
                    </header>

                    <hr class="border-gray-300">

                    <div class="p-4">
                        <x-table>
                            <x-tr>
                                <x-th>Name</x-th>
                                <x-th>Email</x-th>
                                <x-th>Description</x-th>
                                <x-th></x-th>
                            </x-tr>
                            @foreach ($clients as $client)
                                <x-tr>
                                    <x-td>{{ $client->name }}</x-td>
                                    <x-td>{{ $client->email }}</x-td>
                                    <x-td
                                        x-data="{ text: '{{ $client->description }}' }"
                                        x-text="text.substring(0, (screenWidth - 500) / 20) + '...'"
                                    ></x-td>
                                    <x-td>
                                        <x-secondary-button>Edit</x-secondary-button>
                                        <x-danger-button>Delete</x-danger-button>
                                    </x-td>
                                </x-tr>
                            @endforeach
                        </x-table>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>