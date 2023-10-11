<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product List') }}
        </h2>
    </x-slot>

    <style>
        #cart-container table {
            margin-top: 50px;
            border-collapse: collapse;
            width: 100%;
            table-layout: fixed;

        }

        #cart-container table thead {
            font-weight: 700;
        }

        #cart-container table thead td {
            padding: 10px;
            color: white;
            background-color: #fd8c66;
            border: none;
            text-align: center;
        }

        .quatity {
            width: 50%;
            height: 30px;
            padding-left: 5px;
        }

        #cart-container table td {
            border: 1px solid #b6b3b3;
            text-align: center;
            width: 14.28%;
        }

        #cart-container table td img {
            width: 100px;
            height: 80px;
            object-fit: cover;
        }



        #cart-bottom {

            /* background-color: #4CAF50; */
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;

        }



        #cart-bottom .row {
            display: flex;
            justify-content: space-between;
            width: 100%;

        }

        .d-flex {
            display: flex;
            justify-content: space-between;
        }


        /* #cart-bottom .row .coupon {
            width: 50%;
            height: 100%;
            float: left;

        } */

        #cart-bottom .row .coupon h5,
        #cart-bottom .row .total h5 {
            background-color: #fd8c66;
            color: white;
            width: 300px;
            border-radius: 30px;
            text-align: center;
            height: 44px;



        }


        button {
            background-color: black;
            border: none;
            padding: 10px;
            border-radius: 5px;
            color: white;
            font-weight: 700;
            cursor: pointer;
            height: 44px;
        }
    </style>
    <form method="POST" action="{{ route('payment') }}">
        @csrf
        <section id="cart-container" class="container">
            <table width="100%">
                <thead>
                    <tr>
                        <td>Remove</td>
                        <td>Image</td>
                        <td>Product</td>
                        <td>Price</td>
                        <td>Quantity</td>
                        <td>Total</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $products)
                        <tr>

                            <td><a href=""><i class="fas fa-trash-alt"></i></a></td>
                            <td><img src="{{ url('storage/' . $products['image']) }}" alt="" width="100px"></td>

                            <td>
                                <h5 class="card-title">{{ $products['name'] }}</h5>
                            </td>
                            <td>
                                <h5 class="card-text">{{ $products['price'] }}</h5>
                            </td>
                            <td><input class="quatity"type="number" value="1"></td>
                            <td>
                                <h5>$50.00</h5>
                            </td>

                        </tr>
                    @endforeach


                </tbody>
            </table>
        </section>
        <section id="cart-bottom">
            {{-- <div class="row">
            <div class="coupon">
                <div>
                    <h5>COUPON DISCOUNT</h5>
                    <p>Enter Coupon Code</p>
                    <input type="text" placeholder="Coupon Code">
                    <button>Apply Coupon</button>
                </div>
            </div> --}}

            <div class="total">
                <div>
                    <h5>CART TOTAL</h5>
                    <div class='d-flex'>
                        <h6>Subtotal</h6>
                        <p>$50.00</p>
                    </div>
                    <div class='d-flex'>
                        <h6>Shipping</h6>
                        <p>$50.00</p>
                    </div>
                    <hr />
                    <div class='d-flex'>
                        <h6>Total</h6>
                        <p>$50.00</p>
                    </div>



                    <button type="submit">Proceed To Check Out</button>
                </div>
            </div>
            </div>


        </section>
    </form>


</x-app-layout>
