<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\posts;
use App\categories;
use Auth;
use Helper;
class indexController extends Controller
{
    function __construct()
    {
        $this->theloai = categories::all();
        $this->helper = new Helper();
        $this->var_share = ['theloai'=>$this->theloai, 'helper' => $this->helper];
    }
    public function getPost()
    {
        //cac bài viết ở trang chủ
    	$latest = posts::where("status", 1)->orderBy('id', 'DESC')->take(4)->get();

        $moviePosts = posts::where("status", 1)->with(['categories', 'media'])->whereIn('categories_id', function($query) {
            $query->select('id')
            ->from('categories')
            ->where('name', 'LIKE', "phim ảnh");
        })->orderBy('id', 'DESC')->take(2)->get();

        $musicPosts = posts::where("status", 1)->with(['categories', 'media'])->whereIn('categories_id', function($query) {
            $query->select('id')
            ->from('categories')
            ->where('name', 'LIKE', "Âm nhạc");
        })->orderBy('id', 'DESC')->take(2)->get();

        $kinhdoanhPosts = posts::where("status", 1)->with(['categories', 'media'])->whereIn('categories_id', function($query) {
            $query->select('id')
            ->from('categories')
            ->where('name', 'LIKE', "Kinh%");
        })->orderBy('id', 'DESC')->take(4)->get();

        $gamePosts = posts::where("status", 1)->with(['categories', 'media'])->whereIn('categories_id', function($query) {
            $query->select('id')
            ->from('categories')
            ->where('name', 'LIKE', "Game%");
        })->orderBy('id', 'DESC')->take(4)->get();

        $fashionPosts = posts::where("status", 1)->with(['categories', 'media'])->whereIn('categories_id', function($query) {
            $query->select('id')
            ->from('categories')
            ->where('name', 'LIKE', "Thời%");
        })->orderBy('id', 'DESC')->take(4)->get();

        $technologyPosts = posts::where("status", 1)->with(['categories', 'media'])->whereIn('categories_id', function($query) {
            $query->select('id')
            ->from('categories')
            ->where('name', 'LIKE', "Công%");
        })->orderBy('id', 'DESC')->take(4)->get();

        $bongdaPosts = posts::where("status", 1)->with(['categories', 'media'])->whereIn('categories_id', function($query) {
            $query->select('id')
            ->from('categories')
            ->where('name', 'LIKE', "Bóng%");
        })->orderBy('id', 'DESC')->take(4)->get();

        $rightlatest = posts::where("status", 1)->orderBy('id', 'DESC')->take(5)->get();
        $rightmostviewest = posts::where("status", 1)->orderBy('views', 'DESC')->take(6)->get();

        $this->var_share['latest'] = $latest;
        $this->var_share['moviePosts'] = $moviePosts;
        $this->var_share['musicPosts'] = $musicPosts;
        $this->var_share['kinhdoanhPosts'] = $kinhdoanhPosts;
        $this->var_share['gamePosts'] = $gamePosts;
        $this->var_share['fashionPosts'] = $fashionPosts;
        $this->var_share['technologyPosts'] = $technologyPosts;
        $this->var_share['bongdaPosts'] = $bongdaPosts;
        $this->var_share['rightlatest'] = $rightlatest;
        $this->var_share['rightmostviewest'] = $rightmostviewest;

        return view('pages.trangchu', $this->var_share);
    }

    function timkiem(Request $request)
    {
        $tukhoa = $request->tukhoa;
        $posts = posts::where('title','like',"%$tukhoa%")->orWhere('description','like',"%$tukhoa%")->orWhere('content','like',"%$tukhoa%")->where("status", 1)->orderBy('id', 'DESC')->take(30)->paginate(10);
        $searchrightlatest = posts::where("status", 1)->orderBy('id', 'DESC')->take(4)->get();
        $searchrightmostviewest = posts::where("status", 1)->orderBy('views', 'DESC')->take(4)->get();
        $this->var_share['searchrightlatest'] = $searchrightlatest;
        $this->var_share['searchrightmostviewest'] = $searchrightmostviewest;
        $this->var_share['posts'] = $posts;
        $this->var_share['tukhoa'] = $tukhoa;

        return view('pages.timkiem',$this->var_share);
    }
}