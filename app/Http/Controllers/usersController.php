<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth; //sử dụng class đăng nhập
class usersController extends Controller
{
    public function getDanhSach()
    {
    	$users = User::orderBy('id', 'DESC')->paginate(10);
    	return view('admin.users.danhsach',['users'=>$users]);
    }
    public function getThem()
    {
    	return view('admin.users.them');
    }
    public function postThem(Request $request)
    {
        //check điều kiện

    	$this->validate($request,
    	[
    		'name' => 'required|min:5',
    		'password' => 'required|min:3|max:16',
    		'passwordAgain' => 'required|same:password',
    		'email' => 'required|email|unique:users,email',
    	],
    	[
    		'name.required'=> 'Bạn chưa nhập họ tên',
    		'name.min' => 'Họ tên tối thiểu phải có 5 kí tự',

    		'password.required' => 'Bạn chưa nhập mật khẩu',
    		'password.min' => 'Mật khẩu phải có tối thiếu 3 kí tự',
    		'password.max' => 'Mật khẩu chỉ được tối đa 16 kí tự',

    		'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
    		'passwordAgain.same' => 'Mật khẩu nhập lại chưa đúng',

    		'email.required' => 'Bạn chưa nhập địa chỉ email',
    		'email.email' => 'Email của bạn chưa đúng định dạng',
    		'email.unique' => 'Email đã tồn tại',

    		
    	]);

        
        //lưu csdl
    	$users=new User();
    	$users->name = $request->name;
    	$users->password = bcrypt($request->password);
    	$users ->email = $request ->email;
        $users ->birthday = $request ->birthday;
        $users ->gender = $request ->gioitinh;
        $users ->phone = $request ->phone;
    	$users ->role = $request ->quyen ;
    	$users->save();
    	return redirect('admin/users/them')->with('thongbao','Thêm thành công');
    }
    public function getSua($id)
    {
    	$users = User::find($id);
        return view('admin.users.sua',['users'=>$users]);
    }

    public function postSua(Request $request,$id)
    {
       
        //check điều kiện
        $this->validate($request,[

            'name' => 'required|min:5|',
            'email' => 'required|email|',
        ],
        [
            'name.required'=> 'Bạn chưa nhập họ tên',
            'name.min' => 'Họ tên tối thiểu phải có 5 kí tự',
            // 'name.unique' => 'Tên của bạn đã tồn tại',

            'email.required' => 'Bạn chưa nhập địa chỉ email',
            'email.email' => 'Email của bạn chưa đúng định dạng',
            // 'email.unique' => 'Email đã tồn tại',
        ]
        );
        $users=User::find($id);
        $users->name = $request->name;
        $users ->email = $request ->email;
        $users ->birthday = $request ->birthday;
        $users ->gender = $request ->gioitinh;
        $users ->phone = $request ->phone;
        $users ->role = $request ->quyen == NULL ? Auth::user()->role : $request ->quyen;
        if( isset($request->changePassword) )
        {
            $this->validate($request,[
                'password' => 'min:3|required_with:passwordAgain|same:passwordAgain',
                'passwordAgain' => 'min:3|same:password',
            ],
            [
                'password.required_with' =>'Mật khẩu không được để trống',
                'password.min'=> 'Mật khẩu tối thiểu 3 kí tự',
                'password.same'=>'Mật khẩu phải giống mật khẩu xác nhận',
                'passwordAgain.min'=>'Mật khẩu nhập lại tối thiểu 3 kí tự',
                'passwordAgain.same'=>'Mật khẩu nhập lại phải khớp',
            ]
        );

            $users->password = bcrypt($request->password);
        }
        $users->save();
        if(Auth::user()->id == $id)
            return redirect('admin/users/profile')->with('thongbao','Sửa thành công');
        return redirect('admin/users/sua/'.$users->id)->with('thongbao','Sửa thành công');
        }

    public function getXoa($id)
    {
        $users =User::find($id);
        $users ->delete();
        return redirect ('admin/users/danhsach')->with('thongbao','Xóa người dùng thành công');
    }
    public function getDangnhapAdmin()
    {
        return view('admin.login');
    }
    public function postDangnhapAdmin(Request $request)
    {
        $this->validate($request,[
            'email'=> 'required',
            'password'=> 'required',
        ],
        [
            'email.required'=> 'Bạn chưa nhập email',
            'password.required'=> 'Bạn chưa nhập password',
        ]);
        //kiem tra dang nhap
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
            {
                return redirect('admin/posts/danhsach');
            }
            else
            {
                return redirect('admin/dangnhap')->with('thongbao','Đăng nhập không thành công');
            }
    }
    public function getDangxuatAdmin()
    {
        Auth::logout();
        return redirect('admin/dangnhap');
    }

    function getProfile()
    {
        $users = Auth::user();
        return view('admin.profile.changeprofile')->with(['users' => $users]);
    }
}
