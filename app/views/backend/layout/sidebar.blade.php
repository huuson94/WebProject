<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="{{route('admin.user.index')}}">
                    <i class="fa fa-user text-red"></i>
                    <span>User</span>
                </a>
            </li>

            <li class="treeview">
                <a href="{{route('admin.album.index')}}">
                    <i class="fa fa-user text-red"></i>
                    <span>Album</span>
                </a>
            </li>

            <li class="treeview">
                <a href="{{route('admin.image.index')}}">
                    <i class="fa fa-user text-red"></i>
                    <span>Image</span>
                </a>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>