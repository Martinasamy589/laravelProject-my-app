@extends('admin.dashboard')
@section('all products')
    <a href="{{route('products.create')}}" class="btn btn-success"> Add new product</a>
    <div class="container d-flex gap-4 mt-4 flex-wrap" >
    @foreach($products as $product)
    <div class="card" style="width: 18rem;">
  <img src="{{ asset('/storage/product_images/' . $product->image)}}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">{{$product->productName}}</h5>
    <p class="card-text">{{$product->description}}</p>
    <span>{{$product->price}}</span>
  </div>
  <div class="card-footer  d-flex justify-content-evenly">
  <a href="{{route('products.edit' , $product->id)}}" class="edit" class="btn btn-primary">edit</a>
  <form method="post" action="{{route('products.destroy',$product->id)}}">
    @csrf
    @method('DELETE')
    <input type="submit" value="delete" class="btn btn-danger">
  </form>
  </div>
</div>
    @endforeach
    </div>
    {{$products->links()}}
@endsection