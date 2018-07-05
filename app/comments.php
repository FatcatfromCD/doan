<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    protected $table = "comments";

    public function posts(){
    	return $this->belongsTo('App\posts','post_id','id');
    }
}
