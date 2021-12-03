<!-- HEADER -->
<header>
    @if (Session::get('totalPrice') != null)
        {{Session::put('totalPrice', 0)}}
    @endif
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li><a href="tel:+84857577732"><i class="fa fa-phone"></i>0857577732</a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i> lhongphong175@gmail.com</a></li>
                <li><a href="#"><i class="fa fa-map-marker"></i> Ly Nhan-Ha Nam</a></li>
            </ul>
            <ul class="header-links pull-right">
                <li><a href="#"><i class="fa fa-dollar"></i> VND</a></li>
                <li><a href="#"><i class="fa fa-user-o"></i>{{SESSION::get('name')}}</a></li>
                <li><a href="{{asset('user.logout')}}"><i></i> Đăng xuất</a></li>
            </ul>
        </div>
    </div>
    <!-- /TOP HEADER -->

    <!-- MAIN HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="{{ route('product.index') }}" class="logo">
                            <img src="{{ asset('/Images/logo4.png') }}" alt="">
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->

                <!-- SEARCH BAR -->
                <div class="col-md-6">
                    <div class="header-search">
                        <form>
                            <select class="input-select">
                                <option value="0">All Product</option>
                                <option value="1">Váy cưới</option>
                                <option value="1">Vest cưới</option>
                            </select>
                            <input class="input" placeholder="Search here">
                            <button class="search-btn">Search</button>
                        </form>
                    </div>
                </div>
                <!-- /SEARCH BAR -->

                <!-- ACCOUNT -->
                <div class="col-md-3 clearfix">
                    <div class="header-ctn">
                        <!-- Wishlist -->
                        <div>
                            <a href="#">
                                <i class="fa fa-heart-o"></i>
                                <span>Your Wishlist</span>
                                <div class="qty">2</div>
                            </a>
                        </div>
                        <!-- /Wishlist -->

                        <!-- Cart -->
                        <div class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Your Cart</span>
                                <div class="qty">@if(Session::get('cartCustomerInfor') != null) {{ count(Session::get('cartCustomerInfor')) }} @else 0 @endif</div>
                            </a>
                            <div class="cart-dropdown">
                                <div class="cart-list">
                                    @if(Session::get('cartCustomerInfor') != null)
                                    @foreach (Session::get('cartCustomerInfor') as $item)
                                    @php
                                        Session::put('totalPrice', Session::get('totalPrice') + $item['quantity']*$item['model']->price)
                                    @endphp
                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="{{ asset("/Images") }}/{{ $item['model']->images }}" alt="">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-name"><a href="{{ route('product.viewDetailName', ['id_product'=>$item['id_product']]) }}">{{ $item['model']->name }}</a></h3>
                                            <h4 class="product-price"><span class="qty">{{ $item['quantity'] }}x</span>@money($item['model']->price)</h4>
                                        </div>
                                        <button class="delete"><i class="fa fa-close"></i></button>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                                <div class="cart-summary">
                                    <small>@if(Session::get('cartCustomerInfor') != null) {{ count(Session::get('cartCustomerInfor')) }} @else 0 @endif Item(s) selected</small>
                                    <h5>SUBTOTAL: @money(Session::get('totalPrice'))</h5>
                                </div>
                                <div class="cart-btns">
                                    <a href="#">View Cart</a>
                                    <a href="#">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- /Cart -->

                        <!-- Menu Toogle -->
                        <div class="menu-toggle">
                            <a href="#">
                                <i class="fa fa-bars"></i>
                                <span>Menu</span>
                            </a>
                        </div>
                        <!-- /Menu Toogle -->
                    </div>
                </div>
                <!-- /ACCOUNT -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
</header>
<!-- /HEADER -->

<!-- NAVIGATION -->
<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#hot_deals">Hot Deals</a></li>
                <li><a href="#Váy cưới">Váy cưới</a></li>
                <li><a href="#Vest cưới">Vest cưới</a></li>
                <li><a href="#Trang sức PNJ">Trang sức PNJ</a></li>
                <li><a href="#Trang sức DOJi">Trang sức DOJi</a></li>
                <li><a href="#Accessories">Accessories</a></li>
            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->