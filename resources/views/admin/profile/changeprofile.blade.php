@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thông tin cá nhân
                            <small>{{$users->name}}</small>
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
                        <form action="admin/users/sua/{{$users->id}}" method="POST">

                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                          

                            <div class="form-group">

                                <label>Họ tên</label>
                                <input type="name"class="form-control" name="name" placeholder="Xin mời nhập họ tên" value="{{$users->name}}" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Xin mời nhập địa chỉ email" value="{{$users->email}}" />
                            </div>
                            <div class="form-group">
                                <label>Ngày sinh</label>
                                <input type="date" class="form-control" name="birthday" value="{{$users->birthday}}" />
                            </div>
                            <div class="form-group">
                                <label>Giới tính</label>
                                <label class="radio-inline">
                                    <input name="gioitinh" value="1" {{Auth::user()->gender == 1 ? "checked" : ""}} type="radio">Nam
                                </label>
                                <label class="radio-inline">
                                    <input name="gioitinh" {{Auth::user()->gender == 0 ? "checked" : ""}} value="0" type="radio">Nữ
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input type="string" class="form-control" name="phone" placeholder="Xin mời nhập số điện thoại" value="{{$users->phone}}" />
                            </div>
                            <div>
                            	<input type="checkbox" name="changePassword" id="changePassword">
                            	<label>Đổi mật khẩu</label>
                            	<input type="password" class="form-control password" name="password" aria-describedby="basic-addon1" disabled>
                            </div>
                            <br>
                            <div>
                            	<label>Nhập lại mật khẩu</label>
                            	<input type="password" class="form-control password" name="passwordAgain" aria-describedby="basic-addon1" disabled>
                            </div>
                            <br>
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

@section('script')
<script>
	$(document).ready(function(){
		$("#changePassword").change(function()
		{
			if ($(this).is(":checked")) {
                $("input[name=password]").removeAttr('disabled');
				$("input[name=passwordAgain]").removeAttr('disabled');
			}
			else
			{
                $("input[name=password]").attr('disabled','');
				$("input[name=passwordAgain]").attr('disabled','');
			}
		});
	});
</script>
@endsection