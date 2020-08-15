@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>{{__("Upload A New Photo")}}</h2>
        <form action=" {{route('photo-store', app()->getLocale()) }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="albumId" value=" {{$albumId}} ">
            <div class="form-group">
                <label for="title">{{__("Title")}}</label>
                <input type="text" class=" form-control" id="title" name="title" placeholder="{{__ ("Enter the title")}}">
            </div>

            <div class="form-group">
                <label for="description">{{__("Description")}}</label>
                <input type="text" class=" form-control" id="description" name="description" placeholder="{{__ ("Description")}}">
            </div>
            <div class="form-group">
                <label for="photo">{{__("Photo")}}</label>
                <input type="file" id="photo" name="photo" >
            </div>
            <button type="submit" class="btn btn-outline-primary">{{__("Submit")}}</button>
        </form>

    </div>
@endsection