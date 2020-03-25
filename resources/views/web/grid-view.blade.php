@extends('layouts.webi.index')
@section ('content')
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
                  <li><a href="{{route('category.show', $cat->id)}}">{{$cat->name}}</a></li>
                  @endforeach
                  @endif

                </ul>
              </div>
            {{--   <div class="sidebar-widget Shop-by-block">
                <div class="sidebar-title">
                  <h4>Shop by</h4>
                </div>
                <ul class="title-toggle">
                  <li class="category">
                    <h5><a href="grid-view.html">Category</a></h5>
                    <ul>
                      <li><a href="grid-view.html">Bags 2 </a></li>
                      <li><a href="grid-view.html">Clothing x2 2 (0)</a></li>
                      <li><a href="grid-view.html">Lingerie 2 (0) </a></li>
                    </ul>
                  </li>
                  <li class="color">
                    <h5><a href="grid-view.html">Color</a></h5>
                    <ul>
                      <li><a href="grid-view.html">red (2) </a></li>
                      <li><a href="grid-view.html">blue (5)</a></li>
                      <li><a href="grid-view.html">yelow (0) </a></li>
                      <li><a href="grid-vier.html">black (4)</a></li>
                    </ul>
                  </li>
                  <li class="manufacture">
                    <h5><a href="grid-view.html">Manufacture</a></h5>
                    <ul>
                      <li><a href="grid-view.html">Bags 2 </a></li>
                      <li><a href="grid-view.html">Clothing x2 2 (0)</a></li>
                      <li><a href="grid-view.html">Lingerie 2 (0) </a></li>
                    </ul>
                  </li>
                </ul>
              </div> --}}
              <div class="sidebar-widget Best-Products-block">
                <div class="sidebar-title">
                  <h4> Best Products</h4>
                </div>
                <ul class="title-toggle">
                  <li>
                    @if($prods)
                      @foreach($prods as $prod)
                    <div class="product-block ">
                      <div class="item col-md-4 col-sm-4 col-xs-4">
                        <div class="image"> <a href="product-detail-view.html"><img class="img-responsive" title="T-shirt" alt="T-shirt" src="../product_images/{{$prod->photo ? $prod->photo->product_file : ''}}"></a>
                        </div>
                      </div>
                      <div class="item col-md-8 col-sm-8 col-xs-8">
                        <div class="product-details">
                          <div class="product-name">
                            <h5><a href="product-detail-view.html">{{$prod->name}} </a></h5>
                          </div>
                          <div class="review"></div>
                          <div class="price"> <span class="price-new">${{$prod->price}}</span> </div>
                          <div class="addto-cart"><a href="#">Add to Cart</a></div>
                        </div>
                      </div>
                    </div>
                     @endforeach
                    @endif
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <!-- left block end  --> 
        </div>
        <div class="col-md-9 col-sm-8"> 
          <!-- right block Start  -->
          <div id="right">
            <div class="row">
              <div class="col-md-6">
                <div class="view">
                  <div class="grid active "><a href="">
                    <div class="grid-icon "></div>
                    </a> </div>
                  <div class="list"><a href="{{route('list', $categories->id)}}">
                    <div class="list-icon "></div>
                    </a> </div>
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
            <div class="product-grid-view">
              <ul>
                <li>
                  @if($products)
                  @foreach($products as $product)
                  <div class="item col-md-4 col-sm-6 col-xs-6">
                    <div class="product-block ">
                      <div class="image"> <a href="product-detail-view.html"><img class="img-responsive" title="T-shirt" alt="T-shirt" src="../product_images/{{$product->photo ? $product->photo->product_file : ''}}"></a> </div>
                      <div class="product-details">
                        <div class="product-name">
                          <h4><a href="product-detail-view.html">{{$product->name}}</a></h4>
                        </div>
                        <div class="price">
                         <span class="price-new">${{$product->price}}</span> 
                       </div>
                        <div class="product-hov">
                          <ul>
                            <li class="wish"><a href="#"></a></li>
                            <li class="addtocart"><a href="#">Add to Cart</a> </li>
                            <li class="compare"><a href="#"></a></li>
                          </ul>
                          <div class="review"> <span class="rate"> <i class="fa fa-star rated"></i> <i class="fa fa-star rated"></i> <i class="fa fa-star rated"></i> <i class="fa fa-star rated"></i> <i class="fa fa-star"></i> </span> </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                 @endforeach
                 @endif
              </ul>
            </div>
          </div>
          <div class="row">
            <div class="pagination-bar">
              <ul style="line-height: auto;">
                {{$products->links()}}
              </ul>
            </div>
          </div>
          <!-- right block end  --> 
        </div>
      </div>
    </div>
  </div>


@stop