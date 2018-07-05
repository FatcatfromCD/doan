<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post_tag extends Model
{
    protected $table = "post_tag";

    public function posts(){
    	return $this->belongsTo('App\posts','post_id','id');
    }

    public function tag(){
    	return $this->belongsTo('App\tag','tag_id','id');
    }
}
