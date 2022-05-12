@extends('layouts.app')

@section('content')
    <h2>Upload Pictures</h2>

    <form method="POST" action="{{ route('photos-store') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="album_id" value={{$albumId}} id={{$albumId}}>
       
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" name="description" id="description" placeholder="Enter Description">
        </div>

        <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" class="form-control" name="photo" id="photo">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
