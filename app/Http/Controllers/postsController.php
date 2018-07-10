<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\media;
use App\categories;
use App\posts;
use Auth;
use App\tag;
use App\post_tag;
class postsController extends Controller
{
    public function getDanhSach()

    {
        if(Auth::user()->role == 0)
    	   $posts= posts::with(['categories','media','users'])->where(['status' => 0, 'user_id' => Auth::user()->id])->orderBy('id', 'DESC')->paginate(10);
        else
           $posts= posts::with(['categories','media','users'])->orderBy('id', 'DESC')->paginate(10);
    	return view('admin.posts.danhsach',['posts'=>$posts]);
    }
    public function getThem()
    {
    	$theloai = categories::all();
    	$users = User::all();
        $media = media::all();
        $tags = tag::all();
    	return view('admin.posts.them',compact('theloai', 'users', 'media', 'tags'));
    }
    public function postThem(Request $request)
    {
        $this->validate($request,
        [
            'title' => 'required|min:5',
            'description' => 'required|min:10|',
            'media_id' => 'required',
            'categories_id' => 'required',
            'content'=>'required',
        ],
        [
            'title.required'=> 'Bạn chưa nhập tiêu đề',
            'title.min' => 'Họ tên tối thiểu phải có 5 kí tự',

            'description.required' => 'Bạn chưa nhập miêu tả',
            'description.min' => 'Miêu tả phải có tối thiểu 10 kí tự',


            'media_id.required' => 'Media không được để trống',
            'user_id.required' => 'User không được để trống',

            'categories_id.required' => 'Danh mục không được để trống',

            'content.required'=>'Nội dung không được để trống',

        ]);
         //luu vao database
        $posts = new posts();
        $posts->title=$request->title;
        $posts->description=$request->description;
        $posts->media_id=$request->media_id;
        $posts->content=$request->content;
        $posts->user_id=Auth::user()->id;
        $posts->categories_id=$request->categories_id;
        $posts->views = 0;
        $posts->status = 0;
        if($posts->save() && isset($request->tags)) {
            foreach ($request->tags as $key => $value) {
                $post_tag = new post_tag();
                $post_tag->post_id = $posts->id;
                $post_tag->tag_id = $value;
                $post_tag->save();
            }
        }

        return redirect('admin/posts/them')->with('thongbao','Thêm thành công');
    }
   public function getSua($id)
    {

        $posts = posts::find($id);
        $theloai = categories::all();
        $users = User::all();
        $media = media::all();
        $tags = tag::all();
        if($posts->status == 1 && Auth::user()->role == 0)
           return redirect('/admin/posts/danhsach')->with('error', "Không sửa được ở trạng thái công khai");
        return view('admin/posts/sua',compact('posts', 'theloai', 'users', 'media', 'tags'));
    }

     public function postSua(Request $request,$id)
    {

        $this->validate($request,[
            'title' => 'min:5',
        ],
        [
            'title.min' => 'Tiêu đề tối thiểu phải có 5 kí tự',
            'description.min' => 'Miêu tả phải có tối thiểu 10 kí tự',
        ]);
        $posts=posts::find($id);
        $posts->title=$request->title;
        $posts->description=$request->description;
        $posts->media_id=$request->media_id;
        $posts->content=$request->content;
        $posts->categories_id=$request->categories_id;
        $posts->save();
        foreach ($posts->post_tag as $key => $value) {
            $value->delete();
        }
        if($posts->id && isset($request->tags)) {
            foreach ($request->tags as $key => $value) {
                $post_tag = new post_tag();
                $post_tag->post_id = $posts->id;
                $post_tag->tag_id = $value;
                $post_tag->save();
            }
        }
        return redirect('admin/posts/sua/'.$posts->id)->with('thongbao','Sửa thành công');
    }
    public function getXoa($id)
    {
        $posts =posts::find($id);
        $posts ->delete();
        return redirect ('admin/posts/danhsach')->with('thongbao','Xóa bài viết thành công');
    }

    public function ajaxsua(Request $request)
    {
         if($request->ajax())
           {
                $post = posts::find($request->id);
                $post->status= $request->status;
                if($post->save())
                {
                    $post = posts::find($request->id);
                    $status = $post->status ? 0 : 1 ;
                    return response()->json(['status' => $status] );
                }
           }
    }
}
