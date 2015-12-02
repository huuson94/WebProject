@extends('backend.layout.main')
@section('content')
<h1>Tất cả post</h1>
    <div class="box box-primary">
        <div class="box-body">
            {{ Form::open(array('url' => '/admin/post','method' => 'get')) }}
            <div class="row">
                <div class="col-sm-3">
                    
                </div>
                <div class="col-sm-9">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <div class="col-sm-10">
                                {{ Form::text('keyword',null, array('placeholder' => 'Tìm kiếm theo Email , tên đầy đủ hoặc tất cả', 'class' => 'form-control')) }}
                            </div>
                            <div class="col-sm-2">
                                {{ Form::submit('Tìm kiếm') }}
                            </div>

                            <div class="col-sm12">
                                <p class="helper-block">
                                    <label class="checkbox-inline" style="padding-left: 45px">Tìm kiếm theo: </label>
                                        <label class="checkbox-inline">
                                            {{ Form::radio('search_opt','content',true) }} Nội dung
                                        </label>
                                        <label class="checkbox-inline">
                                            {{ Form::radio('search_opt','fullname') }} Người đăng
                                        </label>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            {{ Form::close() }}
            <table class="table table-hover table-classroom">
                <thead>
                <tr>
                    <th class="text-center row-number">#</th>
                    <th>Nội dung</th>
                    <th width="200">Người đăng</th>
                    <th width="200">Riêng tư</th>
                    <th class="text-center" width="200">Ngày đăng</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @if(count($posts) > 0)
                    <?php $i=1; ?>
                    @foreach($posts as $item)
                        <tr>
                            <td class="text-center">{{ $i++ }}.</td>
                            <td>
                               {{ $item->content}}
                            </td>
                            <td>
                                {{ $item->user->fullname }}
                            </td>
                            <td>
                                @if($item->privacy == 1) Công khai
                                @elseif($item->privacy == 2) Bạn bè
                                @else Riêng tư
                                @endif 
                            </td>
                            <td class="text-center">{{ $item->created_at }}</td>
                            <td>
                                {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.post.destroy', $item->id))) }}   
                                {{ Form::submit('Delete', array('class'=> 'btn btn-danger delete-btn')) }}
                                {{ Form::close() }}
                            </td>
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
                    {{ $posts->links()}}
                    
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
