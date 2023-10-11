<x-app-layout>
    <div class="dark:text-zinc-100 h-full">
        {{-- Banner" --}}
        <div id="banner" class="flex justify-center items-center h-[calc(100vh-65px)] bg-cover bg-center bg-no-repeat"
            style="background-image: url({{ asset('images/slider/slider-1.jpg') }})">
            <div class="text-center">
                <h1 class="text-5xl font-bold text-white ">Gallery</h1>
                <br />
                <h1 class="text-3xl font-bold text-white">Create any image from your imagination.</h1>
                <br />
                <a href="{{ route('generate') }}">
                    <button
                        class="create-art-button bg-gray-800 hover:bg-gray-900 text-white font-bold py-3 px-10 border-none rounded shadow-md shadow-gray-900 hover:shadow-md hover:shadow-gray-800">Get
                        Started</button>
                </a>
                <button class="scrolldown-button bg-gray-900 bg-opacity-50"><i class="fas fa-chevron-down"></i></button>
                <button id="slider-prev" class="slider-button prev-button"><i class="fas fa-chevron-left"></i></button>
                <button id="slider-next" class="slider-button next-button"><i class="fas fa-chevron-right"></i></button>
            </div>
        </div>

        <script>
            const scrollDownButton = document.querySelector('.scrolldown-button');

            window.onload = function() {
                scrollDownButton.addEventListener('click', () => {
                    window.scrollTo({
                        left: 0,
                        top: document.body.scrollHeight,
                        behavior: "smooth"
                    });
                });
            }
            window.addEventListener('scroll', () => {
                const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                const scrollPosition = document.body.scrollHeight - scrollTop - window.innerHeight;
                if (scrollPosition <= 0) {
                    scrollDownButton.style.display = 'none';
                } else {
                    scrollDownButton.style.display = 'block';
                }
            });

            const images = [
                "{{ asset('images/slider/slider-1.jpg') }}",
                "{{ asset('images/slider/slider-2.jpg') }}",
                "{{ asset('images/slider/slider-3.jpg') }}",
                "{{ asset('images/slider/slider-4.jpg') }}",
                "{{ asset('images/slider/slider-5.jpg') }}",
                "{{ asset('images/slider/slider-6.jpg') }}",
                "{{ asset('images/slider/slider-7.jpg') }}",
                "{{ asset('images/slider/slider-8.jpg') }}",
                "{{ asset('images/slider/slider-9.jpg') }}"
            ];

            let currentImageIndex = 0;
            const imageElement = document.getElementById('banner');

            function changeImage() {
                const newImage = new Image();
                newImage.src = images[currentImageIndex];
                newImage.onload = function() {
                    imageElement.style.backgroundImage = 'url(' + images[currentImageIndex] + ')';
                    imageElement.classList.remove('fade-out');
                    imageElement.classList.add('fade-in');
                }
                imageElement.classList.remove('fade-in');
                imageElement.classList.add('fade-out');
            }

            function showNextImage() {
                currentImageIndex++;
                if (currentImageIndex >= images.length) {
                    currentImageIndex = 0;
                }
                changeImage();
            }

            function showPreviousImage() {
                currentImageIndex--;
                if (currentImageIndex < 0) {
                    currentImageIndex = images.length - 1;
                }
                changeImage();
            }

            setInterval(showNextImage, 5000);

            const nextButton = document.getElementById('slider-next');
            nextButton.addEventListener('click', showNextImage);

            const previousButton = document.getElementById('slider-prev');
            previousButton.addEventListener('click', showPreviousImage);
        </script>

        {{-- Gallery --}}

        <div class="flex flex-wrap dark:bg-gray-900  justify-center">
            <a href="{{ route('category') }}">
                <button
                    class=" bg-gray-800 hover:bg-gray-900 text-white font-bold py-2 px-4 border border-gray-800 rounded m-2 flex">
                    <img src="{{ url('images/categories/all.svg') }}" alt="" title="" width="24px"
                        height="24px" style="margin-right: 10px;" />All

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
    </div>
</x-app-layout>
