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
			<input type="hidden" class="form-control reset" name="id_produk" id="id_produk" readonly="readonly" value="'.$barang->id.'">
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

			$product_id =  $request->id_input;
		    $quantity =  $request->quantity_input;
		    $subtotal =  $request->subtotal_input;
		    $order_id = $order->id;

		    $count = count($product_id);


			for($i = 0; $i < $count; $i++){
			    $objModel = new ProductsOrder();
			    $objModel->order_id = $order_id;
			    $objModel->product_id = $product_id[$i];
			    $objModel->quantity = $quantity[$i];
			    $objModel->subtotal = $subtotal[$i];
			    $objModel->save();
			}
	return redirect('/');
}
}