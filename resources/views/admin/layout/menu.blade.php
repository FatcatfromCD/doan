
<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        {{-- Quản lý giao diện cho cộng tác viên --}}
                        @if (Auth::user()->role == 0)

                        <li>
                            <a href="{{ route('trangchu') }}"><i class="glyphicon glyphicon-home"></i> Trang tin tức</a>
                        </li>

                        <li>
                            <a href="#"><i class="glyphicon glyphicon-book"></i> Bài viết<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/posts/danhsach" >Danh sách bài viết</a>
                                </li>
                                <li>
                                    <a href="admin/posts/them">Thêm bài viết</a>
                                </li>
                            </ul>
                        </li>

                         <li>
                            <a href="#"><i class="glyphicon glyphicon-list"></i> Danh mục<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/categories/danhsach">Danh sách danh mục</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#"><i class="glyphicon glyphicon-picture"></i> Media<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/media/danhsach">Danh sách media</a>
                                </li>
                            </ul>
                        </li>
                        @endif


                        {{-- Quản lý giao diện admin --}}
                        @if (Auth::user()->role == 1)

                        <li>
                            <a href="{{ route('trangchu') }}"><i class="glyphicon glyphicon-home"></i> Trang tin tức</a>
                        </li>

                        <li>
                            <a href="#"><i class="glyphicon glyphicon-book"></i> Bài viết<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/posts/danhsach">Danh sách bài viết</a>
                                </li>
                                <li>
                                    <a href="admin/posts/them">Thêm bài viết</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Quản lý users<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/users/danhsach">Danh sách Users</a>
                                </li>
                                <li>
                                    <a href="admin/users/them">Thêm Users</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#"><i class="glyphicon glyphicon-list"></i> Danh mục<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/categories/danhsach">Danh sách danh mục</a>
                                </li>
                                <li>
                                    <a href="admin/categories/them">Thêm danh mục</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#"><i class="glyphicon glyphicon-picture"></i> Media<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/media/danhsach">Danh sách media</a>
                                </li>
                                <li>
                                    <a href="admin/media/them">Thêm media</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#"><i class="glyphicon glyphicon-envelope"></i> Quản lý liên hệ<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/contacts/danhsach">Danh sách liên hệ</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#"><i class="glyphicon glyphicon-star-empty"></i> Quản lý đánh giá<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/rate/danhsach">Danh sách đánh giá</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#"><i class="glyphicon glyphicon-comment"></i> Quản lý bình luận<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/comments/danhsach">Danh sách bình luận</a>
                                </li>
                            </ul>
                        </li>

                         <li>
                            <a href="#"><i class="glyphicon glyphicon-tag"></i> Quản lý thẻ tag<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/tag/danhsach">Danh sách thẻ tag</a>
                                </li>
                                <li>
                                    <a href="admin/tag/them">Thêm thẻ tag </a>
                                </li>
                            </ul>

                        </li>

                        <li>
                            <a href="#"><i class="glyphicon glyphicon-tags"></i> Quản lý bản ghi<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/post_tag/danhsach">Danh sách bản ghi</a>
                                </li>
                                <li>
                                    <a href="admin/post_tag/them">Thêm bản ghi </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="{{route('dashboard')}}"><i class="fa fa-bar-chart-o fa-fw"></i> Thống kê</a>
                        </li>

                        @endif
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>