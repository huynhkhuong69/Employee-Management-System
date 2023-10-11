<x-app-layout>

    {{-- Contact Us Form --}}
    <div>
        <h1 class="text-3xl text-center font-bold mt-8">Contact Us</h1>
        <div class="flex justify-center w-lg">
            <form class="w-full max-w-lg mt-8" action="{{ route('contact.store') }}" method="POST">
                @csrf
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3 mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
                            Name
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('name') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            id="name" name="name" type="text" placeholder="Name" value="{{ old('name') }}">
                        @error('name')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3 mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="email">
                            Email
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('email') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            id="email" name="email" type="email" placeholder="Email"
                            value="{{ old('email') }}">
                        @error('email')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3 mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="message">
                            Message
                        </label>
                        <textarea
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('
                            message') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            id="message" name="message" type="text" placeholder="Message">{{ old('message') }}</textarea>
                        @error('message')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                        </textarea>

                        <button type='submit' class='text-blue-500 mt-3' name='submit'>Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div id="message">
        @if (session('success'))
            <p class="text-green-500 text-xs italic">{{ session('success') }}</p>
        @endif

    </div>
</x-app-layout>
