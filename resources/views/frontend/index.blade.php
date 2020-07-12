    @include('frontend.layout.includes.main-header')

    <div class="site-wrap" id="home-section">
    @foreach($components as $key => $component)
        @include('frontend.components.'.implode('-',explode(' ', $component->name)), ["posts" => $component->posts])
    @endforeach
    </div>

    @include('frontend.layout.includes.main-footer')

