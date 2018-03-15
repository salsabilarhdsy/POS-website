<?php

namespace App\Http\Controllers;

use Validator;
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
    	 $validator = Validator::make($request->all(), [
            'deskripsi' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('newproduct')
                        ->withErrors($validator)
                        ->withInput();
        }

    	$newproduct = new Product;
    	$newproduct->no_product = $request->kodeproduk;
        $newproduct->name = $request->namaproduk;
        $newproduct->price = $request->hargaproduk;
        $newproduct->description = $request->deskripsi;
        $newproduct->category = $request->kategori;
        $newproduct->save();
        return redirect ('ListProducts');
    }

    public function show(Request $request, $id)
    {
    	
    	$findproduct = Product::find($id);
		return view('show_product')->with('product', $findproduct);
    }

    public function editProduct(Request $request, $id)
    {
    	$editproduct = Product::find($id);
    	$editproduct->no_product = $request->kodeproduk;
        $editproduct->name = $request->namaproduk;
        $editproduct->price = $request->hargaproduk;
        $editproduct->description = $request->deskripsi;
        $editproduct->category = $request->kategori;
        $editproduct->save();
        return redirect ('ListProducts');
    }

    public function deleteProduct(Request $request, $id)
    {
    	$deleteproduct = Product::find($id);
    	$deleteproduct->delete();
    	return redirect ('ListProducts');
    }


}
