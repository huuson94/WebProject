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
				<p class="light">I wish i was a little bit taller, wish i was a baller, wish i had a girl… also.</p>
				<ul>
					<li>
						<p class="light">Friends</p>
						<p class="bold">12M</p>
					</li>
					<li>
						<p class="light">Follow</p>
						<p class="bold">40</p>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>