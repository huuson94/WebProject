@extends('frontend/layout/layout_profile')
@section('title'){{ $user['fullname'] }} | Info @stop
@section('addcss')
	<link rel="stylesheet" href="{{url('assets/css/main-style.css')}}">
	<link rel="stylesheet" href="{{url('assets/css/style-message.css')}}">
@stop
@section('Friend')
	active
@stop

@section('profile_content')
	<div class="container">
		<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="ncc_message-box">
		<div class="ncc_left-box">
			<div class="ncc_box-top">
				<span>Tin nhắn</span>
			</div>
			<div class="ncc_search-box">
				<div class="ncc_box">
					<pclass="ncc_search">
						<input type="text" placeholder="Tìm kiếm"/>
					</p>
					<span class='glyphicon glyphicon-search '></span>
				</div>
			</div>
			<div class="ncc_friend-list">
				<div class="ncc_friend ncc_chatting">
					<div class="ncc_avatar">
						<img src="{{url('assets/images/ava_default.jpg')}}">
					</div>
					<div class="ncc_info">
						<h5>CÚT KHỎI ĐỜI TAO</h5>
						<p>Hello</p>
						<p>10/10/2010</p>
					</div>
				</div>
				<div class="ncc_friend">
					<div class="ncc_avatar">
						<img src="{{url('assets/images/ava_default.jpg')}}">
					</div>
					<div class="ncc_info">
						<h5>BIẾN KHỎI ĐỜI TAO</h5>
						<p>Hello</p>
						<p>10/10/2010</p>
					</div>
				</div>
			</div>
		</div>
		<div class="ncc_right-box">
			<div class="ncc_box-top row">
				<a class="ncc_r">
					<span class="glyphicon glyphicon-comment ncc_tn"></span>
					<span class='txt'>Gửi tin nhắn mới</span>
				</a>
			</div>
			<div class="ncc_message">
				<div class="ncc_ymd">
					<p> 10 tháng 10 năm 2010	</p>
				</div>
				<div class="ncc_message-me">
					<div class="ncc_avatar">
						<img src="{{url('assets/images/ava_default.jpg')}}">
					</div>
					<div class="ncc_me-l">
						<div class="ncc_name-time">
							<h5>CÚT KHỎI ĐỜI TAO</h5>
							<p>10:10 pm </p>
						</div>
						<div class="ncc_me-content">
							<p>Hello</p>
						</div>
					</div>
				</div>
				<div class="ncc_message-me">
					<div class="ncc_avatar">
						<img src="{{url('assets/images/ava_default.jpg')}}">
					</div>
					<div class="ncc_me-l">
						<div class="ncc_name-time">
							<h5>BIẾN KHỎI ĐỜI TAO</h5>
							<p>10:10 pm </p>
						</div>
						<div class="ncc_me-content">
							<p>Hello</p>
						</div>
					</div>
				</div>
			</div>
			<div class="ncc_chat-box">
				<div class="ncc_b1">
					<span class="ncc_toolbar ncc_btn-buzz"></span>
					<span class="ncc_toolbar ncc_btn-color"></span>
					<span class="ncc_toolbar ncc_btn-icon"></span>
				</div>
				<div class="ncc_b2">
					<textarea placeholder="Nhập nội dung chat ..."></textarea>
				</div>
				<div class="ncc_b3">
					<input type="checkbox"/>
					<span>Nhấn phím Enter để gửi</span>
					<button class="btn btn-primary">Gửi</button>
				</div>
			</div>
		</div>
	</div>
		</div>
		</div>
	</div>
	
@stop

@section('addjs')
	<script type="text/javascript">
	</script>
@stop
