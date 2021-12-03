<div class="sidebar">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
  -->
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="javascript:void(0)" class="simple-text logo-mini">
                PGD
            </a>
            <a href="javascript:void(0)" class="simple-text logo-normal">
                Shop Wedding
            </a>
        </div>
        <ul class="nav">
            <li class="active ">
                <a href="{{ route('admin.index')}}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.bill.index') }}">
                    <i class="tim-icons icon-cart"></i>
                    <p>Hóa đơn</p>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.product.index') }}">
                    <i class="tim-icons icon-atom"></i>
                    <p>Kho</p>
                </a>
                
            </li>
            <li>
                <a href="{{ route('admin.khoxuat.index') }}">
                    <i class="tim-icons icon-bank"></i>
                    <p>Kho xuất</p>
                </a>
            </li>
            {{-- <li>
                <a href="{{ route('admin.hot_product.index') }}">
                    <i class="tim-icons icon-pin"></i>
                    <p>Sản phẩm nổi bật</p>
                </a>
            </li> --}}
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.brand.index') }}">
                <i class="tim-icons icon-book-bookmark"></i>
                <p>Nhãn hiệu</p>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.images.index') }}">
                    <i class="icon-image-02"></i>
                    <p>Ảnh</p>
                </a>
            </li>
          
            <li>
                <a href="{{ route('admin.Customer_info.index') }}">
                    <i class="tim-icons icon-badge"></i>
                    <p>Thông tin khách hàng</p>
                </a>
            </li>
           
            {{-- <li>
                <a href="{{ route('admin.NewPrd.index') }}">
                    <i class="tim-icons icon-atom"></i>
                    <p>Thêm mới</p>
                </a>
            </li> --}}
            {{-- <li>
                <a href="{{ route('admin.Feedback.index') }}">
                    <i class="tim-icons icon-app"></i>
                    <p>Đánh giá</p>
                </a>
            </li> --}}
            
            @if(Session::get("role") == 1)
            <li>
                <a href="{{ route('admin.SuperAdmin.index') }}">
                    <i class="tim-icons icon-single-02"></i>
                    <p>Quản Lí Admin</p>
                </a>
            </li>
            @endif
        </ul>
    </div>
</div>
{{-- <!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
            <img src="../assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
        </a>
        </div>
        <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Nav items -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="dashboard.html">
                    <i class="ni ni-tv-2 text-primary"></i>
                    <span class="nav-link-text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.product.index') }}">
                    <i class="ni ni-tv-2 text-primary"></i>
                    <span class="nav-link-text">Product</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.brand.index') }}">
                    <i class="ni ni-tv-2 text-primary"></i>
                    <span class="nav-link-text">Brand</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.hot_product.index') }}">
                    <i class="ni ni-tv-2 text-primary"></i>
                    <span class="nav-link-text">Hot Product</span>
                    </a>
                </li>
            </ul>
            <!-- Divider -->
            <hr class="my-3">
        </div>
        </div>
    </div>
</nav> --}}
