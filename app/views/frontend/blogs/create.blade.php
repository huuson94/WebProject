@extends('frontend/layout/layout_profile')
@section('title') {{ $user['fullname'] }} | Blog @stop
@section('addcss')
	@include('frontend/layout/wysiwyg-editor-css')
	<link rel="stylesheet" href="{{url('public/assets/css/main-style.css')}}">
	<link rel="stylesheet" href="{{url('public/assets/css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('public/assets/css/jquery.flex-images.css')}}">
@stop
@section('Blog')
	active
@stop

@section('profile_content')
	<div class="col-md-3 bh_left_info">
		@include('frontend/left-info')
	</div>
	<div class="col-md-9 list-post list-blog">
		<div class="row">
            {{Form::open(array(
                            'url' => Session::get('user')['account']."/blog", 
                            'method' => 'POST'
                        )
            )}}
                <div class="item border">
                    <textarea id="edit-blog" name="content" required="true"></textarea>
                </div>
                <div class="up-button">
                    <div class="right bold">
                        <select name="privacy">
                            @foreach($privacies as $privacy)
                            <option value="{{$privacy->id}}">{{$privacy->name}}</option>
                            @endforeach

                        </select>
                        <input type="submit" value="Đăng">
                    </div>
                    <div class="clearfix"></div>
                </div>
            {{Form::close()}}
			@include('frontend/blogs/index',array('blogs' => $blogs))
		</div>
	</div>
@stop

@section('addjs')
	@include('frontend/layout/wysiwyg-editor-js')
	<script type="text/javascript" src="{{url('public/assets/js/jquery.flex-images.min.js')}}"></script>
	<script type="text/javascript">
		$('.flex-images').flexImages({rowHeight: 150});
		$(function(){
			$('.list-blog #edit-blog').froalaEditor();
		});
	</script>
@stop
