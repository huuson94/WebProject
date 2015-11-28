@extends('frontend/layout/layout_profile')
@section('title'){{ $user['fullname'] }} | Info @stop
@section('addcss')
	<link rel="stylesheet" href="{{url('public/assets/css/main-style.css')}}">
	<link rel="stylesheet" href="{{url('public/assets/css/style-info.css')}}">
	<link rel="stylesheet" href="{{url('public/assets/css/flaticon.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('public/assets/css/jquery.flex-images.css')}}">
@stop
@section('MyInfo')
	active
@stop

@section('profile_content')
	<div id="user_info" class="container td-profile">
		<div class="row">
			<div class="col-md-6 td-profile-col-left visible-md-block visible-lg-block">
				<img src="{{url('public/assets/images/proinf3.png')}}">
			</div>
			<div class="col-md-6 td-profile-col-right">
				<!-- Thong tin co ban -->
			<form action="{{url('user/update-info')}}">
				<input type="hidden" name="account" value="{{ $user['account'] }}">
				<div class="td-profile-col-right-box-1">
					@if(Session::get('user')['account']==$user['account'])
						<div class="td-profile-edit">
							<a class="edit-button" href="#">Chỉnh sửa</a>
							<a class="save-button" href="#">Lưu</a>
							<a class="cancle-button" href="#">Hủy</a>
						</div>
					@endif
					<h1>Thông tin cơ bản</h1>
					<i class="flaticon-user7"></i>
					<ul>
						<li>
							<div class="td-profile-infor has-feedback">
								<label class="td-form-label text-right">
									<strong>Họ tên</strong>
								</label>
								<span>{{ $user['fullname'] }}</span>
								<input type="hidden" name="fullname" value="{{ $user['fullname'] }}">
								<div class="error"></div>
							</div>
						</li>
						<li>
							<div class="td-profile-infor has-feedback">
								<label class="td-form-label text-right">
									<strong>Giới tính</strong>
								</label>
								<span></span>
							</div>
						</li>
						<li>
							<div class="td-profile-infor">
								<label class="td-form-label text-right">
									<strong>Sinh nhật</strong>
								</label>
								<span></span>
							</div>
						</li>
						<li>
							<div class="td-profile-infor has-feedback">
								<label class="td-form-label text-right">
									<strong>Điện thoại</strong>
								</label>
								<span>{{ $user['phone'] }}</span>
								<input type="hidden" name="phone" value="{{ $user['phone'] }}">
								<div class="error"></div>
							</div>
						</li>
						<li class="td-finish">
							<div class="td-profile-infor">
								<label class="td-form-label text-right">
									<strong>Số CMND</strong>
								</label>
								<span></span>
							</div>
						</li>
					</ul>
					
				</div>
				<!-- het thong tin co ban -->

				<!-- Thong tin lien he -->
				<div class="td-profile-col-right-box-2">
					<h1>Thông tin liên hệ</h1>
					<i class="flaticon-opened4"></i>
					<ul>
						<li>
							<div class="td-profile-infor">
								<label class="td-form-label text-right">
									<strong>Địa chỉ</strong>
								</label>
								<span></span>
							</div>
						</li><li class="td-finish">
							<div class="td-profile-infor">
								<label class="td-form-label text-right">
									<strong>Email</strong>
								</label>
								<span>{{ $user['email'] }}</span>
								<input type="hidden" name="email" value="{{ $user['email'] }}">
								<div class="error"></div>
							</div>
						</li>
					</ul>
				</div>
				<!-- Het thong tin lien he -->

				<div class="td-profile-col-right-box-3">
					<h1>Tự bạch</h1>
					<i class="flaticon-text150"></i>
				</div>
			</form>
			</div>
		</div>
	</div>
	
@stop

@section('addjs')
	<script type="text/javascript" src="{{url('public/assets/js/jquery.flex-images.min.js')}}"></script>
	<script type="text/javascript" src="{{url('public/assets/js/ajax/ajax-update.js')}}"></script>
	<script type="text/javascript">
		$('.flex-images').flexImages({rowHeight: 150});
	</script>
@stop
