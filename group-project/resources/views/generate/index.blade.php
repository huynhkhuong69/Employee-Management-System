<x-app-layout>
    <section class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-100 pt-10 pb-36">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 ">
            <div class="flex w-full py-3 justify-center">
                <h1 class="text-2xl ">AI Image Generator</h1>
            </div>
            <form method="POST" action="{{ route('generate') }}" enctype="multipart/form-data">
                @csrf
                <div class="w-full flex flex-col-reverse md:flex-row">
                    <div class="flex-1">
                        <div class="mb-3">
                            <p><label for="prompt" class="text-lg dark:text-gray-400">Describe your image</label></p>
                            <textarea id="prompt"
                                class="w-full  rounded  dark:shadow-md dark:shadow-slate-600 dark:bg-gray-700 border dark:border-gray-600 overflow-hidden"
                                name="prompt"
                                placeholder="A cat sitting on a couch in a living room, cinematic lighting, ultra realistic , octane render, by Reg Rutkowski"
                                rows="5">{{ old('prompt') }}</textarea>
                            <br>
                            @error('prompt')
                                <p class="text-xs mt-1 text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <p><label for="negative_prompt" class="text-lg dark:text-gray-400">Negative prompt</label>
                            </p>
                            <textarea id="negative_prompt"
                                class="form-control w-full  rounded  dark:shadow-md dark:shadow-slate-600 dark:bg-gray-700 border dark:border-gray-600 overflow-hidden"
                                name="negative_prompt"
                                placeholder="Describe things to exclude, separated by commas. For example: blood, gore, violence, etc."
                                rows="1">{{ old('negative_prompt') }}</textarea>
                            <br>
                            @error('negative_prompt')
                                <p class="text-xs mt-1 text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mt-4 mb-6 flex justify-start">
                            <button id="generate-art-button" type="submit"
                                onclick="disable_generate_button();this.form.submit();"
                                class="generate-art-button w-56 text-white text-bold text-xl rounded px-12  py-3  bg-blue-700  hover:bg-blue-600">
                                Generate
                            </button>
                        </div>
                    </div>
                    <div
                        class="w-full md:max-w-[350px] mt-[25px] md:ml-6 mb-4 rounded  border border-gray-600 dark:bg-gray-700 dark:shadow-md dark:shadow-slate-600">
                        <div class="px-5 py-4 pb-6">
                            <div class="mb-2 ">
                                <label for="image_size_index" class="text-md ">Image Size</label></p>
                                {{-- @php
                                $sizes = [['id' => 0, 'name' => '512x512'], ['id' => 1, 'name' => '384x576'], ['id' => 2, 'name' => '384x640'], ['id' => 3, 'name' => '640x320'], ['id' => 4, 'name' => '640x448']];
                            @endphp --}}
                                <div class="inline-flex items-center space-x-2">
                                    <label for="image_width" class="">Width</label>
                                    <input type="number" id="image_width" name="image_width" min="64"
                                        step="64" value="{{ old('image_width') ?? 512 }}" max="704"
                                        class="text-gray-800 dark:bg-gray-200">
                                    <label>x</label>
                                    <input type="number" id="image_height" name="image_height" min="64"
                                        step="64" value="{{ old('image_width') ?? 512 }}" max="704"
                                        class="text-gray-800 dark:bg-gray-200">
                                    <label for="image_height" class="">Height</label>
                                </div>
                                {{-- <select
                                class="form-control m-bot15 border dark:text-gray-900 dark:bg-gray-200 border-gray-200 rounded p-2 w-full"
                                name="image_size_index">
                                @foreach ($sizes as $item)
                                    <option value="{{ $item['id'] }}">
                                        {{ $item['name'] }}
                                    </option>
                                @endforeach
                            </select> --}}
                                @error('image_size_index')
                                    <p class="text-xs mt-1 text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <div id="image_count">
                                    <label for="image_count" class="flex">Number of images</label>
                                    <input type="number" id="image_count" name="image_count" min="1"
                                        step="1" value="{{ old('image_count') ?? 1 }}"
                                        max="20"class="text-gray-800 dark:bg-gray-200">
                                </div>
                            </div>
                            <div class="mb-2">
                                <div id="model">
                                    <label for="ai_model" class="flex">AI Art Model</label>

                                    <select
                                        class="form-control m-bot15 border dark:text-gray-900 dark:bg-gray-200 border-gray-200 rounded p-2 w-full"
                                        name="ai_model">
                                        @foreach ($models as $item)
                                            {{-- check old value --}}
                                            <option value="{{ $item['id'] }}"
                                                @if (old('ai_model') == $item['id']) selected @endif>
                                                {{ $item['display_name'] }}
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <p><label class="text-md dark:text-gray-400">Advanced settings</label></p>
                            {{-- Upscale checkbox --}}
                            <div class="mb-2">
                                <label for="upscale" class="text-sm">4x Upscale:&emsp;</label>
                                <input type="checkbox" id="upscale" name="upscale"
                                    {{ old('upscale') ? 'checked' : '' }}>
                            </div>
                            <div class="mb-2">
                                <label for="high_res" class="text-sm">High Resolution Fix:&emsp;</label>
                                <input type="checkbox" id="upscale" name="high_res"
                                    {{ old('high_res') ? 'checked' : '' }}>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div id="generating_container" class="">
                <div id="generating" class="hidden  flex-col w-full">
                    <div id="generating_text" class="flex flex-col w-full">
                        <p class="text-center text-2xl font-bold">Generating...</p>
                        <p class="text-center text-xl font-bold">This may take a while.</p>
                    </div>
                    <div id="generating_status" class="flex flex-wrap w-full justify-center space-x-4">
                        <div id="waiting"></div>
                        <div id="processing"></div>
                        <div id="finished"></div>
                        <div id="restarted"></div>
                    </div>
                    <div id="generating_progress" class="flex flex-col w-full mt-4 items-center">
                        <div id="generating_progress_bar" class="w-full h-2 bg-gray-200 rounded-full">
                            <div id="progress_bar_fill" class="w-0 h-full bg-blue-500 rounded-full"></div>
                        </div>
                        <div id="wait_time"></div>
                    </div>
                </div>
                <div id="generated_container" class="w-full mt-20">
                    {{-- This is where the generated images will be displayed --}}
                </div>
            </div>
            <script>
                let generate_button = document.getElementById("generate-art-button");
                let generating = document.getElementById("generating");
                let progress_bar_fill = document.getElementById('progress_bar_fill');
                let generated_container = document.getElementById('generated_container');

                function generate_button_click() {
                    generate_button.innerHTML = "Uploading...";
                    disable_generate_button();
                }

                function disable_generate_button() {
                    generate_button.disabled = true;
                    generate_button.classList.add("opacity-50");
                }

                function enable_generate_button() {
                    generating.style.display = "none";
                    generate_button.innerHTML = "Generate";
                    generate_button.disabled = false;
                    generate_button.classList.remove("opacity-50");
                    delete_request();
                }
            </script>

            {{-- Local Storage --}}
            <script>
                // Check for support of sessionStorage
                let sessionstorage_support = false;
                if (typeof(Storage) !== "undefined" && typeof(sessionStorage) !== "undefined") {
                    sessionstorage_support = true;
                }

                function save_request(id, status) {
                    if (sessionstorage_support) {
                        sessionStorage.setItem("create_request", JSON.stringify({
                            id: id,
                            status: status
                        }));
                    }
                }

                function load_request() {
                    if (sessionstorage_support) {
                        if (sessionStorage.create_request != null) {
                            return JSON.parse(sessionStorage.create_request);
                        }
                    }
                    return null;
                }

                function delete_request() {
                    if (sessionstorage_support) {
                        sessionStorage.removeItem("create_request");
                    }
                }
            </script>
            {{-- Main Functions --}}
            <script>
                let first_wait_time = 0;
                let first_time = true;

                function update_progress_bar(wait_time) {
                    if (first_time) {
                        first_wait_time = wait_time;
                        first_time = false;
                    }
                    let progress = 0;
                    if (first_wait_time > 0) {
                        if (wait_time > first_wait_time) {
                            first_wait_time = wait_time;
                            progress_bar_fill.style.width = "0%";
                        } else {
                            progress = (first_wait_time - wait_time) / first_wait_time * 100;
                            progress_bar_fill.style.width = progress + "%";
                            console.log(progress);
                        }
                    }
                    // let last_wait_time = 0;
                    // console.log("First Waiting Time: " + first_wait_time);
                    // console.log("Wait Time" + wait_time);
                    // let progress = 0;
                    // if (last_wait_time > 0) {
                    //     progress = (last_wait_time - wait_time) / last_wait_time * 100;
                    //     console.log(progress);
                    //     progress_bar_fill.style.width = progress + "%";
                    // }
                    // last_wait_time = wait_time;
                }

                function update_status_ui(response) {
                    update_progress_bar(response.wait_time);
                    let waiting = document.getElementById('waiting');
                    let processing = document.getElementById('processing');
                    let finished = document.getElementById('finished');
                    let restarted = document.getElementById('restarted');
                    let wait_time = document.getElementById('wait_time');
                    let done = document.getElementById('done');
                    wait_time.innerHTML = "Estimate Time to Complete: " + response.wait_time + "s";
                    waiting.innerHTML = "Pending: " + response.waiting;
                    processing.innerHTML = "Processing: " + response.processing;
                    finished.innerHTML = "Finished: " + response.finished;
                    restarted.innerHTML = "Restarted: " + response.restarted;
                }

                function request_error() {
                    console.log('-- request_error --');
                    enable_generate_button();
                }


                function done(id) {
                    generate_button.innerHTML = "Done";
                    console.log('-- get final status --');
                    progress_bar_fill.style.width = "100%";
                    $.ajax({
                        url: "{{ route('generate.status') }}",
                        data: {
                            "id": id
                        },
                        type: 'get',
                        success: function(response) {
                            console.log(response);
                            if (response.status == 200) {
                                let json = response.json;
                                update_status_ui(json);
                                if (json.done) {
                                    console.log('-- done --');
                                    console.log(json.generations);
                                    json.generations.forEach(element => {
                                        console.log(element);
                                    });

                                    let generated_div = document.createElement('div');
                                    generated_div.id = response.id;
                                    generated_div.classList.add("flex", "flex-wrap", "gap-4", "items-center");
                                    generated_container.appendChild(generated_div);
                                    json.generations.forEach(generation => {
                                        let generated_image = document.createElement('img');
                                        generated_image.classList.add("w-64");
                                        generated_image.src = generation.img;
                                        generated_image.alt = "Generated Image";
                                        generated_image.classList.add("w-30");
                                        generated_div.appendChild(generated_image);
                                    });
                                    enable_generate_button();
                                } else {
                                    console.log('-- not done --');
                                    done(response.id);
                                }
                            } else {
                                // error
                                request_error();
                                console.log('error');
                            }
                            enable_generate_button();
                        },
                    });
                }

                function processing(id) {
                    generate_button.innerHTML = "Processing";
                    setTimeout(function() {
                        check(id);
                    }, 2000);
                }

                function check(id) {
                    console.log('-- checking --');
                    generating.style.display = "flex";
                    generate_button.innerHTML = "Processing...";
                    disable_generate_button();
                    $.ajax({
                        url: "{{ route('generate.check') }}",
                        data: {
                            "id": id
                        },
                        type: 'get',
                        success: function(response) {
                            console.log(response);
                            if (response.status == 200) {
                                let json = response.json;
                                update_status_ui(json);
                                if (json.done) {
                                    done(response.id);
                                } else {
                                    processing(response.id);
                                }
                            } else {
                                // error
                                request_error();
                                console.log('error');
                            }
                        },
                    });

                }
            </script>
            {{-- Check for last request --}}
            <script>
                // save_request('xxx-yyy-zzz', 'pending');
                let request_data = load_request();
                if (request_data != null) {
                    delete_request();
                    check(request_data.id);
                }
            </script>
            {{-- Generate: response status code and id --}}
            @if (session()->has('status'))
                <script>
                    let status = @json(session()->get('status'));
                    let id = @json(session()->get('id'));
                    console.log('create response:\n ' + status + ' - ' + id);
                    if (status == 200 || status == 202) {
                        save_request(id, 'pending');
                        check(id);
                    } else {
                        request_error();
                    }
                </script>
            @endif

            {{-- IndexedDB --}}
            <script>
                let indexexdb_support = false;
                let db;
                let db_loaded = false;
                if (window.indexedDB) {
                    indexexdb_support = true;
                    let dbName = 'gallery-db-1';
                    const openRequest = indexedDB.open(dbName, 1);
                    openRequest.onupgradeneeded = function(e) {
                        var db = e.target.result;
                        console.log("running onupgradeneeded");
                        if (!db.objectStoreNames.contains("generated_images")) {
                            var storeOS = db.createObjectStore("generated_images", {
                                keyPath: "id",
                                autoIncrement: true
                            });
                            storeOS.createIndex("prompt", "prompt", {
                                unique: false
                            });
                            storeOS.createIndex("negative_prompt", "negative_prompt", {
                                unique: false
                            });
                            storeOS.createIndex("image_size_index", "image_size_index", {
                                unique: false
                            });
                            storeOS.createIndex("image_count", "image_count", {
                                unique: false
                            });
                            storeOS.createIndex("image_width", "image_width", {
                                unique: false
                            });
                            storeOS.createIndex("image_height", "image_height", {
                                unique: false
                            });
                            storeOS.createIndex("image_url", "image_url", {
                                unique: false
                            });
                            storeOS.createIndex("created_at", "created_at", {
                                unique: false
                            });
                            storeOS.createIndex("updated_at", "updated_at", {
                                unique: false
                            });
                        }
                    };
                    openRequest.onerror = function(event) {
                        console.log('Error opening database.');
                    };
                    openRequest.onsuccess = function(event) {
                        db = event.target.result;
                        console.log('Database opened successfully.');
                        console.dir(db.objectStoreNames);
                        db_loaded = true;
                    };
                }
            </script>
        </div>
    </section>
</x-app-layout>
