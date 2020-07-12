@include('frontend.layout.includes.main-header')

<div class="site-wrap" id="home-section">
    @include('frontend.components.page-navbar')

        @yield('content')

    @include('frontend.components.footer')

</div>


@include('frontend.layout.includes.main-footer')
