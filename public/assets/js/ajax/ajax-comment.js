$(document).ready(function () {
    $("textarea.content").keypress(function (e) {
        var obj = $(this);
        
        var url = $(this).attr('itemref');
        var ul = $(this).closest('ul');
        if (e.which == 13 || e.keycode == 13) {
            if(obj.val() != ""){
            e.preventDefault();
                $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'JSON',
                    data: {
                        entry_id: ul.find('.entry-id').val(),
                        content: obj.val()
                    },
                    success: function (result) {
                        if(result.status == 'success'){
                            var template = $("#comment-template").clone();
                            template.find('div.ava img').attr('src',result.c_user_avatar);
                            template.find('div.content .c_user_fullname').text(result.c_user_fullname);
                            template.find('div.content .c_user_path').attr('href',result.c_user_path);
                            template.find('div.content .light').text(result.content);
                            template.find('div.content p.comment-time span').text(result.updated_at);
                            obj.closest('li.new-comment').before(template.html());
                            obj.val('');
                        }else if(result.status == 'fail'){
                            alert('Lỗi xẩy ra khi comment');
                        }
                    }
                });
            }else{
                alert('Nội dung bình luận rỗng');
                e.preventDefault();
                return false;
            }
        }
        
    });

});
