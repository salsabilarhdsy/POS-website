<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ListProductController extends Controller
{
    public function listProducts(){
		$listProducts = Product::all();
		return view('list_products')->with('data', $listProducts);
	}
}
