<nav x-data="{ open: false }" class="bg-white dark:bg-gray-900 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex grow">
                <a href="{{ route('home') }}" class="flex-shrink-0 flex items-center">
                    <!-- Logo -->
                    <x-application-logo class="h-12 w-12 fill-current text-gray-500" />
                    {{-- Text Brand --}}
                    <span class="text-3xl font-bold text-gray-800 dark:text-gray-100 ml-2">
                        Gallery
                    </span>
                </a>
                <!-- Navigation Links -->
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    {{-- Search Bar --}}
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <!-- svg icon search -->
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <form action="{{ route('search') }}" method="GET">
                            <input id="search" name="q" type="search"
                                class="w:96 sm:w-44 md:w-72 lg:w-96 pl-10 pr-2 py-2 border border-gray-300 rounded-md leading-5 bg-white dark:bg-gray-800 dark:border-gray-700 dark:text-gray-100 placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-indigo-800 focus:border-indigo-800 sm:text-sm"
                                placeholder="Search Anime, Cats, Dogs,..." />
                        </form>

                    </div>
                </div>
            </div>
            <!-- Dark mode toggle -->
            <div class="flex items-center">
                <button id="theme-toggle" type="button"
                    class="items-center  sm:ml-6 bg-gray-500 bg-opacity-20 dark:bg-gray-400 dark:bg-opacity-20 hover:bg-gray-300 dark:hover:bg-gray-700 focus:outline-none  rounded-lg p-2.5 mr-4">
                    <svg id="dark-mode-icon" class="w-5 h-5 hidden" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                    </svg>
                    <svg id="light-mode-icon" class="w-5 h-5 hidden" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                            fill-rule="evenodd" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <!-- Dark mode toggle end -->
            <!-- Settings Dropdown -->
            <div class="sm:flex hidden items-center sm:ml-6">
                @auth
                    <x-dropdown width="52">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                @if (Auth::user()->avatar)
                                    <img src="{{ url('storage/' . Auth::user()->avatar) }}"
                                        alt="{{ Auth::user()->name . '\'s Avatar' }}" class="rounded-full w-8 h-8 mr-3" />
                                @endif
                                <div>{{ Auth::user()->name }}</div>
                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            {{-- Dashboard --}}
                            <x-dropdown-link :href="route('dashboard')">
                                {{ __('Dashboard') }}
                            </x-dropdown-link>
                            {{-- My Profile --}}
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('My Profile') }}
                            </x-dropdown-link>
                            {{-- Create a photo --}}
                            <x-dropdown-link :href="route('generate')">
                                {{ __('Generate an image') }}
                            </x-dropdown-link>
                            {{-- Submit a photo --}}
                            <x-dropdown-link :href="route('upload')">
                                {{ __('Submit a photo') }}

                            </x-dropdown-link>
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @endauth
                @if (Auth::guest())
                    <a href="{{ route('login') }}"
                        class="ml-4 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-gray-800 hover:bg-gray-700 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
                        Login
                    </a>
                    <a href="{{ route('register') }}"
                        class="ml-4 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-gray-800 hover:bg-gray-700 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
                        Register
                    </a>
                @endif

            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">

            @auth
                {{-- Welcome Message --}}
                <div class="text-center text-sm font-medium text-gray-500">
                    <div>
                        <img class="h-8 w-8 rounded-full object-cover mr-2 inline-flex items-center justify-center"
                            src="{{ url('storage/' . Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}" />
                        <div class="inline-flex items-center">{{ Auth::user()->name }}</div>
                    </div>
                </div>
                {{-- Dashboard --}}
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
                {{-- Profile --}}
                <x-responsive-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                {{-- Create --}}
                <x-responsive-nav-link :href="route('generate')">
                    {{ __('Generate an image') }}
                </x-responsive-nav-link>
                {{-- Upload --}}
                <x-responsive-nav-link :href="route('upload')" :active="request()->routeIs('upload')">
                    {{ __('Submit a photo') }}
                </x-responsive-nav-link>
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault();
                                this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>

            @endauth

            @guest
                <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login')">
                    {{ __('Login') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('register')" :active="request()->routeIs('register')">
                    {{ __('Register') }}
                </x-responsive-nav-link>
            @endguest
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                {{-- Dark Mode Button --}}

                {{-- End Dark Mode Button --}}
            </div>
        </div>
    </div>
</nav>
