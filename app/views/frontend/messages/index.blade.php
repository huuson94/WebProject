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
                @include('frontend/messages/_messages_list')
                <div class="ncc_right-box">
                    <div class="ncc_box-top row">
                        <a class="ncc_r">
                            <span class="glyphicon glyphicon-comment ncc_tn"></span>
                            <span class='txt'>Gửi tin nhắn mới</span>
                        </a>
                    </div>
                    <div class="conversation">
                        <div class="message-me">
                            <div class="info">
                                <div class="name">
                                    <h5>CÚT KHỎI ĐỜI TAO</h5>
                                </div>
                                <img class='avatar' src="{{url('public/assets/images/ava_default.jpg')}}">
                            </div>
                            <div class="date">
                                <p> 10 tháng 10 năm 2010</p>
                            </div>
                            <div class="message-content">
                                 <p class='content'>Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello </p>
                            </div>
                        </div>
                        <div class='clearfix'></div>
                        <div class="message-friend">
                            <div class="info">
                                <div class="name">
                                    <h5>CÚT KHỎI ĐỜI TAO</h5>
                                </div>
                                <img class='avatar' src="{{url('public/assets/images/ava_default.jpg')}}">
                            </div>
                            <div class="date">
                                <p> 10 tháng 10 năm 2010</p>
                            </div>
                            <div class="message-content">
                                 <p class='content'>Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello </p>
                            </div>
                        </div>
                        <div class='clearfix'></div>
                    </div>
                    <div class="ncc_chat-box">
                        <div class="ncc_b1">
                            <span class="ncc_toolbar ncc_btn-buzz"></span>
                            <span class="ncc_toolbar ncc_btn-color"></span>
                            <span class="ncc_toolbar ncc_btn-icon"></span>
                        </div>
                        <div class="ncc_b2">
                            <textarea placeholder="Nhập nội dung chat ..."></textarea>
                        </div>
                        <div class="ncc_b3">
                            <input type="checkbox"/>
                            <span>Nhấn phím Enter để gửi</span>
                            <button class="btn btn-primary">Gửi</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('addjs')
<script type="text/javascript">
</script>
@stop
