@if($entry)
<blockquote class="comment" style="display:none">
    {{Form::open(['id' => 'new-comment'])}}
    <ul>
        <input type='hidden' class='entry-id' name='entry_id' value='{{$entry->id}}'>
        @foreach($entry->comments as $comment)
        @include('frontend/comments/_comment',array('comment',$comment))
        @endforeach
        @include('frontend/comments/_create',array('user',$user))
        
    </ul>
    {{Form::close()}}
</blockquote>
@endif
<div id="comment-template" style="display:none">
    <li>
        <div class="ava">
            <img src="" alt="">
        </div>
        <div class="content">
            <a class="c_user_path" href=""><h5 class="c_user_fullname"></h5></a>
            <span class="light"></span>
            <p class="comment-time"><span></span></p>
        </div>
    </li>
</div>