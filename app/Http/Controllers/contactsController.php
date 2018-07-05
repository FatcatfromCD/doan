<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\contacts;
class contactsController extends Controller
{
    public function getDanhSach()
    {
    	$contacts= contacts::orderBy('id', 'DESC')->paginate(10);
    	return view('admin.contacts.danhsach',['contacts'=>$contacts]);
    }
    public function getXoa($id)
    {
    	$contacts =contacts::find($id);
        $contacts ->delete();
        return redirect ('admin/contacts/danhsach')->with('thongbao','Xóa liên hệ thành công');
    }
}
