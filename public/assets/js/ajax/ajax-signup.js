$('#sign-up').on('submit',function(event){
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
			// fail: exists account
			if (data=='fail: exists account'){
				myError('account','Tài khoản này đã có người sử dụng');
			}

			// fail: password check
			else if(data=='fail: password check'){
				myError('passwordcheck','Mật khẩu không khớp');
			}

			// success
			else if(data=='success'){
				alert('Đăng ký tài khoản thành công, nhấn OK để về trang chủ');
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
					if( key=='fullname' ) adderror('fullname');
					if( key=='account' ) adderror('account');
					if( key=='password' ) adderror('password');
					if( key=='passwordcheck' ) adderror('passwordcheck');
					if( key=='email' ) adderror('email');
					if( key=='phone' ) adderror('phone');
				})
			}
		}
	)
})