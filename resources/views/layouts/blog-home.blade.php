<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Kors Look</title>
<meta content="" name="description">
<meta content="" name="author">

<link rel="icon" type="image/png" href="{{asset('frontend/images/favicon.png')}}">
<link rel="apple-touch-icon" href="{{asset('frontend/images/favicon.png')}}">
<link href="{{asset('frontend/Bootstrap/css/bootstrap.css')}}" rel="stylesheet">
<link href="{{asset('frontend/css/style.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('frontend/css/font-awesome.css')}}" rel="stylesheet" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Poppins:300,500,600,700' rel='stylesheet' type='text/css'>
<link href="{{asset('frontend/css/owl.carousel.css')}}" rel="stylesheet" type="text/css">
</head>
<body id="index">
<div class="wrapar"> 
  <!-- Header Start-->
  <div class="header">
    <div class="header-top">
      <div class="container">
        <div class="call pull-left">
          <p>Call us toll free : <span>+355699812168</span></p>
        </div>
        <div class="user-info pull-right">
          <div class="user">
            <ul>
             @if(Auth::guest())
                     @include('auth.login')
                     @include('auth.register')
                @else
                    <li><a href="/home">Home</a></li>
                    <li><a href="/profile">Profile</a></li>
                    <li><a href="{{route('logout')}}" onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                                  {{ __('Logout')}}
                        </a>
                    </li>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                   @csrf
                  </form>

            @endif
            @if(Auth::check()) 
              @if(Auth::user()->role_id == 1 && Auth::user()->is_active == 1)
                <li>
                  <a href="/adm">Admin</a>
                </li>
              @endif
            @endif 
         
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="header-mid">
      <div class="container">
        <div class="row">
          <div class="col-md-3 header-left">
            <div class="logo"> <a href="/"><img src="{{asset('frontend/images/logo.png')}}" alt="#"></a> </div>
          </div>
          <div class="col-md-6 search_block">
            <div class="search">
              <form action="http://localhost/blog/public/grid-view">
                <div class="search_cat">
                  <select class="search-category" name="search-category">
                    <option class="computer" selected>All Categories</option>
                    <option class="computer">Men</option>
                    <option class="computer">Women</option>
                    <option class="computer">Kids</option>
                    <option class="computer">Computer</option>
                    <option class="computer">Electronics</option>
                  </select>
                  <span class="fa fa-angle-down"></span> </div>
                <input type="text" placeholder="Search...">
                <button type="submit" class="btn submit"> <span class="fa fa-search"></span></button>
              </form>
            </div>
          </div>
          <div class="col-md-3 header-right">
            <div class="cart">
              <div class="cart-icon dropdown"></div>
              <a aria-expanded="false" aria-haspopup="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="http://localhost/blog/public/cart">My Cart( 2 )<span> $261.20</span></a>
              <ul class="dropdown-menu pull-right cart-dropdown-menu">
                <li>
                  <table class="table table-striped">
                    <tbody>
                      <tr>
                        <td class="text-center"><a href="product.html"><img class="img-thumbnail" src="images/product/car3-70x92.jpg" alt="img"></a></td>
                        <td class="text-left"><a href="#">Black African Print Pencil Skirt</a></td>
                        <td class="text-right quality">X1</td>
                        <td class="text-right price-new">$254.00</td>
                        <td class="text-center"><button type="button" title="Remove" class="btn btn-xs remove"><i class="fa fa-times"></i></button></td>
                      </tr>
                      <tr>
                        <td class="text-center"><a href="product.html"><img class="img-thumbnail" src="images/product/car3-70x92.jpg" alt="img"></a></td>
                        <td class="text-left"><a href="#">Black African Print Pencil Skirt</a></td>
                        <td class="text-right quality">X1</td>
                        <td class="text-right price-new">$254.00</td>
                        <td class="text-center"><button type="button" title="Remove" class="btn btn-xs remove"><i class="fa fa-times"></i></button></td>
                      </tr>
                    </tbody>
                  </table>
                </li>
                <li>
                  <div class="minitotal">
                    <table class="table pricetotal">
                      <tbody>
                        <tr>
                          <td class="text-right"><strong>Sub-Total</strong></td>
                          <td class="text-right price-new">$210.00</td>
                        </tr>
                        <tr>
                          <td class="text-right"><strong>Eco Tax (-2.00)</strong></td>
                          <td class="text-right price-new">$2.00</td>
                        </tr>
                        <tr>
                          <td class="text-right"><strong>VAT (20%)</strong></td>
                          <td class="text-right price-new">$42.00</td>
                        </tr>
                        <tr>
                          <td class="text-right"><strong>Total</strong></td>
                          <td class="text-right price-new">$254.00</td>
                        </tr>
                      </tbody>
                    </table>
                    <div class="controls"> <a class="btn btn-primary pull-left" href="http://localhost/blog/public/cart" id="view-cart"><i class="fa fa-shopping-cart"></i> View Cart </a> <a class="btn btn-primary pull-right" href="http://localhost/blog/public/checkout" id="checkout"><i class="fa fa-share"></i> Checkout</a> </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Header End --> 
  
  <!-- Main menu Start -->
<div id="main-menu">
    <div class="container">
      <nav class="navbar navbar-default">
        <div class="navbar-header">
          <button aria-controls= "navbar" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a href="#" class="navbar-brand">menu</a> </div>
        <div class="navbar-collapse collapse" id="navbar">
          <ul class="nav navbar-nav">
           
            <li><a href="{{route('category')}}">home</a></li>
         
          </ul>
        </div>
      </nav>
    </div>
  </div>
  <!-- Main menu End --> 
   @yield('content')
  
  <!-- Brand logo block End  --> 
  
  <!-- Footer block Start  -->
  <footer id="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class= "newslatter">
            <form>
              <h2 class="tf">Be The First To Hear Our Exciting News</h2>
              <p>This ante posuere ac Mauris non turpis eu metus congue sagittis Fusce at.</p>
              <div class="input-group">
                <input class=" form-control" type="text" placeholder="Email Here......">
                <button type="submit" value="Sign up" class="btn btn-large btn-primary">Sign up</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3">
          <div class="about">
            <div class="footer-logo"></div>
            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature in Virginia</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="new-store">
            <h4>What's in store</h4>
            <ul class="toggle-footer">
              <li><a href="#">Returns</a></li>
              <li><a href="#">Delivery Options</a></li>
              <li><a href="#">Brand Directory</a></li>
              <li><a href="#">Buying Guides</a></li>
              <li><a href="#">My Account</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-3">
          <div class="information">
            <h4>information</h4>
            <ul class="toggle-footer">
              <li><a href="#">Returns</a></li>
              <li><a href="#">Delivery Options</a></li>
              <li><a href="#">Brand Directory</a></li>
              <li><a href="#">Buying Guides</a></li>
              <li><a href="#">My Account</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-3">
          <div class="contact">
            <h4>Contact Us</h4>
            <ul class="toggle-footer">
              <li> <i class="fa fa-map-marker"></i>
                <div class="address-info">Warehouse & Offices 12345 Street name,California, USA </div>
              </li>
              <li> <i class="fa fa-mobile"></i>
                <div class="call-info">+91 987-654-321<br>
                  <span>+0987-654-321</span> </div>
              </li>
              <li> <i class="fa fa-envelope"></i>
                <div class="email-info"> <a href="#">support@lionode.com</a></div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="social-link">
              <ul>
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="copy-right">
              <p> All Rights Reserved. Copyright 2017 Powered by lionode.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-offer">
        <h2>Deals of the Day: Unbox Latest Offers & Deals Every Single Day at Store.</h2>
      </div>
    </div>
  </footer>
  <!-- Footer block End  --> 
  
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="{{asset('frontend/js/jQuery.js')}}"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="{{asset('frontend/Bootstrap/js/bootstrap.js')}}"></script> 
<script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script> 
<script src="{{asset('frontend/js/globle.js')}}"></script>
</body>
</html>