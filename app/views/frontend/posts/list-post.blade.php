<article class="col-md-12 item border up-post">
    <div class="top">
        <p class="bold"><i class="glyphicon glyphicon-pencil"></i><a href="{{Session::get('user')['account'].'/blog/create'}}">Blog</a></p>
        <p class="bold"><i class="glyphicon glyphicon-camera"></i><a href="#">Add Photo</a></p>
    </div>
    
    {{Form::open(array('url' => Session::get('user')['account'].'/post', 'method' => 'POST'))}}
    <div class="content">
        <textarea name="content" placeholder="Bạn đang nghĩ gì?" data-autoresize spellcheck="false"></textarea>
    </div>
    <div class="up-button">
        <div class="right bold">
            <select name="privacy">
                @foreach($privacies as $privacy)
                <option value="{{$privacy->id}}">{{$privacy->name}}</option>
                @endforeach
                
            </select>
            <input type="submit" value="Đăng">
        </div>
        <div class="clearfix"></div>
    </div>
    {{Form::close()}}
</article>
<article class="col-md-12 item border">
    <div class="p_post">
        <img class="ava radius_50 left" src="{{url('public/assets/images/avatar-test.png')}}" alt="test">
        <div class="left">
            <h5>Trần Bảo Huy</h5>
            <p class="light">12 min</p>
        </div>
    </div>
    <div class="bh_text light">
        <p>Donec id elit non mi porta gravida at eget metus. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    </div>
    <ul class="img_post flex-images">
        <li class="item" data-w="219" data-h="180">
            <img src="{{url('public/assets/images/1.jpg')}}" alt="test">
        </li>
        <li class="item" data-w="279" data-h="180">
            <img src="{{url('public/assets/images/2.jpg')}}" alt="test">
        </li>
        <li class="item" data-w="279" data-h="180">
            <img src="{{url('public/assets/images/2.jpg')}}" alt="test">
        </li>
    </ul>
</article>
<article class="col-md-12 item border">
    <div class="p_post">
        <img class="ava radius_50 left" src="{{url('public/assets/images/avatar-test.png')}}" alt="test">
        <div class="left">
            <h5>Trần Bảo Huy</h5>
            <p class="light">12 min</p>
        </div>
    </div>
    <div class="bh_text light">
        <p>Donec id elit non mi porta gravida at eget metus. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    </div>
</article>
