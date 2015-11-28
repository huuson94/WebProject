@foreach($blogs as $blog)
    @include('frontend/blogs/_blog',array('blog' => $blog))
@endforeach