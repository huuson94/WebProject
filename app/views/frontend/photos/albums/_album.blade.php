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
        @if($album['title'] != "")
        <h4 class="album-title"><a href="{{url('album/'.$album->id)}}">Album {{$album['title']}}</a></h4>
        @else
        <h4 class="text-center"><a href="{{url('album/'.$album->id)}}">Không tiêu đề</a></h4>
        @endif
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
    @include('frontend/_like_comment',array('entry',$album->getEntry()))
    @include('frontend/comments/_comments',array('entry',$album->getEntry()))
</article>
@endif