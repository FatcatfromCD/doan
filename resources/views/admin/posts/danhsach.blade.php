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
                        <h4 class="modal-title">Xóa bài viết</h4>
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
                            <small>Bài viết</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                     @endif
                     @if(session('error'))
                        <div class="alert alert-danger">
                            {{session('error')}}
                        </div>
                     @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tiêu đề</th>
                                <th>Miêu tả</th>
                                <th>Hình ảnh</th>
                                {{-- <th>Nội dung</th> --}}
                                <th>Tác giả</th>
                                <th>Danh mục</th>
                                <th>Lượt xem</th>
                                @if(Auth::user()->role != 0)
                                <th>Trạng thái</th>
                                @endif
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach($posts as $key => $pt)

                            <tr class="odd gradeX" align="center">
                                <td>{{$pt->id}}</td>
                                <td>{{$pt->title}}</td>
                                <td>{{$pt->description}}</td>
                                <td>
                                    <img width="80px" src="upload/image/{{$pt->media->image}}">
                                </td>
                                {{-- <td>{!! $contents[$key] !!}</td> --}}
                                {{-- <td>{!! str_limit($pt->content, 150, "...") !!}</td> --}}
                                <td>{{$pt->users->name}}</td>
                                <td>{{$pt->categories->name}}</td>
                                <td>{{$pt->views}}</td>
                                @if(Auth::user()->role != 0)
                                    @if($pt->status )
                                        <td id='st{{$pt->id}}' ><button  onclick='ChangeStatus(0, {{$pt->id}}, this)' class='btn btn-default' style='color:white;background: green'><i class="fa fa-check"></i></button></td>
                                    @else
                                        <td id='st{{$pt->id}}'><button id='st{{$pt->id}}' onclick='ChangeStatus(1, {{$pt->id}}, this)' class='btn btn-default' style='color:white;background: red'><i class="fa fa-close"></i></button></td>
                                    @endif
                                @endif
                                <td class="center">
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal" onclick="pass_id({{$pt->id}})"><i class="glyphicon glyphicon-trash" ></i></button>
                                    <!--<a href="admin/posts/xoa/{{$pt->id}}"> Xóa</a> -->
                                </td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/posts/sua/{{$pt->id}}">Sửa</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class='paginate'>
                        {{ $posts->links() }}
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection
@section('script')
<script type="text/javascript">
     function ChangeStatus(status, id, btn)
        {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var data = {
                "status": status,
                "id": id,
                "_token": CSRF_TOKEN
            }
            console.log(data);
            $.post('./admin/posts/suaajax', data).done(function(dataa)
                {

                    if(dataa.status == 0)
                    {
                        $(`#st${id}`).html(`<td id='st${id}'><button  onclick='ChangeStatus(0, ${id}, this)' class='btn btn-default' style='color:white;background: green'><i class="fa fa-check"></i></button></td>`)
                    }
                    else
                    $(`#st${id}`).html(`<td id='st${id}'><button  onclick='ChangeStatus(1, ${id}, this)' class='btn btn-default' style='color:white;background: red'><i class="fa fa-close"></i></button></td>`)
                }
            )
        }
    function pass_id(id) {
        var del = document.getElementById('modal_delete');
        del.setAttribute('href', `admin/posts/xoa/${id}`);
    }
</script>
@endsection