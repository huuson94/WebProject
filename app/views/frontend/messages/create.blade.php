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
                {{Form::open(['url' => 'message', 'method' => 'POST'])}}    
                <div class="ncc_right-box">
                    <div class="ncc_box-top row">
                        <label class='txt'>Đến: </label>
                        <input type='text' class='form-control fullname' name='r_user' required="true">
                        <input type='hidden' class='user_id' name='r_user_id'>
                    </div>
                    
                    <div class="ncc_chat-box">
                        <div class="ncc_b1">
                            <span class="ncc_toolbar ncc_btn-buzz"></span>
                            <span class="ncc_toolbar ncc_btn-color"></span>
                            <span class="ncc_toolbar ncc_btn-icon"></span>
                        </div>
                        <div class="ncc_b2">
                            <textarea name='content' placeholder="Nhập nội dung chat ..." required="true"></textarea>
                        </div>
                        <div class="ncc_b3">
                            <button class="btn btn-primary send-message">Gửi</button>
                        </div>
                    </div>
                </div>
                 {{Form::close()}}
            </div>
        </div>
    </div>
</div>

@stop

@section('addjs')
<script type="text/javascript">
    $(document).ready(function(){
        
       $(".fullname").autocomplete({
           source: '{{url("user?list")}}',
           focus: function (event, ui) {
               this.value = ui.item.label; // display the selected text
                $("input.user_id").val(ui.item.value); // save selected id to hidden input
                 event.preventDefault();
            },
           select: function (event, ui) {
               this.value = ui.item.label; // display the selected text
                $("input.user_id").val(ui.item.value); // save selected id to hidden input
                
                 event.preventDefault();
            },
            response: function(event, ui) {
            if (ui.content.length === 0) {
                $("input.user_id").val('');
            }
        }
       });
       $(".send-message").click(function(e){
          if($("input.user_id").val() == ""){
              e.preventDefault();
              alert("Người nhận chưa đúng !");
              return false;
          }
       });
       
    });
</script>
@stop
