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
                    @if(!FEUsersHelper::isCurrentUser($user->id))
                    <?php $current_user = User::find(Session::get('user')['id']);?>
                    <div class="header-follow-btn">
                        @if(in_array($user->id,$current_user->getFollowingUsersId()))
                        <button type="button" class="btn btn-default unfollow" itemref="{{url("follow")}}" itemprop="{{url('follow/'.FEFollowsHelper::getId($current_user->id, $user->id))}}" >Unfollow</button>
                        <button type="button" class="btn btn-default follow hidden"  itemid='{{$current_user->id}}' itemref="{{$user->id}}" itemprop="{{url("follow")}}">Follow</button>
                        @else
                        <button type="button" class="btn btn-default unfollow hidden" itemref="{{url("follow")}}" itemprop="">Unfollow</button>
                        <button type="button" class="btn btn-default follow" itemid='{{$current_user->id}}' itemref="{{$user->id}}" itemprop="{{url('follow')}}">Follow</button>
                        @endif

                    </div>
                    @endif
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
					 <li class="@yield('Friends')">
                         <a href="{{url('follow?follower_id='.$user['id'])}}">Follow</a>
                     </li> 
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