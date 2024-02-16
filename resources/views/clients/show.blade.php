<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clients') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow sm:rounded">
                <section>
                    <header class="p-4 sm:px-6">
                        <h2 class="text-lg font-medium text-gray-900">Info</h2>
                    </header>
                    
                    <hr class="border-gray-300">
            
                    <div class="p-4 flex flex-col gap-4 md:grid md:grid-rows-[repeat(2,min-content),1fr] md:grid-cols-2">
                        <div>
                            <div class="font-bold text-gray-900">Name:</div>
                            <div class="text-gray-600">{{ $client->name }}</div>
                        </div>
                        <div class="md:col-start-1">
                            <div class="font-bold text-gray-900">Email:</div>
                            <div class="text-gray-600">{{ $client->email }}</div>
                        </div>
                        <div class="md:col-start-2 md:row-start-1 md:row-span-4">
                            <div class="font-bold text-gray-900">Description:</div>
                            <div class="text-gray-600 max-w-prose">{{ $client->description }}</div>
                        </div>
                        <a class="col-start-1"" href="{{ route('clients.index') }}">
                            <x-secondary-button>Show all clients</x-secondary-button>
                        </a>
                    </div>
                </section>
            </div>

            <div class="bg-white shadow sm:rounded">
                <section>
                    <header class="p-4 sm:px-6">
                        <h2 class="text-lg font-medium text-gray-900">Projects</h2>
                    </header>

                    <hr class="border-gray-300">
            
                    <div class="p-4 flex flex-col gap-4">

                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>