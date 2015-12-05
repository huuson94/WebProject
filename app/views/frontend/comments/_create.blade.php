@if($user)
<li class='new-comment'>
    
    <div class="ava">
        <img src="{{url($user->avatar)}}" alt="">
    </div>
    <div class="input">
        <textarea data-autoresize class='content' name='content' itemref="{{url("comment")}}" placeholder="Viết bình luận..."></textarea>
    </div>
</li>
@endif