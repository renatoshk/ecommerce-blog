@extends('layouts.webi.index')
@section ('content')
<!-- offer block Start  -->
  <div id="offer">
    <div class="container">
      <div class="offer">
        <p>30 New Mega Sales. Upto 80% Off. Starting Everyday at 9 AM.</p>
      </div>
    </div>
  </div>
  <!-- offer block end  --> 
  
  <!-- bredcrumb and page title block start  -->
  <div id="bread-crumb">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="page-title">
            <h4>Checkout</h4>
          </div>
        </div>
        <div class="col-md-9">
          <div class="bread-crumb">
            <ul>
              <li><a href="http://localhost/blog/public/index.php">home</a></li>
              <li>\</li>
              <li><a href="cart.html">cart</a></li>
              <li>\</li>
              <li><a href="http://localhost/blog/public/checkout">Checkout</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- bredcrumb and page title block end  -->
  
  <div id="blog-page-contain">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12  col-sm-12 Authentication">
          <h2 class="Authentication-title tf"> Authentication</h2>
          <div class="row">
            <div class="col-xs-12 col-sm-4 ">
              <h4 class="block-title-2"> Create an account </h4>
              <form class="account-creat">
                <div class="form-group">
                  <input type="text" placeholder="Enter name" id="exampleInputName" class="form-control">
                </div>
                <div class="form-group">
                  <input type="email" placeholder="Enter email" id="InputEmail1" class="form-control">
                </div>
                <div class="form-group">
                  <input type="password" placeholder="Password" id="InputPassword1" class="form-control">
                </div>
                <button class="btn   btn-primary" type="submit"><i class="fa fa-user"></i> Create an account</button>
              </form>
            </div>
            <div class="col-xs-12 col-sm-4 ">
              <h4 class="block-title-2"><span>Already registered?</span></h4>
              <form class="registered">
                <div class="form-group">
                  <input type="email" placeholder="Enter email" id="InputEmail2" class="form-control">
                </div>
                <div class="form-group">
                  <input type="password" placeholder="Password" id="InputPassword2" class="form-control">
                </div>
                <div class="checkbox">
                  <label class="">
                    <input type="checkbox" name="vehicle" value="Bike">
                    Remember me </label>
                </div>
                <div class="forgot-password">
                  <p><a href="forgot-password.html" title="Recover your forgotten password">Forgot your password? </a></p>
                </div>
                <button class="btn btn-primary" type="submit"><i class="fa fa-sign-in"></i> Sign In</button>
              </form>
            </div>
            <div class="col-xs-12 col-sm-4 guest">
              <h4 class="block-title-2"><span>Checkout as Guest</span></h4>
              <p>Don't have an account and you don't want to register? Checkout as a guest instead!</p>
              <a class="btn btn-primary" href="checkout-step1.html"><i class="fa fa-sign-in"></i> Checkout as Guest</a> </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@stop