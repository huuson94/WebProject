@extends('frontend/layout/layout_profile')
@section('title') {{ $user['fullname'] }} | Timeline @stop
@section('addcss')
	<link rel="stylesheet" href="{{url('public/assets/css/main-style.css')}}">
	<link rel="stylesheet" href="{{url('public/assets/css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('public/assets/css/jquery.flex-images.css')}}">
@stop
@section('Timeline')
	active
@stop

@section('profile_content')
	<div class="col-md-3 bh_left_info">
		@include('frontend/left-info')
	</div>
	<div class="col-md-9 list-post">
		<div class="row">
            @if(FEUsersHelper::isCurrentUser($user->id))
            @include('frontend/posts/create')
            @endif
            
            @foreach($entries as $entry)
                @if(get_class($entry->getEntry()) == "Post")
                @include('frontend/posts/_post', array('post' => $entry->getEntry()))
                @elseif(get_class($entry->getEntry()) == "Blog")
                @include('frontend/blogs/_blog_preview', array('blog' => $entry->getEntry()))
                @elseif(get_class($entry->getEntry()) == "Album")
                @include('frontend/photos/albums/_album', array('album' => $entry->getEntry()))
                @endif
            @endforeach
        </div>
	</div>
    <div class="box-footer clearfix">
        <div class="box-tools">
            <div class="col-md-9 text-right">
                
            </div>
        </div>
    </div>
@stop

@section('addjs')
	<script type="text/javascript" src="{{url('public/assets/js/jquery.flex-images.min.js')}}"></script>
	<script type="text/javascript">
        $(document).ready(function(){
            $('.flex-images').flexImages({rowHeight: 150});
        });
		
	</script>
    <script type="text/javascript" src="{{url('public/assets/js/ajax/ajax-comment.js')}}"></script>
    <script type="text/javascript" src="{{url('public/assets/js/index/ajax_delete_post.js')}}"></script>
    
@stop
