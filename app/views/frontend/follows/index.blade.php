@extends('frontend/layout/layout_profile')
@section('title'){{ $user['fullname'] }} | Info @stop
@section('addcss')
	<link rel="stylesheet" href="{{url('public/assets/css/main-style.css')}}">
	<link rel="stylesheet" href="{{url('public/assets/css/style-friend.css')}}">
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
					Danh sách đã follow
				</h3>
				<div class="ncc_search-box">
					<input type="text" placeholder="Tìm kiếm bạn bè">
					<button class="glyphicon glyphicon-search" type="submit"></button>
				</div>	
			</div>
			<div class="ncc_friend-list">
				<ul class="ncc_friends row">
                    @foreach($follows as $follow)
                    <li class="col-xs-6">
                        @include('frontend/follows/_follow',array('_user' => $follow->followed, 'user' => $user))
					</li>
                    @endforeach
					
				</ul>
			</div>
		</div>
		</div>
	</div>
	
@stop

@section('addjs')
@include('frontend/users/_ajax_follow')
@stop
