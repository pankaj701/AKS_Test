
@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>AKS Machine Test</title>

<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

<!--[if lt IE 9]>
<script type="text/javascript" src="html5.js"></script>
<![endif]-->
<!--[if lt IE 7.]>
<script defer type="text/javascript" src="pngfix1.js"></script>
<![endif]-->
<!-- Menu start --------------->
<link href="{{asset('assets/menu/quickmenu0.css')}}" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="{{asset('assets/menu/quickmenu0.js')}}"></script>
<!-- Menu End --------------->
</head>
<body>
<header>
  <div id="wrap">
       <div class="logo"><img src="{{asset('assets/images/logo.png')}}" border="0"></div>
    <div class="topmenu">
      <ul>
        <li><a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
        
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }}
          </a>

          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
          </div>
      </li>
        <li><a href={{url('change_password')}}>Change Password</a>&nbsp;|</li>


        {{-- <li><a href="{{route('logout')}}"><img src="{{asset('assets/images/logout.png')}}" width="16" height="16" border="0" align="absmiddle">&nbsp;&nbsp;Logout</a></li> --}}

        
      </ul>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
</header>
  <nav>
    <ul id="qm0" class="qmmc" >
      <li><a href="#" class="qmactive">Dashboard</a></li> 
      <li><a href="#">Product</a>
          <ul>
          	<li><a href="{{url('add_category')}}">Add Category</a></li>
            <li><a href="{{url('subcategories')}}">Add  Sub Category</a></li>
          	
          	<li><a href="{{url('product')}}">Add Product</a></li>
          </ul>
      </li>      
      <!-- <li><a href="#">CCTV</a>
          <ul>
          	<li><a href="product-brand.html">Add Brand</a></li>
          	<li><a href="cctv.html">Add Product</a></li>
          </ul>
      </li> -->
      
      
    </ul>
  </nav>
  
<div id="wrap">
  <section class="bodymain" style="min-height:540px;">
    <aside class="middle-container"> 
     <div class="clear" style="height:5px;"></div>
      <h1 style="margin:50px 0 0 270px; font-size:35px; color:#036d9a;">Welcome To Admin Panel</h1>
      </aside>
    <div class="clear"></div>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </section>
</div>
<div class="clear"></div>

</body>
</html>

@endsection

