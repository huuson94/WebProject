// Show input to edit infomation
$(document).ready(function(){
    $(document).on('click', '.edit-button', function (event) {
        event.preventDefault();
        $('.td-profile-edit a').show();
        $('.edit-button').hide();
        $('#user_info form li>div').each(function () {
            $(this).find('span').hide();
            $(this).find('input').attr('type', 'text');
        });
        $("div.td-profile-infor span").addClass('hidden');
        $("div.td-profile-infor textarea").removeClass('hidden');
        $('#user_info form li>div img.avatar').addClass('hidden');
        $('#user_info form li>div input.avatar').removeClass('hidden');
        $('#user_info form li>div input.avatar').attr('type', 'file');
    })
    $('.cancle-button').on('click', function (event) {
        event.preventDefault();
        window.location.reload();
    })
    $(document).on('click', '.save-button', function (event) {
        event.preventDefault();
        var data = new FormData($("#user_info form")[0]);

        $.ajax({
            url: $('#user-info-form').attr('action'),
            data: data,
            type: 'POST',
            dataType: 'JSON',
            processData: false,
            contentType: false,
            cache: false,
            success: function (data, textStatus, jqXHR) {
                var fail = '<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>';
                //reset message error
                $('.error').html('');
                $('form>div').removeClass('has-error').find('span.glyphicon').remove();

                // success
                if (data == 'success') {
                    alert('Thành công !');
                    window.location.reload();
                }

                // message error from laravel
                else {
                    var msg = data;

                    $.each(msg, function (key, val) {
                        function adderror(input) {
                            var input_selector = $('input[name="' + input + '"]');
                            input_selector.siblings('.error')
                                    .html('<p>' + val + '</p>');
                            input_selector.parent().addClass('has-error');
                            input_selector.after(fail);
                        }
                        if (key == 'fullname')
                            adderror('fullname');
                        if (key == 'email')
                            adderror('email');
                        if (key == 'phone')
                            adderror('phone');
                    })
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                //if fails     
            }
        });
    });
});
