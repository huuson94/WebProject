@extends('frontend/layout/layout_master')
@section('title') Đăng nhập @stop
@section('addcss')
	<link rel="stylesheet" type="text/css" href="{{url('public/assets/css/style-login.css')}}">
@stop
@section('addcontent')
	<div class="td-logo">
		<a href="{{url('/')}}"><img src="{{url('public/assets/images/brand.png')}}"></a>
	</div>
	<div class="td-login-card">
		<form action="{{url('session/create')}}" method="POST" id="login">
			<div class="td-input-id-pass has-feedback">
				<input class="td-input form-control" name="account" type="text" placeholder="Username">
				<div class="error"></div>
			</div>
			<div class="td-input-id-pass has-feedback">
				<input class="td-input form-control" name="password" type="password" placeholder="Password">
				<div class="error"></div>
			</div>
			<div class="td-button">
				<button class="td-button-login" direct="{{url('/')}}">Log in</button>
				<a href="{{url('/signup')}}" class="td-button-signup">Sign up</a>
			</div>
		</form>
		<p class="td-fogot"><a href="#">Forgot password</a><p>
	</div>
@stop
@section('addjs')
	<script type="text/javascript" src="{{url('public/assets/js/ajax/ajax-login.js')}}"></script>
@stop