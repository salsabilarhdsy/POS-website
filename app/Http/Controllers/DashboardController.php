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

    public function getBarang($name){
    	$barang = Product::where('name', $name)->first();
    	if ($barang) {
			echo '
			<div class="form-group">
		    	<div class="col-md-8">
			    	<input type="hidden" class="form-control reset" name="no_product" id="no_product" readonly="readonly" value="'.$barang->no_product.'">
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
		        	onkeyup="subTotal(this.value)" min="1">
		      </div>
		    </div>
				    ';
	    }else{

	    	echo '  
	    		<div class="form-group">
		    	<div class="col-md-8">
			    	<input type="hidden" class="form-control reset" name="no_product" id="no_product" readonly="readonly">
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
			$product_name =  $request->name_input;
			$product_price =  $request->price_input;
		    $quantity =  $request->quantity_input;
		    $subtotal =  $request->subtotal_input;
		    $order_id = $order->id;

		    $count = count($product_id);


			for($i = 0; $i < $count; $i++){
			    $objModel = new ProductsOrder();
			    $objModel->order_id = $order_id;
			    $objModel->product_id = $product_id[$i];
			    $objModel->product_name = $product_name[$i];
			    $objModel->product_price = $product_price[$i];
			    $objModel->quantity = $quantity[$i];
			    $objModel->subtotal = $subtotal[$i];
			    $objModel->save();
			}
	return redirect('/');
}
}