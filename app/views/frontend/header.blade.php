<header>
	<nav class="navbar navbar-fixed-top">
		<div class="container">
			<div class="row">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span> 
					</button>
					<a class="navbar-brand" href="{{url('/')}}">
						<img src="{{url('public/assets/images/brand-white.png')}}" alt="">
					</a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav">
						@if(Session::has('user'))
						<li class="active"><a href="{{url('/')}}">Home</a></li>
						<li class="visible-xs-block"><a href="#">Notification</a></li>
						<li><a href="{{url('/'.Session::get('user')['account'].'/profile')}}">Profile</a></li>
						<li><a href="{{url('/message')}}">Messages</a></li> 
						<li><a href="{{url('/follow?follower_id='.Session::get('user')['id'])}}">Follow</a></li>
						<li><a href="{{url('/blog?user_id='.Session::get('user')['id'])}}">Blog</a></li> 
						<li><a href="{{url('/album?user_id='.Session::get('user')['id'])}}">Photo</a></li> 
						<li class=""><a href="{{url('logout')}}">Logout</a></li>
						@else
						<li class="active"><a href="{{url('/login')}}">Đăng nhập</a></li>
						<li><a href="{{url('/signup')}}">Đăng ký</a></li>
						@endif
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li class="bh_search">
							<form action="{{url('user')}}" method="GET">
								<input type="text" placeholder="Search user" name="fullname">
							</form>
						</li>
						@if(Session::has('user'))
						<li class="bh_notifi visible-sm-block visible-md-block visible-lg-block">
							<span class="glyphicon glyphicon-globe noti-click" itemid='{{Session::get('user')['id']}}' itemref='{{url('noti')}}'>
								<div class="noti-box">
									<span class="click-active"></span>
									<div class="noti-header">Thông báo ({{$noti_data['noti_count']}} thông báo mới)</div>
									<ul class="noti-list">
										<li class="list">
											<strong>chinhnc</strong>
											<p>đã đăng status</p>
										</li>
										<li class="list">
											<strong>chinhnc</strong>
											<p>đã đăng album</p>
										</li>
										<li class="list">
											<strong>chinhnc</strong>
											<p>đã đăng ảnh</p>
										</li>
										<li class="list">
											<strong>chinhnc</strong>
											<p>đã đăng blog</p>
										</li>
										<li style="height: 20px;"></li>
									</ul>
								</div>
							</span>
						</li>
						<li class="bh_logo_user visible-sm-block visible-md-block visible-lg-block">
							<img src="{{url(Session::get('user')['avatar'])}}" alt="">
						</li>
						@endif
					</ul>
				</div>
			</div>
		</div>
	</nav>
</header>
<script type="text/javascript">
	var t = 1;
	$(document).ready(function(){
		$('.noti-click').click(function(){
			t = t + 1;
			if(t%2==0){
				$('.noti-box').css('display', 'block');
				var user_id = $(this).attr('itemid');
				var url = $(this).attr('itemref');
				$.ajax({
					url: url,
					type: 'POST',
					dataType: 'JSON',
					data: {
						current_id: user_id
					},
					success: function(result){
						if(result.status == 'success'){
							// thao tác css ở đây
						}
					}
					return false;
				};
				if (t%2==1) {
					$('.noti-box').css('display', 'none');
					return false;
				};
			});

			})
	</script>