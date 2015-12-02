@extends('frontend/layout/layout_master')
@section('addcontent')
	@include('frontend/header')

	{{--------------------- Banner -------------------------}}
	<section class="bh_banner container-fluid" style="">
		<div class="row">
			<div class="bh_bgr text-center">
				<div class="wrapper">
					<div class="img">
                        <img src="{{url($user->avatar)}}" alt="avatar">
					</div>
					<h3>{{ $user['fullname']}}</h3>
					<p>{{$user->about}}</p>
				</div>
				<ul class="bh_link-list">
					<li class="@yield('Photos')">
						<a href="{{url('/album?user_id='.$user['id'])}}">Photos</a>
					</li>
					<li class="@yield('Blog')">
						<a href="{{url('/blog?user_id='.$user['id'])}}">Blog</a>
					</li>
					<li class="@yield('MyInfo')">
						<a href="{{url('/'.$user['account'].'/edit')}}">Info</a>
					</li>
					<!-- <li class="@yield('Friends')"><a href="#">Friends</a></li> -->
				</ul>
			</div>
		</div>
	</section>
	{{--------------------- End Banner ---------------------}}


	{{--------------------- Main Content ---------------------}}
	<section class="container-fluid bh_main_content" style="margin-top:0">
		<div class="container">
			<div class="row">
				
				@yield('profile_content')

			</div>
		</div>
	</section>
@stop