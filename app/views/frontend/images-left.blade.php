<div class="row visible-md-block visible-lg-block">
		<div class="col-md-12 item photo ">
			<div class="bgr border">
				<h5>Photo</h5>
                <?php $count = 0;?>
				<ul class="wrapper flex-images">
                    @foreach($left_albums as $index => $album)    
                        @if($index < 6)
                        <li class="item" data-w="{{$album->images->first()->width}}" data-h="{{$album->images->first()->height}}">
                            <a href="{{url('album/'.$album->id)}}">
                                <img src="{{url($album->images->first()->path)}}" alt="test">
                            </a>
                        </li>
                        @endif  
                    @endforeach
                    <li class="item hidden" ></li>
			    </ul>
			</div>
		</div>
	</div>
