@extends('user.home') 

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('/storage/product_images/' . $product->image) }}" class="img-fluid" alt="{{ $product->productName }}">
        </div>
        <div class="col-md-6">
            <h1>{{ $product->productName }}</h1>
            <p>{{ $product->description }}</p>
            <span class="badge bg-secondary">{{ $product->price }}</span>
            <div class="mt-3">
                <a href="{{ route('shops.index') }}" class="btn btn-primary">Back to Products</a>
            </div>
        </div>
    </div>
</div>
@endsection
