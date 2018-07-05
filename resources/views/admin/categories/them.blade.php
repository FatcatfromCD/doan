@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thêm
                            <small>Danh mục</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        {{-- In thông báo chưa nhập đúng --}}

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

                        <form action="admin/categories/them" method="POST">
                            {{-- truyền dữ liệu lên máy chủ --}}
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Tên danh mục</label>
                                <input class="form-control" name="name" placeholder="Vui lòng điền tên danh mục" />
                            </div>
                             <div class="form-group">
                                <label>Danh mục cha</label>
                                <select class="form-control" name='parent_id'>
                                    <option value="0" selected>Vui lòng chọn danh mục</option>
                                    @foreach($theloai as $key => $value)
                                        <option value={{$value->id}}>{{$value->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        
                            <div class="form-group">
                                <label>Miêu tả</label>
                                <textarea class="form-control" rows="3" name="description" placeholder="Nhập miêu tả"></textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-default">Thêm mới</button>
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