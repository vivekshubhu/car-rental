@extends('frontend.layout.master')

@section('content')
    @foreach($components as $key => $component)
        @include('frontend.components.'.implode('-',explode(' ', $component->name)), 
            ["text" => "blog", "posts" => $component->posts])
    @endforeach
 @endsection
