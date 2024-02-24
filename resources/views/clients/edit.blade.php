<x-app-layout title="Edit client">
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
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Edit client') }}
                        </h2>
                    </header>
                    
                    <hr class="border-gray-300">
                    
                    <form method="POST" action="{{ route('clients.update', $client) }}" class="space-y-6 p-4 pt-0 sm:px-6">
                        @csrf
                        @method('patch')

                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $client->name)" required autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>
                
                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $client->email)" required autocomplete="username" />
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>

                        <div>
                            <x-input-label for="gender" value="Gender" />
                            <x-select id="gender" name="gender" class="w-full mt-1">
                                <option value="unknown">Unknown</option>
                                <option
                                    value="male"
                                    {{ (!is_null($client->gender) && $client->gender === 'm') ? 'selected' : '' }}
                                >Male</option>
                                <option
                                    value="female"
                                    {{ (!is_null($client->gender) && $client->gender === 'f') ? 'selected' : '' }}
                                >Female</option>
                            </x-select>
                        </div>
                            
                        <div>
                            <x-input-label for="description" :value="__('Description')" />
                            <x-textarea
                                name="description"
                                rows="5"
                                placeholder="{{ __('Describe the person.') }}"
                            >{{ old('description', $client->description) }}</x-textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('description')" />
                        </div>

                        <x-primary-button>Save</x-primary-button>
                        <a href="{{ route('clients.index') }}">
                            <x-secondary-button>Cancel</x-secondary-button>
                        </a>
                    </form>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>