
<div class="hero inner-page" style="background-image: url('/carrentals/images/hero_1_a.jpg');">
    <div class="container">
        <div class="row align-items-end ">
            <div class="col-lg-5">

                <div class="intro">
                    <h1><strong class="text-capitalize">{{$text}}</strong></h1>
                    @if(isset($createdAt))
                    <div class="pb-4"><strong class="text-black">{{$createdAt}} &bullet; By {{$author}}</strong></div>
                    @else
                    <div class="custom-breadcrumbs"><a href="/car_rental">Home</a> <span class="mx-2">/</span>
                        <strong class="text-capitalize">{{$text}}</strong></div>
                    @endif
                
                </div>

            </div>
        </div>
    </div>
</div>