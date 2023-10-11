<?php
namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // join cart table with artwork table
        $products = Cart::join('artwork', 'cart.artwork_id', '=', 'artwork.id')
            ->select(
                'cart.*',
                'artwork.title as title',
                'artwork.description as description',
                'artwork.image_url as image'
            )
            ->get();


        return view('cart.cart', ['products' => $products]);
    }
    public function proceed()
    {
        
        return Redirect::route('payment');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}