<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

class ListOrderController extends Controller
{
    	public function listOrders(){
    	$orders = DB::table('orders')
    	->join('products_orders', 'orders.id', '=', 'products_orders.order_id')
    	->select('orders.*', 'products_orders.product_id', 'products_orders.product_name', 'products_orders.product_price', 'products_orders.quantity','products_orders.subtotal')
    	->get();
		return view('list_orders')->with('data', $orders);
	}
}
