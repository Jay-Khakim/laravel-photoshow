@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>{{__("Create A New Album")}}</h2>
        <form action=" {{route('album-store', app()->getLocale()) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">{{__("Name")}}</label>
                <input type="text" class=" form-control" id="name" name="name" placeholder="{{__ ("Enter the name")}}">
            </div>

            <div class="form-group">
                <label for="description">{{__("Description")}}</label>
                <input type="text" class=" form-control" id="description" name="description" placeholder="{{__ ("Description")}}">
            </div>
            <div class="form-group">
                <label for="cover-image">{{__("Cover Image")}}</label>
                <input type="file" id="cover-image" name="cover-image" >
            </div>
            <button type="submit" class="btn btn-outline-primary">{{__("Submit")}}</button>
        </form>

    </div>
@endsection