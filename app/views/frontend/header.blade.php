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
						@if($noti_data['noti_count']>0)
							<span class="noti-number">{{$noti_data['noti_count']}}</span>
						@endif
							<span class="glyphicon glyphicon-globe noti-click" itemid='{{Session::get('user')['id']}}' itemref='{{url('noti')}}'></span>
								<div class="noti-box">
									<span class="click-active"></span>
									<div class="noti-header">Thông báo ({{$noti_data['noti_count']}} thông báo mới)</div>
									<ul class="noti-list">
									@if(count($noti_data['post'])>0)
										@foreach($noti_data['post'] as $status)
										<li class="list">
											<img src="{{url($status->user->avatar)}}" style="height: 100%;">
											<strong>{{$status->user->account}}</strong>
											<span style="color: #000;font-size: 15px;">đã đăng status</span>
										</li>
										@endforeach
									@endif
									@if(count($noti_data['follows'])>0)
										@foreach($noti_data['follows'] as $follow)
										<li class="list">
											<img src="{{url($follow->follower->avatar)}}" style="height: 100%;">
											<strong>{{$follow->follower->account}}</strong>
											<span style="color: #000;font-size: 15px;">đã follow bạn</span>
										</li>
										@endforeach
									@endif
									@if(count($noti_data['blogs'])>0)
										@foreach($noti_data['follows'] as $blog)
										<li class="list">
											<img src="{{url($blog->user->avatar)}}" style="height: 100%;">
											<strong>{{$blog->user->account}}</strong>
											<span style="color: #000;font-size: 15px;">đã đăng blog</span>
										</li>
										@endforeach
									@endif
									@if(count($noti_data['messages'])>0)
										@foreach($noti_data['messages'] as $message)
										<li class="list">
											<img src="{{url($message->sendUser->avatar)}}" style="height: 100%;">
											
											<span style="color: #000;font-size: 15px;"><strong>{{$message->sendUser->account}}</strong> đã gửi tin nhắn cho bạn</span>
										</li>
										@endforeach
									@endif
									@if(count($noti_data['new_albums'])>0)
										@foreach($noti_data['new_albums'] as $album)
										<li class="list">
											<img src="{{url($album->user->avatar)}}" style="height: 100%;">
											<strong>{{$album->user->account}}</strong>
											<span style="color: #000;font-size: 15px;">đã đăng album mới</span>
										</li>
										@endforeach
									@endif
										<li style="height: 20px;"></li>
									</ul>
								</div>
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
						_method: 'POST'
					},
					success: function(result){
						if(result.status == 'success'){
							$('.noti-box').css('display', 'block');
							$('.noti-header').text('Thông báo (0 thông báo mới)');
							$('.noti-number').css('display', 'none');
						}
					}
				});
				return false;
			};
			if (t%2==1) {
				$('.noti-box').css('display', 'none');
				return false;
			};
		});

	})
</script>