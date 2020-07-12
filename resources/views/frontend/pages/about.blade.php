@extends('frontend.layout.master')

@section('content')
    @foreach($components as $key => $component)
        @include('frontend.components.'.implode('-',explode(' ', $component->name)), ["text" => "About", "posts" => $component->posts])
    @endforeach
 @endsection
