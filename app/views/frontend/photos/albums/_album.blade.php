@if($album)
<article class="col-md-12 item border">
	<div class="p_post">
		<img class="ava radius_50 left" src="{{url($album->user->getAvatar())}}" alt="test">
		<div class="left">
            <h5><a href="{{url($album->user->account.'/profile')}}">{{$album->user->fullname}}</a></h5>
			<p class="light">{{$album->updated_at}}</p>
		</div>
	</div>
    <div class="bh_text light">
        
        <ul class="wrapper flex-images">
            @foreach($album->images as $index => $image)
                @if($index <= 2)
                    <li class="item" data-w="{{$image['width']}}" data-h="{{$image['height']}}">
                        <a href="#">
                            <img src="{{url('public/upload/'.$album->user['account'].'/'.$image['path'])}}" alt="test">
                        </a>
                    </li>
                @endif
            @endforeach
            <li class="item hide"></li>
        </ul>
        
	</div>
</article>
@endif