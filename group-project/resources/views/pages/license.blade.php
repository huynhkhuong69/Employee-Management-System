<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-center text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('License Comparison') }}
        </h2>
    </x-slot>
    <div class="container flex items-center justify-center mx-auto p-4">
        <div class="w-full max-w-4xl">
            <div class="flex bg-white dark:bg-slate-800 p-1 rounded-t-lg">
                <div class="flex-1">Properties</div>
                <div class="flex-1 text-center">Basic License</div>
                <div class="flex-1 text-center">Premium License</div>
                <div class="flex-1 text-center">Supreme License</div> <!-- Moved to the right -->

            </div>
            <div class="bg-white dark:bg-gray-800 border-t border-b border-gray-200">
                <div class="flex p-2">
                    <div class="flex-1">Unlimited web views</div>
                    <div class="flex-1 text-center text-2xl dark:text-white">✔</div>
                    <div class="flex-1 text-center text-2xl dark:text-white">✔</div>
                    <div class="flex-1 text-center text-2xl dark:text-white">✔</div>
                </div>
                <!-- Add more table rows here -->
            </div>

            <div class="bg-white dark:bg-gray-800 border-t border-b border-gray-200">
                <div class="flex p-2">
                    <div class="flex-1">Users are able to use asset for own personal uses such as personal brand.</div>
                    <div class="flex-1 text-center text-2xl">✔</div>
                    <div class="flex-1 text-center text-2xl">✔</div>
                    <div class="flex-1 text-center text-2xl">✔</div> <!-- New column data -->
                </div>
                <div class="bg-white dark:bg-gray-800 border-t border-b border-gray-200">
                    <div class="flex p-2">
                        <div class="flex-1">Users are able to modify asset</div>
                        <div class="flex-1 text-center text-2xl"> ✔</div>
                        <div class="flex-1 text-center text-2xl">✔</div>
                        <div class="flex-1 text-center text-2xl">✔</div> <!-- New column data -->
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 border-t border-b border-gray-200">
                    <div class="flex p-2">
                        <div class="flex-1">Users are allowed to be copied up to 1000 times. </div>
                        <div class="flex-1 text-center text-2xl">✔</div>
                        <div class="flex-1 text-center text-2xl">✔</div>
                        <div class="flex-1 text-center text-2xl">✔</div> <!-- New column data -->
                    </div>
                    <div class="bg-white dark:bg-gray-800 border-t border-b border-gray-200">
                        <div class="flex p-2">
                            <div class="flex-1">Assets can be copied more than to 1000 times.</div>
                            <div class="flex-1 text-center text-2xl"></div>
                            <div class="flex-1 text-center text-2xl">✔</div>
                            <div class="flex-1 text-center text-2xl">✔</div> <!-- New column data -->
                        </div>
                    </div>
                    <div class="bg-white dark:bg-gray-800 border-t border-b border-gray-200">
                        <div class="flex p-2">
                            <div class="flex-1">Artwork ownership timeframe is extended to 5 years.</div>
                            <div class="flex-1 text-center text-2xl"></div>
                            <div class="flex-1 text-center text-2xl"></div>
                            <div class="flex-1 text-center text-2xl">✔</div> <!-- New column data -->
                        </div>
                    </div>

                    <div class="bg-white dark:bg-gray-800 py-12 sm:py-24">
                        <div class="mx-auto max-w-2xl lg:mx-0">
                            <h2 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white sm:text-4xl">
                                Basic licenses
                            </h2>

                            <p class="mt-2 text-lg font-semibold leading-8 text-black-900">
                                With a Basic license, you may:</p>
                            <ul class="list-disc pl-6 mt-2 text-md leading-8 text-black-900">
                                <li>Users may edit the artwork on editing platforms that support jpeg,png,or apng..</li>
                                <li>Transfer the license of an artwork to another registered account. </li>

                            </ul>

                            <p class="mt-2 text-lg font-semibold leading-8 text-black-900">With a Standard license, you
                                may not:</p>
                            <ul class="list-disc pl-6 mt-2 text-md leading-8 text-black-900">
                                <li>Reproduce the asset beyond the 1000 limit copy/viewer restriction.</li>
                                <li>Have access to newly launched features from the development team.</li>
                                <li>Give access to downloaded file to a third party vendor.</li>

                            </ul>
                        </div>
                    </div>

                </div>
                <div class="bg-white dark:bg-gray-800 border-t border-b border-gray-200">
                    <div class="bg-white dark:bg-gray-800 py-12 sm:py-24">
                        <div class="mx-auto max-w-2xl lg:mx-0">
                            <div class="mx-auto max-w-2xl lg:mx-0">
                                <h2 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white sm:text-4xl">
                                    Premium
                                    licenses
                                </h2>
                                <p class="mt-2 text-lg font-semibold leading-8 text-black-600">With a Preminum license,
                                    you may:
                                </p>
                                <ul class="list-disc pl-6 mt-2 text-md leading-8 text-black-900">
                                    <li>Use the asset with all the rights granted in the Basic license.</li>
                                    <li>Reproduce the asset at the 1000 limit copy/viewer restriction.</li>
                                </ul>
                                <p class="mt-2 text-lg font-semibold leading-8 text-black-600">With an Extended license,
                                    you
                                    may not:
                                </p>
                                <ul class="list-disc pl-6 mt-2 text-md leading-8 text-black-900">
                                    <li>Give access to downloaded file to a third party vendor.</li>

                                    <li>Asset of the artwork is able to be reproduce asset at user's own freedom. There
                                        is
                                        no limitation on the number of reproduction for the user.</li>
                                    <li>Have access to newly launched features from the development team.
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="bg-white dark:bg-gray-800 py-12 sm:py-24">
                    <div class="mx-auto max-w-2xl lg:mx-0">
                        <div class="mx-auto max-w-2xl lg:mx-0">
                            <h2 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white sm:text-4xl">
                                Supreme
                                licenses</h2>
                            <p class="mt-2 text-lg font-semibold leading-8 text-black-600">With Supreme
                                license,
                                you may:
                            </p>
                            <ul class="list-disc pl-6 mt-2 text-md leading-8 text-black-900">
                                <li>Use the asset with all the rights granted in the Premium license.</li>
                                <li>Asset of the artwork is able to be reproduce asset at user's own freedom. There is
                                    no limitation on the number of reproduction for the user.</li>
                                <li>Have access to newly launched features from the development team.
                                </li>
                            </ul>
                            <p class="mt-2 text-lg font-semibold leading-8 text-black-600">With Supreme
                                license,
                                you may not:
                            </p>
                            <ul class="list-disc pl-6 mt-2 text-md leading-8 text-black-900">
                                <li>Give access to downloaded file to a third party vendor.</li>

                            </ul>
                        </div>

                    </div>
                </div>

</x-app-layout>
