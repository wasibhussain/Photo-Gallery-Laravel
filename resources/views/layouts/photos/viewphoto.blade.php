@extends('layouts.app')

@section('content')

<div class="container">
    <h3>{{$photo->title}}</h3>
    <p>{{$photo->description}}</p>
    <img src="/storage/albums/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->photo}}"></div>
</div>
@endsection