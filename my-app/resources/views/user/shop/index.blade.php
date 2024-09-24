@extends('user.home')
@section('user-shop')
    <div class="container d-flex gap-4 mt-4 flex-wrap" >
    @foreach($products as $product)
    <div class="card" style="width: 18rem;">
  <img src="{{ asset('/storage/product_images/' . $product->image)}}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">{{$product->productName}}</h5>
    <p class="card-text">{{$product->description}}</p>
    <span>{{$product->price}}</span>
  </div>
</div class="card-footer  d-flex justify-content-evenly">
    @endforeach
    </div>
    <div class='d-flex justify-content-center'>
    {{$products->links()}}
    </div>
    
@endsection