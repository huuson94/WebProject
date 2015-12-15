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
        @if(FEUsersHelper::isCurrentUser($album->user->id))
        <a href="{{url('album/'.$album->id.'/edit')}}"><i class='glyphicon glyphicon-pencil edit-album'>Chỉnh sửa album này</i></a>
        @endif
        <ul class="wrapper flex-images images-preview" itemprop="300">
			@foreach($album->images as $image)
				<li class="item" data-w="{{$image['width']}}" data-h="{{$image['height']}}">
                    @include('frontend/photos/images/_image',array('image',$image))
				</li>
			@endforeach
			<li class="item hide"></li>
		</ul>
        {{Form::open(['method' => 'DELETE', 'url' => 'album/'.$album->id])}}
        <div class='action-btn'>
            <input type='submit' class='btn btn-danger' value='Xóa album này'>
        </div>
        {{Form::close()}}
	</div>
@stop

@section('addjs')
<script>
$(document).ready(function(){
   $('.flex-images').flexImages({rowHeight: $(".flex-images").attr('itemprop')}); 
});
</script>
{{HTML::script('public/assets/js/ajax/ajax-delete_image.js')}}
@stop