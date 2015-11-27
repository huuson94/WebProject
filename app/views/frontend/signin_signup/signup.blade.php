@extends('frontend/layout/layout_master')
@section('title') SIGN UP @stop
@section('addcss')
	<link rel="stylesheet" type="text/css" href="{{url('assets/css/style-signup.css')}}">
@stop
@section('addcontent')
	<div class="td-signup-card">
		<div class="td-logo-signup">
			<a href="{{url('/')}}"><img src="{{url('assets/images/brand.png')}}"></a>
		</div>
		<form id="sign-up" action="{{url('/user/do-sign-up')}}">
			<div class="td-input-signup has-feedback">
				<input class="td-input-su form-control" name="fullname" type="text" placeholder="Full name">
				<div class="error"></div>
			</div>
			<div class="td-input-signup has-feedback">
				<input class="td-input-su form-control" name="account" type="text" placeholder="User name">
				<div class="error"></div>
			</div>
			<div class="td-input-signup has-feedback">
				<input class="td-input-su form-control" name="password" type="password" placeholder="Input Password">
				<div class="error"></div>
			</div>
			<div class="td-input-signup has-feedback">
				<input class="td-input-su form-control" name="passwordcheck" type="password" placeholder="Input Password Again">
				<div class="error"></div>
			</div>
			<div class="td-input-signup has-feedback">
				<input class="td-input-su form-control" name="email" type="text" placeholder="Input Your Email">
				<div class="error"></div>
			</div>
			<div class="td-input-signup has-feedback">
				<input class="td-input-su form-control" name="phone" type="text" placeholder="Phone Number">
				<div class="error"></div>
			</div>
			<div class="td-button-su">
				<button class="td-button-create" direct="{{url('/')}}">Create my account</button>
			</div>
		</form>
	</div>
@stop
@section('addjs')
	<script type="text/javascript" src="{{url('assets/js/ajax/ajax-signup.js')}}"></script>
@stop