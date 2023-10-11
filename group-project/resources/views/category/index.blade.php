<x-app-layout>
    <style>
        #gallery {
            /* center */
            margin: 10px auto;
            text-align: center;
            padding: 0 10px 0 10px;
            /* max-width: 800px; */
            /* 5 columns */
            max-width: 2048px;
            -webkit-column-count: 5;
            -webkit-column-gap: 10px;
            -moz-column-count: 5;
            -moz-column-gap: 10px;
            column-count: 5;
            column-gap: 10px;
        }

        #gallery img {
            margin-bottom: 10px;
            /* Just in case there are inline attributes */
            width: 100% !important;
            height: auto !important;
        }

        @media (max-width: 1200px) {
            #gallery {
                -moz-column-count: 4;
                -webkit-column-count: 4;
                column-count: 4;
            }
        }

        @media (max-width: 1000px) {
            #gallery {
                -moz-column-count: 3;
                -webkit-column-count: 3;
                column-count: 3;
            }
        }

        @media (max-width: 800px) {
            #gallery {
                -moz-column-count: 2;
                -webkit-column-count: 2;
                column-count: 2;
            }
        }

        @media (max-width: 400px) {
            #gallery {
                -moz-column-count: 1;
                -webkit-column-count: 1;
                column-count: 1;
            }
        }

        body {
            margin: 0;
            padding: 0;
        }
    </style>
    {{-- Search Bar
  <div class="flex justify-center">
    <div class="w-1/2">
      <form action="{{ route('category') }}" method="GET">
        <div class="flex items-center border-b border-blue-500 py-2">
          <input class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" name="search" type="text" placeholder="Search" aria-label="Search">
          <button class="flex-shrink-0 bg-blue-500 hover:bg-blue-700 border-blue-500 hover:border-blue-700 text-sm border-4 text-white py-1 px-2 rounded" type="submit">
            Search
          </button>
        </div>
      </form>
    </div>
  </div>
   --}}

    <br>
    <div class="flex flex-wrap justify-center">
        <a href="{{ route('category') }}">
            <button
                class=" bg-gray-800 hover:bg-gray-900 text-white font-bold py-2 px-4 border border-gray-800 rounded m-2 flex">
                <img src="{{ url('images/categories/all.svg') }}" alt="" title="" width="24px" height="24px"
                    style="margin-right: 10px;" />All

            </button>
        </a>
        @foreach ($categories as $category)
            <a href="{{ route('category.show', $category->slug) }}">
                <button
                    class=" bg-gray-800 hover:bg-gray-900 text-white font-bold py-2 px-4 border border-gray-800 rounded m-2  flex">
                    <img src="{{ url($category->image_url) }}" alt="" title="" width="24px"
                        height="24px" style="margin-right: 10px;" />
                    {{ $category->name }}
                </button>
            </a>
        @endforeach
    </div>

    <div class="flex-center position-ref full-height">
        <div class="content">
            <div id="gallery">
                @foreach ($images as $image)
                    <script>
                        console.log({{ $image->id }});
                    </script>
                    <a href="{{ route('artwork.show', $image->id) }}">
                        <img src="{{ url('storage/' . $image->image_url) }}" alt="" title="" width=100% />
                    </a>
                @endforeach
                </p>
            </div>
        </div>
    </div>
    <div class="mt-6 p-4 text-white">
        {{ $images->links() }}
    </div>

</x-app-layout>
