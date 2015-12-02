@extends('backend.layout.main')
@section('content')
<h1>Tất cả album</h1>
    <div class="box box-primary">
        <div class="box-body">
            <table class="table table-hover table-classroom">
                <thead>
                <tr>
                    <th class="text-center row-number">#</th>
                    <th width="200">
                        @if ($sortby == 'title' && $order == 'asc')
                        {{ link_to_action('BEAlbumController@index','Tiêu đề',array('sortby' => 'title','order' => 'desc')) }}
                    @else
                        {{ link_to_action('BEAlbumController@index','Tiêu đề',array('sortby' => 'title','order' => 'asc')) }}
                    @endif
                    </th>
                    <th width="200">Ảnh</th>
                    <th width="200">Người đăng</th>
                    <th>Privacy</th>
                    <th class="text-center" width="200">Ngày đăng</th>

                </tr>
                </thead>
                <tbody>
                @if(count($albums) > 0)
                    <?php $i=1; ?>
                    @foreach($albums as $item)
                        <tr>
                            <td class="text-center">{{ $i++ }}.</td>
                            <td>
                                {{ $item->title }}
                            </td>
                            <td>
                                <img src="{{url('public/upload/'.$item->user->account.'/'.$item->album_img)}}" alt="{{$item->title}}" width="64" height="64" class="img-thumbnail">
                            </td>
                            <td>
                                {{$item->user->fullname}}
                            </td>
                            <td>
                                @if($item->privacy == 1) Công khai
                                @elseif($item->privacy == 2) Bạn bè
                                @else Riêng tư
                                @endif                                
                            </td>
                            <td>{{ $item->created_at }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">
                            Data empty
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
        <div class="box-footer clearfix">
            <div class="box-tools">
                <div class="col-md-9 text-right">
                    {{$albums->links()}}
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $(".delete-btn").click(function(e){
                
                if(confirm("Bạn có muốn xóa không?")){

                }else{
                    e.preventDefault();
                }
            });
        });
    </script>
@stop
