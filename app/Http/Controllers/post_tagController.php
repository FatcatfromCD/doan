<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post_tag;
use App\posts;
use App\tag;
class post_tagController extends Controller
{
    public function getDanhSach()
    {
    	$post_tag= post_tag::with(['tag','posts'])->orderBy('id', 'DESC')->paginate(10);
    	return view('admin.post_tag.danhsach',['post_tag'=>$post_tag]);
    }
    public function getThem()
    {

    	$tag = tag::all();
    	$posts = posts::all();
    	return view('admin.post_tag.them',compact('tag', 'posts'));
    }
    public function postThem(Request $request)
    {
    	//check điều kiện
    	$this->validate($request,[
    		'post_id' => 'required',
            'tag_id' => 'required',
    	],
    	[
    		'post_id.required'=>'Bài viết không được để trống',
    		'tag_id.required'=>'Thẻ tag không được để trống',
    	]);
    	//lưu vào database
    	$post_tag = new post_tag();
        $post_tag->post_id=$request->post_id;
        $post_tag->tag_id=$request->tag_id;
 		$post_tag->save();

 		return redirect('admin/post_tag/them')->with('thongbao','Thêm thành công');
    }
    public function getSua($id)
    {
        $post_tag = post_tag::find($id);
        $posts = posts::all();
        $tag = tag::all();
        return view('admin/post_tag/sua',compact('post_tag', 'posts', 'tag'));
    }
     public function postSua(Request $request,$id)
    {
     
        $post_tag = post_tag::find($id);
        $post_tag->post_id=$request->post_id;
        $post_tag->tag_id=$request->tag_id;
        $post_tag->save();
        

        return redirect('admin/post_tag/sua/'.$post_tag->id)->with('thongbao','Sửa thành công');
    }
    public function getXoa($id)
    {
        $post_tag =post_tag::find($id);
        $post_tag ->delete();
        return redirect ('admin/post_tag/danhsach')->with('thongbao','Xóa bài viết thành công');
    }
}
