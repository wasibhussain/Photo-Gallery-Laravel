@extends('layouts.app')

@section('content')
<div class="container" >
@if (count($albums)>0)
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
@foreach ($albums as $album)
      <div class="col">
        <div class="card shadow-sm">
<img src="/storage/album_covers/{{$album->cover_image}}" alt="{{$album->cover_image}}" height="200px">
          <div class="card-body">
            <p class="card-text">{{$album->description}}</p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <a href="{{route('album-show' , $album->id)}}" class="btn btn-sm btn-outline-secondary">View</a>
              </div>
              <small class="text-muted">{{$album->name}}</small>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    
    @else
    <h2>No Albums Yet</h2>
    @endif
</div>

@endsection
