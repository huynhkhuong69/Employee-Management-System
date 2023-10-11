<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Show all listings.
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        $keyword = $request['search'];
        $images  = Artwork::where('title', 'LIKE', "%$keyword%")->paginate(6);
        //dd($images);
        // pass category and images to view
        return view('category.index')->with(['categories' => $categories, 'images' => $images]);
    }

    /**
     * Display the specified resource with category.
     */
    public function show(string $name)
    {
        $categories = Category::all();
        if ($name == '' || $name == 'all') {
            $images = Artwork::all();
        } else {
            $images =  DB::table('artwork')->select('artwork.id', 'artwork.title', 'artwork.description', 'artwork.price', 'artwork.image_url', 'artwork.category_id', 'artwork.user_id')
                ->join('category', 'category.id', '=', 'artwork.category_id')
                ->where('category.slug', $name)->get();
        }
        return view('category.index', compact('categories', 'images'));
    }


    // All, load categories

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