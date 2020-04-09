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
  @if ( Session::has('flash_message') )
  <div class="alert {{ Session::get('flash_type', 'alert-danger') }}">
      <h3>{{ Session::get('flash_message') }} <a href="/">Click here to continue shopping!</a></h3>
  </div>
@endif
<br>
  <!-- bredcrumb and page title block start  -->
  <div id="bread-crumb">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-3">
          <div class="page-title">
            <h2>Shoping Cart</h2>
          </div>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-9">
          <div class="bread-crumb">
            <ul>
              <li><a href="/">home</a></li>
              <li>\</li>
              <li><a href="/cart">cart</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- bredcrumb and page title block end  -->
  
  <div id="cart-page-contain">
    <div class="container">
      <div class="row">
        <div class="col-md-9 col-xs-12"> 
          <!-- left block Start  -->
          <div class="cart-content table-responsive">
            <table class="cart-table table-responsive" style="width:100%">
              <tbody>

                <tr class="Cartproduct carttableheader">
                  <td style="width:15%"> Product</td>
                  <td style="width:45%">Details</td>
                  <td style="width:10%">QNT</td>
                  <td style="width:5%">Discount</td>
                  <td style="width:15%">Total</td>
                  <td class="update" style="width:10%">Update</td>
                  <td class="delete" style="width:10%">Delete</td>
                </tr>
                @if($orders)
                @foreach($orders as $order)
                {!!Form::model($order, ['method'=>'PATCH', 'action'=>['OrderController@update', $order->id]])!!}
                <tr class="Cartproduct">
                  <td ><div class="image"><a href="{{route('product.show', $order->product->slug)}}"><img alt="img" src="../product_images/{{$order->product->photo->product_file}}"></a></div></td>
                  <td><div class="product-name">
                      <h4><a href="{{route('product.show', $order->product->slug)}}">{{$order->product->name}}</a></h4>
                    </div>
                    <span class="size">24 x 2.3 M</span>
                    <div class="price"><span>${{$order->total_price}}</span></div></td>
                  <td class="product-quantity"><div class="quantity">
                      <input type="number" size="4" class="input-text qty text" title="Qty" value="{{$order->qty}}" name="qty" min="1" max="{{$order->product->qty}}" step="1">
                    </div></td>
                  <td>0</td>
                  <input type="hidden" name="total_price" value="{{$order->total_price}}"><td class="price">${{$order->total_price}}</td>
                  <td>
                      <button class="update btn btn-default" type="submit"><i class="fa fa-undo"></i> &nbsp;Update cart
                      </button>
                  </td>
                  {!!Form::close()!!}
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
                
              </tbody>
            </table>
          </div>
          <div class="cart-bottom">
            <div class="box-footer">
              <div class="pull-left"><a class="btn btn-default" href="/"> <i class="fa fa-arrow-left"></i> &nbsp; Continue shopping </a></div>
              <div class="pull-right">

                 {{$orders->links()}}
              </div>

            </div>
          </div>
          <!-- left block end  --> 
        </div>
        <div class="col-md-3 col-xs-12"> 
          <!-- right block Start  -->
          <div id="right">
            <div class="sidebar-block">
              <div class="sidebar-widget">
                <div class="sidebar-title">
                  <h4>Cart Summary</h4>
                </div>
                <div id="order-detail-content" class="title-toggle table-block">
                  <div class="carttable">
                    <table class="table" id="cart-summary">
                      <tbody>
                        <tr>
                          <td>Total products</td>
                          <td class="price">${{$total_price}}</td>
                        </tr>
                        <tr>
                          <td colspan="2"><div class="input-append couponForm">
                              <input type="text" placeholder="Gift or Coupon code" id="appendedInputButton">
                              <button type="button" class="col-lg-4 btn btn-success">Apply!</button>
                            </div></td>
                        </tr>
                      </tbody>
                    </table>
                   
                  </div>
                </div>
              </div>
              <div class="checkout"> <a href="{{route('checkout-step-1.index')}}" title="checkout" class="btn btn-default ">Proceed to checkout</a> </div>
            </div>
          </div>
          <!-- left block end  --> 
        </div>
      </div>
    </div>
  </div>
  
@stop