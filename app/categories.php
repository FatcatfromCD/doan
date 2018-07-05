<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    protected $table = "categories";
    protected $fillable = ['name', 'description', 'parent_id'];


    public function posts()
    {
    	return $this->hasMany('App\posts','categories_id','id');
    }

    public function parent()
    {
    	return $this->hasOne('App\categories', 'id', 'parent_id');
    }
    //eeeeeeee
}
