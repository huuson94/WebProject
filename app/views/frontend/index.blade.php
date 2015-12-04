@extends('frontend/layout/layout_master')
@section('title')
	Hedspi Social
@stop
@section('addcss')
	<link rel="stylesheet" href="{{url('public/assets/css/main-style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('public/assets/css/jquery.flex-images.css')}}">
	<link rel="stylesheet" href="{{url('public/assets/css/right-content.css')}}">
@stop
@section('addcontent')
	@include('frontend/header')
	<section class="container-fluid bh_main_content">
		<div class="container">
			<div class="row">
				
				<div class="col-md-3 bh_left_info">
					@include('frontend/child-info')
					@include('frontend/images-left')
				</div>
				<div class="col-md-6 list-post">
					<div class="row">
                        @include('frontend/posts/create')
                        @foreach($entries as $entry)
                            @if(get_class($entry->getEntry()) == "Post")
                                @include('frontend/posts/_post', array('post' => $entry->getEntry()))
                            @elseif(get_class($entry->getEntry()) == "Blog")
                                @include('frontend/blogs/_blog_preview', array('blog' => $entry->getEntry()))
                            @elseif(get_class($entry->getEntry()) == "Album")
                                @include('frontend/photos/albums/_album', array('album' => $entry->getEntry()))
                            @endif
                        @endforeach
                    </div>
				</div>
				@include('frontend/right-content')
			</div>
		</div>
	</section>
@stop
@section('addjs')
	<script type="text/javascript" src="{{url('public/assets/js/jquery.flex-images.min.js')}}"></script>
	<script type="text/javascript">
        $(document).ready(function(){
            $('.flex-images').flexImages({rowHeight: 120});
        });
		
    </script>
    <script type="text/javascript" src="{{url('public/assets/js/index/ajax_delete_post.js')}}"></script>
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