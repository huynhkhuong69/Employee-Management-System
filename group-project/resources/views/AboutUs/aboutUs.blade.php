<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl dark:text-gray-800 leading-tight">
            {{ __('About Us') }}
        </h2>
    </x-slot>
    <section id="aboutus" class=" bg-red-500 py-11 text-white">
        <div class="container mx-auto py-2">
            <h2 class="text-4xl font-bold mb-5 text-center">About Us</h2>
            <p class='px-24 text-center'>
                We are a group of students from the University of San Jose State University. We are passionate about
                programming and want to create a website that helps people learn more about programming. We hope that
                our website will help you learn more about programming and help you find the right course for you.
            </p>

            <div class="flex justify-between mt-4">
                <div class=" text-center mr-3 p-12 ">
                    <h5 class="mb-2 font-bold">Hung Pham</h5>
                    <p class="mb-2">Developer</p>
                </div>

                <div class="text-center mr-3 p-12">
                    <h5 class="mb-2 font-bold">Khuong Huynh</h5>
                    <p class="mb-2">Developer</p>
                </div>

                <div class=" text-center mr-3 p-12">
                    <h5 class="mb-2 font-bold">
                        Vivian Letran
                    </h5>
                    <p class="mb-2">Developer</p>
                </div>

                <div class=" text-center mr-3 p-12">
                    <h5 class="mb-2 font-bold">Huyen Phan</h5>
                    <p class="mb-2">Developer</p>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-lime-500 py-12">
        <div class="container mx-auto px-2 text-white">
            <div class="flex justify-between">
                <div>
                    <h2 class="text-3xl font-bold mb-4"> Explore</h2>
                    <ul>
                        <li> <a href="#"><i class="fa-brands fa-facebook-square"></i></a></li>
                        <li> <a href="#"><i class="fa-brands fa-youtube-square"></i></a></li>
                    </ul>
                </div>
                <div>
                    <h2 class="text-3xl font-bold mb-4"> Learn More</h2>
                    <ul class="ml-6">
                        <li><a href="http://127.0.0.1:8002">Home</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="http://127.0.0.1:8002/aboutus">About Us</a></li>
                    </ul>

                </div>
                <div>
                    <h2 class="text-3xl font-bold mb-4">Gallery</h2>
                </div>
            </div>
        </div>







</x-app-layout>
