<x-app-layout>


    {{-- Header --}}
    <header class="text-center text-gray-800 dark:text-gray-100">
        <h2 class="text-2xl font-bold uppercase mb-1 pt-10">
            Upload
        </h2>
        <p class="mb-4">Post an artwork...</p>
    </header>


    {{-- Body --}}
    <div class="flex justify-center">

        <div>
            <form method="POST" action="/upload" enctype="multipart/form-data">
                @csrf
                <div class="mb-6">
                    <label for="image_url" class="inline-block text-lg mb-2 ">
                        Submit an Artwork
                    </label>
                    <input type="file" class="border border-gray-200 rounded p-2 w-full" name="image_url" />
                    @error('image_url')
                        <p class="text-xs mt-1 text-red-500">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-6">
                    <label for="title" class="inline-block text-lg mb-2 ">Title</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full text-gray-800" name="title"
                        placeholder="Title of your artwork" value="{{ old('title') }}" />
                    @error('title')
                        <p class="text-xs mt-1 text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <p><label for="description">Description</label></p>
                    <textarea id="description" class="border border-gray-200 rounded w-full text-gray-800" name="description"
                        placeholder="Describe your artwork..." rows="5">{{ old('description') }}</textarea>
                    <br>
                    @error('description')
                        <p class="text-xs mt-1 text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6 ">
                    <label for="artist_name" class="inline-block text-lg mb-2 ">
                        Artist Name
                    </label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full text-gray-800"
                        name="artist_name" placeholder="Artist Name" value="{{ old('artist_name') }}" />
                    @error('artist_name')
                        <p class="text-xs mt-1 text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6 ">
                    <label for="category" class="inline-block text-lg mb-2 ">
                        Category
                    </label>

                    <select class="form-control m-bot15 border text-gray-800  border-gray-200 rounded p-2 w-full"
                        name="category_id">
                        @foreach ($categories as $item)
                            <option value="{{ $item['id'] }}" @if (old('category_id') == $item['id']) selected @endif>
                                {{ $item['name'] }}
                            </option>
                        @endforeach
                        {{-- @foreach ($categories as $item)
                            <option value="{{ $item['id'] }}">
                                {{ $item['name'] }}
                            </option>
                        @endforeach --}}
                    </select>
                    @error('category')
                        <p class="text-xs mt-1 text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- <label>
                    <span class="">For Sale</span>
                    <input id="is_for_sale" name="is_for_sale" class="ml-10" type="checkbox">
                </label> --}}
                {{-- If is_for_sale checked, display the price --}}
                <label for="is_for_sale">For Sale</label>
                <select id="is_for_sale" name="is_for_sale" class="ml-2 text-gray-800">
                    {{-- if old value --}}
                    <option value="0" @if (old('is_for_sale') == '0') selected @endif>No</option>
                    <option value="1" @if (old('is_for_sale') == '1') selected @endif>Yes</option>
                </select>

                <div id="price" style="display:none;" class="mt-2">
                    <label for="price" class="">Price (USD) </label>
                    <input type="number" id="price" name="price" min="0" step="0.01"
                        {{-- value 0 or old --}} value="{{ old('price') ?? 0 }}" max="999999999999"
                        class="ml-2 text-gray-800"> ($)
                </div>
                <script>
                    var select = document.getElementById("is_for_sale");
                    var priceDiv = document.getElementById("price");
                    if (select.value == "1") {
                        priceDiv.style.display = "block";
                    } else {
                        priceDiv.style.display = "none";
                    }
                    select.addEventListener("change", function() {
                        if (select.value == "1") {
                            priceDiv.style.display = "block";
                        } else {
                            priceDiv.style.display = "none";
                        }
                    });
                </script>
                <div class="mt-4 mb-6">
                    <button type="submit"
                        class="w-full text-white rounded py-3 px-16  mr-2 transition ease-in-out delay-120 bg-blue-600 hover:-translate-y-1 hover:scale-110 hover:bg-blue-500 duration-250">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
    @if (session('success'))
        <div class="text-center text-green-500">
            {{ session('success') }}
        </div>
    @endif
</x-app-layout>
