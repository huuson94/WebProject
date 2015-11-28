@extends('backend.layout.main')
@section('content')
<h1>Tất cả người dùng</h1>
    <div class="box box-primary">
        <div class="box-body">
            {{ Form::open(array('url' => '/admin/user/search')) }}
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
                                            {{ Form::radio('search_opt','email',true) }} Email
                                        </label>
                                        <label class="checkbox-inline">
                                            {{ Form::radio('search_opt','fullname') }} Tên đầy đủ
                                        </label>
                                        <label class="checkbox-inline">
                                            {{ Form::radio('search_opt','account') }} Tên tài khoản
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
                    <th width="200">
                        @if ($sortby == 'email' && $order == 'asc')
                        {{ link_to_action('BEUsersController@index','Email',array('sortby' => 'email','order' => 'desc')) }}
                    @else
                        {{ link_to_action('BEUsersController@index','Email',array('sortby' => 'email','order' => 'asc')) }}
                    @endif
                    </th>
                    <th width="200">
                    @if ($sortby == 'account' && $order == 'asc')
                        {{ link_to_action('BEUsersController@index','Tài Khoản',array('sortby' => 'account','order' => 'desc')) }}
                    @else
                        {{ link_to_action('BEUsersController@index','Tài Khoản',array('sortby' => 'account','order' => 'asc')) }}
                    @endif
                    </th>
                    <th width="200">Tên</th>
                    <th>Điện thoại</th>
                    <th width="200">Admin</th>
                    <th class="text-center" width="200">Ngày đăng ký</th>
                    <th class="action" width="150">Action</th>

                </tr>
                </thead>
                <tbody>
                @if(count($users) > 0)
                    <?php $i=1; ?>
                    @foreach($users as $item)
                        <tr>
                            <td class="text-center">{{ $i++ }}.</td>
                            <td>
                                {{ $item->email }}
                            </td>
                            <td>
                                {{ $item->account }}
                            </td>
                            <td>
                                {{$item->fullname}}
                            </td>
                            <td>
                                {{ $item->phone}}
                            </td>
                            <td>
                                 @if($item->is_admin == 1) Có
                                 @else Không là Admin
                                 @endif
                            </td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                            {{ link_to_route('admin.user.edit', 'Edit',array($item->id), array('class' => 'btn btn-info')) }}
                            </td>
                            <td>
                            {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.user.destroy', $item->id))) }}         {{ Form::submit('Delete', array('class'=> 'btn btn-danger delete-btn')) }}
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
                    {{$users->links()}}
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $(".delete-btn").click(function(e){
                
                if(confirm("Xoa khong?")){

                }else{
                    e.preventDefault();
                }
            });
        });
    </script>
@stop
