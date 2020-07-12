@extends('frontend.layout.master')

@section('content')
    @foreach($components as $key => $component)
        @include('frontend.components.'.implode('-',explode(' ', $component->name)), ["text" => "contact"])
    @endforeach
     <!-- @include('frontend.components.page-banner', ["text" => "contact"])
     @include('frontend.components.contact-us') -->
    
 @endsection