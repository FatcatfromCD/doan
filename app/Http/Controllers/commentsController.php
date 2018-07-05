<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\comments;
use App\posts;
class commentsController extends Controller
{
    public function getDanhSach()
    {
    	$comments= comments::with(['posts'])->orderBy('id', 'DESC')->paginate(10);

    	return view('admin.comments.danhsach',['comments'=>$comments]);
    }
    public function getXoa($id)
    {
        $comments =comments::find($id);
        $comments ->delete();
        return redirect ('admin/comments/danhsach')->with('thongbao','Xóa comment thành công');
    }
}
