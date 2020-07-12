<div class="site-section">
            <div class="container">
                @foreach($posts as $key=>$post)
                <div class="row align-items-center">
                    <div class="col-lg-7 text-center order-lg-2">
                        <div class="img-wrap-1 mb-5">
                            <img src="/cms/post?filename={{$post->file->name}}" alt="Image" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-4 ml-auto order-lg-1">
                        <h3 class="mb-4 section-heading"><strong>{!!$post->highlight!!}</strong></h3>
                        <p class="mb-5">{!!$post->content!!}</p>

                        <p><a href="#" class="btn btn-primary">Meet them now</a></p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>