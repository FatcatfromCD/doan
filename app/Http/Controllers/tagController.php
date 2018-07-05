<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tag;

class tagController extends Controller
{
    public function getDanhSach()
    {
    	$tag= tag::orderBy('id', 'DESC')->paginate(10);
    	return view('admin.tag.danhsach',['tag'=>$tag]);
    }
    public function getThem()
    {
    	return view('admin.tag.them');
    }
    public function postThem(Request $request)
    {
    	$this->validate($request,[
    		'name' => 'required|min:5|unique:tag,name',
    	],
    	[
    		'name.required' =>'Bạn chưa nhập tên thẻ tag',
    		'name.min'=>'Thẻ tag phải có tối thiểu 5 kí tự',
    		'name.unique'=>'Thẻ tag đã tồn tại',
    	]);

    	$tag = new tag;
    	$tag->name=$request->name;
    	$tag->save();

    	return redirect('admin/tag/them')->with('thongbao','Bạn đã thêm thành công');
    }
   public function getSua($id)
    {
    	$tag = tag::find($id);
        return view('admin.tag.sua',['tag'=>$tag]);
    }
    public function postSua(Request $request,$id)
    {
    	$this->validate($request,[
    		'name' => 'required|min:5|unique:tag,name',
    	],
    	[
    		'name.required' =>'Bạn chưa nhập tên thẻ tag',
    		'name.min'=>'Thẻ tag phải có tối thiểu 5 kí tự',
    		'name.unique'=>'Thẻ tag đã tồn tại',
    	]);

    	$tag=tag::find($id);
    	$tag->name=$request->name;
    	$tag->save();

    	return redirect('admin/tag/sua/'.$tag->id)->with('thongbao','Bạn đã sửa thành công');
    }
    public function getXoa($id)
    {
        $tag =tag::find($id);
        $tag ->delete();
        return redirect ('admin/tag/danhsach')->with('thongbao','Xóa thẻ tag thành công');
    }
}
