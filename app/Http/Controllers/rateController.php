<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\posts;
use App\post_rate;
use Auth;

class rateController extends Controller
{
    public function getDanhSach()
    {
    	$rate= post_rate::orderBy('id', 'DESC')->paginate(10);
    	return view('admin.rate.danhsach',['rate'=>$rate]);
    }
    public function getXoa($id)
    {
        if(Auth::user()->role != 1)
        return redirect('admin/rate/danhsach');
        $rate =post_rate::find($id);
        $rate ->delete();
        return redirect ('admin/rate/danhsach')->with('thongbao','Xóa đánh giá thành công');
    }
}
