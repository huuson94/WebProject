@if($image)
<div class='image'>
    <div class="click">
        @if(FEUsersHelper::isCurrentUser($image->album->user->id))
        <span class='glyphicon glyphicon-remove delete-image' itemid='{{$image->id}}' itemref="{{url('image/'.$image->id)}}"></span>
        @endif
        <a href='{{url($image->path)}}' itemref='{{url('album/'.$image->album->id)}}'><img src="{{url($image->path)}}" alt="test"></a>
    </div>
<!--    <div class="popup">
        <div class="wrapper">
            <span class="x-close">X</span>
            <img src="{{url($image->path)}}" class="img-thumbnail">
        </div>
    </div>-->
</div>

@endif