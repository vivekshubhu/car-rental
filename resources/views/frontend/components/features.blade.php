
        <div class="site-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <h2 class="section-heading"><strong>Features</strong></h2>
                        <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </div>

                <div class="row">
                    @foreach($posts as $key=>$post)
                    <div class="col-lg-4 mb-5">
                        <div class="service-1 dark">
                            <span class="service-1-icon">
                                <span class="{{$post->sub_title}}"></span>
                            </span>
                            <div class="service-1-contents">
                                <h3>{{$post->title}}</h3>
                                <p>{!!$post->content!!}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
