@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Danh sách
                            <small>Bình luận</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                     @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                        @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Bài viết</th>
                             	<th>Nội dung</th>
                                <th>Xóa</th>
                                {{-- <th>Sửa</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach( $comments as $cmt)
                            <tr class="odd gradeX" align="center">
                                <td>{{$cmt->id}}</td>
                                <td>{{$cmt->posts->title}}</td>
                                <td>{{$cmt->content}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/comments/xoa/{{$cmt->id}}"> Xóa</a></td>
                                {{-- <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/post_tag/sua/{{$ptg->id}}">Sửa</a></td> --}}
                            </tr>
                            @endforeach
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection