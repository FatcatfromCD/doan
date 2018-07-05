@extends('admin.layout.index')

@section('content')

<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Trigger the modal with a button -->
                <!-- Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Xóa thẻ tag</h4>
                      </div>
                      <div class="modal-body">
                        <p>Bạn có muốn xóa không?</p>
                      </div>
                      <div class="modal-footer">
                        <a id='modal_delete' href="#" class="btn btn-danger" >Xóa</a>
                        <button  type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Danh sách
                            <small>Thẻ tag</small>
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
                                <th>Tên</th>
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach( $tag as $tg)
                            <tr class="odd gradeX" align="center">
                                <td>{{$tg->id}}</td>
                                <td>{{$tg->name}}</td>
                                <td class="center">
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal" onclick="pass_id({{$tg->id}})"><i class="glyphicon glyphicon-trash" ></i></button>
                                    <!--<a href="admin/posts/xoa/{{$tg->id}}"> Xóa</a> -->
                                </td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/tag/sua/{{$tg->id}}">Sửa</a></td>
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
@section('script')
<script type="text/javascript">
        function pass_id(id) {

            var del = document.getElementById('modal_delete');
            console.log(del)
            del.setAttribute('href', `admin/tag/xoa/${id}`);
        }
</script>
@endsection