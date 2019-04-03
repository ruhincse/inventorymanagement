<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category(){
    	return $this->belongsTo('App\Category');
    }

    public function subcat(){
    	return $this->belongsTo('App\Subcategory','subcategory_id');
    }

}
