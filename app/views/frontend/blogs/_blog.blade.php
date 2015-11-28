@if($blog)
<article class="col-md-12 item border">
	<div class="p_post">
		<img class="ava radius_50 left" src="{{url('public/assets/images/avatar-test.png')}}" alt="test">
		<div class="left">
			<h5>{{$blog->user->fullname}}</h5>
			<p class="light">{{$blog->updated_at}}</p>
		</div>
	</div>
	<div class="bh_text light">
		{{$blog->content}}
	</div>
</article>
@endif