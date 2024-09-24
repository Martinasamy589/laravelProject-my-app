@extends('admin.dashboard')
@section('edit-product')
<div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{route('products.update' ,$product->id)}}" method="post" enctype="multipart/form-data"> 
        @csrf
        @method('PUT')
        <label for="product_name">Product name</label>
        <input type="text" id="product_name" name="product_name" value="{{$product->productName}}" required>
        <label for="description">Product description</label>
        <textarea name="description" id="description">{{$product->description}}</textarea>
        <label for="product_price">Product price</label>
        <input type="text" id="product_price" name="product_price"  value="{{$product->price}}" required>
        <label for="product_image">Product price</label>
        <input type="file" id="product_image" name="product_image" accept="/" value="{{$product->image}}" >
        <select name="category_id" id="">
            @foreach ($categories as $category )
            <option value="{{$category->id}}">
                {{$category->category_name}}
            </option>
            @endforeach
        </select>
        <button type="submit">edit</button>
    </form>
</div>
<style>
    .form-container {
        max-width: 400px;
        margin: 20px auto;
        padding: 20px;
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    label ,select{
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
    }
    input ,textarea{
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    button {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }
   
</style>
@endsection