
        <div class="site-section">
            <div class="container">
                <h2 class="section-heading"><strong>How it works?</strong></h2>
                <p class="mb-5">Easy steps to get you started</p>

                <div class="row mb-5">
                    @foreach($posts as $key => $post)
                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <div class="step">
                            <span>{{$key++}}</span>
                            <div class="step-inner">
                                <span class="number text-primary">{{$key++}}.</span>
                                <h3>{{$post->title}}</h3>
                                <p>{!!$post->highlight!!}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
