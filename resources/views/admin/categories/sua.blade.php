@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Danh mục
                            <small>{{$theloai->name}}</small>
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

                        <form action="admin/categories/sua/{{$theloai->id}}" method="POST">
                            <div class="form-group">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <label>Tên danh mục</label>
                                <input class="form-control" name="name" placeholder="" value="{{$theloai->name}}" />
                            </div>
                            <div class="form-group">
                                <label>Danh mục cha</label>
                                <select class="form-control" name='parent_id'>
                                    <option value="0" selected>Vui lòng chọn danh mục</option>
                                    @foreach($cats as $key => $value)
                                        <option value="{{$value->id}}" {{ $theloai->parent_id == $value->id ? "selected" : ""}}>{{$value->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            

                            <div class="form-group">
                                <label>Miêu tả</label>
                                <textarea class="form-control" rows="3" name="description" placeholder="Nhập miêu tả" >{{$theloai->description}}</textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                            {{--  <div class="form-group">
                                <label>Category Status</label>
                                <label class="radio-inline">
                                    <input name="rdoStatus" value="1" checked="" type="radio">Visible
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoStatus" value="2" type="radio">Invisible
                                </label>
                            </div> --}}
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection