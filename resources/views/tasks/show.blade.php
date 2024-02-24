<x-app-layout :title="$task->title">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
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
                            <div class="text-gray-600">{{ $task->task }}</div>
                        </div>
                        <div>
                            <div class="font-bold text-gray-900">Deadline:</div>
                            <div class="text-gray-600">
                                @if ($task->deadline)
                                    {{ explode(' ', $task->deadline)[0] }}
                                @else
                                    {{ '/' }}
                                @endif
                            </div>
                        </div>
                        <div class="md:col-start-1">
                            <div class="font-bold text-gray-900">Project:</div>
                            <div class="text-gray-600">
                                @if ($task->project)
                                    <a href="{{ route('projects.show', $task->project) }}">
                                        <span class="text-gray-900 underline">{{ $task->project->title }}</span>
                                    </a>
                                @else
                                    <span class="text-gray-600">Project missing</span>
                                @endif
                            </div>
                        </div>
                        <div class="md:col-start-2 md:row-start-1 md:row-span-4">
                            <div class="font-bold text-gray-900">Description:</div>
                            <div class="text-gray-600 max-w-prose">{{ $task->description }}</div>
                        </div>
                        <a class="col-start-1" href="{{ route('tasks.index') }}">
                            <x-secondary-button>Show all tasks</x-secondary-button>
                        </a>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>