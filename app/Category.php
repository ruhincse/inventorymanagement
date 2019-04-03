<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
      public function subcats(){
    	return $this->hasMany('App\Subcategory');
    }

     public function products(){
    	return $this->hasMany('App\Product');
    }
}
