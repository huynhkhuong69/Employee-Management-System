<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl dark:text-gray-800 leading-tight">
            {{ __('Payment') }}
        </h2>
    </x-slot>
    <form action="{{ route('payment.store') }}" method="POST">
        @csrf
        <div class="max-w-7xl justify-center items-center">

            <div class="w-full flex flex-col-reverse md:flex-row items-center justify-center">
                {{--  Address --}}
                <div
                    class="w-96 p-3 rounded  border border-gray-600 dark:bg-gray-700 dark:shadow-md dark:shadow-slate-600">
                    {{-- Fullname --}}
                    <div class="mb-3">
                        <p><label for="full_name" class="text-lg dark:text-gray-400">Full Name</label></p>
                        <input type="text" name="full_name" value="{{ old('full_name') }}" placeholder="Full Name"
                            class="w-full text-gray-900 rounded  dark:shadow-md dark:shadow-slate-600 dark:bg-gray-200 border dark:border-gray-600 overflow-hidden">
                        <br>
                        @error('full_name')
                            <p class="text-xs mt-1 text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- Email --}}
                    <div class="mb-3">
                        <p><label for="email" class="text-lg dark:text-gray-400">Email</label></p>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Email"
                            class="w-full text-gray-900 rounded  dark:shadow-md dark:shadow-slate-600 dark:bg-gray-200 border dark:border-gray-600 overflow-hidden">
                        <br>
                        @error('email')
                            <p class="text-xs mt-1 text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- address --}}
                    <div class="mb-3">
                        <p><label for="address" class="text-lg dark:text-gray-400">Address</label></p>
                        <input type="text" name="address" value="{{ old('address') }}" placeholder="Address"
                            class="w-full text-gray-900 rounded  dark:shadow-md dark:shadow-slate-600 dark:bg-gray-200 border dark:border-gray-600 overflow-hidden">
                        <br>
                        @error('address')
                            <p class="text-xs mt-1 text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- city --}}
                    <div class="mb-3">
                        <p><label for="city" class="text-lg dark:text-gray-400">City</label></p>
                        <input type="text" name="city" value="{{ old('city') }}" placeholder="City"
                            class="w-full text-gray-900 rounded  dark:shadow-md dark:shadow-slate-600 dark:bg-gray-200 border dark:border-gray-600 overflow-hidden">
                        <br>
                        @error('city')
                            <p class="text-xs mt-1 text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- state --}}
                    <div class="mb-3">
                        <p><label for="state" class="text-lg dark:text-gray-400">State</label></p>
                        <input type="text" name="state" value="{{ old('state') }}" placeholder="State"
                            class="w-full text-gray-900 rounded  dark:shadow-md dark:shadow-slate-600 dark:bg-gray-200 border dark:border-gray-600 overflow-hidden">
                        <br>
                        @error('state')
                            <p class="text-xs mt-1 text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- zip code --}}
                    <div class="mb-3">
                        <p><label for="zip_code" class="text-lg dark:text-gray-400">Zip Code</label></p>
                        <input type="text" name="zip_code" value="{{ old('zip_code') }}" placeholder="Zip Code"
                            class="w-full text-gray-900 rounded  dark:shadow-md dark:shadow-slate-600 dark:bg-gray-200 border dark:border-gray-600 overflow-hidden">
                        <br>
                        @error('zip_code')
                            <p class="text-xs mt-1 text-red-500">{{ $message }}</p>
                        @enderror
                    </div>





                    {{-- <div class="mb-3">
                        <div class="address">
                            <h3 class="title"
                                style="color: #333; text-transform: capitalize; font-size: 20px; text-align: center;background-color: #fd8c66;border-radius: 5px;height: 44px;">
                                Billing
                                address
                            </h3>
                          
                            <div class="inputBox">
                                <span>email:</span>
                                <input type="email" placeholder="example@example.com">
                            </div>
                            <div class="inputBox">
                                <span>Address:</span>
                                <input type="text" placeholder="address">
                            </div>
                            <div class="inputBox">
                                <span>City</span>
                                <input type="text" placeholder="City">
                            </div>
                            <div class="flex">
                                <div class="inputBox">
                                    <span>State</span>
                                    <input type="text" placeholder="State">
                                </div>
                                <div class="inputBox">
                                    <span>Zip code</span>
                                    <input type="text" placeholder="zip code">
                                </div>

                            </div>
                        </div>
                    </div> --}}
                </div>
                {{--  Payment --}}
                <div
                    class="w-full md:max-w-[350px]  md:ml-6 mb-4 rounded  border border-gray-600 dark:bg-gray-700 dark:shadow-md dark:shadow-slate-600">
                    <div class="payment-class px-5 py-4 pb-6">
                        <h3 class="text-white text-3xl w-full text-bold text-center">
                            Payment
                        </h3>
                        <div class="inputBox">
                            <span>Payment method</span>
                            <input type="checkbox" name="visa" id="visa">
                            <label for="paymentMethod">Visa</label>
                            <input type="checkbox" name="credit" id="credit">
                            <label for="paymentMethod">Credit Card</label>
                        </div>
                        <div class="mb-3">
                            <p><label for="card_holder" class="text-lg dark:text-gray-400">Card holder</label></p>
                            <input type="text" name="car_holder" value="{{ old('card_holder') }}"
                                placeholder="card holder"
                                class="w-full text-gray-900 rounded  dark:shadow-md dark:shadow-slate-600 dark:bg-gray-200 border dark:border-gray-600 overflow-hidden">
                            <br>
                            @error('card_number')
                                <p class="text-xs mt-1 text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <p><label for="card_number" class="text-lg dark:text-gray-400">Card number</label></p>
                            <input type="text" name="car_number" value="{{ old('card_number') }}"
                                placeholder="card number"
                                class="w-full text-gray-900 rounded  dark:shadow-md dark:shadow-slate-600 dark:bg-gray-200 border dark:border-gray-600 overflow-hidden">
                            <br>
                            @error('card_number')
                                <p class="text-xs mt-1 text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <p><label for="expiration" class="text-lg dark:text-gray-400">Expiration</label></p>
                            <input type="text" name="expiration" value="{{ old('cvv') }}"
                                placeholder="Expiration MM/YY"
                                class="w-full text-gray-900 rounded  dark:shadow-md dark:shadow-slate-600 dark:bg-gray-200 border dark:border-gray-600 overflow-hidden">
                            <br>
                            @error('expiration')
                                <p class="text-xs mt-1 text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <p><label for="cvv" class="text-lg dark:text-gray-400">CVV</label></p>
                            <input type="text" name="cvv" value="{{ old('cvv') }}" placeholder="CVV"
                                class="w-full text-gray-900 rounded  dark:shadow-md dark:shadow-slate-600 dark:bg-gray-200 border dark:border-gray-600 overflow-hidden">
                            <br>
                            @error('card_number')
                                <p class="text-xs mt-1 text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                    <div class="mt-4 mb-6 flex justify-start">
                        <button type="submit"
                            class="generate-art-button w-full text-white text-bold text-xl rounded px-12  py-3  bg-blue-700  hover:bg-blue-600">
                            Generate
                        </button>
                    </div>
                </div>
            </div>


        </div>
    </form>


</x-app-layout>
