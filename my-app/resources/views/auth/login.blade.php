@extends('auth.layout.auth')
@section('login')
    <div class="container mt-4 shadow-lg">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form method="post" action="{{route('auth.authenticate')}}">
    @csrf
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="text" class="form-control" id="email" name="email">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
 
  <button type="submit" class="btn btn-primary">login</button>
  <a class="text-danger" href="{{route('auth.register')}}">create naw account</a>

</form>
    </div>
 @endsection