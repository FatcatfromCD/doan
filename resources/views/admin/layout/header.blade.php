
<!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="admin/posts/danhsach">Trang quản lý </a>
            </div>
            <!-- /.navbar-header -->


                <div id="logout" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Đăng xuất</h4>
                      </div>
                      <div class="modal-body">
                        <p>Bạn có muốn đăng xuất không?</p>
                      </div>
                      <div class="modal-footer">
                        <a href="admin/logout" class="btn btn-danger" >Đăng xuất</a>
                        <button  type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                      </div>
                    </div>
                  </div>
                </div>

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="glyphicon glyphicon-user"></i>  <i class="fa fa-caret-down"></i>
                        @if(Auth::user())
                            {{ Auth::user()->name }}
                        @endif
                     </a>

                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="admin/users/profile"><i class="glyphicon glyphicon-user"></i> Thông tin cá nhân</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a style='cursor: pointer;' data-toggle="modal" data-target="#logout"><i class="fa fa-sign-out fa-fw"></i> Đăng xuất</a>
                        </li>

                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            @include('admin.layout.menu')
            <!-- /.navbar-static-side -->
        </nav>