<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post_rate extends Model
{
    protected $table = "post_rate";

    public function posts(){
    	return $this->belongsTo('App\posts','post_id','id');
    }
}
