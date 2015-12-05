$(document).ready(function () {
    $(".delete-post").click(function (e) {
        if (confirm('Bạn có thưc sự muốn xóa')) {
            e.preventDefault();
            var post_div = $(this).closest('article');
            var post_id = $(this).closest("div.pull-right").find('input.post-id').val();
            var url = $(this).closest("div.pull-right").find('input.post-id').attr('itemref');
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'html',
                data: {
                    _method: 'DELETE',
                }, success: function (result) {
                    if (result == 'true') {
                        post_div.hide(300);
                    }
                }

            });
        }
    });
});