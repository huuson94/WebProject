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
        <ul class="wrapper flex-images">
        @foreach($albums as $album)
		<li class="item" data-w="{{$album->images->first()->width}}" data-h="{{$album->images->first()->height}}">
            <a href="{{url('album/'.$album->id)}}">
                <img src="{{url('public/upload/'.$user['account'].'/'.$album->images->first()->path)}}" alt="test">
            </a>
        </li>
        <li class="item hide"></li>
        @endforeach
        </ul>

	</div>
@stop

