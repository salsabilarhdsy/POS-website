<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductsOrder;
use App\Models\Order;
use Auth;

class DashboardController extends Controller
{
    public function index(){
    	$random = str_random(40);
    	$findproduct=Product::all();
		return view('dashboard')->with('products', $findproduct);
    }

    public function getBarang($no_product){
    	$barang = Product::where('no_product', $no_product)->first();
    	if ($barang) {
			echo '
			<div class="form-group">
				      <label class="control-label col-md-3" 
				      	for="nama_barang">Nama Barang :</label>
				      <div class="col-md-8">
				        <input type="text" class="form-control reset" 
				        	name="nama_barang" id="nama_barang" 
				        	value="'.$barang->name.'"
				        	readonly="readonly">
				      </div>
				    </div>
				    <div class="form-group">
				      <label class="control-label col-md-3" 
				      	for="harga_barang">Harga (Rp) :</label>
				      <div class="col-md-8">
				        <input type="text" class="form-control reset" id="harga_barang" name="harga_barang" 
				        	value="'.$barang->price.'" readonly="readonly">
				      </div>
				    </div>
				    <div class="form-group">
				      <label class="control-label col-md-3" 
				      	for="qty">Quantity :</label>
				      <div class="col-md-4">
				        <input type="number" class="form-control reset" 
				        	name="qty" placeholder="Isi qty..." autocomplete="off" 
				        	id="qty" onchange="subTotal(this.value)" 
				        	onkeyup="subTotal(this.value)" min="0">
				      </div>
				    </div>
				    ';
	    }else{

	    	echo '<div class="form-group">
				      <label class="control-label col-md-3" 
				      	for="nama_barang">Nama Barang :</label>
				      <div class="col-md-8">
				        <input type="text" class="form-control reset" 
				        	name="nama_barang" id="nama_barang" 
				        	readonly="readonly">
				      </div>
				    </div>
				    <div class="form-group">
				      <label class="control-label col-md-3" 
				      	for="harga_barang">Harga (Rp) :</label>
				      <div class="col-md-8">
				        <input type="text" class="form-control reset" 
				        	name="harga_barang" id="harga_barang" 
				        	readonly="readonly">
				      </div>
				    </div>
				    <div class="form-group">
				      <label class="control-label col-md-3" 
				      	for="qty">Quantity :</label>
				      <div class="col-md-4">
				        <input type="number" class="form-control reset" 
				        	autocomplete="off" onchange="subTotal(this.value)" 
				        	onkeyup="subTotal(this.value)" id="qty" min="0"  
				        	name="qty" placeholder="Isi qty...">
				      </div>
				    </div>';

	    }
	}

	public function simpanOrder(Request $request){
            $order = new Order();
	        $order->total = $request->total;
	        $order->user_id= Auth::user()->id;
	        $order->save();
	       
	       $id_input = $request->id_input;
	       foreach ($id_input as $key => $idinput) {
	       	$productid[] = $idinput;
	       }
	       $quantity_input = $request->quantity_input;
	       foreach ($quantity_input as $key => $quantity) {
	       	$qty[] = $quantity;
	       }

	       $subtotal_input = $request->subtotal_input;
	       foreach ($subtotal_input as $key => $sub_total) {
	       	$subtotal[] = $sub_total;
	       }

	       $order_products = new ProductsOrder;
	       $order_products->order_id = $order->id;
	       $order_products->product_id = $productid;
	       $order_products->quantity = $qty;
	       $order_products->subtotal = $subtotal;
	       $order_products->save();






	}
}

