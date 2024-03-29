<nav
    class="bg-white border-gray-100 z-10 w-full top-16 absolute md:static md:w-56 lg:w-64"
    x-show="open"
>
    <div class="h-full" style="width:inherit">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto h-full w-full">
            <div class="flex flex-col justify-between h-full bg-secondary-500">
                <div>
                    <!-- Logo -->
                    <div class="shadow flex justify-center w-full h-16 bg-secondary-600">
                        <a href="{{ route('dashboard') }}" class="my-auto">
                            <x-application-logo class="block h-9 text-secondary-100" />
                        </a>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden md:flex flex-col">
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            <x-slot:svgPath>
                                <path fill-rule="evenodd" d="M11.3 3.3a1 1 0 0 1 1.4 0l6 6 2 2a1 1 0 0 1-1.4 1.4l-.3-.3V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3c0 .6-.4 1-1 1H7a2 2 0 0 1-2-2v-6.6l-.3.3a1 1 0 0 1-1.4-1.4l2-2 6-6Z" clip-rule="evenodd"/>
                            </x-slot>
                            {{ __('Dashboard') }}
                        </x-nav-link>
                        <x-nav-link :href="route('clients.index')" :active="request()->routeIs('clients.*')">
                            <x-slot:svgPath>
                                <path fill-rule="evenodd" d="M4 4a2 2 0 0 0-2 2v12c0 1.1.9 2 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H4Zm10 5c0-.6.4-1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm0 3c0-.6.4-1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm0 3c0-.6.4-1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm-8-5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm2 4a3 3 0 0 0-3 2v.2c0 .1-.1.2 0 .2v.2c.3.2.6.4.9.4h6c.3 0 .6-.2.8-.4l.2-.2v-.2l-.1-.1A3 3 0 0 0 10 14H7.9Z" clip-rule="evenodd"/>
                            </x-slot>
                            {{ __('Clients') }}
                        </x-nav-link>
                        <x-nav-link :href="route('projects.index')" :active="request()->routeIs('projects.*')">
                            <x-slot:svgPath>
                                <path fill-rule="evenodd" d="M9 2.2V7H4.2l.4-.5 3.9-4 .5-.3Zm2-.2v5a2 2 0 0 1-2 2H4v11c0 1.1.9 2 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7Z" clip-rule="evenodd"/>
                            </x-slot>
                            {{ __('Projects') }}
                        </x-nav-link>
                        <x-nav-link :href="route('tasks.index')" :active="request()->routeIs('tasks.*')">
                            <x-slot:svgPath>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 8.25V6a2.25 2.25 0 0 0-2.25-2.25H6A2.25 2.25 0 0 0 3.75 6v8.25A2.25 2.25 0 0 0 6 16.5h2.25m8.25-8.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-7.5A2.25 2.25 0 0 1 8.25 18v-1.5m8.25-8.25h-6a2.25 2.25 0 0 0-2.25 2.25v6" />
                            </x-slot>
                            {{ __('Tasks') }}
                        </x-nav-link>
                        <x-nav-link :href="route('pipeline')" :active="request()->routeIs('pipeline')">
                            <x-slot:svgPath>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z" />
                            </x-slot>
                            {{ __('Pipeline') }}
                        </x-nav-link>
                    </div>
                </div>

                <!-- Settings -->
                <div class="border-t border-secondary-300 fixed bottom-0 hidden md:flex md:flex-col md:w-56 lg:w-64">
                    <x-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                        <x-slot:svgPath>
                            <path fill-rule="evenodd" d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1c0 1.1.9 2 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z" clip-rule="evenodd"/>
                        </x-slot>
                        {{ __('Profile') }}
                    </x-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            <x-slot:svgPath>
                                <path d="M17 16L21 12M21 12L17 8M21 12L7 12M13 16V17C13 18.6569 11.6569 20 10 20H6C4.34315 20 3 18.6569 3 17V7C3 5.34315 4.34315 4 6 4H10C11.6569 4 13 5.34315 13 7V8" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                            </x-slot>
                            {{ __('Log Out') }}
                        </x-nav-link>
                    </form>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{ 'block': open, 'hidden': ! open }" class="bg-secondary-500 hidden md:hidden">
            <div>
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    <x-slot:svgPath>
                        <path fill-rule="evenodd" d="M11.3 3.3a1 1 0 0 1 1.4 0l6 6 2 2a1 1 0 0 1-1.4 1.4l-.3-.3V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3c0 .6-.4 1-1 1H7a2 2 0 0 1-2-2v-6.6l-.3.3a1 1 0 0 1-1.4-1.4l2-2 6-6Z" clip-rule="evenodd"/>
                    </x-slot>
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('clients.index')" :active="request()->routeIs('clients.*')">
                    <x-slot:svgPath>
                        <path fill-rule="evenodd" d="M4 4a2 2 0 0 0-2 2v12c0 1.1.9 2 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H4Zm10 5c0-.6.4-1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm0 3c0-.6.4-1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm0 3c0-.6.4-1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm-8-5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm2 4a3 3 0 0 0-3 2v.2c0 .1-.1.2 0 .2v.2c.3.2.6.4.9.4h6c.3 0 .6-.2.8-.4l.2-.2v-.2l-.1-.1A3 3 0 0 0 10 14H7.9Z" clip-rule="evenodd"/>
                    </x-slot>
                    {{ __('Clients') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('projects.index')" :active="request()->routeIs('projects.*')">
                    <x-slot:svgPath>
                        <path fill-rule="evenodd" d="M9 2.2V7H4.2l.4-.5 3.9-4 .5-.3Zm2-.2v5a2 2 0 0 1-2 2H4v11c0 1.1.9 2 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7Z" clip-rule="evenodd"/>
                    </x-slot>
                    {{ __('Projects') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('tasks.index')" :active="request()->routeIs('tasks.*')">
                    <x-slot:svgPath>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 8.25V6a2.25 2.25 0 0 0-2.25-2.25H6A2.25 2.25 0 0 0 3.75 6v8.25A2.25 2.25 0 0 0 6 16.5h2.25m8.25-8.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-7.5A2.25 2.25 0 0 1 8.25 18v-1.5m8.25-8.25h-6a2.25 2.25 0 0 0-2.25 2.25v6" />
                    </x-slot>
                    {{ __('Tasks') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('pipeline')" :active="request()->routeIs('pipeline')">
                    <x-slot:svgPath>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z" />
                    </x-slot>
                    {{ __('Pipeline') }}
                </x-responsive-nav-link>
            </div>

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-secondary-300">
                <div class="px-4">
                    <div class="font-medium text-base text-secondary-100">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-secondary-300">{{ Auth::user()->email }}</div>
                </div>

                <div>
                    <x-responsive-nav-link :href="route('profile.edit')">
                        <x-slot:svgPath>
                            <path fill-rule="evenodd" d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1c0 1.1.9 2 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z" clip-rule="evenodd"/>
                        </x-slot>
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            <x-slot:svgPath>
                                <path d="M17 16L21 12M21 12L17 8M21 12L7 12M13 16V17C13 18.6569 11.6569 20 10 20H6C4.34315 20 3 18.6569 3 17V7C3 5.34315 4.34315 4 6 4H10C11.6569 4 13 5.34315 13 7V8" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                            </x-slot>
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>
