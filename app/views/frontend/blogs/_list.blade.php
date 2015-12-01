<div class="row visible-md-block visible-lg-block">
    <div class="col-md-12 item about pad-no-l">
        <div class="bgr border">
            <ul class="light">
                @foreach($blogs as $blog)
                <li>
                    <h5 class="blog-title"><a href='{{url('blog/'.$blog->id)}}'>{{$blog->title}}</a></h5>
                    <!--<span>{{$blog->content}}</span>-->
                </li>
                @endforeach
                
            </ul>
        </div>
    </div>
</div>