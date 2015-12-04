@if($post)
<article class="col-md-12 item border">
    <div class="p_post">
        <img class="ava radius_50 left" src="{{url($post->user->getAvatar())}}" alt="test">
        <div class="left">
            <h5><a href="{{url($post->user->account.'/profile')}}">{{$post->user->fullname}}</a></h5>
            <p class="light">{{$post->updated_at}}</p>
        </div>
        @if(FEUsersHelper::isCurrentUser($post->user->id))
        <div class='pull-right'>
            <input type='hidden' class='post-id' value='{{$post->id}}' itemref="{{url('post/'.$post->id)}}">
            <a><span class='glyphicon glyphicon-remove-circle delete-post'></span></a>
        </div>
        @endif
    </div>
    <div class="bh_text light">
        <p>{{$post->content}}
    </div>
    <div class="l-cmt">
        <div class="like">
            <a href="#"><i class="glyphicon glyphicon-thumbs-up"></i> Thích</a>
         </div>
         <div class="comment">
            <a href="#"><i class="glyphicon glyphicon-comment"></i> Bình luận</a>
        </div>
    </div>
    @include('frontend/comments/_comments',array('comment',null))
</article>
@endif($post)