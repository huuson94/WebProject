@extends('frontend/layout/layout_profile')
@section('title')Messages  @stop
@section('addcss')
<link rel="stylesheet" href="{{url('public/assets/css/main-style.css')}}">
<link rel="stylesheet" href="{{url('public/assets/css/style-message.css')}}">
@stop
@section('Friend')
active
@stop

@section('profile_content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="ncc_message-box">
                @include('frontend/messages/_conversations_list',array('conversations', $conversations))
                <div class="ncc_right-box">
                    <div class="ncc_box-top row">
                        @if(FEUsersHelper::isCurrentUser($user->id))
                        @include('frontend/messages/_conversation_info',array('conversation',$conversation))
                        @endif
                    </div>
                    @include('frontend/messages/_conversation',array('conversation',$conversation))
                    
            </div>
        </div>
    </div>
</div>

@stop
