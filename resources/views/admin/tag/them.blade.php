@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thêm
                            <small>Thẻ tag</small>
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
                        <form action="admin/tag/them" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Tên thẻ tag</label>
                                <input class="form-control" name="name" placeholder="Mời nhập tên thẻ tag" required />
                            </div>
                            <button type="submit" class="btn btn-default">Thêm thẻ tag</button>
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