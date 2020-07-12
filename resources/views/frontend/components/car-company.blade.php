<div class="site-section">
    <div class="container">
        <div class="row">
            @foreach($posts as $key => $post)
            <div class="col-lg-6 mb-5 mb-lg-0 order-lg-2">
                <img src="/cms/post?filename={{$post->file->name}}" alt="Image" class="img-fluid rounded">
            </div>
            <div class="col-lg-4 mr-auto">
                <h2><strong> Car Company</strong> </h2>
                {!!$post->content!!}
            </div>
            @endforeach
        </div>
    </div>
</div>