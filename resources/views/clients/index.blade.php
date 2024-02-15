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
                            <h2 class="text-lg font-medium text-gray-900">Create client</h2>
                        </header>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>