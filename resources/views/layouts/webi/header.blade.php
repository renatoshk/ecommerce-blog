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
                   
                    <li><a href="{{route('profile.edit', Auth::user()->id)}}">Profile</a></li>
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
          @yield('header_cart')
        </div>
      </div>
    </div>
  </div>

