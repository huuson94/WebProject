@if($conversation)
<div class="conversation">

    @foreach($conversation->messages as $message)
    @if($message->user->id == Session::get('user')['id'])
    <div class="message-me">
    @else
    <div class="message-friend">
    @endif
        <div class="info">
            <div class="name">
                <h5>{{$message->user->fullname}}</h5>
            </div>
            <img class='avatar' src="{{url($message->user->avatar)}}">
        </div>
        <div class="date">
            <p>{{$message->updated_at}}</p>
        </div>
        <div class="message-content">
            <p class='content'>{{$message->content}}</p>
        </div>
    </div>
    <div class='clearfix'></div>
    @endforeach


    </div>
    {{Form::open(['url' => 'message', 'method' => 'POST'])}}
    <div class="ncc_chat-box">
        @if($conversation->user1_id != Session::get('user')['id'])
        <input type='hidden' name='r_user_id' value='{{$conversation->user1_id}}'>
        @else
        <input type='hidden' name='r_user_id' value='{{$conversation->user2_id}}'>
        @endif
        <div class="ncc_b1">
            <span class="ncc_toolbar ncc_btn-buzz"></span>
            <span class="ncc_toolbar ncc_btn-color"></span>
            <span class="ncc_toolbar ncc_btn-icon"></span>
        </div>
        <div class="ncc_b2">
            <textarea class='content' name='content' placeholder="Nhập nội dung chat ..." required="true"></textarea>
        </div>
        <div class="ncc_b3">
            <button class="btn btn-primary">Gửi</button>
        </div>
    </div>
    {{Form::close()}}
</div>
@endif
@section('addjs')
<script type="text/javascript">
    $("textarea.content").keydown(function (event) {
        if (event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });
    $("button.remove-conversation").click(function(event){
       if(!confirm('Bạn có chắc chắn muốn xóa?')){
           event.preventDefault();
           return false;
       } 
    });
</script>
@stop
