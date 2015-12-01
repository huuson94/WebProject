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
	<div class="col-md-12 list-post list-blog">
		<div class="row">
            {{Form::open(array('url' => "blog/".$blog->id, 'method' => 'DELETE'))}}
                <div class="item border blog-content">
                    <header class='blog-header'>
                        <h1 class='title'>{{$blog->title}}</h1>
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
                @if(FEUsersHelper::isCurrentUser($blog->user->id))
                <div class="action-btn right bold">
                    <a class="btn btn-default" href='{{url('blog/'.$blog->id.'/edit')}}'>Sửa</a>
                    <input type="submit" class="btn btn-danger" value="Xóa">
                </div>
                @endif
            {{Form::close()}}
			
		</div>
	</div>
@stop