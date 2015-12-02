
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
                        @if(in_array($suggest->followed->id,$user->getFollowingUsersId()))
                        
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
<script type="text/javascript">
    $(document).ready(function () {
        $("button.follow").click(function () {
            var follower_id = $(this).attr('itemid');
            var followed_id = $(this).attr('itemref');
            var obj = $(this);
            $.ajax({
                url: '{{url("follow")}}',
                type: 'POST',
                dataType: 'html',
                data: {
                    follower_id: follower_id,
                    followed_id: followed_id
                },
                success: function (result) {
                    if (result != 'false') {
                        obj.parent().find('.unfollow').removeClass('hidden');
                        obj.parent().find('.unfollow').attr('itemprop',result);
                        obj.addClass('hidden');
                    }
                }

            });
        });

        $("button.unfollow").click(function () {
            var id = $(this).attr('itemprop');
            
            var obj = $(this);
            $.ajax({
                url: '{{url("follow")}}'+"/"+id,
                type: 'PATCH',
                dataType: 'html',
                data: {
                    id: id,
                    _method: 'PATCH'
                },
                success: function (result) {
                    if (result == 'true') {
                        obj.parent().find('.follow').removeClass('hidden');
                        obj.addClass('hidden');
                    }
                }

            });
        });
    });
</script>