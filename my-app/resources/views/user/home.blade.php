<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.css')}}">
</head>
<body>


    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{route('home')}}">myapp</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="{{route('shops.index')}}">products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="{{route('categories.index')}}">categories</a>
        </li>
      
      </ul>
      @if(Auth()->user()) 
      <form method="post" action="{{route('auth.logout')}}">
@csrf
      <input type="submit" class="btn btn-secondary me-2" value="logout">
      </form>
      <span><b>{{Str::of(Auth()->user()->name)}}</b></span>
      @else
      <a href="{{route('auth.login')}}" class="btn btn-secondary me-2">login</a>
     
      @endif
       <form class="d-flex" role="search" action="{{route('products.search')}}">
       @csrf
        <input class="form-control me-2" type="search" placeholder="Search product" name='q'>
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
@yield('user-shop')
@yield('user-categories')
@yield('content')
    <script src ="{{ asset('/assets/js/bootstrap.bundel.js')}}"></script>
    
</body>
</html>