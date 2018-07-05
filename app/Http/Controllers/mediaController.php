<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\media;
use Auth;
class mediaController extends Controller
{
    public function getDanhSach()
    {
    	$media= media::orderBy('id', 'DESC')->paginate(10);
    	return view('admin.media.danhsach',['media'=>$media]);
    }

    public function getThem()
    {
        if(Auth::user()->role != 1)
        return redirect('admin/media/danhsach');
    	return view('admin.media.them');
    }

    public function postThem(Request $request)
    {
        if(Auth::user()->role != 1)
        return redirect('admin/media/danhsach');
    	//check điều kiện
    	$this->validate($request,[
    		'name' => 'required|unique:media,name',
    		'description' =>'required',
            'image' => 'required|mimes:jpeg,jpg,png',
            'type' => 'required|numeric'
    	],
    	[
    		'name.required'=>'Bạn chưa nhập tên media',
            'name.unique'=>'Tên media đã có',
    		'description.required'=>'Bạn chưa nhập miêu tả',
            'image.mimes' => 'Image chưa đúng định dạng',
    	]);
    	//lưu vào database
    	$media = new media;
        $file = $request->file('image');
    	$media->name= $request->name;
    	$media->description=$request->description;
    	$media->image = $file->getClientOriginalName();
    	$media->type=$request->type;
    	$media->path='upload/image';
		
        if ($request->hasFile('image'))
        {
            $file->move($media->path, $media->image);
        }
    	
    	$media->save();
   		 return redirect('admin/media/them')->with('thongbao','Thêm media thành công');
	}
	public function getXoa($id)
    {
        if(Auth::user()->role != 1)
        return redirect('admin/media/danhsach');
        $media =media::find($id);
        $media ->delete();
        return redirect ('admin/media/danhsach')->with('thongbao','Xóa media thành công');
    }
    public function getSua($id)
    {
        if(Auth::user()->role != 1)
        return redirect('admin/media/danhsach');
    	$media = media::find($id);
    	return view('admin/media/sua',['media'=>$media]);
    }
    public function postSua(Request $request,$id)
    {
        if(Auth::user()->role != 1)
        return redirect('admin/media/danhsach');
        //check điều kiện
        $media =media::find($id);
        $this->validate($request,
        [

            'name' =>'required|min:3|max:50',
            'description' =>'required|max:100',
        ],
        [
            'name.required'=>'Bạn chưa nhập tên thể loại',
            'name.min'=>'Thể loại phải tối thiểu 3 kí tự',
            'name.max'=>'Thể loại chỉ có tối đa 50 kí tự',

            'description.required' =>'Chưa nhập miêu tả',
        ]);
        $media->name= $request->name;
    	$media->description=$request->description;
    	$media->image=$request->image;
    	$media->type=$request->type;
    	$media->path=$request->path;
        if ($request->hasFile('image'))
        {
            $file->move($media->path, $media->image);
        }
        $media->save();

        return redirect('admin/media/sua/'.$media->id)->with('thongbao','Sửa thành công');
    }
}