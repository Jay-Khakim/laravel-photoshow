@extends('layouts.app')
@section('content')
    <div class="container">
      <h1> {{$albums->name}} </h1>
      <p class="lead text-muted"> {{$albums->description}} </p>
      <p>
        <a href="#" class="btn btn-primary my-2">{{__("Upload Photo")}}</a>
        <a href="#" class="btn btn-secondary my-2">{{__("Go Back")}}</a>
      </p>
    </div>
@endsection