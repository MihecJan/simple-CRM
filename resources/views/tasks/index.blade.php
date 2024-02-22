<x-app-layout title="Tasks">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-4 lg:px-6 xl:px-8 space-y-6">
            <div class="text-center sm:text-left">
                <a href="{{ route('tasks.create') }}">
                    <x-primary-button>Create task</x-primary-button>
                </a>
            </div>

            <div class="bg-white shadow sm:rounded">
                <section>
                    <header class="p-4 sm:px-6">
                        <h2 class="text-lg font-medium text-gray-900">Task list</h2>
                    </header>

                    <hr class="border-gray-300">

                    <div class="p-2">

                        <!-- Task list (less than sm width) -->
                        @include('tasks.partials.task-list')

                        <!-- Task list (sm width) -->
                        @include('tasks.partials.sm-task-list')

                        <!-- Task list (xl width) -->
                        @include('tasks.partials.xl-task-list')

                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>