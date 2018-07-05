<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categories;
use Helper;
use App\posts;
class detailController extends Controller
{
    function __construct()
    {
        $this->theloai = categories::all();
        $this->helper = new Helper();
        $this->var_share = ['theloai'=>$this->theloai, 'helper' => $this->helper];
    }
    public function getPost($id, $theloai)
    {
        $cat = categories::find($id);
        $posts = posts::where("categories_id", $id)->where("status", 1)->orderBy('id', 'DESC')->paginate(6);
        $detailrightlatest = posts::where("status", 1)->orderBy('id', 'DESC')->take(4)->get();
        $detailrightmostviewest = posts::where("status", 1)->orderBy('views', 'DESC')->take(5)->get(); 
        $this->var_share['detailrightmostviewest'] = $detailrightmostviewest;
        $this->var_share['detailrightlatest'] = $detailrightlatest;
        $this->var_share['cat'] = $cat;  
        $this->var_share['posts'] = $posts;  
        
        return view('pages.detail', $this->var_share);
    }

}
