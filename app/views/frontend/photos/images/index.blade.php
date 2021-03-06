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
	@include('frontend/photos/images/_tab_link',array('user',$user))
	@include('frontend/photos/albums/_upload',array('privacies',$privacies))
    <ul class="wrapper flex-images images-preview" itemprop="200">
		@foreach($images as $image)
		<li class="item" data-w="{{$image->width}}" data-h="{{$image->height}}">
			@include('frontend/photos/images/_image',array('image',$image))
		</li>
		<li class="item hide"></li>
		@endforeach
	</ul>
    <div class="box-footer clearfix">
        <div class="box-tools">
            <div class="col-md-9 text-left">
                {{ $images->links() }}
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

