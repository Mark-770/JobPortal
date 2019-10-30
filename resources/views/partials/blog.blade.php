<div class="site-section block-15">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto text-center mb-5 section-heading">
                <h2>Recent Blog</h2>
            </div>
        </div>


        <div class="nonloop-block-15 owl-carousel">

            @foreach($posts as $post)
            <div class="media-with-text">
                <a href="{{route('post.show',[$post->id,$post->slug])}}" class="image-play">
                    <img src="{{asset('storage/'.$post->image)}}" alt="post image" class="img-fluid">

                <h2 class="heading mb-0 h5">{{$post->title}}</h2>
                <span class="mb-3 d-block post-date">{{$post->created_at->diffForHumans()}} <a href="{{route('post.show',[$post->id,$post->slug])}}">Admin</a></span>
                <p>{{str_limit($post->text,50)}}</p>
                </a>
            </div>
            @endforeach

        </div>
    </div>
</div>
