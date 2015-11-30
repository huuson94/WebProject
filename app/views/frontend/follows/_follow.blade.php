<div class="">
    <a href="{{url($_user->account.'/profile')}}">
        <img src="{{url($_user->getAvatar())}}">
    </a>
    <div class="ncc_name">
        <h5><a href="{{url($_user->account.'/profile')}}">{{$_user->fullname}}</a></h5>	
        <!--<p><a href="">1.400 bạn bè</a></p>-->
    </div>
    @if(FEUsersHelper::isLogged())
    <div class="ncc_op">
        @if(in_array($_user->id,$user->getFollowingUsersId()))
        <button type="button" class="btn btn-default unfollow" itemprop="{{FEFollowsHelper::getId($user->id, $_user->id)}}"><a href="#">Unfollow</a></button>
        <button type="button" class="btn btn-default follow hidden"  itemid='{{$user->id}}' itemref="{{$_user->id}}"><a href="#">Follow</a></button>
        @else
        <button type="button" class="btn btn-default unfollow hidden" itemprop=""><a href="#">Unfollow</a></button>
        <button type="button" class="btn btn-default follow" itemid='{{$user->id}}' itemref="{{$_user->id}}" ><a href="#">Follow</a></button>
        @endif

    </div>
    @endif
</div>