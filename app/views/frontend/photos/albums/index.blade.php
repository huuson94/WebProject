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
        <ul class="wrapper flex-images" itemprop="250">
        <li class="item hide"></li>
        @foreach($albums as $album)
        @if($album->images->count() > 0)
		<li class="item" data-w="{{$album->images->first()->width}}" data-h="{{$album->images->first()->height}}">
            <a href="{{url('album/'.$album->id)}}">
                <img src="{{url($album->images->first()->path)}}" alt="test">
            </a>
        </li>
        @else
        
        @endif
        @endforeach
        </ul>
        <div class="box-footer clearfix">
            <div class="box-tools">
                <div class="col-md-9 text-left">
                    {{ $albums->links() }}
                </div>
            </div>
        </div>
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
