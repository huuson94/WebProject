<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tên Album</h4>
                <input id="title" type="text" name="title" placeholder="Nhập tên album ...">
                <select name="privacy" id="privacy">
                    @foreach($privacies as $privacy)
                    <option value="{{$privacy->id}}">{{$privacy->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input id="file" name="img[]" type="file" multiple class="file-loading" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@section('addjs')
	<script type="text/javascript">
        
        $(document).ready(function(){
            $("#file").fileinput({
                uploadUrl: "{{url('album')}}", // server upload action
                uploadAsync: false,
                uploadExtraData: function(){
                    return {
                        'title':$('#title').val(),
                        'privacy':$('#privacy').val()
                    }
                }
                // maxFileCount: 5
            });
            $("#file").on('filebatchuploadcomplete', function(event, files, extra) {
                if(!confirm('Bạn có muốn upload tiếp không?')){
                    location.reload();
                }
            });
            $('.flex-images').flexImages({rowHeight: 250});
        });
	</script>
@stop
