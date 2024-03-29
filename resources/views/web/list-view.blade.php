@extends('layouts.webi.index')
@section('content')
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
        <div class="col-md-3 col-sm-3 col-xs-3">
          <div class="page-title">
            <h4>{{$categories->name}}</h4>
          </div>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-9">
          <div class="bread-crumb">
            <ul>
              <li><a href="/">Home</a></li>
              <li>\</li>
              <li><a href="">{{$categories->name}}</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- bredcrumb and page title block end  --> 
  
  <!-- left colunm and right colunm block end  -->
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
                  @if($cats)
                  @foreach($cats as $cat )
                  <li><a href="{{route('list', $cat->id)}}">{{$cat->name}}</a></li>
                  @endforeach
                  @endif
                </ul>
              </div>
              <div class="sidebar-widget Best-Products-block">
                <div class="sidebar-title">
                  <h4> Best Products</h4>
                </div>
                <ul class="title-toggle">
                  @if($prods)
                  @foreach($prods as $prod)
                  {!!Form::open(['method'=>'POST', 'action'=>'OrderController@store'])!!}
                  <li>
                    <div class="product-block ">
                      <div class="item col-md-4 col-sm-4 col-xs-4">
                        <div class="image"> <a href="{{route('product.show', $prod->slug)}}"><img class="img-responsive" title="T-shirt" alt="{{$prod->slug}}" src="/product_images/{{$prod->photo ? $prod->photo->product_file : ''}}"></a> </div>
                      </div>
                      <div class="item col-md-8 col-sm-8 col-xs-8">
                        <div class="product-details">
                          <div class="product-name">
                            <h5><input type="hidden" name="product_id" value="{{$prod->id}}"><a href="{{route('product.show', $prod->slug)}}">{{Str::limit($prod->name, 30)}}</a></h5>
                          </div>
                          <div class="review"></div>
                          <div class="price">
                            <input type="hidden" name="total_price" value="{{$prod->price}}">
                            <span class="price-new">${{$prod->price}}</span> 
                          </div>
                          <input type="hidden" name="qty" value="1">
                           <div class="addto-cart">
                             {!!Form::submit('Add to Cart', ['class'=>'btn btn-primary btn-sm'])!!}
                          </div>
                          <br>
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
        <!-- right block Start  -->
        <div class="col-md-9  col-sm-8">
          <div id="right">
            <div class="row">
              <div class="col-md-6">
                <div class="view">
                  <div class="grid">
                      <a href="{{route('category.show', $categories->id)}}">
                         <div class="grid-icon"></div>
                      </a> 
                  </div>
                  <div class="list active">
                      <a href="">
                         <div class="list-icon"></div>
                      </a> 
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="shoring pull-right">
                  <div class="short-by">
                    <p>Sort By</p>
                    <div class="select-item">
                      <select>
                        <option value="" selected="selected">Name (A to Z)</option>
                        <option value="">Name(Z - A)</option>
                        <option value="">price(low&gt;high)</option>
                        <option value="">price(high &gt; low)</option>
                        <option value="">rating(highest)</option>
                        <option value="">rating(lowest)</option>
                      </select>
                      <span class="fa fa-angle-down"></span> </div>
                  </div>
                  <div class="show-item">
                    <p>Show</p>
                    <div class="select-item">
                      <select>
                        <option value="" selected="selected">24</option>
                        <option value="">12</option>
                        <option value="">6</option>
                      </select>
                      <span class="fa fa-angle-down"></span> </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="product-list-view">
              <ul>
                @if($products)
                 @foreach($products as $product)
                  {!!Form::open(['method'=>'POST', 'action'=>'OrderController@store'])!!}
                <li>
                  <div class="product-block ">
                    <div class="item col-md-4 col-sm-6 col-xs-4">
                      <div class="image"> <a href="{{route('product.show', $product->slug)}}"><img class="img-responsive" title="{{$product->slug}}" alt="T-shirt" src="/product_images/{{$product->photo ? $product->photo->product_file : ''}}"></a> </div>
                    </div>
                    <div class="item col-md-8 col-sm-6 col-xs-8">
                      <div class="product-details">
                        <div class="product-name">
                           <input type="hidden" name="product_id" value="{{$product->id}}">
                          <h4><a href="{{route('product.show', $product->slug)}}">{{$product->name}}</a></h4>
                        </div>
                        <div class="review"> <span class="rate"> <i class="fa fa-star rated"></i> <i class="fa fa-star rated"></i> <i class="fa fa-star rated"></i> <i class="fa fa-star rated"></i> <i class="fa fa-star"></i> </span> 1 Review(s) | Add Your Review </div>
                        <div class="price"> 
                          <span class="price-new">
                             <input type="hidden" name="total_price" value="{{$product->price}}">
                                ${{$product->price}}
                          </span> 
                       </div>
                        <div class="product-discription">
                          <p>{{Str::limit($product->description,250)}}</p>
                        </div>
                        <input type="hidden" name="qty" value="1">
                        <div class="product-hov">
                          <ul>
                            <li class="wish"><a href="#"></a></li>
                            <li>
                              <div class="addtocart">
                                  {!!Form::submit('Add to Cart', ['class'=>'form-control'])!!}
                              </div>
                            </li>
                            <li class="compare"><a href="#"></a></li>
                          </ul>
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
            <div class="pagination-bar">
              <ul>
                {{$products->links()}}
              </ul>
            </div>
          </div>
        </div>
        <!-- right block end  --> 
      </div>
    </div>
  </div>

@stop