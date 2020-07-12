
    <div class="site-section">
      <div class="container">
        <div class="row">
          @foreach($posts as $key => $post)
          <div class="col-lg-6 mb-5 mb-lg-0">
            <img src="/cms/post?filename={{$post->file->name}}" alt="Image" class="img-fluid rounded">
          </div>
          <div class="col-lg-4 ml-auto">
            <h2>Our History</h2>
            <p>{!!$post->content!!}</p>
          </div>
          @endforeach
        </div>
      </div>
    </div>
