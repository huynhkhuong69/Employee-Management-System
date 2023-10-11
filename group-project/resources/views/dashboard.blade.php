<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex-center position-ref full-height">
                        <div class="content">
                            <div id="gallery">
                                @foreach ($images as $image)
                                    <script>
                                        console.log({{ $image->id }});
                                    </script>
                                    <a href="{{ route('artwork.show', $image->id) }}">
                                        <img src="{{ url('storage/' . $image->image_url) }}" alt=""
                                            title="" width=100% />
                                    </a>
                                @endforeach
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>




    </div>


</x-app-layout>
