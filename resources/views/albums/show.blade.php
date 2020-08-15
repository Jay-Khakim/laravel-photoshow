@extends('layouts.app')
@section('content')
    <div class="container">
      <h1> {{$albums->name}} </h1>
      <p class="lead text-muted"> {{$albums->description}} </p>
      <p>
        <a href="{{route('photo-create', [app()->getLocale(), $albums->id])}}" class="btn btn-primary my-2">{{__("Upload Photo")}}</a>
        <a href="{{ route("album-index",  app()->getLocale())}}" class="btn btn-secondary my-2">{{__("Go Back")}}</a>
      </p>

      @if (count($albums->photos)>0)
            <div class="row">
                @foreach ($albums->photos as $photo)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                          <img src="/storage/albums/{{$albums->id}}/{{$photo->photo}}" height="200px" alt="{{$photo->photo}}">
                            <div class="card-body">
                                <p class="card-text">{{$photo->description}}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href=" {{route('photo-show', [app()->getLocale(), $photo->id])}} " class="btn btn-sm btn-outline-secondary">{{__("View")}}</a>
                                        {{-- <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button> --}}
                                    </div>
                                    <small class="text-muted"> {{$photo->size}} </small>
                                </div>
                            </div>
                        </div>
                    </div>  
                @endforeach
            </div>
        @else 
            <h3>No albums yet.</h3>
        @endif
    </div>
@endsection