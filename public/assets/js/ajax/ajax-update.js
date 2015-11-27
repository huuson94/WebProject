// Show input to edit infomation
		
$(document).on('click','.edit-button',function(event){
	event.preventDefault();
	$('.td-profile-edit a').show();
	$('.edit-button').hide();
	$('#user_info form li>div').each(function(){
		$(this).find('span').hide();
		$(this).find('input').attr('type','text');
	})
})
$('.cancle-button').on('click',function(event){
	event.preventDefault();
	window.location.reload();
})
$(document).on('click','.save-button',function(event){
	event.preventDefault();
	$.post(
		$('#user_info form').attr('action'),
		$('#user_info form').serialize(),
		function(data){
			// fail icon
			var fail='<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>';

			//reset message error
			$('.error').html('');
			$('form>div').removeClass('has-error').find('span.glyphicon').remove();

			// success
			if(data=='success'){
				alert('thành công');
				window.location.reload();
			}

			// message error from laravel
			else{
				var msg=$.parseJSON(data);
				$.each(msg,function(key,val){
					function adderror(input){
						var input_selector=$('input[name="'+input+'"]');
						input_selector.siblings('.error')
							.html('<p>'+val+'</p>');
						input_selector.parent().addClass('has-error');
						input_selector.after(fail);
					}
					if( key=='fullname' ) adderror('fullname');
					if( key=='email' ) adderror('email');
					if( key=='phone' ) adderror('phone');
				})
			}
		}
	)
})