
    <div class="site-section bg-light">
      <div class="container">
        <div class="row justify-content-center text-center mb-5 section-2-title">
          <div class="col-md-6">
            <h2 class="mb-4">Meet Our Team</h2>
          </div>
        </div>
        <div class="row align-items-stretch">
          @foreach($posts as $key => $post)
          <div class="col-lg-4 col-md-6 mb-5">
            <div class="post-entry-1 h-100 person-1">
              
                <img src="/cms/post?filename={{$post->file->name}}" alt="Image"
                 class="img-fluid">
            
              <div class="post-entry-1-contents">
                <span class="meta">{{ucwords($post->sub_title)}}</span>
                <h2>{{ucwords($post->title)}}</h2>
                <p>{!!$post->content!!}</p>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
