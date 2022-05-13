@extends('layouts.app')

@section('content')

<div class="container">
    <h3>{{$photo->title}}</h3>
    <p>{{$photo->description}}</p>
    
    <form action="{{route('photo-destroy', $photo->id)}}" method="POST">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    <br>
    <img src="/storage/albums/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->photo}}" height="400px"></div>
</div>
@endsection