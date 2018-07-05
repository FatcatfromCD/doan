<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\categories;
use Auth;

class categoriesController extends Controller
{
    public function getDanhSach()
    {
    	$theloai = categories::with(['parent', 'posts'])->orderBy('id', 'DESC')->paginate(10);

    	return view('admin.categories.danhsach',['theloai'=>$theloai]);
    }
    //nhan du lieu
    public function getThem()
    {
        if(Auth::user()->role != 1)
        return redirect('admin/categories/danhsach');
        $theloai = categories::all()->where('parent_id', 0);
    	return view('admin.categories.them', ['theloai' => $theloai]);
    }
    //truyen du lieu
    public function postThem(Request $request)
    {
        if(Auth::user()->role != 1)
        return redirect('admin/categories/danhsach');
        //check dieu kien
        $this->validate($request,[
            'name' =>'required|min:3|max:50',
            'description' =>'required|max:100',
        ],
        [
            'name.required'=>'Bạn chưa nhập tên thể loại',
            'name.min'=>'Thể loại phải tối thiểu 3 kí tự',
            'name.max'=>'Thể loại chỉ có tối đa 50 kí tự',

            'description.required' =>'Bạn chưa nhập miêu tả',
            'description.max' =>'Miêu tả chỉ có tối đa 100 kí tự',
        ]);
        //luu vao database
        $theloai = new categories();
        $theloai->name=$request->name;
        $theloai->parent_id=$request->parent_id;
        $theloai->description=$request->description;
        $theloai->save();

        return redirect('admin/categories/them')->with('thongbao','Thêm thành công');
    }
     public function getSua($id)
    {
        if(Auth::user()->role != 1)
        return redirect('admin/categories/danhsach');
        $theloai = categories::find($id);
        $cats = categories::where([["id", "<>", $theloai->id],['parent_id', 0] ])->get();
        return view('admin.categories.sua',['theloai'=>$theloai, 'cats' => $cats]);
    }

    public function postSua(Request $request,$id)
    {
        if(Auth::user()->role != 1)
        return redirect('admin/categories/danhsach');
        //check điều kiện
        $theloai =categories::find($id);
        $this->validate($request,
        [

            'name' =>'required|min:3|max:50',
            'description' =>'required|max:100',
        ],
        [
            'name.required'=>'Bạn chưa nhập tên thể loại',
            'name.min'=>'Thể loại phải tối thiểu 3 kí tự',
            'name.max'=>'Thể loại chỉ có tối đa 50 kí tự',
        ]);
        $theloai->name = $request->name;
        $theloai->parent_id = $request->parent_id;
        $theloai->description=$request->description;
        $theloai->save();

        return redirect('admin/categories/sua/'.$theloai->id)->with('thongbao','Sửa thành công');
    }

    public function getXoa($id)
    {
        if(Auth::user()->role != 1)
        return redirect('admin/categories/danhsach');
        $theloai =categories::find($id);
        $theloai ->delete();
        return redirect ('admin/categories/danhsach')->with('thongbao','Xóa danh mục thành công');
    }
}
