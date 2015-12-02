@section('addjs')
<script type="text/javascript">
    $(document).ready(function () {
        $("button.follow").click(function () {
            var follower_id = $(this).attr('itemid');
            var followed_id = $(this).attr('itemref');
            var obj = $(this);
            $.ajax({
                url: '{{url("follow")}}',
                type: 'POST',
                dataType: 'html',
                data: {
                    follower_id: follower_id,
                    followed_id: followed_id
                },
                success: function (result) {
                    if (result != 'false') {
                        obj.parent().find('.unfollow').removeClass('hidden');
                        obj.parent().find('.unfollow').attr('itemprop',result);
                        obj.addClass('hidden');
                    }
                }

            });
        });

        $("button.unfollow").click(function () {
            var id = $(this).attr('itemprop');
            
            var obj = $(this);
            $.ajax({
                url: '{{url("follow")}}'+"/"+id,
                type: 'PATCH',
                dataType: 'html',
                data: {
                    id: id,
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
</script>
@stop
