<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Multi Vendors</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Sellers
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                @auth
                  <a class="dropdown-item" href="{{ route('create_activity') }}">Add Activity</a>
                @endauth
                @guest
                  <a class="dropdown-item" href="{{ route('show_activities') }}">Show Activities</a>
                @endguest
                @auth
                  <a class="dropdown-item" href="{{ route('create_seller') }}">Add Seller</a>
                @endauth
                @guest
                  <a class="dropdown-item" href="{{ route('show_sellers') }}">Show Sellers</a>
                @endguest
                <div class="dropdown-divider"></div>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto">
            @guest
            <li class="nav-item">
              <a class="nav-link" href="{{ route ('auth_register') }}">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route ('auth_login') }}">Login</a>
            </li>    
            @endguest
            @auth
            <li class="nav-item active">
              <a class="nav-link">{{ Auth::user()->name }}</a>
            </li>    
            <li class="nav-item ">
              <a class="nav-link" href="{{ route ('auth_logout') }}">Logout</a>
            </li>
            @endauth    
          </ul>
        </div>
      </nav>
    <div>
        @yield('content')
    </div>
    
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>