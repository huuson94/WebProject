@if($blog)
<article class="col-md-12 item border">
	<div class="p_post">
		<img class="ava radius_50 left" src="{{url($blog->user->getAvatar())}}" alt="test">
		<div class="left">
            <h5><a href="{{url($blog->user->account.'/profile')}}">{{$blog->user->fullname}}</a></h5>
			<p class="light">{{$blog->updated_at}}</p>
		</div>
	</div>
    <h5>{{$blog->title}}</h5>
    <div class="bh_text light">
		{{$blog->content}}
	</div>
</article>
@endif