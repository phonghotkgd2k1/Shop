<!-- HEADER -->
<header>
    @if (Session::get('totalPrice') != null)
        {{Session::put('totalPrice', 0)}}
    @endif
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li><a href="tel:+84358903368"><i class="fa fa-phone"></i>  </a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i> </a></li>
                <li><a href="#"><i class="fa fa-map-marker"></i> </a></li>
            </ul>
            <ul class="header-links pull-right">
                <li><a href="#"><i class="fa fa-dollar"></i> VND</a></li>
                {{-- <li><a href="#"><i class="fa fa-user-o"></i> Tài Khoản</a></li> --}}
                <li class="dropdown nav-item">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        
                        <b class="caret d-none d-lg-block d-xl-block"></b>
                        {{-- <p class="d-lg-none">
                            <i class="fa fa-user-o"></i>Tài Khoản 
                        </p> --}}
                        @if (Session::get('username') == null)
                        <p class="d-lg-none">
                            <i class="fa fa-user-o"></i>Tài Khoản 
                        </p>
                        @endif
                        @if (Session::get('username') != null)
                        <p class="d-lg-none">
                            <i class="fa fa-user-o"></i>{{Session::get('username')}}
                        </p>
                        @endif
                    </a>
                    <ul class="dropdown-menu dropdown-navbar">
                        @if (Session::get('username') == null)
                        <li class="nav-link"><a href="{{ route('account.login') }}" class="nav-item dropdown-item"><i style="font-size:14px;color:rgb(19, 18, 18)">
                            Đăng nhập
                         </i></a>
                         </li>
                        @endif
                        @if (Session::get('username') != null)
                        <li class="nav-link"><a href="#" class="nav-item dropdown-item"><i style="font-size:14px;color:rgb(19, 18, 18)">
                            {{Session::get('username')}}
                         </i></a>
                         </li>
                        @endif
                    
                        <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item"><i style="font-size:14px;color:rgb(19, 18, 18)">Lịch sử giỏ hàng</i></a>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li class="nav-link"><a href="{{ route('account.logout') }}" class="nav-item dropdown-item"><i style="font-size:14px;color:rgb(19, 18, 18)" >Đăng xuất</i></a>
                        </li>
                    </ul>
                </li>
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
                            {{-- <img src="{{ asset('/Images/logo.png') }}" alt=""> --}}
                            <img src="{{ asset('/Images/logo.png') }}" alt="">
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->

                <!-- SEARCH BAR -->
                <div class="col-md-6">
                    <div class="header-search">
                        <form id="search_mini_form" action="{{ route('product.searchAjax') }}" method="get">
                            @csrf
                            <select class="input-select">
                                <option value="0"> SmartPhone </option>
                                <option value="1">SmartPhone 01</option>
                                <option value="1">SmartPhone 02</option>
                            </select>
                            <input type="text" name="searchKey" id="searchKey" class="input" placeholder="Tìm Kiếm Tại Đây">
                            <button type="submit" class="search-btn">Tìm Kiếm</button>
                        </form>
                        <style>
                            #header {
                                position: relative;
                            }
                            .data_search {
                                background-color: #fff;
                                max-height: 300px;
                                overflow: auto;
                                position: absolute;
                                z-index: 100;
                                width: 100%;
                            }
                            .data_search a {
                                display: block;
                            }
                        </style>
                        <div class="data_search" id="search-list" autocomplete="off">
                            {{-- <a href="">ggffgf</a>
                            <a href="">ggffgf</a>
                            <a href="">ggffgf</a> --}}
                        </div>
                    </div>
                </div>
                <!-- /SEARCH BAR -->

                <!-- ACCOUNT -->
                <div class="col-md-3 clearfix">
                    <div class="header-ctn">
                        {{-- <!-- Wishlist -->
                        <div>
                            <a href="#">
                                <i class="fa fa-heart-o"></i>
                                <span>Yêu Thích</span>
                                <div class="qty">0</div>
                            </a>
                        </div>
                        <!-- /Wishlist --> --}}

                        <!-- Cart -->
                        <div class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Giỏ Hàng</span>
                                <div class="qty">@if(Session::get('cartCustomerInfor') != null) {{ count(Session::get('cartCustomerInfor')) }} @else 0 @endif</div>
                            </a>
                            <div class="cart-dropdown">
                                <div class="cart-list">
                                    @if(Session::get('cartCustomerInfor') != null)
                                    @foreach (Session::get('cartCustomerInfor') as $item)
                                    @php
                                        Session::put('totalPrice', ((int) Session::get('totalPrice')) + ((int) $item['quantity'])*((int) $item['model']->price))
                                        
                                    @endphp
                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="{{ asset("/Images") }}/{{ $item['model']->images }}" alt="">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-name"><a href="{{ route('product.viewDetailName', ['id_product'=>$item['id_product']]) }}">{{ $item['model']->name }}</a></h3>
                                            <h4 class="product-price"><span class="qty">{{ $item['quantity'] }}x</span>
                                                {{-- @money($item['model']->price) --}}
                                                @money($item['model']->price-($item['model']->price*($item['model']->discount/100))) {{--sua gia tien sau khi ck--}}

                                            </h4>
                                        </div>
                                        <button class="delete"><i class="fa fa-close"></i></button>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                                <div class="cart-summary">
                                    <small>@if(Session::get('cartCustomerInfor') != null) {{ count(Session::get('cartCustomerInfor')) }} @else 0 @endif SẢN PHẨM ĐÃ CHỌN</small>
                                    <h5>TỔNG TIỀN: 
                                        @money(Session::get('totalPrice'))
                                        {{-- @money($item['quantity']*($item['model']->price-($item['model']->price*($item['model']->discount/100)))) --}}
                                        {{-- @money($item['quantity']*($item['model']->price-($item['model']->price*($item['model']->discount/100)))) --}}
                                    </h5>
                                </div>
                                <div class="cart-btns">
                                    <a href="{{route('cart.viewCart')}}">XEM GIỎ HÀNG</a>
                                    <a href="{{route('cart.checkout')}}">THANH TOÁN <i class="fa fa-arrow-circle-right"></i></a>
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
                <li class="active"><a href="http://localhost/smartphone/public/">TRANG CHỦ</a></li>
                <li><a href="http://localhost/smartphone/public/#hot_deals">TOP SẢN PHẨM</a></li>
                {{-- <li><a href="#Iphone">Iphone</a></li>
                <li><a href="#SamSung">SamSung</a></li>
                <li><a href="#Vsmart">Vsmart</a></li>
                <li><a href="#Xiaomi">Xiaomi</a></li> --}}
                <li><a href="http://localhost/smartphone/public/#Accessories">PHỤ KIỆN</a></li>
            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->