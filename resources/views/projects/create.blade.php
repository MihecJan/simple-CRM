<x-app-layout>
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
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Add new project') }}
                        </h2>
                    </header>
                    
                    <hr class="border-gray-300">
                    
                    <form method="POST" action="{{ route('projects.store') }}" class="space-y-6 p-4 pt-0 sm:px-6">
                        @csrf
                        @method('post')

                        <div>
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', '')" required autofocus autocomplete="title" />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>

                        <div>
                            <x-input-label for="client" value="Client" />
                            <x-select id="client" name="client_id" class="w-full mt-1">
                                <option value="">No client</option>
                                @foreach ($clients as $client)
                                    <option
                                        value="{{ $client->id }}"
                                        {{
                                            (!is_null($passed_client)
                                            && $passed_client->id === $client->id)
                                            ? 'selected'
                                            : ''
                                        }}
                                    >
                                        {{ $client->name }}
                                    </option>
                                @endforeach
                            </x-select>
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