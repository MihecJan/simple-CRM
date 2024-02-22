<x-app-layout :title="$project->title">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projects') }}
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
                            <div class="font-bold text-gray-900">Title:</div>
                            <div class="text-gray-600">{{ $project->title }}</div>
                        </div>
                        <div>
                            <div class="font-bold text-gray-900">Deadline:</div>
                            <div class="text-gray-600">
                                @if ($project->deadline)
                                    {{ explode(' ', $project->deadline)[0] }}
                                @else
                                    {{ '/' }}
                                @endif
                            </div>
                        </div>
                        <div class="md:col-start-1">
                            <div class="font-bold text-gray-900">Client:</div>
                            <div class="text-gray-600">
                                @if ($project->client)
                                    <a href="{{ route('clients.show', $project->client) }}">
                                        <span class="text-gray-900 underline">{{ $project->client->name }}</span>
                                    </a>
                                @else
                                    <span class="text-gray-600">Client missing</span>
                                @endif
                            </div>
                        </div>
                        <div class="md:col-start-2 md:row-start-1 md:row-span-4">
                            <div class="font-bold text-gray-900">Description:</div>
                            <div class="text-gray-600 max-w-prose">{{ $project->description }}</div>
                        </div>
                        <a class="col-start-1"" href="{{ route('projects.index') }}">
                            <x-secondary-button>Show all projects</x-secondary-button>
                        </a>
                    </div>
                </section>
            </div>

            <div class="bg-white shadow sm:rounded">
                <section>
                    <header class="p-4 sm:px-6">
                        <h2 class="text-lg font-medium text-gray-900">Tasks</h2>
                    </header>

                    <hr class="border-gray-300">

                    <div class="p-4 flex flex-col gap-4">
                        <a href="{{ route('tasks.create', ['project' => $project]) }}">
                            <x-primary-button>Create task</x-primary-button>
                        </a>
                        @php
                            $tasks = $project->tasks;
                        @endphp

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