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
            <h4>Delivery method</h4>
          </div>
        </div>
        <div class="col-md-7 col-sm-7 col-xs-7">
          <div class="bread-crumb">
            <ul>
              <li><a href="/">home </a></li>
              <li>\</li>
              <li><a href="/cart"> cart </a></li>
              <li>\</li>
              <li><a href="/checkout-step-3"> delivery method</a></li>
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
              <div class="checkout-stap active ">
                <div class="title"><span class="stap">2 </span><a href="/checkout-step-2">Shipping Method</a></div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="checkout-stap">
                <div class="title"><span class="stap">3 </span><a href="/checkout-step-3">Confirm Order</a></div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="checkout-stap ">
                <div class="title"><span class="stap">4 </span><a href="/checkout-step-4">Payment</a></div>
              </div>
            </div>
          </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <h2 class="delivery-method tf"> Choose your delivery method </h2>
        </div>
        {!!Form::open(['method'=>'POST', 'action'=>'ShippingController@store'])!!}
        <div class="col-xs-12 col-sm-12">
          <div class="row">
            <div class="form-group col-lg-4 col-sm-4 col-md-4 -col-xs-12">
              <label for="id_country">Country</label>
              <select name="country" id="id_country" aria-required="true" class="form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                <option value="">Choose</option>
                <option value="37">Albania</option>
                <option value="38">Algeria</option>
                <option value="39">American Samoa</option>
                <option value="40">Andorra</option>
                <option value="41">Angola</option>
                <option value="42">Anguilla</option>
                <option value="43">Antigua and Barbuda</option>
                <option value="44">Argentina</option>
                <option value="45">Armenia</option>
                <option value="46">Aruba</option>
                <option value="24">Australia</option>
                <option value="2">Austria</option>
                <option value="47">Azerbaijan</option>
                <option value="48">Bahamas</option>
                <option value="49">Bahrain</option>
                <option value="50">Bangladesh</option>
                <option value="3">Belgium</option>
                <option value="34">Bolivia</option>
                <option value="4">Canada</option>
                <option value="5">China</option>
                <option value="16">Czech Republic</option>
                <option value="20">Denmark</option>
                <option value="7">Finland</option>
                <option value="8">France</option>
                <option value="1">Germany</option>
                <option value="9">Greece</option>
                <option value="22">HongKong</option>
                <option value="26">Ireland</option>
                <option value="29">Israel</option>
                <option value="10">Italy</option>
                <option value="32">Ivory Coast</option>
                <option value="11">Japan</option>
                <option value="12">Luxemburg</option>
                <option value="35">Mauritius</option>
                <option value="13">Netherlands</option>
                <option value="27">New Zealand</option>
                <option value="31">Nigeria</option>
                <option value="23">Norway</option>
                <option value="14">Poland</option>
                <option value="15">Portugal</option>
                <option value="36">Romania</option>
                <option value="25">Singapore</option>
                <option value="37">Slovakia</option>
                <option value="30">South Africa</option>
                <option value="28">South Korea</option>
                <option value="6">Spain</option>
                <option value="18">Sweden</option>
                <option value="19">Switzerland</option>
                <option value="33">Togo</option>
                <option value="17">United Kingdom</option>
                <option value="21" selected="selected">United States</option>
              </select>
              <span aria-hidden="true" class="dropdown-wrapper"></span> </div>
            <div class="form-group  col-lg-4 col-sm-4 col-md-4 -col-xs-12" id="states">
             <label for="Address">Address</label>
              <input type="text" class="form-control" name="address">
              <span aria-hidden="true" class="dropdown-wrapper"></span> 
            </div>
            <div class="form-group  col-lg-4 col-sm-4 col-md-4 -col-xs-12">
              <label for="zipcode">Zip Code</label>
              <input type="text" class="form-control" name="zip_code" id="zipcode">
            </div>
            <div class="form-group col-lg-12 col-sm-12 col-md-12 -col-xs-12">
              <table class="table-bordered table">
                <tbody>
                  <tr>
                    <td>Select</td>
                    <td>Method</td>
                    <td>Duration</td>
                    <td>Price!</td>
                  </tr>
                  @if($shipping_methods)
                  @foreach($shipping_methods as $shipping_method)
                  <tr>
                    <td>
                      <div class="radio">
                        <label>
                          <input type="radio" name="shipping_id" id="shipping_id" value="{{$shipping_method->id}}">
                        </label>
                      </div></td>
                    <td>{{$shipping_method->method_name}}</td>
                    <td>{{$shipping_method->duration}}</td>
                    <td>${{$shipping_method->price}}</td>
                  </tr>
                  @endforeach
                 @endif
                </tbody>
              </table>
            </div>
          </div>
          <div class="cart-bottom">
            <div class="box-footer">
              <div class="pull-left"><a href="/checkout-step-1" class="btn btn-default"> <i class="fa fa-arrow-left"></i> &nbsp; Previous </a>
              </div>
              <div class="pull-right">
               <input type="submit" name="submit" value="Continue to Payment" class="form-control btn btn-primary">

              </div>
            </div>
          </div>
        </div>
        {!!Form::close()!!}
      </div>
    </div>
  
@stop