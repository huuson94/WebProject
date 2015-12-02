<div class="row">
	<div class="col-md-12 item pad-no-l text-center">
		<div class="bgr border">
			<div class="cover" style="">
			</div>
			<div class="bh_ava">
				<a href="{{url('/'.Session::get('user')['account'])}}">
					<img class="radius_50" src="{{url(Session::get('user')['avatar'])}}" alt="avatar">
				</a>
			</div>
			<div class="bh_text">
				<a href="{{url('/'.Session::get('user')['account'])}}">
					<h3>{{Session::get('user')['fullname']}}</h3>
				</a>
                <p class="light">{{User::find(Session::get('user')['id'])->about}}</p>
				<ul>
					<li>
						<p class="light">Follower</p>
						<p class="bold">{{FEFollowsHelper::countFollower(Session::get('user')['id'])}}</p>
					</li>
					<li>
						<p class="light">Following</p>
						<p class="bold">{{FEFollowsHelper::countFollowing(Session::get('user')['id'])}}</p>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>