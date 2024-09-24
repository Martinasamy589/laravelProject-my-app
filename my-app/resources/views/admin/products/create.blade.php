@extends('admin.dashboard')
@section('create-product') 
    <div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

         <form method="post" action="{{route('products.store')}}" enctype="multipart/form-data">
            @csrf

         <div class="mb-3">
    <label for="product_name" class="form-label">product name</label>
    <input type="text" class="form-control" id="name" name="product_name">
  </div>
  <div class="mb-3">
    <label for="description" class="form-label">product description</label>
    <input type="text" class="form-control" id="description" name="description">
  </div>
  <div class="mb-3">
    <label for="product_price" class="form-label">product price</label>
    <input type="number" class="form-control" id="product_price" name="product_price">
  </div>
  <div class="mb-3">
    <label for="product_image" class="form-label">product image</label>
    <input type="file" class="form-control" id="product_image" name="product_image" accept="/" >
  </div>
  <select name="category_id" class="form-select mb-4">
    @foreach($categories as $category)
    <option value="{{$category->id}}">
        {{$category->category_name}}
{{$category->id}}
    </option>
    @endforeach
  </select>
  <button type="submit" class="btn btn-primary">Add</button>
  </form>
  </div>
         

@endsection