$('#login').on('submit',function(event){
	event.preventDefault();
	$.post(
		$(this).attr('action'),
		$(this).serialize(),
		function(data){

			//fail icon
			var fail='<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>';


			//reset message error
			$('.error').html('');
			$('form>div').removeClass('has-error').find('span').remove();

			function myError(input,message){
				var input_selector=$('input[name="'+input+'"]');
				input_selector.parent().addClass('has-error');
				input_selector.after(fail);
				input_selector.siblings('.error')
					.html('<p>'+message+'</p>');
			}

			// fail: Not exists user
			if (data=='fail: Not exists user') {
				myError('account','Không tồn tại tài khoản này');
			}

			// fail: incorrect password
			else if (data=='fail: incorrect password') {
				myError('password','Mật khẩu không đúng');
			}
			// success
			else if(data=='success'){
				window.location.href=$('button').attr('direct');
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
					if( key=='account' ) adderror('account');
					if( key=='password' ) adderror('password');
				})
			}
		}
	)
})