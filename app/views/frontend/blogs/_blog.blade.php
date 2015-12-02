@if($blog)
<article class="col-md-12 item border blog">
	<div class="p_post pull-left col-md-2">
        <div class="left">
            <h5><a href="{{url($blog->user->account.'/profile')}}">{{$blog->user->fullname}}</a></h5>
			<p class="light">{{$blog->updated_at}}</p>
		</div>
	</div>
    <div class="pull-right col-md-10">
        <header class='blog-header'>
            <h1 class='title'><a href="{{url('blog/'.$blog->id)}}">{{$blog->title}}</a></h1>
            <p class='blog-time'>
                <i class='glyphicon glyphicon-time'></i>
                <span>{{$blog->updated_at}} bởi</span>
                <a href="{{url($blog->user->fullname).'/profile'}}">{{$blog->user->fullname}}</a>
            </p>
        </header>
        <div class='content'>
            {{$blog->content}}
        </div>
    </div>
</article>
@endif