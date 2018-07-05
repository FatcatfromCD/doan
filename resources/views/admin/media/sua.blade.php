@extends('admin.layout.index')

@section('content')

<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Media
                            <small>{{$media->name}}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px"> 

                        {{-- Thông báo lỗi --}}
                        @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                            {{$err}}<br>
                            @endforeach
                        </div>
                        @endif

                        @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                        @endif
                        <form action="admin/media/sua/{{$media->id}}" method="POST">

                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">

                                <label>Tên media</label>
                                <input type="name"class="form-control" name="name" placeholder="Xin mời nhập họ tên" value="{{$media->name}}" />
                            </div>
                            
                            <div class="form-group">
                                <label>Miêu tả</label>
                                <textarea class="form-control" rows="3" name="description" >{{$media->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Media</label>
                                <input class="form-control" type="file" name="image"  />
                            </div>
                            <div class="form-group">
                                <label>Đường dẫn</label>
                                <input class="form-control" name="path" value="{{$media->path}}" />
                            </div>
                            <div class="form-group">
                                <label>Thể loại</label>
                                <label class="radio-inline">
                                    <input name="type" value="1" {{ $media->type == 1 ? "checked" : ""}} type="radio">Hình ảnh
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Sửa</button>
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