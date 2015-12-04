<div class="ncc_left-box">
    <div class="ncc_box-top">
        <span>Tin nhắn</span>
    </div>
    <div class="ncc_search-box">
        <div class="ncc_box">
            {{Form::open(['url' => 'message', 'method' => 'GET'])}}
            <p class="ncc_search">
                <input type="text" placeholder="Tìm kiếm" name='user'/>
            </p>
            <span class='glyphicon glyphicon-search '></span>
            {{Form::close()}}
        </div>
    </div>
    <div class="ncc_friend-list">
        @foreach($conversations as $conversation)
        <a href='{{url('message/'.$conversation->id)}}'>
        <div class="ncc_friend ncc_chatting">
            {{Form::open(['url' => 'message/'.$conversation->id, 'method' => 'DELETE'])}}
            <button class='glyphicon glyphicon-remove remove-conversation'></button>
            {{Form::close()}}
            <div class="ncc_avatar">
                <img src="{{url($conversation->messages->last()->user->avatar)}}">
            </div>
            <div class="ncc_info">
                <h5>{{$conversation->messages->last()->user->fullname}}</h5>
                <p>{{$conversation->messages->last()->preview()}}</p>
                <p>{{$conversation->messages->last()->updated_at}}</p>
            </div>
        </div>
        </a>
        @endforeach
        
    </div>
</div>