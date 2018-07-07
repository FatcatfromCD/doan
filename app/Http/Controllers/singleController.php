<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\posts;
use App\categories;
use App\post_rate;
use Auth;
use Helper;

class singleController extends Controller
{
    function __construct()
    {
        $this->theloai = categories::all();
        $this->helper = new Helper();
        $this->var_share = ['theloai'=>$this->theloai, 'helper' => $this->helper];
    }
    function single($id)
    {
        $singlerightlatest = posts::where("status", 1)->orderBy('id', 'DESC')->take(6)->get();
        $singlerightmostviewest = posts::where("status", 1)->orderBy('views', 'DESC')->take(6)->get();
        $bottommostviewest = posts::where("status", 1)->orderBy('views', 'DESC')->take(3)->get();
        $this->var_share['bottommostviewest'] = $bottommostviewest;
        $this->var_share['singlerightmostviewest'] = $singlerightmostviewest;
        $this->var_share['singlerightlatest'] = $singlerightlatest;
    	$post  = posts::find($id);
        $post->views += 1;
        $post->save();
        $this->var_share['post'] = posts::find($id);
        $avg = post_rate::where('post_id', '=',  $id)->avg('rate');
        $this->var_share['rate'] = round($avg);
        return view('pages.single', $this->var_share);
    }

    function rate($id, $number)
    {
        $post_rate = new post_rate();
        $post_rate->rate = $number;
        $post_rate->post_id = $id;
        $post_rate->save();
        return redirect()->back();
    }
}
