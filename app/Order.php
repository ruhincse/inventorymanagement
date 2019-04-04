<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    	protected $fillable=['customer_id','order_date','total_products','sub_total','total','payment_type','pay','due'];

    									
}
