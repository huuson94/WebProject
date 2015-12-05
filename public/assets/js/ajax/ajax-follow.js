$(document).ready(function () {
    $("button.follow").click(function () {
        var follower_id = $(this).attr('itemid');
        var followed_id = $(this).attr('itemref');
        var obj = $(this);
        var url = obj.attr('itemprop');
        var follow_url = obj.parent().find('.unfollow').attr('itemref');
        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'html',
            data: {
                follower_id: follower_id,
                followed_id: followed_id
            },
            success: function (result) {
                if (result != 'false') {
                    obj.parent().find('.unfollow').removeClass('hidden');
                    follow_url += "/"+result;
                    obj.parent().find('.unfollow').attr('itemprop',follow_url);
                    obj.addClass('hidden');
                }
            }

        });
    });

    $("button.unfollow").click(function () {
        var follow_url = $(this).attr('itemprop');
        
        var obj = $(this);
        $.ajax({
            url: follow_url,
            type: 'PATCH',
            dataType: 'html',
            data: {
                _method: 'PATCH'
            },
            success: function (result) {
                if (result == 'true') {
                    obj.parent().find('.follow').removeClass('hidden');
                    
                    obj.addClass('hidden');
                }
            }

        });
    });
});