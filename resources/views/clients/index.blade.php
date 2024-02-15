<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clients') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-4 lg:px-6 xl:px-8 space-y-6">
            <div class="text-center">
                <a href="{{ route('clients.create') }}">
                    <x-primary-button>Create client</x-primary-button>
                </a>
            </div>

            <div class="bg-white shadow sm:rounded">
                <section>
                    <header class="p-4 sm:px-6">
                        <h2 class="text-lg font-medium text-gray-900">Client list</h2>
                    </header>

                    <hr class="border-gray-300">

                    <div class="p-2">

                        <!-- Client list (less than sm width) -->
                        <div class="sm:hidden flex flex-col">
                            @foreach ($clients as $client)

                                @if (!$loop->first)
                                    <hr class="border-gray-300">
                                @endif

                                <div class="m-2">
                                    <div class="font-bold">Name:</div>
                                    <div>{{ $client->name }}</div>
                                    <br>
                                    <div class="font-bold">Email:</div>
                                    <div>{{ $client->email }}</div>
                                    <br>
                                    <div class="font-bold">Description:</div>
                                    <div class="block text-gray-500">{{ $client->description }}</div>

                                    <div class="flex gap-1 flex-row justify-end">
                                        <x-secondary-button>Edit</x-secondary-button>
                                        <x-danger-button>Delete</x-danger-button>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Client list (sm width) -->
                        <div class="hidden xl:hidden sm:flex flex-col">
                            @foreach ($clients as $client)

                                @if (!$loop->first)
                                    <hr class="border-gray-200">
                                @endif

                                <div class="flex">
                                    <!-- Col 1 -->
                                    <div class="m-2 sm:m-4 font-bold">
                                        <div>Name:</div>
                                        <div>Email:</div>
                                        <br>
                                        <div>Description:</div>
                                        <div></div>
                                    </div>

                                    <!-- Col 2 -->
                                    <div class="m-2 sm:m-4">
                                        <div>{{ $client->name }}</div>
                                        <div>{{ $client->email }}</div>
                                        <br>
                                        <div class="block text-gray-500">{{ $client->description }}</div>
                                        <br>
                                        <div class="flex gap-1 flex-row justify-end">
                                            <x-secondary-button>Edit</x-secondary-button>
                                            <x-danger-button>Delete</x-danger-button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Client list (large width) -->
                        <div class="hidden xl:block">
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
                                            class="text-gray-500"
                                            x-data="{ text: '{{ $client->description }}' }"
                                            x-text="text.substring(0, (screenWidth - 500) / 20) + '...'"
                                        ></x-td>
                                        <x-td class="flex flex-col gap-1 md:flex-row">
                                            <x-secondary-button>Edit</x-secondary-button>
                                            <x-danger-button>Delete</x-danger-button>
                                        </x-td>
                                    </x-tr>
                                @endforeach
                            </x-table>
                        </div>

                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>