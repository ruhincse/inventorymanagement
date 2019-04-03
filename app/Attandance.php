<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attandance extends Model
{
    	protected $fillable=['user_id','attendance','edit_date','date','month','year'];

    	public function employeer(){
    		return $this->belongsTo('App\Employeer');
    	}
}
