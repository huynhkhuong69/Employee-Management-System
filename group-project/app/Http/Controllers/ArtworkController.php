<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use Illuminate\Http\Request;

class ArtworkController extends Controller
{
    public function index()
    {

        return redirect(route('category'));
    }

    public function show($id)
    {
        // $artwork = Artwork::where('id', $id)->first();
        // artwork join with user table
        // users.name as user_name,
        $artwork =  Artwork::join('users', 'users.id', '=', 'artwork.user_id')
            ->select('artwork.*', 'users.name as user_name', 'users.avatar as user_avatar')
            ->where('artwork.id', $id)
            ->first();

        if (!$id) {
            return redirect('/404');
        }
        // dd($artwork->description);
        return view('artwork.show', ['artwork' => $artwork]);
    }
}
