<x-app-layout title="Edit task">
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
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Edit task') }}
                        </h2>
                    </header>
                    
                    <hr class="border-gray-300">
                    
                    <form method="POST" action="{{ route('tasks.update', $task) }}" class="space-y-6 p-4 pt-0 sm:px-6">
                        @csrf
                        @method('patch')

                        <div>
                            <x-input-label for="task" :value="__('Task')" />
                            <x-text-input id="task" name="task" type="text" class="mt-1 block w-full" :value="old('task', $task->task)" required autofocus autocomplete="task" />
                            <x-input-error class="mt-2" :messages="$errors->get('task')" />
                        </div>
                
                        <div>
                            <x-input-label for="project_id" value="Project" />
                            <x-select id="project_id" name="project_id" class="w-full mt-1">
                                <option value="">No project</option>
                                @foreach ($projects as $project)
                                    <option
                                        value="{{ $project->id }}"
                                        {{
                                            (!is_null($task->project)
                                            && $task->project->id === $project->id)
                                            ? 'selected'
                                            : ''
                                        }}
                                    >
                                        {{ $project->title }}
                                    </option>
                                @endforeach
                            </x-select>
                            <x-input-error class="mt-2" :messages="$errors->get('project_id')" />
                        </div>
                            
                        <div>
                            <x-input-label for="deadline" value="Deadline" />
                            <x-date-input id="deadline" name="deadline" class="w-full mt-1" :value="explode(' ', $task->deadline)[0]"></x-date-input>
                        </div>
                            
                        <div>
                            <x-input-label for="description" :value="__('Description')" />
                            <x-textarea
                                name="description"
                                rows="5"
                                placeholder="{{ __('Describe the person.') }}"
                            >{{ old('description', $task->description) }}</x-textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('description')" />
                        </div>

                        <x-primary-button>Save</x-primary-button>
                        <a href="{{ route('tasks.index') }}">
                            <x-secondary-button>Cancel</x-secondary-button>
                        </a>
                    </form>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>