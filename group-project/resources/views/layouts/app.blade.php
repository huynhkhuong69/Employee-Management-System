<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Gallery') }}</title>
    {{-- favicons --}}
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
    <link rel="mask-icon" href="{{ asset('favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
    <link rel="shortcut icon" href="{{ asset('favicon/favicon.ico') }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        if (!('theme' in localStorage)) {
            localStorage.theme = 'dark';
        }

        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark')
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</head>

<body
    class="font-sans antialiased scrollbar-thin scrollbar-thumb-gray-600 scrollbar-track-gray-900 bg-gray-100 dark:bg-gray-900 h-screen text-gray-800 dark:text-gray-100">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 dark:text-zinc-100">
        @include('layouts.navigation')
        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white dark:bg-gray-900 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif
        <!-- Page Content -->
        <main class="bg-gray-100 dark:bg-gray-900 h-screen text-gray-800 dark:text-gray-100">
            {{ $slot }}
        </main>
    </div>


    <script>
        const toggleButton = document.querySelector('#theme-toggle');
        // #dark-mode-icon
        const darkIcon = document.querySelector('#dark-mode-icon');
        // #light-mode-icon
        const lightIcon = document.querySelector('#light-mode-icon');

        if (localStorage.theme === 'dark') {
            darkIcon.classList.remove('hidden');
        } else {
            lightIcon.classList.remove('hidden');
        }


        toggleButton.addEventListener('click', () => {
            let currentTheme = localStorage.theme;
            if (currentTheme === 'dark') {
                document.documentElement.classList.remove('dark');
                localStorage.theme = 'light';
                darkIcon.classList.add('hidden');
                lightIcon.classList.remove('hidden');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.theme = 'dark';
                darkIcon.classList.remove('hidden');
                lightIcon.classList.add('hidden');
            }
        });
    </script>
</body>

</html>
