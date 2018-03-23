<?php

/**
* 
*/
namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
	protected $table = 'orders';
	public function productsOrder()
    {
        return $this->hasMany('App\Models\ProductsOrder');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}