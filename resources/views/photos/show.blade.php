@extends('layouts.app')
@section('content')
    <div class="container">
        <h3> {{$photo->title}} </h3>
        <p> {{$photo->description}} </p>
        <form action=" {{route("photo-destroy", [app()->getLocale(), $photo->id])}}" method="POST" >
            @csrf
            @method("delete")
            <input type="hidden" name="adminId" value=" {{$photo->admin_id}} ">
            <button type="submit" name="submit" class="btn btn-danger float-right">
                {{__("Delete")}}
            </button>
        </form>
        <small>{{__("Size:")}} {{$photo->size}} </small>
        <a href="{{route('album-show', [app()->getLocale(), $photo->album->id])}}" class="btn btn-info">{{__("Go Back")}}</a>
        <hr>
        {{-- <div class="col-sm-2"> --}}
            <img src="/storage/albums/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->photo}}" width="990">

        {{-- </div> --}}
    </div>
@endsection