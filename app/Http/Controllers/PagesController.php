<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categories;
use Helper;
class PagesController extends Controller
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
}
