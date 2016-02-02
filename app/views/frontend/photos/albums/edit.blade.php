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
        {{Form::open(['url' => 'album/'.$album->id,'method' => 'PATCH' ])}}
        <h4 class=""><input class='form-control' name='title' value='{{$album['title']}}'></input></h4>
        @else
        <h4 class=""><input class='form-control' name='title' value='Không tiêu đề'></input></h4>
        @endif
        
        <ul class="wrapper flex-images images-preview"itemprop="300">
			@foreach($album->images as $image)
				<li class="item" data-w="{{$image['width']}}" data-h="{{$image['height']}}">
                    @include('frontend/photos/images/_image',array('image',$image))
				</li>
			@endforeach
			<li class="item hide"></li>
		</ul>
        
        <div class='action-btn'>
            <div class='privacy'>
                <select name="privacy" id="privacy">
                    @foreach($privacies as $privacy)
                    <option value="{{$privacy->id}}"
                            @if($privacy->id == $album->privacy)
                            selected='true'
                            @endif
                            >{{$privacy->name}}</option>
                    @endforeach
                </select>
            </div>
            <input type='submit' class='btn btn-danger' value='Update'>
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
