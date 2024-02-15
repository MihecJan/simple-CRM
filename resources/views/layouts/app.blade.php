<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body
        class="font-sans antialiased"
        x-data="{ open: !(window.innerWidth < 640), screenWidth: window.innerWidth }"
        @resize.window="screenWidth = window.innerWidth"
        x-cloak
    >
        <div class="flex">
            @include('layouts.navigation')
            
            <div class="min-h-screen bg-gray-200 grow">
                
                <!-- Page Heading -->
                @if (isset($header))
                    <header class="bg-white shadow h-16">

                        <div class="flex h-full">
                            <!-- Hamburger -->
                            <div class="-me-2 flex items-center px-4 sm:px-6 lg:px-8">
                                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                            
                            <div class="max-w-7xl m-auto px-4 sm:px-6 lg:px-8">
                                {{ $header }}
                            </div>

                            <div class="my-auto px-4 sm:px-6 lg:px-8">
                                <div class="p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                                    <a href="{{ route('profile.edit') }}">
                                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-width="2" d="M7 17v1c0 .6.4 1 1 1h8c.6 0 1-.4 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </header>
                @endif
    
                <!-- Page Content -->
                <main :class="{ 'blur-sm': open && (screenWidth < 640) }">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>
