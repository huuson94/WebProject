
<div class="col-sm-3">
	<div class="right-content">
		<div class="tb1">
			<div class="az">
				<h5>Sponsored</h5>
				<div class="image">
					<img src="http://bootstrap-themes.github.io/application/assets/img/instagram_2.jpg">	
				</div>
				<p>
					<strong>It might be time to visit Iceland.</strong>
					Iceland is so chill, and everything looks cool here. Also, we heard the people are pretty nice. What are you waiting for?
				</p>
				<button class="btn">Buy a ticket</button>
			</div>
		</div>
		<div class="tb1">
			<div class="b1">
				<h5>Gợi ý follow</h5>
				<ul class="friend-like">
                    @foreach($suggestes as $index => $suggest)
                        @if($index <=1 && in_array($suggest->followed->id,$user->getFollowingUsersId()))
                        
                        <li class="row">
                            <a href="{{url($suggest->followed->account.'/profile')}}">
                                <img src="{{url($suggest->followed->avatar)}}">
                            </a>
                            <div class="name-like">
                                <strong>{{$suggest->followed->fullname}}</strong>
                            </div>
                            @if(FEUsersHelper::isLogged())
                            <div class="ncc_op">
                                <button type="button" class="btn btn-default unfollow hidden" itemprop="">Unfollow</button>
                                <button type="button" class="btn btn-default follow" itemid='{{$user->id}}' itemref="{{$suggest->followed->id}}" >Follow</button>
                            </div>
                            @endif
                        </li>
                        @endif
                    @endforeach
					
				</ul>
			</div>
			
		</div>
		<div class="tb1">
			<div class="b3">
				© 2015 Bootstrap
				<a href="#">About</a>
				<a href="#">Help</a>
				<a href="#">Terms</a>
				<a href="#">Privacy</a>
				<a href="#">Cookies</a>
				<a href="#">Ads</a>
				<a href="#">Info</a>
			</div>
		</div>
	</div>
</div>
@include('frontend/users/_ajax_follow')