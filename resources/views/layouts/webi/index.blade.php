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
@include('layouts.webi.header')
@yield('categories')
 @yield('content')
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