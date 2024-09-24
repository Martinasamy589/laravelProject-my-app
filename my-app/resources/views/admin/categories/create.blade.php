@extends('admin.dashboard')
@section('create-category') 
    <div class="container">

         <form method="post" action="{{route('categories.store')}}">
            @csrf
         <div class="mb-3">
    <label for="name" class="form-label">category name</label>
    <input type="text" class="form-control" id="name" name="category_name">
  </div>
  <button type="submit" class="btn btn-primary">Add</button>
  </form>
  </div>
         

@endsection