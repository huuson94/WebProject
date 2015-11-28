@extends('frontend/layout/layout_profile')
@section('title'){{ $user['fullname'] }} | Info @stop
@section('addcss')
	<link rel="stylesheet" href="{{url('assets/css/main-style.css')}}">
	<link rel="stylesheet" href="{{url('assets/css/style-friend.css')}}">
@stop
@section('Friend')
	active
@stop

@section('profile_content')
	<div class="container">
		<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="ncc_friend-list-head">
				<h3>
					<i class="glyphicon glyphicon-user"></i>
					Bạn bè
				</h3>
				<div class="ncc_search-box">
					<input type="text" placeholder="Tìm kiếm bạn bè">
					<button class="glyphicon glyphicon-search" type="submit"></button>
				</div>	
			</div>
			<div class="ncc_friend-list">
				<ul class="ncc_friends row">
					<li class="col-xs-6">
						<div class="">
							<a href="#">
								<img src="{{url('assets/images/ava_default')}}.jpg">
							</a>
							<div class="ncc_name">
								<h5><a href="#">Nguyễn Công Chỉnh</a></h5>	
								<p><a href="">1.400 bạn bè</a></p>
							</div>
							<div class="ncc_op">
								<select>
									<option><a href="#">Bạn bè</a></option>
									<option><a href="#">Huỷ kết bạn</a></option>
									<option><a href="#">Kết bạn</a></option>
								</select>
							</div>
						</div>
					</li>
					<li class="col-xs-6">
						<div class="">
							<a href="#">
								<img src="{{url('assets/images/ava_default')}}.jpg">
							</a>
							<div class="ncc_name">
								<h5><a href="#">Nguyễn Công Chỉnh</a></h5>	
								<p><a href="">1.400 bạn bè</a></p>
							</div>
							<div class="ncc_op">
								<select>
									<option><a href="#">Bạn bè</a></option>
									<option><a href="#">Huỷ kết bạn</a></option>
									<option><a href="#">Kết bạn</a></option>
								</select>
							</div>
						</div>
					</li>
					<li class="col-xs-6">
						<div class="">
							<a href="#">
								<img src="{{url('assets/images/ava_default')}}.jpg">
							</a>
							<div class="ncc_name">
								<h5><a href="#">Nguyễn Công Chỉnh</a></h5>	
								<p><a href="">1.400 bạn bè</a></p>
							</div>
							<div class="ncc_op">
								<select>
									<option><a href="#">Bạn bè</a></option>
									<option><a href="#">Huỷ kết bạn</a></option>
									<option><a href="#">Kết bạn</a></option>
								</select>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
		</div>
	</div>
	
@stop

@section('addjs')
	<script type="text/javascript">
	</script>
@stop
