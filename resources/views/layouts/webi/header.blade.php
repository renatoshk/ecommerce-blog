  <div class="header">
    <div class="header-top">
      <div class="container">
        <div class="call pull-left">
          <p>Call us toll free : <span>+355699812168</span></p>
        </div>
        <div class="user-info pull-right">
          <div class="user">
            <ul>
             @if(Auth::guest())
                     @include('auth.login')
                     @include('auth.register')
                @else
                    <li><a href="/">Home</a></li>
                    <li><a href="/profile">Profile</a></li>
                    <li><a href="{{route('logout')}}" onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                                  {{ __('Logout')}}
                        </a>
                    </li>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                   @csrf
                  </form>

            @endif
            @if(Auth::check()) 
              @if(Auth::user()->role_id == 1 && Auth::user()->is_active == 1)
                <li>
                  <a href="/adm">Admin</a>
                </li>
              @endif
            @endif 
         
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="header-mid">
      <div class="container">
        <div class="row">
          <div class="col-md-3 header-left">
            <div class="logo"> <a href="/"><img src="{{asset('frontend/images/logo.png')}}" alt="#"></a> </div>
          </div>
          <div class="col-md-6 search_block">
            <div class="search">
              <form action="http://localhost/blog/public/grid-view">
                <div class="search_cat">
                  <select class="search-category" name="search-category">
                    <option class="computer" selected>All Categories</option>
                    <option class="computer">Men</option>
                    <option class="computer">Women</option>
                    <option class="computer">Kids</option>
                    <option class="computer">Computer</option>
                    <option class="computer">Electronics</option>
                  </select>
                  <span class="fa fa-angle-down"></span> </div>
                <input type="text" placeholder="Search...">
                <button type="submit" class="btn submit"> <span class="fa fa-search"></span></button>
              </form>
            </div>
          </div>
          <div class="col-md-3 header-right">
            <div class="cart">
              <div class="cart-icon dropdown"></div>
              <a aria-expanded="false" aria-haspopup="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="http://localhost/blog/public/cart">My Cart( 2 )<span> $261.20</span></a>
              <ul class="dropdown-menu pull-right cart-dropdown-menu">
                <li>
                  <table class="table table-striped">
                    <tbody>
                      <tr>
                        <td class="text-center"><a href="product.html"><img class="img-thumbnail" src="images/product/car3-70x92.jpg" alt="img"></a></td>
                        <td class="text-left"><a href="#">Black African Print Pencil Skirt</a></td>
                        <td class="text-right quality">X1</td>
                        <td class="text-right price-new">$254.00</td>
                        <td class="text-center"><button type="button" title="Remove" class="btn btn-xs remove"><i class="fa fa-times"></i></button></td>
                      </tr>
                      <tr>
                        <td class="text-center"><a href="product.html"><img class="img-thumbnail" src="images/product/car3-70x92.jpg" alt="img"></a></td>
                        <td class="text-left"><a href="#">Black African Print Pencil Skirt</a></td>
                        <td class="text-right quality">X1</td>
                        <td class="text-right price-new">$254.00</td>
                        <td class="text-center"><button type="button" title="Remove" class="btn btn-xs remove"><i class="fa fa-times"></i></button></td>
                      </tr>
                    </tbody>
                  </table>
                </li>
                <li>
                  <div class="minitotal">
                    <table class="table pricetotal">
                      <tbody>
                        <tr>
                          <td class="text-right"><strong>Sub-Total</strong></td>
                          <td class="text-right price-new">$210.00</td>
                        </tr>
                        <tr>
                          <td class="text-right"><strong>Eco Tax (-2.00)</strong></td>
                          <td class="text-right price-new">$2.00</td>
                        </tr>
                        <tr>
                          <td class="text-right"><strong>VAT (20%)</strong></td>
                          <td class="text-right price-new">$42.00</td>
                        </tr>
                        <tr>
                          <td class="text-right"><strong>Total</strong></td>
                          <td class="text-right price-new">$254.00</td>
                        </tr>
                      </tbody>
                    </table>
                    <div class="controls"> <a class="btn btn-primary pull-left" href="http://localhost/blog/public/cart" id="view-cart"><i class="fa fa-shopping-cart"></i> View Cart </a> <a class="btn btn-primary pull-right" href="http://localhost/blog/public/checkout" id="checkout"><i class="fa fa-share"></i> Checkout</a> </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>