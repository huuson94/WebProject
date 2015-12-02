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
@if(FEUsersHelper::isCurrentUser($user['id']))
<div class="pull-right col-md-2 new-blog" >
</i><a class="" href="{{url('blog/create')}}" ><i class="glyphicon glyphicon-pencil">Viết blog</i></a>
</div>
@endif
<div>
    @foreach($blogs as $blog)
        @include('frontend/blogs/_blog',array('blog' => $blog))
    @endforeach
</div>
@stop
