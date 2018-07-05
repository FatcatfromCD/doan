<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\comments;
use App\posts;
use App\User;
use App\categories;

class dashboardController extends Controller
{
    public function getDanhSach ()
    {
    	$countComment = comments::all()->count();
    	$countPosts = posts::all()->count();
    	$countUsers = User::all()->count();
    	$countViews = posts::sum('views');
    	$countCategories = categories::all()->count();
    	return view('admin.dashboard.dashboard', compact([
    		'countComment',
    		'countPosts',
    		'countUsers',
    		'countViews',
    		'countCategories',
    	]));
    }
}
