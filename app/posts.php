<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    protected $table = "posts";

    public function categories()
    {
    	return $this->belongsTo('App\categories','categories_id','id');
    }

    public function comments(){
    	return $this->hasMany('App\comments','post_id','id');
    }

    public function media(){
    	return $this->belongsTo('App\media','media_id','id');
    }

    public function post_tag(){
    	return $this->hasMany('App\post_tag','post_id','id');
    }
    public function users(){
        return $this->belongsTo('App\User','user_id','id');
    }
    public function post_rate(){
    	return $this->hasMany('App\post_rate','post_id','id');
    }

}
