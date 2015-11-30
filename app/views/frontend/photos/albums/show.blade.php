@extends('frontend/layout/layout_profile')
@section('title') {{ $user['fullname'] }} | Photo @stop
@section('addcss')
	<link rel="stylesheet" href="{{url('public/assets/css/main-style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('public/assets/css/jquery.flex-images.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('public/assets/css/fileinput.css')}}" media="all" />
	<link rel="stylesheet" href="{{url('public/assets/css/font-awesome.min.css')}}">
@stop
@section('Photos')
	active
@stop

@section('profile_content')
	<div class="col-md-12" id="photo-upload">
			<!-- Large modal -->
		@include('frontend/photos/albums/_tab_link',array('user',$user))
		@include('frontend/photos/albums/_upload',array('privacies',$privacies))
		@if($album['title'] != "")
        <h4 class="text-center">{{$album['title']}}</h4>
        @else
        <h4 class="text-center">Không tiêu đề</h4>
        @endif
		<ul class="wrapper flex-images">
			@foreach($album->images as $image)
				<li class="item" data-w="{{$image['width']}}" data-h="{{$image['height']}}">
                    <a href="#">
                    <img src="{{url('public/upload/'.$user['account'].'/'.$image['path'])}}" alt="test">
                    </a>
				</li>
			@endforeach
			<li class="item hide"></li>
		</ul>
	</div>

@stop

