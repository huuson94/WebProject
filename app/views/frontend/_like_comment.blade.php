@if($entry)
<div class="l-cmt like-comment-div">
    <div class="like">
        @if(!FELikesHelper::getId($entry->id, Session::get('user')['id']))
            <a class='like' itemid='{{$entry->id}}' itemref='{{url('like')}}'>
                <i class="glyphicon glyphicon-thumbs-up like"></i>
               
            </a>
            <a class='unlike hidden' itemid='{{$entry->id}}' itemprop='{{url('like')}}' itemref='{{url('like/'.FELikesHelper::getId($entry->id, Session::get('user')['id']))}}'>
                <i class="glyphicon glyphicon-thumbs-down unlike"></i>
                
            </a>
        @else
            <a class='like hidden' itemid='{{$entry->id}}' itemref='{{url('like')}}'>
                <i class="glyphicon glyphicon-thumbs-up like"></i>
               
            </a>
            <a class='unlike' itemid='{{$entry->id}}' itemprop="{{url('like')}}" itemref='{{url('like/'.FELikesHelper::getId($entry->id, Session::get('user')['id']))}}'>
                <i class="glyphicon glyphicon-thumbs-down unlike"></i>

            </a>
        @endif
         <span class="count-like">{{$entry->notDeteletedLikes->count()}}</span>
    </div>
    <div class="comment">
        <a><i class="glyphicon glyphicon-comment comment-button"></i> <span class="count-comment">{{$entry->comments->count()}}</span></a>
    </div>
</div>
@endif