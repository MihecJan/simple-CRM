<x-app-layout title="Create client">
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
                            {{ __('Add new client') }}
                        </h2>
                    </header>
                    
                    <hr class="border-gray-300">
                    
                    <form method="POST" action="{{ route('clients.store') }}" class="space-y-6 p-4 pt-0 sm:px-6">
                        @csrf
                        @method('post')

                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', '')" required autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>
                
                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', '')" required autocomplete="username" />
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>

                        <div>
                            <x-input-label for="gender" value="Gender" />
                            <x-select id="gender" name="gender" class="w-full mt-1">
                                <option value="unknown" selected>Unknown</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </x-select>
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