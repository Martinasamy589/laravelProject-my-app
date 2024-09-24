<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('isAdmin')->only(['index','create', 'store', 'destroy', 'update','edit']);
    }
    public function index()
    {
        //
        $products=Product::paginate(5);
        return view('admin.products.index',compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     */
    
    public function create()
    {
        //
        if(Auth::user()->role==='admin'){
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'product_name' =>'required|min:5|max:50',
            'description' =>'required|min:20',
            'product_price' =>'required|numeric',
            'product_image' =>'mimes:png,bmp,jpg,jpeg',
        ]);


        
        $image_extension = $request->product_image->extension();
        $image_name=time() . '.' . $image_extension;

        Storage::put("/public/product_images/$image_name",file_get_contents($request->product_image));
        
        Product::create([
            'productName'=>$request->product_name,
            'description'=>$request->description,
            'price'=>$request->product_price, 
            'image'=>$image_name, 
            'category_id'=>$request->category_id,

        ]);
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $categories=Category::all();
        $product=Product::find($id);

        return view('admin.products.edit',['categories'=>$categories, 'product'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'product_name' =>'required|min:5|max:50',
            'description' =>'required|min:20',
            'product_price' =>'required|numeric',
            'product_image' =>'nullable|mimes:png,bmp,jpg,jpeg',
        ]);


       
        $product = Product::find($id);

    if ($request->hasFile('product_image')) {
        $image_extension = $request->product_image->extension();
        $image_name = time() . '.' . $image_extension;

        $old_image_path = "/public/product_images/{$product->image}";
        if (Storage::exists($old_image_path)) {
            Storage::delete($old_image_path);
        }

        $request->product_image->storeAs('public/product_images', $image_name);
        $image_name_to_store = $image_name;
    } else {
        $image_name_to_store = $product->image;
    }

    $product->update([
        'productName' => $request->product_name,
        'description' => $request->description,
        'price' => $request->product_price,
        'image' => $image_name_to_store,
        'category_id' => $request->category_id,
    ]);

    return redirect()->route('products.index');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $product=Product::find($id);
        Storage::delete("/public/product_images/$product->image"); 
        $product->delete();
        return redirect()->route('products.index');
    }
}