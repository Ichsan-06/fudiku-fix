
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>@yield('title')</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/dataTables.bootstrap4.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/icofont.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/nice-select.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/admin.css') }}">
  

</head>
<body>
<div class="main-wrapper">
  <div class="sidebar-wrapper sticky-top">
    <div class="sidebar-logo">
      <a href="{{ url('/admin') }}" class="navbar-brand"><img src="{{ asset('img/logo/fudiku.png') }}" alt=""></a> 
    </div>
    <div class="sidebar-profile">
      <div class="profile-img">
        <img src="{{ asset('img/profile/admin.jpeg') }}" class="rounded-circle" width="50" height="50">
      </div>
      <div class="profile-info">
        <h6 class="username">Ridho Adha</h6>
        <h6 class="level">Admin</h6>
      </div>
    </div>
    <div class="sidebar-menu">
      <ul class="navbar-nav">
        <li class="nav-item {{ request()->path() == 'admin' || request()->path() == 'admin' ? 'active' : ''}}">
          <a href="{{ route('dashboard') }}" class="nav-link"><i class="icofont-pie-chart"></i> Dashboard</a>
        </li>
        
        {{-- <a href="{{ route('cus') }}" class="nav-link"> User</a> --}}
        <li class="nav-item" data-toggle="collapse" href="#user" role="button" aria-expanded="false" aria-controls="user">
          <a class="nav-link">User <span class="float-right"><i class="icofont-rounded-right"></i></span></a>
          <li class="nav-item collapse" id="user">
            <a href="{{ route('customer') }}" class="nav-link {{ request()->path() == 'admin/customer' || request()->path() == 'admin/customer' ? 'active' : ''}}">Customer</a>
            <a href="{{ route('admin') }}" class="nav-link {{ request()->path() == 'admin/admin' || request()->path() == 'admin/administrator' ? 'active' : ''}}">Admin</a>
          </li>
        </li>
        <li class="nav-item {{ request()->path() == 'admin/product' ? 'active' : '' }}" data-toggle="collapse" href="#product" role="button" aria-expanded="false" aria-controls="product">
          <a href="{{ route('product') }}" class="nav-link">Product </a>
          
        </li>
        <li class="nav-item {{ request()->path() == 'admin/subscription' ? 'active' : '' }}" data-toggle="collapse" href="#subscription" role="button" aria-expanded="false" aria-controls="subscription">
          <a href="{{ route('subscription') }}" class="nav-link">Subscription </a>
          
        </li>
        
        <li class="nav-item" data-toggle="collapse" href="#category" role="button" aria-expanded="false" aria-controls="category">
          <a class="nav-link">Category <span class="float-right"><i class="icofont-rounded-right"></i></span></a>
          <li class="nav-item collapse" id="category">
            <a href="{{ route('category') }}" class="nav-link">Category</a>
            <a href="{{ route('SubCategory') }}" class="nav-link">Sub Category</a>
          </li>
        </li>
        <li class="nav-item {{ request()->path() == 'admin/map' ? 'active' : '' }}">
          <a href="{{ route('map') }}" class="nav-link"> Map</a>
        </li>
        <li class="nav-item {{ request()->path() == 'admin/transfer' ? 'active' : '' }}">
          <a href="{{ route('transfer') }}" class="nav-link"> Transfer </a>
        </li>
        <li class="nav-item {{ request()->path() == 'admin/ordering' ? 'active' : '' }}">
          <a href="{{ route('ordering') }}" class="nav-link"> Ordering </a>
        </li>
        </ul>
    </div>
  </div>
  <div class="main-content">
    <div class="main-nav">
      <nav class="navbar navbar-expand-md">
        <button class="btn toggle" id="menu-toggle"><i class="icofont-navigation-menu"></i></button>
        <form method="GET" action="" class="navbar-search">
          <div class="form-search">
            <input type="text" class="form-control" placeholder="Cari" name="">
            <button class="btn"><i class="icofont-search-1"></i></button>
          </div>
        </form>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a href="" class="nav-link"><i class="icofont-email"></i></a></li>
            <li class="nav-item"><a href="" class="nav-link"><i class="icofont-alarm"></i></a></li>
            <li class="nav-item dropdown">
              <a href="" class="nav-link" data-toggle="dropdown"><i class="icofont-user"></i></a>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href=""
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form> 
              </div>
            </li>
          </ul> 
      </nav>    
    
    <div class="main-heading">
      @yield('main-heading')
    </div>      
    <div class="main-body">
      @yield('main')
    </div>
  </div>

</div>
</body>  
</html>
<script type="text/javascript" src="{{ asset('js/jquery-3.4.1.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/dataTables.bootstrap4.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.nice-select.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/ckeditor.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/admin.js') }}"></script>
@yield('script')