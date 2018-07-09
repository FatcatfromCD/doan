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
                <h4 class="modal-title">Xóa đánh giá</h4>
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
                    <small>Đánh giá</small>
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
                        <th>Đánh giá</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $rate as $key => $r)
                    <tr class="odd gradeX" align="center">
                        <td>{{$r->id}}</td>
                        <td>{{$r->posts->title}}</td>
                        <td>{{$r->rate}} sao</td>
                        </td>
                        <td class="center">
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal" onclick="pass_id({{$r->id}})"><i class="glyphicon glyphicon-trash" ></i></button>
                            <!--<a href="admin/posts/xoa/{{$r->id}}"> Xóa</a> -->
                    </tr>
                    @endforeach
            </table>
            <div class='paginate'>
                {{ $rate->links() }}
            </div>
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
            del.setAttribute('href', `admin/rate/xoa/${id}`);
        }
</script>
@endsection