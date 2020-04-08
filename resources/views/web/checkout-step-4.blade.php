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
  <br>
  <br>
  @if ( Session::has('flash_message') )
  <div class="alert {{ Session::get('flash_type', 'alert-danger') }}">
      <h3>{{ Session::get('flash_message') }}</h3>
  </div>
@endif
  <br>
  <br>

  <!-- bredcrumb and page title block start  -->
  <div id="bread-crumb">
    <div class="container">
      <div class="row">
        <div class="col-md-5 col-sm-5 col-xs-5">
          <div class="page-title">
            <h4>Payment method</h4>
          </div>
        </div>
        <div class="col-md-7 col-sm-7 col-xs-7">
          <div class="bread-crumb">
            <ul>
              <li><a href="/">home</a></li>
              <li>\</li>
              <li><a href="/"> cart </a></li>
              <li>\</li>
              <li><a href="checkout-step-4"> Payment method</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- bredcrumb and page title block end  -->
  
  <div id="checkout-step-contain">
    <div class="container">
      <div class="account-content checkout-staps">
        <div class="staps">
         <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="checkout-stap ">
                <div class="title"> <span class="stap">1 </span><a href="/checkout-step-1">Billing &amp; Shipping Address</a></div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="checkout-stap ">
                <div class="title"><span class="stap">2 </span><a href="/checkout-step-2">Shipping Method</a></div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="checkout-stap">
                <div class="title"><span class="stap">3 </span><a href="/checkout-step-3">Confirm Order</a></div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="checkout-stap active">
                <div class="title"><span class="stap">4 </span><a href="/checkout-step-4">Payment</a></div>
              </div>
            </div>
          </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <h2 class="delivery-method tf"> Choose your Payment method </h2>
        </div>
        <div class="col-xs-12 col-sm-12">
          <div class="paymentBox">
            <div class="accordion">
             
              <!--end .accordion-section-->
                
                {!!Form::open(['method'=>'POST', 'action'=>'PaymentController@store'])!!}
                  <div class="panel-body">
                    <p>All transactions are secure and encrypted, and we neverstor Tolearn more, please view our privacy policy.</p>
                    <br>
                    <div class=" open">
                      <div class="creditCard">
                        <label for="CardNumber">Credit Card Number *</label>
                        <input type="text" name="credit_card_number" class="form-control" id="CardNumber">
                      </div>
                      <div class="paymentInput">
                        <label for="CardNumber2">Name on Credit Card *</label>
                        <input type="text" class="form-control" id="CardNumber2" name="credit_card_name">
                      </div>
                      <div class="paymentInput">
                        <div class="form-group">
                          <label>Expiration date *</label>
                         <input type="date" name="expiration" class="form-control">
                        </div>
                      </div>
                      <div class="paymentInput clearfix">
                        <label for="VerificationCode">Verification Code
                          *</label>
                        <input type="text" class="form-control" name="verification_number" id="VerificationCode">
                      </div>
                      <div>
                        <input type="checkbox" id="saveInfoid">
                        <label for="saveInfoid" class="saveinfo">&nbsp;Save my Card information</label>
                      </div>
                    </div>
                     <div class="pull-right">
                         <input type="submit" name="submit" value="Continue to Order" class="form-control btn btn-primary">

                     </div>
                  </div>
                  {!!Form::close()!!}
                </div>
                <!--end .accordion-section-content--> 
              </div>
              <!--end .accordion-section--> 
            </div>
          </div>
        </div>
      
   
 

@stop