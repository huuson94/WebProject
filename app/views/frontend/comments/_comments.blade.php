<blockquote class="comment">
    <ul>
        @include('frontend/comments/_comment',array('comment',null))
        <li>
            <div class="ava">
                <img src="{{url('public/assets/images/ava_default.jpg')}}" alt="">
            </div>
            <div class="content">
                <a href=""><h5>YoYo</h5></a>
                <span class="light">Donec id elit non mi porta gravida at eget metus!!</span>
            </div>
        </li>
        @include('frontend/comments/_create',array('user',null))
    </ul>
</blockquote>