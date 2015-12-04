
$(document).on('keypress', '#comment', function (e) {
    var x = event.which || event.keyCode,
            current_user_ava = $('.up-post .hide .current').text(),
            user_name = $('.up-post .hide .user_name').text(),
            this_cmt = $(this),
            status_id = this_cmt.find('.hide').text();
    if (x == 13) {
        e.preventDefault();
        var content = $(this).find('textarea').val(),
                formdata = new FormData(this_cmt[0]);
        formdata.append('status_id', status_id);
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: formdata,
            contentType: false,
            processData: false,
            cache: false
        }).done(function (data) {
            if (data == 'success') {
                var cmt = '<li><div class="ava"><img src="' + current_user_ava + '" alt="avatar"></div><div class="content"><a href="#"><h5>' + user_name + '</h5></a><span class="light">' + content + '</span><p class="light">Vừa xong</p></div></li>';
                this_cmt.parent().parent().before(cmt);
                this_cmt[0].reset();
            }
            ;
        })
    }
})