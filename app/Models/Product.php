<?php

/**
* 
*/
namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
	protected $table = 'products';
	
	
	public function order()
    {
        return $this->belongsToMany('App\Models\Order','products_orders');
    }
}