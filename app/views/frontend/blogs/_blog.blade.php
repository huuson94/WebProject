@if($blog)
<article class="col-md-12 item border">
	<div class="p_post pull-left col-md-2">
        <div class="left">
            <h5><a href="{{url($blog->user->account.'/profile')}}">{{$blog->user->fullname}}</a></h5>
			<p class="light">{{$blog->updated_at}}</p>
		</div>
	</div>
    <div class="pull-right col-md-10">
        <h5><a href="{{url('blog/'.$blog->id)}}">{{$blog->title}}</a></h5>
        <div class="bh_text light">
            {{$blog->content}}
        </div>
    </div>
</article>
@endif