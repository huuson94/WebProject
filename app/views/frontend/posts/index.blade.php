@foreach($posts as $post)
    @include('frontend/posts/_post',array('post' => $post))
@endforeach
