<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    protected $table = "tag";

    public function post_tag(){
    	return $this->hasMany('App\post_tag','tag_id','id');
    }
}