<x-app-layout>
    <div class=" dark:text-zinc-100 h-full">
        {{-- Banner" --}}
        {{-- Showing results for "keyword" --}}
        @if (count($images) == 0)
            <h1 class="text-xl font-bold text-center p-4">No results found for: "{{ $keyword }}"</h1>
            <div class="flex flex-wrap dark:bg-gray-900">
                <div class="content">
                    <div id="gallery">
                        <p class="text-xl font-bold text-center p-4">Try searching for something else!</p>
                    </div>
                </div>
            </div>
            </p>
        @else
            @if ($keyword == '')
                <h1 class="text-xl font-bold text-center p-4">Showing all results</h1>
            @else
                <h1 class="text-xl font-bold text-center p-4">Showing results for: "{{ $keyword }}"</h1>
            @endif
            <div class="flex flex-wrap dark:bg-gray-900">
                <div class="content">
                    <div id="gallery">
                        @foreach ($images as $image)
                            <a href="{{ route('artwork.show', $image->id) }}">
                                <img src="{{ url('storage/' . $image->image_url) }}" alt="" title=""
                                    width=100% />
                            </a>
                        @endforeach
                        </p>
                    </div>
                </div>
            </div>
        @endif


        {{-- <h1 class="text-xl font-bold text-center p-4">Showing results for: "{{ $keyword }}"</h1>
        <div class="flex flex-wrap dark:bg-gray-900">
            <div class="content">
                <div id="gallery">
                    @foreach ($images as $image)
                        <a href="{{ route('artwork.show', $image->id) }}">
                            <img src="{{ url('storage/' . $image->image_url) }}" alt="" title=""
                                width=100% />
                        </a>
                    @endforeach
                    </p>
                </div>
            </div>
        </div> --}}
</x-app-layout>
