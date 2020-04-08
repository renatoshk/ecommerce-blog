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
            <h4>Order</h4>
          </div>
        </div>
        <div class="col-md-7 col-sm-7 col-xs-7">
          <div class="bread-crumb">
            <ul>
              <li><a href="/">home</a></li>
              <li>\</li>
              <li><a href="/cart">cart</a></li>
              <li>\</li>
              <li><a href="/checkout-step-3">Order</a></li>
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
              <div class="checkout-stap active">
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
      <div class="row">
        <div class="col-lg-12">
          <h2 class="delivery-method tf">Order Riview</h2>
        </div>
        <div class="col-md-12">
          <div class="cart-content table-responsive">
            <table class="cart-table ">
              <tbody>
                <tr class="Cartproduct carttableheader">
                  <td style="width:10%"> Product</td>
                  <td style="width:45%">Details</td>
                  <td style="width:10%">QNT</td>
                  <td style="width:5%">Discount</td>
                  <td style="width:15%">Total</td>
                  <td class="delete" style="width:10%">&nbsp;</td>
                </tr>
                @if($orders)
                 @foreach($orders as $order)
                <tr class="Cartproduct">
                  <td ><div class="image"><a href="{{route('product.show', $order->product->id)}}"><img alt="img" src="../product_images/{{$order->product->photo->product_file}}"></a></div></td>
                  <td><div class="product-name">
                      <h3><a href="{{route('product.show', $order->product->id)}}">{{$order->product->name}} </a></h3>
                    </div>
                    <span class="size">24 x 2.3 M</span>
                    <div class="price"><span>${{$order->product->price}}</span></div></td>
                  <td class="product-quantity">
                    <div class="quantity">
                     <span>{{$order->qty}}</span>
                    </div>
                  </td>
                  <td>0</td>
                  <td class="price">${{$order->total_price}}</td>
                   {!!Form::open(['method'=>'DELETE', 'action'=>['OrderController@destroy', $order->id]])!!}
                  <td class="delete">
                     <button class="delete btn btn-default"> 
                       <i class="glyphicon glyphicon-trash"></i>
                    </button>
                  </td>
                  {!!Form::close()!!}
                </tr>
                @endforeach
                @endif
                <tr class="cart-detail">
                  <td colspan="4">Total products</td>
                  <td colspan="2" class="price">${{$total_price}}</td>
                </tr>
                <tr class="cart-detail">
                  <td colspan="4">Shipping</td>
                  @if($shippings)
                  @foreach($shippings as $shipping)
                  <td colspan="2" class="price"><span class="success">{{$shipping->shipping_method->method_name}}</span></td>
                </tr>
                <tr class="cart-detail cart-total-price ">
                  <td colspan="4" >Total (tax shipping)</td>
                  <td colspan="2" class="price">${{$shipping->shipping_method->price}}</td>
                </tr>
                
                <tr class="cart-detail">
                  <td colspan="4"> Total</td>
                  <td colspan="2" class="price" id="total-price">${{$total_price+$shipping->shipping_method->price}}</td>
                </tr>
                  @endforeach
                  @endif
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12">
          <div class="cart-bottom">
            <div class="box-footer">
              <div class="pull-left"><a href="checkout-step3.html" class="btn btn-default"> <i class="fa fa-arrow-left"></i> &nbsp; Payment Method </a></div>
              <div class="pull-right"> <a class="btn btn-primary btn-small " href="/checkout-step-4"> Confirm Order &nbsp; <i class="fa fa-check"></i> </a> </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@stop