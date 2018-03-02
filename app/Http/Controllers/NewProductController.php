<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class NewProductController extends Controller
{
     public function index()
    {
    	return view('new_products');
    }

    public function store(Request $request)
    {
    	$newproduct = new Product;
    	$newproduct->no_product = $request->kodeproduk;
        $newproduct->name = $request->namaproduk;
        $newproduct->price = $request->hargaproduk;
        $newproduct->description = $request->deskripsi;
        $newproduct->category = $request->kategori;
        $newproduct->image = $request->gambarproduk;
        $newproduct->save();
    }

}
