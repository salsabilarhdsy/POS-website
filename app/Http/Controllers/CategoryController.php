<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function category()
    {
        return view('new_category');
    }

	public function newcategory(Request $request)
    {
    	 $validator = Validator::make($request->all(), [
            'category' => 'required',
            'codename' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('newcategory')
                        ->withErrors($validator)
                        ->withInput();
        }

    	$newcategory = new Category;
    	$newcategory->category = $request->category;
        $newcategory->code_name = $request->codename;
        $newcategory->save();
        return redirect ('ListCategory');
    }

    public function listCategory(){
        $listCategory = Category::all();
        return view('listcategory')->with('data', $listCategory);
    }
    public function deleteCategory(Request $request, $id)
    {
        $deletecategory = Category::find($id);
        $deletecategory->delete();
        return redirect ('ListCategory');
    }
}