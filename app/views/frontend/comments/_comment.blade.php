@if($comment)
<li class="comment-item">
    <div class="ava">
        <img src="{{url($comment->user->avatar)}}" alt="">
    </div>
    <div class="content">
        <a href="{{url($comment->user->account."/profile")}}"><h5>{{$comment->user->fullname}}</h5></a>
        <span class="light">{{$comment->content}}</span>
        <p class="comment-time"><span>{{$comment->updated_at}}</span></p>
    </div>
</li>
@endif