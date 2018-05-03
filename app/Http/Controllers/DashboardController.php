<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductsOrder;
use App\Models\Order;
use Auth;
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;

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

	        $data = array(
			'product_id' =>  $request->id_input,
			'product_name' =>  $request->name_input,
			'product_price' =>  $request->price_input,
		    'quantity' =>  $request->quantity_input,
		    'subtotal' =>  $request->subtotal_input,
		    'total' =>  $request->total,
		    'bayar' =>  $request->bayar,
		    'kembali' =>  $request->kembali,
		    'order_id' => $order->id,
		    'created_at' => $order->created_at,
		    );

		    $count = count($data['product_id']);


			for($i = 0; $i < $count; $i++){
			    $objModel = new ProductsOrder();
			    $objModel->order_id = $data['order_id'];
			    $objModel->product_id = $data['product_id'][$i];
			    $objModel->product_name = $data['product_name'][$i];
			    $objModel->product_price = $data['product_price'][$i];
			    $objModel->quantity = $data['quantity'][$i];
			    $objModel->subtotal = $data['subtotal'][$i];
			    $objModel->save();
			};

	$listproducts = ProductsOrder::where('order_id', '=', $data['order_id'])->get();
	return view('invoice')->with('data', $data)->with('listproducts', $listproducts);	

	}
}