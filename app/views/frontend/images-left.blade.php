<div class="row visible-md-block visible-lg-block">
		<div class="col-md-12 item photo pad-no-l">
			<div class="bgr border">
				<h5>Photo <small><a href="#">· Edit</a></small></h5>
				<ul class="wrapper flex-images">
                    @foreach($entries as $entry)    
                        @if(get_class($entry) == "Album")
                            @foreach($entry->images as $image)
                            <li class="item" data-w="219" data-h="180">
                                <img src="{{url('public/upload/'.$entry->user['account'].'/'.$image['path'])}}" alt="test">
                            </li>
                            @endforeach
                        @endif
                    @endforeach
                    <li class="item hidden" ></li>
			    </ul>
			</div>
		</div>
	</div>
