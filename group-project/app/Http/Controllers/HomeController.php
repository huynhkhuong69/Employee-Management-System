<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $images = Artwork::all();
        // if ($categories->count() > 10) {
        //     $categories = $categories->random(10);
        // }
        // random 10 categories

        return view('home', compact('categories', 'images'));
    }
}
