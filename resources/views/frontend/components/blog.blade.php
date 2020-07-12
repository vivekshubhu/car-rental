

    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          @foreach($posts as $key => $post)
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="post-entry-1 h-100">
              <a href="/car_rental/blog-details">
                <img src="/cms/post?filename={{$post->file->name}}" alt="Image"
                 class="img-fluid">
              </a>
              <div class="post-entry-1-contents">
                
                <a href="/car_rental/blog-details">{!!$post->highlight!!}</a>
                <span class="meta d-inline-block mb-3">{{$post->created_at}}<span class="mx-2">by</span> <a href="#">Admin</a></span>
                <p>{!!$post->content!!}</p>
              </div>
            </div>
          </div>
          @endforeach
        </div>

        <div class="row">
          <div class="col-5">
            <div class="custom-pagination">
              <a href="#">1</a>
              <span>2</span>
              <a href="#">3</a>
              <a href="#">4</a>
              <a href="#">5</a>
            </div>
          </div>
        </div>

      </div>
    </div>
