@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Bài viết
                            <small>{{$posts->title}}</small>
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
                        <form action="admin/posts/sua/{{$posts->id}}" method="POST">
                            
                            {{-- truyền dữ liệu lên máy chủ --}}
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Tiêu đề</label>
                                <input class="form-control" name="title" placeholder="Vui lòng điền tiêu đề bài viết" value="{{$posts->title}}" />
                            </div>
                            <div class="form-group">
                                <label>Miêu tả</label>
                                <textarea class="form-control" rows="3" name="description" placeholder="Nhập miêu tả">{{$posts->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <select class="form-control" name='media_id'>
                                    <option value="0" selected>Vui lòng chọn hình ảnh</option>
                                    @foreach($media as $me)
                                        <option value="{{ $me->id }}"
                                        	@if ($me->id == $posts->media_id)
                                        		selected
                                        	@endif 
                                        	>{{ $me->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            
                             <div class="form-group">
                                <label>Danh mục</label>
                                <select class="form-control" name='categories_id'>
                                    <option value="0" selected>Vui lòng chọn danh mục</option>
                                    @foreach($theloai as $tl)
                                        <option value="{{ $tl->id }}"
                                        	@if ($tl->id == $posts->categories_id)
                                        		selected
                                        	@endif 
                                        	>{{ $tl->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea id="demo"  class="form-control ckeditor" rows="3" name="content" placeholder="Nhập nội dung">{{$posts->content}}</textarea>
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