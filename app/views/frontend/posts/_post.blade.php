<article class="col-md-12 item border">
    <div class="p_post">
        <img class="ava radius_50 left" src="{{url($post->user->getAvatar())}}" alt="test">
        <div class="left">
            <h5>{{$post->user->fullname}}</h5>
            <p class="light">{{$post->updated_at}}</p>
        </div>
    </div>
    <div class="bh_text light">
        <p>{{$post->content}}
    </div>
</article>