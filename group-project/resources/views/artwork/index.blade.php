<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gallery') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-14xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex items-center">
                    <div class="ml-4 text-lg leading-7 font-semibold"><a href="/"
                            class="underline text-gray-900 dark:text-white">Go
                            Back</a></div>
                </div>
                <p>
                <h1>Search</h1>
                <section class="search">
                    <form action="/search" method="get">
                        <input type="text" name="search" placeholder="Search images...">
                        <button type="submit">Search</button>
                    </form>
                </section>
                </p>
                <p>
                </p>

                <div class="flex-center position-ref full-height">
                    <div class="content">
                        <div id="gallery">
                            @foreach ($images as $image)
                                <a href="{{ route('artwork.show', $image['id']) }}">
                                    <img src="{{ asset($image['src']) }}" alt="{{ $image['alt'] }} width=100%" />
                                </a>
                            @endforeach
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
