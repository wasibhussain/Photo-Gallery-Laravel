<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
    public function create(int $albumId)
    {
        return view('layouts.photos.create')->with('albumId', $albumId);
    }

    public function store(Request $request)
    {

        $request->validate([

            'title' => 'required',
            'description' => 'required',
            'photo' => 'required|image',

        ]);
        // dd($request);

        //file name with original extension
        $filenameWithExtension = $request->file('photo')->getClientOriginalName();

        $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);

        $extension = $request->file('photo')->getClientOriginalExtension();

        $filenameToStore = $filename . '_' . time() . '.' . $extension;

        //Saving image to server disc
        $request->file('photo')->storeAs('public/albums/' . $request->input('album_id'), $filenameToStore);
        $photo = new Photo();
        $photo->title = $request->input('title');
        $photo->description = $request->input('description');
        $photo->photo = $filenameToStore;
        $photo->size = $request->file('photo')->getSize();
        $photo->album_id = $request->input('album_id');
        //    dd($photo);
        $photo->save();


        return redirect('show/' . $request->input('album_id'))->with('success!', 'Image Uploaded successfully!');
    }

    public function show($id)
    {
        // dd($id);
        $album = Album::find($id);
        return view('layouts.show')->with('album', $album);
    }

    public function showphoto($id)
    {
        $photo = Photo::find($id);
        // dd($photo->title);
        return view('layouts.photos.viewphoto')->with('photo', $photo);
    }

    public function destroy($id){
        $photo = Photo::find($id);

        if(Storage::delete('/storage/albums/'. $photo->album_id. '/' .$photo->photo)){
            $photo->delete();

            return redirect('/')->with('success' , 'Photo deleted successfully! ');
        }
    }
}
