@extends('frontend.layout.master')

@section('content')
    @foreach($components as $key => $component)
        @include('frontend.components.'.implode('-',explode(' ', $component->name)), ["text" => "testimonials", "posts" => $component->posts])
    @endforeach
 @endsection
