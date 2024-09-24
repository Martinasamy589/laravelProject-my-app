@extends('auth.layout.auth')
   @section('register')

   <div class="container mt-4 shadow-lg" >
    <form method="post" action="{{ route ('auth.store')}}">
   @csrf
    <div class="mb-3">
    <label for="username" class="form-label">username</label>
    <input type="text" class="form-control" id="username" name="username">
  </div>
  @error('username')

<span class="text-danger d-block">{{$message}} </span>
  @enderror

  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="text" class="form-control" id="email" name="email">
  </div>
  @error('email')

<span class="text-danger d-block">{{$message}} </span>
  @enderror
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  @error('password')

<span class="text-danger d-block">{{$message}} </span>
  @enderror
  <button type="submit" class="btn btn-primary">register</button>
  <a class="text-danger" href="{{route('auth.login')}}">already have account</a>
</form>
    </div>
    
@endsection