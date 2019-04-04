<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderdetails extends Model
{
    protected $fillable=['order_id','product_id','qty','price','total'];
}
