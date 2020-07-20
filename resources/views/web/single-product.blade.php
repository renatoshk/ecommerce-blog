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
      <h3>{{ Session::get('flash_message') }}</h3>
  </div>
@endif
<br>
  
  <!-- bredcrumb and page title block start  -->
  <div id="bread-crumb">
    <div class="container">
      <div class="row">
        <div class="col-md-3"> 
          <div class="page-title">
            <h4>{{$prods->category->name ? $prods->category->name : '' }}</h4>
          </div>
        </div>
        <div class="col-md-9">
          <div class="bread-crumb">
            <ul>
              <li><a href="/">Home</a></li>
              <li>\</li>
              <li><a href="">{{$prods->category->name ? $prods->category->name : '' }}</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- bredcrumb and page title block end  -->
  
  <div id="product-category">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-4"> 
          <!-- left block Start  -->
          <div id="left">
            <div class="sidebar-block">
              <div class="sidebar-widget Category-block">
                <div class="sidebar-title">
                  <h4> Categories</h4>
                </div>
                <ul class="title-toggle">
                  @if($categories)
                    @foreach($categories as $category)
                     <li><a href="{{route('category.show', $category->id)}}">{{$category->name}}</a></li>
                    @endforeach
                  @endif
                </ul>
              </div>
              <div class="sidebar-widget Best-Products-block">
                <div class="sidebar-title">
                  <h4> Best Products</h4>
                </div>
                <ul class="title-toggle">
                  @if($products)
                  @foreach($products as $product)
                  {!!Form::open(['method'=>'POST', 'action'=>'OrderController@store'])!!}
                  <li>
                    <div class="product-block ">
                      <div class="item col-md-4 col-sm-4 col-xs-4">
                        <div class="image"> <a href="{{route('product.show', $product->slug)}}"><img class="img-responsive" title="{{$product->slug}}" alt="T-shirt" src="/product_images/{{$product->photo ? $product->photo->product_file : ''}}"></a> </div>
                      </div>
                      <div class="item col-md-8 col-sm-8 col-xs-8">
                        <div class="product-details">
                          <div class="product-name">
                            <h5><input type="hidden" name="product_id" value="{{$product->slug}}"><a href="{{route('product.show', $product->slug)}}">{{Str::limit($product->name,30)}}</a></h5>
                          </div>

                          <div class="review"></div>
                          <div class="price">
                             <input type="hidden" name="total_price" value="{{$product->price}}"> <span class="price-new">${{$product->price}}</span> 
                          </div>
                          <input type="hidden" name="qty" value="1">
                          <div class="addto-cart">
                             {!!Form::submit('Add to Cart', ['class'=>'btn btn-primary btn-sm'])!!}
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                  {!!Form::close()!!}
                  @endforeach
                  @endif
                </ul>
              </div>
            </div>
          </div>
          <!-- left block end  --> 
        </div>
        <div class="col-md-9 col-sm-8"> 
          <!-- right block Start  -->
          <div id="right">
            <div class="product-detail-view">
              <div class="row">
                <div class="col-md-6">
                  <div class="sp-wrap"> 
                      <a class="item" href="{{route('product.show', $prods->slug)}}">
                        <img style="height: auto; width: auto" src="/product_images/{{$prods->photo ? $prods->photo->product_file : ''}}" alt="">
                      </a> 
                  </div>
                </div>
                <div class="col-md-6">
                 {!!Form::open(['method'=>'POST', 'action'=>'OrderController@store'])!!}
                  <div class="product-detail-content">
                    <div class="product-name">
                      <input type="hidden" name="product_id" value="{{$prods->id}}"><h4><a href="{{route('product.show', $prods->slug)}}">{{$prods->name}}</a></h4>
                    </div>
                    <div class="review"> <span class="rate"> <i class="fa fa-star rated"></i> <i class="fa fa-star rated"></i> <i class="fa fa-star rated"></i> <i class="fa fa-star rated"></i> <i class="fa fa-star"></i> </span> 15 Review(s) | <a href="#">Add Your Review </a> </div>
                    <div class="price">
                      <input type="hidden" name="total_price" value ={{$prods->price}}><span class="price-new">${{$prods->price}}</span> 
                    </div>
                    <div class="stock"><span>In stock : </span>{{$prods->status}}</div>
                    <input type="hidden" name="prod_qty" value="{{$prods->qty}}">
                    <div class="product-qty">
                    @if(Auth::user())
                      <label for="qty">Qty:</label>
                        <div class="custom-qty">
                        <button onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) result.value--;return false;" class="reduced items" type="button"> <i class="fa fa-minus"></i> </button>
                        <input type="text" class="input-text qty" title="Qty" value="1"  id="qty" name="qty">
                        <button onclick="var result = document.getElementById('qty'); var qty = result.value; if(qty < {{$prods->qty}}) result.value++;return false;" class="increase items" type="button"> <i class="fa fa-plus"></i> </button>
                        </div>
                    </div>
                    <div  class="add-to-cart">
                    {!!Form::submit('Add to Cart', ['class'=>'btn btn default'])!!}
                    </div>
     
                    <ul class="add-links">
                      <li> <a class="add-to-wishlist" href="#"> <i class="fa fa-heart-o"></i> Add to Wishlist </a></li>
                      <li> <a class="link-compare" href="#"> <i class="fa fa-bar-chart"></i> Add to Compare </a></li>
                    </ul>
                     @endif
                  </div>
                  {!!Form::close()!!}
                </div>
              </div>
            </div>
            <div class="product-detail-tab">
              <div class="row">
                <div class="col-md-12">
                  <div id="tabs">
                    <ul class="nav nav-tabs">
                      <li><a class="tab-Description selected" title="Description">Description</a></li>
                    </ul>
                  </div>
                  <div id="items">
                    <div class="tab-content">
                      <ul>
                        <li>
                          <div class="items-Description selected">
                            <div class="Description"> 
                              <strong>{{$prods->description}}</strong>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="Related-product">
              <div class="row">
                <div class="col-md-12">
                  <div class="Featured-Products-title">
                    <h1 class="tf">Related Products</h1>
                  </div>
                  <div class= "customNavigation"> <a class="btn related_prev prev"><i class="fa fa-angle-left"></i></a> <a class="btn related_next next"><i class="fa fa-angle-right"></i></a> </div>
                  <div id="related-products" class="owl-carousel">
                      @if($same_cats_prods)
                       @foreach($same_cats_prods as $same_cat_prod)
                       {!!Form::open(['method'=>'POST', 'action'=>'OrderController@store'])!!}
                    <div class="item">
                      <div class="product-block ">
                        <div class="image"> <a href="{{route('product.show', $same_cat_prod->slug)}}"><img class="img-responsive" title="{{$same_cat_prod->slug}}" alt="T-shirt" src="/product_images/{{$same_cat_prod->photo ? $same_cat_prod->photo->product_file : ''}}"></a> </div>
                        <div class="product-details">
                          <div class="product-name">
                            <h4><input type="hidden" name="product_id" value="{{$same_cat_prod->id}}"><a href="{{route('product.show', $same_cat_prod->slug)}}">{{$same_cat_prod->name}}</a></h4>
                          </div>
                          <input type="hidden" name="total_price" value="{{$same_cat_prod->price}}"><div class="price"><span class="price-new">${{$same_cat_prod->price}}</span> </div>
                          <input type="hidden" name="qty" value="1">
                          <div class="product-hov">
                            <ul>
                              <li class="wish"><a href="#" ></a></li>
                              <button class="addtocart">
                                <li>Add to Cart</li> 
                              </button>
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
          <!-- right block end  --> 
        </div>
      </div>
    </div>
  </div>
  




@stop