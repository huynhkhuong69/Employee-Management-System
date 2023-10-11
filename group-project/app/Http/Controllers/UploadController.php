<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use App\Models\Listing;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Contracts\Validation\Rule;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // check for logged in user
        if (!auth()->check()) {
            return redirect('/login');
        }


        $data['categories'] = Category::get(["id", "name"]);

        return view('upload.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store Images
     */
    public function store(Request $request)
    {
        if (!auth()->check()) {
            return redirect('/login');
        }
        $formFields = $request->validate([
            'title' => 'required',
            'image_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);
        if ($request->hasFile('image_url')) {
            $formFields['image_url'] = $request->file('image_url')->store('images/artworks', 'public');
        }

        $formFields['user_id'] = auth()->user()->id;
        $formFields['description'] = $request->description;
        $formFields['artist_name'] = $request->artist_name;
        if ($request->is_for_sale && $request->price > 0) {
            $formFields['is_for_sale'] = true;
            $formFields['price'] = $request->price;
        } else {
            $formFields['is_for_sale'] = false;
            $formFields['price'] = NULL;
        }
        // get category id        
        $formFields['category_id'] = $request->category_id;
        $success = Artwork::create($formFields);
        if ($success) {
            Session::flash('success', 'Listing created successfully!');
            return redirect()->route('upload');
        } else {
            Session::flash('error', 'Listing failed to create!');
            return redirect()->route('upload');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
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