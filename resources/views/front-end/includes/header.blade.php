<div class="site-header header-4 mb--20 d-none d-lg-block">
    <div class="header-top header-top--style-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">

                </div>
                <div class="col-lg-8 flex-lg-right">
                    <ul class="header-top-list">
                        @if(Session::get('customerId'))
                        <li class="dropdown-trigger language-dropdown">
                            <a href="#">
                                {{--<i class="icons-left fas fa-user"></i>--}}
                                <img src="{{asset($customer->profileImage)}}" alt="profileImage" class="img-fluid rounded-circle" width="20" height="20">
                                {{Session::get('customerName')}}
                            </a>

                            <i class="fas fa-chevron-down dropdown-arrow"></i>
                            <ul class="dropdown-box">
                                <li> <a href="{{route('my-account')}}">My Account</a></li>
                                <li> <a href="{{route('my-account')}}">Order History</a></li>
                                <li> <a href="{{route('my-account')}}">Downloads</a></li>
                                <li> <a href="#" onclick="document.getElementById('customerLogoutForm').submit()">Logout</a></li>
                                {!! Form::open(['route'=>'customer-logout', 'method'=>'POST', 'id'=>'customerLogoutForm']) !!}

                                {!! Form::close() !!}
                            </ul>
                        </li>
                        @else
                            <li class="">
                                <a href="{{route('register-login')}}">
                                    <i class="icons-left fas fa-user"></i>
                                    Login
                                </a>
                            </li>
                        @endif

                        <li><a href="{{route('contact')}}"><i class="icons-left fas fa-phone"></i> Contact</a>
                        </li>
                        <li><a href="{{route('checkout')}}"><i class="icons-left fas fa-share"></i> Checkout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="header-middle pt--10 pb--10">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <a href="{{route('/')}}" class="site-brand">
                        <img src="{{asset('/')}}front-end/image/logo.png" alt="">
                        <div class="text-center">
                            <a href="#">Logo source Logodesign.net</a>
                        </div>

                    </a>
                </div>
                <div class="col-lg-5">
                    <div class="header-search-block">
                        {!! Form::open(['route'=>'search-page', 'method'=>'GET']) !!}
                            <input type="text" name="search" placeholder="Search with bookname or authorname">
                            <button type="submit" name="btn">Search</button>
                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="main-navigation flex-lg-right">
                        <div class="cart-widget">
                            @if(Session::get('customerId'))

                            @else
                                <div class="login-block">
                                    <a href="{{route('register-login')}}" class="font-weight-bold">Login</a> <br>
                                    <span>or</span><a href="{{route('register-login')}}">Register</a>
                                </div>
                            @endif

                            <div class="cart-block">
                                <a href="{{route('show-cart')}}">
                                        <div class="cart-total">
                                            @php($i=1)
                                            @foreach($cartBooks as $cartBook)
                                            <span class="text-number">
                                                {{$i++}}
                                            </span>
                                            @endforeach
                                            <span class="text-item">
                                                Shopping Cart
                                            </span>
                                            <span class="price">
                                                ৳0.00
                                                <i class="fas fa-chevron-down"></i>
                                            </span>
                                        </div>
                                </a>
                                <div class="cart-dropdown-block">
                                    @foreach($cartBooks as $cartBook)
                                    <div class=" single-cart-block">
                                        <div class="cart-product">
                                            <a href="#" class="image">
                                                <img src="{{asset($cartBook->options->image)}}" alt="" class="img-fluid" height="123" width="80">
                                            </a>
                                            <div class="content">
                                                <h3 class="title">{{$cartBook->name}}
                                                </h3>
                                                <p class="price">৳00.00</p>
                                                <p class="price-old">৳{{$cartBook->price}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                    <div class=" single-cart-block ">
                                        <div class="btn-block">
                                            <a href="{{route('show-cart')}}" class="btn">View Cart <i
                                                    class="fas fa-chevron-right"></i></a>
                                            <a href="{{route('checkout')}}" class="btn btn--primary">Check Out <i
                                                    class="fas fa-chevron-right"></i></a>
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


    <div class="header-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <nav class="category-nav  primary-nav show">
                        <div class="mt-2">
                            <a href="javascript:void(0)" class="category-trigger">
                                <i class="fa fa-bars"></i>
                                Browse categories
                            </a>
                              <ul class="category-menu">
                                 @foreach($categories as $category)
                                      @if(count($category->subcategories)>0)

                                  <li class="cat-item has-children">
                                      <a href="#">{{$category->categoryName}}</a>
                                      <ul class="sub-menu">
                                          @foreach($category->subcategories as $subcategory)
                                          <li>
                                              <a href="{{route('subcategory-page',['id'=>$subcategory->id])}}">{{$subcategory->subcategoryName}}</a>
                                          </li>
                                          @endforeach
                                      </ul>
                                  </li>
                                      @else
                                          <li class="cat-item">
                                              <a href="#">{{$category->categoryName}}</a>
                                          </li>
                                      @endif
                                  @endforeach
                              </ul>
                        </div>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header-phone ">
                        <div class="icon">
                            <i class="fas fa-headphones-alt"></i>
                        </div>
                        <div class="text">
                            <p>Free Support 24/7</p>
                            <p class="font-weight-bold number">+880 1918845404</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="main-navigation flex-lg-right">
                        <ul class="main-menu menu-right li-last-0">
                            <li class="menu-item">
                                <a href="{{route('/')}}">Home</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{route('all-books')}}">Books</a>
                            </li>

                            <li class="menu-item">
                                <a href="{{route('contact')}}">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{---------------------------------------------------------------------------------}}
<div class="site-mobile-menu">
    <header class="mobile-header d-block d-lg-none pt--10 pb-md--10">
        <div class="container">
            <div class="row align-items-sm-end align-items-center">
                <div class="col-md-4 col-7">
                    <a href="{{route('/')}}" class="site-brand text-center">
                        <img src="{{asset('/')}}front-end/image/logo.png" alt="">
                        <a href="#">Logo source Logodesign.net</a>
                    </a>
                </div>
                <div class="col-md-5 order-3 order-md-2">
                    <nav class="category-nav  primary-nav">
                        <div>
                            <a href="javascript:void(0)" class="category-trigger"><i
                                    class="fa fa-bars"></i>Browse categories</a>
                            <ul class="category-menu">
                                @foreach($categories as $category)
                                    @if(count($category->subcategories)>0)

                                        <li class="cat-item has-children">
                                            <a href="#">{{$category->categoryName}}</a>
                                            <ul class="sub-menu">
                                                @foreach($category->subcategories as $subcategory)
                                                    <li>
                                                        <a href="{{route('subcategory-page',['id'=>$subcategory->id])}}">{{$subcategory->subcategoryName}}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @else
                                        <li class="cat-item">
                                            <a href="#">{{$category->categoryName}}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="col-md-3 col-5  order-md-3 text-right">
                    <div class="mobile-header-btns header-top-widget">
                        <ul class="header-links">
                            <li class="sin-link">
                                <a href="{{route('show-cart')}}" class="cart-link link-icon"><i class="ion-bag"></i>
                                    @php($i=1)
                                    @foreach($cartBooks as $cartBook)
                                        <span class="text-number">
                                                {{$i++}}
                                            </span>
                                    @endforeach
                                </a>
                            </li>
                            <li class="sin-link">
                                <a href="javascript:" class="link-icon hamburgur-icon off-canvas-btn"><i
                                        class="ion-navicon"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--Off Canvas Navigation Start-->
    <aside class="off-canvas-wrapper">
        <div class="btn-close-off-canvas">
            <i class="ion-android-close"></i>
        </div>
        <div class="off-canvas-inner">
            <!-- search box start -->
            <div class="search-box offcanvas">
                {!! Form::open(['route'=>'search-page', 'method'=>'GET']) !!}
                <input type="text" placeholder="Search Here" name="search">
                <button class="search-btn" type="submit" name="btn"><i class="ion-ios-search-strong"></i></button>
                {!! Form::close() !!}
            </div>
            <!-- search box end -->
            <!-- mobile menu start -->
            <div class="mobile-navigation">
                <!-- mobile menu navigation start -->
                <nav class="off-canvas-nav">
                    <ul class="main-menu menu-right li-last-0">
                        <li class="menu-item">
                            <a href="{{route('/')}}">Home</a>
                        </li>
                        <li class="menu-item">
                            <a href="{{route('all-books')}}">Books</a>
                        </li>

                        <li class="menu-item">
                            <a href="{{route('contact')}}">Contact</a>
                        </li>
                    </ul>
                </nav>
                <!-- mobile menu navigation end -->
            </div>
            <!-- mobile menu end -->
            <nav class="off-canvas-nav">
                <ul class="mobile-menu menu-block-2">

                    @if(Session::get('customerId'))
                        <li class="menu-item-has-children">
                            <a href="#">
                                {{--<i class="icons-left fas fa-user"></i>--}}
                                <img src="{{asset($customer->profileImage)}}" alt="profileImage" class="img-fluid rounded-circle" width="20" height="20">
                                {{Session::get('customerName')}}</a>
                            <i class="fas fa-angle-down"></i>
                            <ul class="sub-menu">
                                <li> <a href="{{route('my-account')}}">My Account</a></li>
                                <li> <a href="{{route('my-account')}}">Order History</a></li>
                                <li> <a href="{{route('my-account')}}">Downloads</a></li>
                                <li> <a href="#" onclick="document.getElementById('customerLogoutForm').submit()">Logout</a></li>
                                {!! Form::open(['route'=>'customer-logout', 'method'=>'POST', 'id'=>'customerLogoutForm']) !!}

                                {!! Form::close() !!}
                            </ul>
                        </li>
                    @else
                        <li class="">
                            <a href="{{route('register-login')}}">
                                <i class="icons-left fas fa-user"></i>
                                Login
                            </a>
                        </li>
                    @endif

                    {{-- <li class="menu-item-has-children">
                         <a href="#">My Account <i class="fas fa-angle-down"></i></a>
                         <ul class="sub-menu">
                             <li><a href="{{route('my-account')}}">My Account</a></li>
                             <li><a href="{{route('my-account')}}">Order History</a></li>
                             <li><a href="{{route('my-account')}}">Transactions</a></li>
                             <li><a href="{{route('my-account')}}">Downloads</a></li>
                             <li> <a href="#" onclick="document.getElementById('customerLogoutForm').submit()">Logout</a></li>
                             {!! Form::open(['route'=>'customer-logout', 'method'=>'POST', 'id'=>'customerLogoutForm']) !!}

                             {!! Form::close() !!}
                         </ul>
                     </li>--}}
                </ul>
            </nav>
            <div class="off-canvas-bottom">
                <div class="contact-list mb--10">
                    <a href="" class="sin-contact"><i class="fas fa-mobile-alt"></i>+880 1918845404</a>
                    <a href="" class="sin-contact"><i class="fas fa-envelope"></i>limonionfoo@gmail.com</a>
                </div>
                <div class="off-canvas-social">
                    <a href="#" class="single-icon"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="single-icon"><i class="fab fa-twitter"></i></a>
                    {{-- <a href="#" class="single-icon"><i class="fas fa-rss"></i></a>--}}
                    <a href="#" class="single-icon"><i class="fab fa-youtube"></i></a>
                    <a href="#" class="single-icon"><i class="fab fa-google-plus-g"></i></a>
                    {{-- <a href="#" class="single-icon"><i class="fab fa-instagram"></i></a>--}}
                </div>
            </div>
        </div>
    </aside>
    <!--Off Canvas Navigation End-->
</div>
<div class="sticky-init fixed-header common-sticky">
    <div class="container d-none d-lg-block">
        <div class="row align-items-center">
            <div class="col-lg-4">
                <a href="{{route('/')}}" class="site-brand text-center">
                    <img src="{{asset('/')}}front-end/image/logo.png" alt="">
                    <a href="#">Logo source Logodesign.net</a>
                </a>
            </div>
            <div class="col-lg-8">
                <div class="main-navigation flex-lg-right">
                    <ul class="main-menu menu-right li-last-0">
                        <li class="menu-item">
                            <a href="{{route('/')}}">Home</a>

                        </li>
                        <li class="menu-item">
                            <a href="{{route('all-books')}}">Books</a>
                        </li>

                        <li class="menu-item">
                            <a href="{{route('contact')}}">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
