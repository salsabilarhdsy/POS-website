<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class NewProductController extends Controller
{
     public function index()
    {
        $findcategories = Category::all();
        return view('new_products')->with('categories', $findcategories);
    }

    public function store(Request $request)
    {
    	 $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'namaproduk' => 'required',
            'hargaproduk' => 'required',
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
        $newproduct->category_id = $request->category_id;
        $newproduct->save();
        return redirect ('ListProducts');
    }

    public function show(Request $request, $id)
    {
    	
    	$data['findproduct'] = Product::with('category')->find($id);
        $data['findcategories'] = Category::all();
    
		return view('show_product', ['data'=>$data]);
    }

    public function editProduct(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'namaproduk' => 'required',
            'hargaproduk' => 'required',
        ]);
          if ($validator->fails())
        {
            return redirect('editproduct/'.''.$id)
            ->withErrors($validator)
            ->withInput();
        }
    	$editproduct = Product::find($id);
    	$editproduct->no_product = $request->kodeproduk;
        $editproduct->name = $request->namaproduk;
        $editproduct->price = $request->hargaproduk;
        $editproduct->category_id = $request->category_id;
        $editproduct->save();
        return redirect ('ListProducts');
    }

    public function deleteProduct(Request $request, $id)
    {
    	$deleteproduct = Product::find($id);
    	$deleteproduct->delete();
    	return redirect ('ListProducts');
    }

    public function getCategory($id){

        $digits = 3;
        $no_product = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);

        $category = Category::where('id', $id)->first();
        if ($category){
            echo $category->code_name . "" . $no_product;
        }else{

            echo '';
        }
    }

}
