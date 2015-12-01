<div class="row visible-md-block visible-lg-block">
    <div class="col-md-12 item about pad-no-l">
        <div class="bgr border">
            <h5>About <small><a href="{{url(Session::get('user')['account'].'/edit')}}">· Edit</a></small></h5>
            <ul class="light">
                @if(isset(Session::get('user')['address']))
                <li>
                    <i class="glyphicon glyphicon-home"></i>
                    <span>Went to</span><a href="#">{{Session::get('user')['address']}}</a>
                </li>
                @endif
                @if(isset(Session::get('user')['phone']))
                <li>
                    <i class="glyphicon glyphicon-home"></i>
                    <span>Phone</span><a href="#">{{Session::get('user')['phone']}}</a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</div>