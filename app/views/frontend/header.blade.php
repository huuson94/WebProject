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
			        <li><a href="{{url('/album?user_id='.Session::get('user')['id'])}}">Photo</a></li> 
			        <li class=""><a href="{{url('logout')}}">Log-Out</a></li>
				@else
					<li class="active"><a href="{{url('/login')}}">Đăng nhập</a></li>
			        <li><a href="{{url('/signup')}}">Đăng ký</a></li>
		        @endif
		   	</ul>
		   	<ul class="nav navbar-nav navbar-right">
		        <li class="bh_search">
					<input type="text" placeholder="Search">
		        </li>
		        @if(Session::has('user'))
		        <li class="bh_notifi visible-sm-block visible-md-block visible-lg-block">
					<span class="glyphicon glyphicon-globe"></span>
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