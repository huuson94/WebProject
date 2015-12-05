@if($entry)
<div class="l-cmt like-comment-div">
    <div class="like">
        <a href="#"><i class="glyphicon glyphicon-thumbs-up"></i> Thích</a>
    </div>
    <div class="comment">
        <a><i class="glyphicon glyphicon-comment comment-button"></i> <span class="count-comment">{{$entry->comments->count()}}</span></a>
    </div>
</div>
@endif