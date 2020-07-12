@extends('frontend.layout.master')

@section('content')
    @foreach($components as $key => $component)
        @include('frontend.components.'.implode('-',explode(' ', $component->name)), ["text" => "Single Blog Posts", "createdAt" => "Posted on May 22, 2020", "author" => "admin"])
    @endforeach
 @endsection