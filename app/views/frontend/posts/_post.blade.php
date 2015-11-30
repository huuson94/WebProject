@if($post)
<article class="col-md-12 item border">
    <div class="p_post">
        <img class="ava radius_50 left" src="{{url($post->user->getAvatar())}}" alt="test">
        <div class="left">
            <h5><a href="{{url($post->user->account.'/profile')}}">{{$post->user->fullname}}</a></h5>
            <p class="light">{{$post->updated_at}}</p>
        </div>
    </div>
    <div class="bh_text light">
        <p>{{$post->content}}
    </div>
    <div class="l-cmt">
        <div class="like">
            <a href="#"><i class="glyphicon glyphicon-thumbs-up"></i> Thích</a>
         </div>
         <div class="comment">
            <a href="#"><i class="glyphicon glyphicon-comment"></i> Bình luận</a>
        </div>
    </div>
    <blockquote class="comment">
        <ul>
            <li>
                <div class="ava">
                    <img src="{{url('public/assets/images/ava_default.jpg')}}" alt="">
                </div>
                <div class="content">
                    <a href=""><h5>Anh Tuấn</h5></a>
                       <span class="light">Donec id elit non mi porta gravida at eget metus. Integer posuere erat a ante venenatis dapibus posuere velit aliquet.Donec id elit non mi porta gravida at eget metus. Integer posuere erat a ante venenatis dapibus posuere velit aliquet</span>
                </div>
            </li>
            <li>
                <div class="ava">
                     <img src="{{url('public/assets/images/ava_default.jpg')}}" alt="">
                </div>
                <div class="content">
                    <a href=""><h5>YoYo</h5></a>
                    <span class="light">Donec id elit non mi porta gravida at eget metus!!</span>
                </div>
            </li>
            <li>
                <div class="ava">
                    <img src="{{url('public/assets/images/ava_default.jpg')}}" alt="">
                </div>
                <div class="input">
                    <textarea data-autoresize placeholder="Viết bình luận..."></textarea>
                </div>
            </li>
        </ul>
    </blockquote>
</article>
@endif($post)