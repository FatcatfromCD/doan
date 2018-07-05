@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thêm
                            <small>Media</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    {{-- in thông báo lỗi --}}

                        @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                            {{$err}}<br>
                            @endforeach
                        </div>
                        @endif

                        {{-- In thông báo thành công --}}
                        @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                        @endif
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="admin/media/them" method="POST" enctype="multipart/form-data">
                        	{{-- truyền dữ liệu lên máy chủ --}}
                        	<input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Tên media</label>
                                <input class="form-control" name="name" placeholder="Mời nhập tên hình ảnh" required />
                            </div>
                            
                            <div class="form-group">
                                <label>Miêu tả</label>
                                <textarea class="form-control" rows="3" name="description" placeholder="Nhập miêu tả"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Media</label>
                                <input class="form-control" type="file" name="image" placeholder="Chọn hình ảnh" required />
                            </div>
                            <div class="form-group">
                                <label>Thể loại</label>
                                <label class="radio-inline">
                                    <input name="type" value="1" type="radio" checked>Hình ảnh
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Thêm media</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection