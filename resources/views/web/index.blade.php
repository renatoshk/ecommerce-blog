@extends('layouts.webi.index')
@section('categories')
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
  <div id="fashion-sale">
    <div class="container">
      <div class="row">
        <div class="col-md-12 fashion">
          <div class="box">
            <div id="fashion-product" class="owl-carousel fashion-product">
              <div class="item">
                <div class="product-block ">
                  <div class="image"> <a href="#"><img class="img-responsive" title="pursh" alt="pursh" src="frontend/images/product/pro1.png"></a> </div>
                  <div class="product-details">
                    <div class="product-name">
                      <h3><a href="#">Cosmetics</a></h3>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="product-block ">
                  <div class="image"> <a href="#"><img class="img-responsive" title="sandle" alt="sandal" src="frontend/images/product/pro2.png"></a> </div>
                  <div class="product-details">
                    <div class="product-name">
                      <h3><a href="#">Jewelry</a></h3>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="product-block ">
                  <div class="image"> <a href="#"><img class="img-responsive" title="jeans" alt="jeans" src="frontend/images/product/pro3.png"></a> </div>
                  <div class="product-details">
                    <div class="product-name">
                      <h3><a href="#">Smart TV </a></h3>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="product-block ">
                  <div class="image"> <a href="#"><img class="img-responsive" title="jeans" alt="jeans" src="frontend/images/product/pro4.png"></a> </div>
                  <div class="product-details">
                    <div class="product-name">
                      <h3><a href="#">Cellphones</a></h3>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="product-block ">
                  <div class="image"> <a href="#"><img class="img-responsive" title="jeans" alt="jeans" src="frontend/images/product/pro5.png"></a> </div>
                  <div class="product-details">
                    <div class="product-name">
                      <h3><a href="#">Handbags</a></h3>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="product-block ">
                  <div class="image"> <a href="#"><img class="img-responsive" title="jeans" alt="jeans" src="frontend/images/product/pro6.png"></a> </div>
                  <div class="product-details">
                    <div class="product-name">
                      <h3><a href="#">Electronics</a></h3>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="product-block ">
                  <div class="image"> <a href="#"><img class="img-responsive" title="pursh" alt="pursh" src="frontend/images/product/pro7.png"></a> </div>
                  <div class="product-details">
                    <div class="product-name">
                      <h3><a href="#">Fashion </a></h3>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="product-block ">
                  <div class="image"> <a href="#"><img class="img-responsive" title="sandle" alt="sandal" src="frontend/images/product/pro4.png"></a> </div>
                  <div class="product-details">
                    <div class="product-name">
                      <h3><a href="#">Cellphones </a></h3>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="product-block ">
                  <div class="image"> <a href="#"><img class="img-responsive" title="jeans" alt="jeans" src="frontend/images/product/pro5.png"></a> </div>
                  <div class="product-details">
                    <div class="product-name">
                      <h3><a href="#">Handbags</a></h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Fashio Sale block End  --> 
  
  <!-- 3 CMS Block Start -->
  <div id="cms">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class= "cms-block1 col-sm-4 col-sm-12">
            <div class="stf">FREE SHIPPING & RETURN*</div>
            <p>For all orders over $500</p>
          </div>
          <div class= "cms-block2 col-sm-4 col-sm-12">
            <div class="stf">MONEY BACK GUARANTEE</div>
            <p>Return Over 30 Days</p>
          </div>
          <div class= "cms-block3 col-sm-4 col-sm-12">
            <div class="stf">25% ON STUDENT DISCOUNT</div>
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
              <div class="item">
                <div class="product-block ">
                  <div class="image"> <a href="http://localhost/blog/public/product_detail"><img class="img-responsive" title="T-shirt" alt="T-shirt" src="../product_images/{{$product->photo ? $product->photo->product_file : 'No Photo'}}"></a> </div>
                  <div class="product-details">
                    <div class="product-name">
                      <h3><a href="/product_detail">{{$product->name}}</a></h3>
                    </div>
                    <div class="price"> <span class="price-old">$123.20</span> <span class="price-new">${{$product->price}}</span> </div>
                    <div class="product-hov">
                      <ul>
                        <li class="wish"><a href="#" ></a></li>
                        <li class="addtocart"><a href="#" >Add to Cart</a> </li>
                        <li class="compare"><a href="#" ></a></li>
                      </ul>
                      <div class="review"> <span class="rate"> <i class="fa fa-star rated"></i> <i class="fa fa-star rated"></i> <i class="fa fa-star rated"></i> <i class="fa fa-star rated"></i> <i class="fa fa-star"></i> </span> </div>
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
            <source src="frontend/video/Fashion_Film.mp4" type="video/mp4">
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
          <div class= "customNavigation"> <a class="btn Latest_prev prev"><i class="fa fa-angle-left"></i></a> <a class="btn Latest_next next"><i class="fa fa-angle-right"></i></a> </div>
          <div id="Latest-News" class="owl-carousel ">
            <div class="item">
              <div class="post">
                <div class="image"> <a href="http://localhost/blog/public/blog"><img src="frontend/images/blog4.jpg" alt="post" title="post" class="img-responsive"></a> </div>
                <div class="content-details">
                  <div class="post-title">
                    <h3><a href="http://localhost/blog/public/blog">Image post contant wrider with exampler the ttis ant</a></h3>
                  </div>
                  <div class="description">
                    <p>This ante posuere ac Mauris non turpis eu metus congue metus sagittis metus Fusce at .</p>
                    <div class="read-more"> <a class="read-more" href="http://localhost/blog/public/single_post">Read More..</a> </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="post">
                <div class="image"> <a href="http://localhost/blog/public/blog"><img src="frontend/images/blog1.jpg" alt="post" title="post" class="img-responsive"></a> </div>
                <div class="content-details">
                  <div class="post-title">
                    <h3><a href="http://localhost/blog/public/blog">Image post contant wrider with exampler the ttis ant</a></h3>
                  </div>
                  <div class="description">
                    <p>This ante posuere ac Mauris non turpis eu metus congue metus sagittis metus Fusce at .</p>
                    <div class="read-more"> <a class="read-more" href="http://localhost/blog/public/single_post">Read More..</a> </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="post">
                <div class="image"> <a href="http://localhost/blog/public/blog"><img src="frontend/images/blog3.jpg" alt="post" title="post" class="img-responsive"></a> </div>
                <div class="content-details">
                  <div class="post-title">
                    <h3><a href="http://localhost/blog/public/blog">Image post contant wrider with exampler the ttis ant</a></h3>
                  </div>
                  <div class="description">
                    <p>This ante posuere ac Mauris non turpis eu metus congue metus sagittis metus Fusce at .</p>
                    <div class="read-more"> <a class="read-more" href="http://localhost/blog/public/single_post">Read More..</a> </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="post">
                <div class="image"> <a href="http://localhost/blog/public/blog"><img src="frontend/images/blog4.jpg" alt="post" title="post" class="img-responsive"></a> </div>
                <div class="content-details">
                  <div class="post-title">
                    <h3><a href="http://localhost/blog/public/blog">Image post contant wrider with exampler the ttis ant</a></h3>
                  </div>
                  <div class="description">
                    <p>This ante posuere ac Mauris non turpis eu metus congue metus sagittis metus Fusce at .</p>
                    <div class="read-more"> <a class="read-more" href="http://localhost/blog/public/single_post">Read More..</a> </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="post">
                <div class="image"> <a href="http://localhost/blog/public/blog"><img src="frontend/images/blog5.jpg" alt="post" title="post" class="img-responsive"></a> </div>
                <div class="content-details">
                  <div class="post-title">
                    <h3><a href="http://localhost/blog/public/blog">Image post contant wrider with exampler the ttis ant</a></h3>
                  </div>
                  <div class="description">
                    <p>This ante posuere ac Mauris non turpis eu metus congue metus sagittis metus Fusce at .</p>
                    <div class="read-more"> <a class="read-more" href="http://localhost/blog/public/single_post">Read More..</a> </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 special">
          <div class="Special-title">
            <h2 class="tf">Best<samp> Offers</samp></h2>
          </div>
          <div class= "customNavigation"> <a class="special_prev"><i class="fa fa-angle-left"></i></a>
            <div id="owlStatus">
              <div class="currentItem">
                <div class="result"></div>
              </div>
              /
              <div class="owlItems">
                <div class="result"></div>
              </div>
            </div>
            <a class="special_next"><i class="fa fa-angle-right"></i></a> </div>
          <div class="Special-product">
            <div id="special" class="owl-carousel">
              <div class="item"><a href="#"><img src="frontend/images/special-banner.jpg" alt="#"></a> </div>
              <div class="item"><a href="#"><img src="frontend/images/special-banner2.jpg" alt="#"></a></div>
              <div class="item"><a href="#"><img src="frontend/images/special-banner3.jpg" alt="#"></a></div>
              <div class="item"><a href="#"><img src="frontend/images/special-banner4.jpg" alt="#"></a></div>
            </div>
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