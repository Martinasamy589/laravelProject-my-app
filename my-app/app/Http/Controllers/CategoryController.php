<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    //
    public function index(){
        $categories=Category::all();
        return view('admin.categories.index',compact('categories')); 
    }

    public function create(){
        return view('admin.categories.create');
    }
    public function store(Request $request){
        $request->validate([
            'category_name' =>'required|min:5|max:25'
        ]);
        Category::create([
            'category_name' =>$request->category_name
        ]);
        return redirect()->route('categories.index');
    }
    public function destroy($id){
        $category=Category::find($id);
        $category->delete();
        return redirect()->route('categories.index');
    }
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->category_name = $request->input('category_name');
        $category->save();
    
        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    

}
