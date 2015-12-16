
<div class="col-sm-3">
	<div class="right-content">
		<div class="tb1">
			<div class="az">
				<h5>Sponsored</h5>
				<div class="image">
					<img src="{{url('public/assets/logo.png')}}">	
				</div>
				<p>
					<strong>Project Lập trình web </strong>
                    Sản phẩm cho bài tập lớn môn Thực Hành Lập Trình Web.
                    
				</p>
                <button class="btn"><a href='https://github.com/huuson94/WebProject'>Đến website mã nguồn</a></button>
			</div>
		</div>
		<div class="tb1">
			<div class="b1">
				<h5>Gợi ý follow</h5>
				<ul class="friend-like">
                    @foreach($suggestes as $index => $suggest)
                        @if(!in_array($suggest->followed->id,$user->getFollowingUsersId()))
                        
                        <li class="row">
                            <a href="{{url($suggest->followed->account.'/profile')}}">
                                <img src="{{url($suggest->followed->avatar)}}">
                            </a>
                            <div class="name-like">
                                <strong>{{$suggest->followed->fullname}}</strong>
                            </div>
                            @if(FEUsersHelper::isLogged())
                            <div class="ncc_op">
                                <button type="button" class="btn btn-default unfollow hidden"  itemref="{{url("follow")}}">Unfollow</button>
                                <button type="button" class="btn btn-default follow" itemprop="{{url("follow")}}" itemid='{{$user->id}}' itemref="{{$suggest->followed->id}}" >Follow</button>
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
				© Nhóm bài tập web<br/>
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
