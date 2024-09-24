
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.css')}}">
    <style>
      .bg-body-tertiary > div:last-child > div:first-child {
        display: none;
      }
    </style>

</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{route('admin.dashboard')}}">admin dashboard</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
        <li class="nav-item">
          <a class="nav-link active" href="{{route('products.index')}}">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="{{route('categories.index')}}">Categories</a>
        </li>
       
      </ul>
      @if(Auth()->user())
      <form method="post" action="{{route('auth.logout')}}">
        @csrf
        <button type="submit" class="btn btn-outline-danger">Logout</button>
      </form> 
      <span>
        <b>{{Str::of(Auth()->user()->name)}}</b>
      </span>
      @else

      <a href="{{route('auth.login')}}" class="btn btn-secondary me-2">Login</a> 
         

      @endif 
      
    </div>
  </div>
</nav>

@yield('all categories')
@yield('create-category') 
@yield('all products')
@yield('create-product')
@yield('edit-product')

    <script src ="{{ asset('/assets/js/bootstrap.bundel.js')}}"></script>

</body>
</html>
</body>
</html>