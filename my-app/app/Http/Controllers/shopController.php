<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\product;
use Illuminate\Http\Request;

class shopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products=product::paginate(5);
        return view('user.shop.index',compact('products'));

        //
    }
    public function getCategories()
    {

        $categories=Category::all();
        return view('user.categories.index',compact('categories'));

        //
    }
    public function getProductsByCategory(string $id)
    {

      $products=category::find($id)->products()->paginate(5);
      return view('user.shop.index',compact('products'));

        //
    }
    public function searchProductByName(Request $request){

        $products= product ::where('productName','like',"%$request->q%")->paginate();
        if($request->q==" "){
            return redirect()->route('shops.index');

        }
        $categories=category ::all();
        return view( 'user.shop',['products'=>$products,'categories'=>$categories]);
    }
    public function filterProducts($id){
        $products= category ::find($id)->products()->paginate(5);
        $categories=category ::all();
        return view( 'user.shop',['products'=>$products,'categories'=>$categories]);

    }
    public function showProduct($id)
{
    $product = product::findOrFail($id);
    return view('user.shop.show', compact('product'));
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
