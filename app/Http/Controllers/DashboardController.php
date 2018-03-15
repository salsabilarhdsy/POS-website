<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index(){
    	$listProducts = Product::all();
		return view('dashboard')->with('data', $listProducts);
    }

}
