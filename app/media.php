<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class media extends Model
{
    protected $table = "media";

    public function posts()
    {
    	return $this->hasMany('App\posts','media_id','id');
    }
}
