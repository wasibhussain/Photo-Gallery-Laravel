@extends('layouts.app')

@section('content')
<section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">{{$album->name}}</h1>
        <p class="lead text-muted">{{$album->description}}</p>
        <p>
          <a href="{{route('photos-create', $album->id)}}" class="btn btn-primary my-2">Upload Picture</a>
          <a href="{{route('index')}}" class="btn btn-secondary my-2">Go Back</a>
        </p>
      </div>
    </div>
  </section>

  @if ($album->photos)
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
@foreach ($album->photos as $photo)
      <div class="col">
        <div class="card shadow-sm">
<img src="/storage/albums/{{$album->id}}/{{$photo->photo}}" alt="{{$photo->photo}}" height="200px">
          <div class="card-body">
            <p class="card-text">{{$photo->description}}</p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <a href="#" class="btn btn-sm btn-outline-secondary">View</a>
              </div>
              <small class="text-muted">{{$photo->size}}</small>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    
    @else
    <h2>No Photos Yet</h2>
    @endif

@endsection