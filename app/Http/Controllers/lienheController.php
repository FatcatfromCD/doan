<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categories;
use Helper;
use App\contacts;
class lienheController extends Controller
{
    function __construct()
    {
        $this->theloai = categories::all();
        $this->helper = new Helper();
        $this->var_share = ['theloai'=>$this->theloai, 'helper' => $this->helper];
    }
    function lienhe()
    {
        return view('pages.lienhe', $this->var_share);
    }
    function postlienhe(Request $request)
    {

        $this->validate($request,[
            'name' => 'required',
            'email' =>'required|email',
            'content' => 'required',
        ],
        [
            'name.required'=>'Bạn chưa nhập tên',
            'email.required'=>'Bạn chưa nhập email',
            'email.email'=>'Chưa đúng định dạng email',
            'content.required'=>'Bạn chưa nhập nội dung',
        ]);
        //lưu vào database
        $contacts = new contacts;
        $contacts->name= $request->name;
        $contacts->email= $request->email;
        $contacts->content=$request->content;
        $contacts->status=0;
        $contacts->save();
        return redirect('./lienhe')->with('thongbao','Gửi thành công');
    }
}
