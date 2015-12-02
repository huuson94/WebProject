<article class="col-md-12 item border up-post">
    <div class="top">
        <p class="bold"><i class="glyphicon glyphicon-pencil"></i><a href="{{url('blog?user_id='.Session::get('user')['id'])}}">Blog</a></p>
        <p class="bold"><i class="glyphicon glyphicon-camera"></i><a href="{{url('album?user_id='.Session::get('user')['id'])}}">Add Photo</a></p>
    </div>
    
    {{Form::open(array('url' => 'post', 'method' => 'POST'))}}
    <div class="content">
        <textarea name="content" placeholder="Bạn đang nghĩ gì?" data-autoresize spellcheck="false" required="true"></textarea>
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
