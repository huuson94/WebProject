@if(Session::get('user')['account']==$user['account'])
<div class="link-photo">
    <a href="{{url('/image?user_id='.Session::get('user')['id'])}}">Ảnh của bạn</a>
    <a href="{{url('/album?user_id='.Session::get('user')['id'])}}" class="active">Album của bạn</a>

    <button type="button" class="btn right" data-toggle="modal" data-target=".bs-example-modal-lg">Tạo Album mới</button>
</div>
@else
<div class="link-photo">
    <a href="{{url('/image?user_id='.$user->id)}}">Ảnh của {{$user['fullname']}}</a>
    <a href="{{url('/album?user_id='.$user->id)}}" class="active">Album của {{$user['fullname']}}</a>
</div>
@endif