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
        <a class='btn btn-default' href='{{url('blog?user_id='.$blog->user->id)}}'>Đăng bài mới</a>
		@include('frontend/blogs/_list', array('blogs',$blogs))
	</div>
	<div class="col-md-9 list-post list-blog">
		<div class="row">
            {{Form::open(array('url' => "blog/".$blog->id, 'method' => 'DELETE'))}}
                <div class="item border">
                    <h5>{{$blog->title}}</h5>
                    <hr/>
                    <span>
                        {{$blog->content}}
                    </span>
                </div>
                <div class="up-button">
                    <div class="right bold">
                        <a href='{{url('blog/'.$blog->id.'/edit')}}'>Sửa</a>
                        <input type="submit" value="Xóa">
                    </div>
                    <div class="clearfix"></div>
                </div>
            {{Form::close()}}
			
		</div>
	</div>
@stop