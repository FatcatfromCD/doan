@extends('admin.layout.index')

@section('content')
   <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thêm
                            <small>Bản ghi</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
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
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="admin/post_tag/them" method="POST">
                        	{{-- truyền dữ liệu lên máy chủ --}}
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Bài viết</label>
                                <select class="form-control" name='post_id'>
                                    <option value="0" selected>Vui lòng chọn bài viết</option>
                                    @foreach($posts as $pt)
                                        <option value="{{ $pt->id }}">{{ $pt->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Thẻ tag</label>
                                <select class="form-control" name='tag_id'>
                                    <option value="0" selected>Vui lòng chọn thẻ tag</option>
                                    @foreach($tag as $tg )
                                        <option value="{{$tg->id}}">{{$tg->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-default">Thêm bản ghi</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection