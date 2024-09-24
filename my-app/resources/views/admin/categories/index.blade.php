@extends('admin.dashboard')
@section('all categories')
    <a href="{{route('categories.create')}}" class="btn btn-success"> Add new category</a>
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">name</th>
      <th scope="col">action</th>
 
    </tr>
  </thead>
  <tbody>
    @foreach($categories as $category)
    <tr>
      <th scope="row">1</th>
      <td>{{$category->id}}</td>
      <td>{{$category->category_name}}</td>
      <td>
        <form method="post" action="{{route('categories.destroy' , $category->id)}}">
            @csrf
            @method('DELETE')

            <input type="submit" class="btn btn-danger" value="DELETE"></input>
      </form>
    </td>
    <td>
    <form method="post" action="{{ route('categories.update', $category->id) }}">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="category_name">Category Name</label>
            <input type="text" name="category_name" id="category_name" class="form-control" value="{{ $category->category_name }}">
            <button type="submit" class="btn btn-danger">Update Category</button>
        </div>

       
    </form>

        </td>
    </tr>
    @endforeach
 
  </tbody>
</table>
@endsection