<div class='new-conversation'>
<a class="new-message" href='{{url('message/create')}}'>
    <span class="glyphicon glyphicon-pencil ncc_tn"></span>
    <span class='txt'>Gửi tin nhắn mới</span>
</a>
</div>
@if($conversation)
<div class='conversation-info'>
    <a href='{{url('profile?user_id='.$conversation->user1_id)}}'>
        <span>{{$conversation->getUser1()->fullname}}</span>
    </a> và
    <a href='{{url('profile?user_id='.$conversation->user2_id)}}'>
        <span>{{$conversation->getUser2()->fullname}}</span>
    </a>
</div>
@endif