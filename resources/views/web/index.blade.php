@extends('layouts.webi.index')

@section('header_cart')

<div class="col-md-3 header-right">
            <div class="cart">
              
              <div class="cart-icon dropdown"></div>
              <a aria-expanded="false" aria-haspopup="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="{{route('cart')}}">My Cart( {{$orders_count }} )<span>${{$total_price}}</span></a>
              <ul class="dropdown-menu pull-right cart-dropdown-menu">
                <li>
                  <table class="table table-striped">
                    <tbody>
                      @if($orders)
                       @foreach($orders as $order)
                      <tr>
                        <td class="text-center"><a href="{{route('product.show', $order->product->slug)}}"><img class="img-thumbnail" src="/product_images/{{$order->product->photo->product_file}}" alt="img"></a></td>
                        <td class="text-left"><a href="{{route('product.show', $order->product->slug)}}">{{$order->product->name}}</a></td>
                        <td class="text-right quality">X1</td>
                        <td class="text-right price-new">${{$order->total_price}}</td>
                      </tr>
                      @endforeach
                        {{$orders->links()}}
                     @endif
                    </tbody>
                  </table>
                </li>
                <li>
                  <div class="minitotal">
                    <table class="table pricetotal">
                      <tbody>
                        <tr>
                          <td class="text-right"><strong>Sub-Total</strong></td>
                          <td class="text-right price-new">${{$total_price}}</td>
                        </tr>
                      </tbody>
                    </table>
                    <div class="controls"> <a class="btn btn-primary pull-left" href="{{route('cart')}}" id="view-cart"><i class="fa fa-shopping-cart"></i> View Cart </a> <a class="btn btn-primary pull-right" href="{{route('checkout-step-1.index')}}" id="checkout"><i class="fa fa-share"></i> Checkout</a> </div>
                  </div>
                </li>
              </ul>
           
            </div>
          </div>
          

@endsection

@section('categories')
<br>
@if ( Session::has('flash_message') )
  <div class="alert {{ Session::get('flash_type', 'alert-danger') }}">
      <h3>{{ Session::get('flash_message') }}</h3>
  </div>
@endif
<br>
<div id="main-menu">
    <div class="container">
      <nav class="navbar navbar-default">
        <div class="navbar-header">
          <button aria-controls= "navbar" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a href="#" class="navbar-brand">menu</a> </div>
        <div class="navbar-collapse collapse" id="navbar">
           <ul class="nav navbar-nav">
            @if($categories)
              @foreach($categories as $category)
            <li><a href="{{route('category.show', $category->id)}}">{{$category->name}}</a></li>
              @endforeach
            @endif
             <li><a href="{{route('blog.index')}}">Blog</a></li>
             <li><a href="/about_us">About Us</a></li>
          </ul>
        </div>
      </nav>
    </div>
  </div>
@endsection
@section ('content')
<!-- Main Banner Start-->
  <div id="banner">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div id="main-slider" class="owl-carousel">
            @if($products)
              @foreach($products as $product)
            <div class="item"><img  src="../product_images/{{$product->photo ? $product->photo->product_file : 'No Photo'}}" alt="main-banner1"></div>
              @endforeach
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Main Banner End --> 
  <!-- Fashio Sale block Start  -->

  <!-- Fashio Sale block End  --> 
  
  <!-- 3 CMS Block Start -->
  <div id="cms">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class= "cms-block1 col-sm-4 col-sm-12">
            <div class="stf">FREE SHIPPING & RETURN*</div>
            <p>For all orders over $100</p>
          </div>
          <div class= "cms-block2 col-sm-4 col-sm-12">
            <div class="stf">MONEY BACK GUARANTEE</div>
            <p>Return Over 30 Days</p>
          </div>
          <div class= "cms-block3 col-sm-4 col-sm-12">
            <div class="stf"> STUDENT DISCOUNT</div>
            <p>Excludes Sale In Store</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- 3 CMS Block End --> 
  
  <!-- Featured Products block Start  -->
  <div id="Featured">
    <div class="container">
      <div class="row">
        <div class="col-md-12 featured">
          <div class="Featured-Products-title">
            <h2 class="tf">Trending Now!<span> Get Our Best Prices </span></h2>
          </div>
          <div class= "customNavigation"> <a class="btn featured_prev prev"><i class="fa fa-angle-left"></i></a> <a class="btn featured_next next"><i class="fa fa-angle-right"></i></a> </div>
          <div class="box">
            <div id="featured-products" class="owl-carousel">
            @if($products)
              @foreach($products as $product)
              {!!Form::open(['method'=>'POST', 'action'=>'OrderController@store'])!!}
              <div class="item">
                <div class="product-block ">
                  <div class="image"> <a href="{{route('product.show', $product->slug)}}"><img class="img-responsive" title="{{$product->slug}}" alt="T-shirt" src="../product_images/{{$product->photo ? $product->photo->product_file : 'No Photo'}}"></a> </div>
                  <div class="product-details">
                    <div class="product-name">
                      <input type="hidden" name="product_id" value="{{$product->id}}"><h3><a href="{{route('product.show', $product->slug)}}">{{$product->name}}</a></h3>
                    </div>
                    <div class="price"> 
                         <input type="hidden" name="total_price" value="{{$product->price}}"> <span class="price-new">${{$product->price}}</span> 
                    </div>
                    <input type="hidden" name="qty" value="1">
                    <div class="product-hov">
                      <ul>
                        <li class="wish"><a href="#" ></a></li>
                        <li>
                           <div class="addtocart">
                            {!!Form::submit('Add to Cart', ['style'=>'background-color:black'])!!}
                          </div>
                        </li> 
                       {{--  <li class="addtocart"><input style="visibility:hidden; display: none;" type="submit" name="submit">Add to Cart</li> --}}
                        <li class="compare"><a href="#" ></a></li>
                      </ul>
                      <div class="review"> <span class="rate"> <i class="fa fa-star rated"></i> <i class="fa fa-star rated"></i> <i class="fa fa-star rated"></i> <i class="fa fa-star rated"></i> <i class="fa fa-star"></i> </span> </div>
                    </div>
                  </div>
                </div>
              </div>
              {!!Form::close()!!}
                  @endforeach
                  @endif
             
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Featured Products block End  --> 
  
  <!-- CMS Banner & Video block Start  -->
  <div id="video">
    <div class="container">
      <div class=" cms-video-bg">
        <div class="col-md-4">
          <div class="cms-banner">
            <p>Latest Offers & Deals Every Single Day</p>
            <h4>30% off</h4>
            <p> Save big with the best further shopping deals and discounts</p>
            <button type="button" class="btn btn-default">Shop Now</button>
          </div>
        </div>
        <!-- video start -->
        <div class="col-md-8 video">
          <video controls>
            <source src="frontend/video/video.mkv" type="video/mp4">
            <source src="mov_bbb.ogg" type="video/ogg">
          </video>
        </div>
        <!-- video end --> 
      </div>
    </div>
  </div>
  <!-- CMS Banner & Video block End  --> 
  
  <!-- Latest News block Start  -->
  
  <div id="blog">
    <div class="container">
      <div class="row">
        <div class="col-md-9 news">
          <div class="Latest-News-title">
            <h2 class="tf">Latest Blog!<span> From newest items </span></h2>
          </div>
          <div class= "customNavigation"> <a class="btn Latest_prev prev"><i class="fa fa-angle-left"></i></a> <a class="btn Latest_next next"><i class="fa fa-angle-right"></i></a> 
          </div>
          <div id="Latest-News" class="owl-carousel ">
            @if($posts)
             @foreach($posts as $post)
            <div class="item">
              <div class="post">
                <div class="image"> <a href="{{route('blog.edit', $post->slug)}}"><img src="../posts_image/{{$post->photo->file}}" alt="post" title="post" class="img-responsive"></a> </div>
                <div class="content-details">
                  <div class="post-title">
                    <h3><a href="{{route('blog.edit', $post->slug)}}">{{$post->title}}</a></h3>
                  </div>
                  <div class="description">
                    <p>{!! \Illuminate\Support\Str::limit($post->body, 100) !!}</p>
                    <div class="read-more"> <a class="read-more" href="{{route('blog.edit', $post->slug)}}">Read More..</a> </div>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
           @endif
          </div>
        </div>
        </div>
    </div>
  </div>

  <!-- Latest News block End  --> 
  
  <!-- Brand logo block Start  -->
  <div id="brand">
    <div class="container">
      <div class="row brand">
        <div class="col-md-12">
          <div id="brand-logo" class="owl-carousel">
            <div class="item"><a href="#"><img src="frontend/images/brand1.png" alt="#"></a></div>
            <div class="item"><a href="#"><img src="frontend/images/brand2.png" alt="#"></a></div>
            <div class="item"><a href="#"><img src="frontend/images/brand3.png" alt="#"></a></div>
            <div class="item"><a href="#"><img src="frontend/images/brand4.png" alt="#"></a></div>
            <div class="item"><a href="#"><img src="frontend/images/brand5.png" alt="#"></a></div>
            <div class="item"><a href="#"><img src="frontend/images/brand6.png" alt="#"></a></div>
            <div class="item"><a href="#"><img src="frontend/images/brand7.png" alt="#"></a></div>
            <div class="item"><a href="#"><img src="frontend/images/brand8.png" alt="#"></a></div>
            <div class="item"><a href="#"><img src="frontend/images/brand9.png" alt="#"></a></div>
          </div>
          <div class= "customNavigation"> <a class="btn brand_prev prev"><i class="fa fa-angle-left"></i></a> <a class="btn brand_next next"><i class="fa fa-angle-right"></i></a> </div>
        </div>
      </div>
    </div>
  </div>

  @stop