<x-app-layout title="Create task">
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
                            {{ __('Add new task') }}
                        </h2>
                    </header>
                    
                    <hr class="border-gray-300">
                    
                    <form method="POST" action="{{ route('tasks.store') }}" class="space-y-6 p-4 pt-0 sm:px-6">
                        @csrf
                        @method('post')

                        <div>
                            <x-input-label for="task" :value="__('Task')" />
                            <x-text-input id="task" name="task" type="text" class="mt-1 block w-full" :value="old('task', '')" required autofocus autocomplete="task" />
                            <x-input-error class="mt-2" :messages="$errors->get('task')" />
                        </div>

                        <div>
                            <x-input-label for="project" value="Project" />
                            <x-select id="project" name="project_id" class="w-full mt-1">
                                <option value="">No project</option>
                                @foreach ($projects as $project)
                                    <option
                                        value="{{ $project->id }}"
                                        {{
                                            (!is_null($passed_project)
                                            && $passed_project->id === $project->id)
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
                            <x-date-input id="deadline" name="deadline" class="w-full mt-1"></x-date-input>
                        </div>
                            
                        <div>
                            <x-input-label for="description" :value="__('Description')" />
                            <x-textarea
                                name="description"
                                rows="5"
                                placeholder="{{ __('Describe the person.') }}"
                            ></x-textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('description')" />
                        </div>

                        <x-primary-button>Create</x-primary-button>
                    </form>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>