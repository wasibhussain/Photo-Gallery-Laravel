<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumsController extends Controller
{
    public function index()
    {
        $albums = Album::with('photos')->get();

        
        return view('layouts.albums.index')->with('albums', $albums);
    }

    public function create()
    {
        return view('layouts.albums.create');
    }

    public function store(Request $request)
    {
       
     $request->validate([

            'name' => 'required',
            'description' => 'required',
            'cover-image' => 'required|image'
        ]);
       // dd($request);

       //file name with original extension
       $filenameWithExtension = $request->file('cover-image')->getClientOriginalName();


       $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);

       $extension = $request->file('cover-image')->getClientOriginalExtension();

       $filenameToStore = $filename . '_' . time() . '.' . $extension;

       //saving image to server disc
       $request->file('cover-image')->storeAs('public/album_covers', $filenameToStore);
       $album = new Album();
       $album->name = $request->input('name');
       $album->description = $request->input('description');
       $album->cover_image = $filenameToStore;
       $album->save();

       return redirect('/')->with('success', 'Album created successfully!');
    }

    public function show($id){

        $album = Album::with('photos')->findOrFail($id);
// dd($album->photos);
        return view('layouts.show')->with('album', $album);
    }
}
