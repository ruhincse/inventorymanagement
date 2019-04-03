<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employeer extends Model
{
   public function attendances(){
   	return $this->hasMany('App\Attandance','user_id');
   }
}
