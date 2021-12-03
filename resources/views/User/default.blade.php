@extends('user.layout.master_layout')
@section('content')
<!-- SECTION NEW PRODUCTS -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">New Products</h3>
                    <div class="section-nav">
                        <ul class="section-tab-nav tab-nav">
                            @foreach ($brand as $key => $item)
                                @if ($key == 0)
                                <li class="active"><a data-toggle="tab" href="#hotprd_brand_{{ $item->id_brand }}">{{ $item->name }}</a></li>
                                @else
                                <li><a data-toggle="tab" href="#hotprd_brand_{{ $item->id_brand }}">{{ $item->name }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- /section title -->

            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        @foreach ($arrPrd as $key => $item)
                            <!-- tab -->
                            @if ($key == 0)
                            <div id="hotprd_brand_{{ $item[0] }}" class="tab-pane active">
                            @else
                            <div id="hotprd_brand_{{ $item[0] }}" class="tab-pane">
                            @endif
                                <div class="products-slick" data-nav="#slick-nav-1">
                                    <!-- product -->
                                    @foreach ($item[1] as $item)
                                        <div class="product">
                                            <div class="product-img">
                                                <img src="{{ asset("Images/$item->images") }}" alt="">
                                                <div class="product-label">
                                                    <span class="sale">-10%</span> <!-- discount -->
                                                    <span class="new">NEW</span>
                                                </div>
                                            </div>
                                            <div class="product-body">
                                                <p class="product-name">{{ $item->name }}</p>
                                               <h3 class="product-name"><a href="{{ route('product.viewDetailName', ['id_product'=>$item->id_product]) }}">{{ $item->name }}</a></h3>
                                                @if ($item->discount != null && $item->discount != 0)
                                                    <h4 class="product-price">@money($item->price-($item->price*($item->discount/100))) <del class="product-old-price">@money($item->price)</del></h4>
                                                @else
                                                    <h4 class="product-price">@money($item->price)</h4>
                                                @endif
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>

                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <button class="add-to-cart-btn" @if ($item->quantity == 0) disabled @endif>
                                                    <i class="fa fa-shopping-cart"></i> add to cart
                                                </button>
                                            </div>
                                        </div>
                                    @endforeach
                                    <!-- /product -->
                                </div>
                                <div id="slick-nav-1" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- SECTION -->
<div class="section" id="hot_deals">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Top selling</h3>
                    <div class="section-nav">
                        <ul class="section-tab-nav tab-nav">
                            @foreach ($brand as $key => $item)
                                @if ($key == 0)
                                <li class="active"><a data-toggle="tab" href="#topselling_brand_{{ $item->id_brand }}">{{ $item->name }}</a></li>
                                @else
                                <li><a data-toggle="tab" href="#topselling_brand_{{ $item->id_brand }}">{{ $item->name }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
                                @foreach ($brand as $key => $item)
								<!-- tab -->
                                    @if ($key == 0)
                                    <div id="topselling_brand_{{ $item->id_brand }}" class="tab-pane fade in active">
                                    @else
                                    <div id="topselling_brand_{{ $item->id_brand }}" class="tab-pane fade in">
                                    @endif
                                        <div class="products-slick" data-nav="#slick-nav-2">
                                            @foreach ($hotPrd as $item1)
                                            @if ($item1->id_brand == $item->id_brand)
                                            <!-- product -->
                                            <div class="product">
                                                <div class="product-img">
                                                    <img src="{{ asset("Images/$item1->images") }}" alt="">
                                                    <div class="product-label">
                                                        <span class="sale">-10%</span> <!-- discount -->
                                                        <span class="new">NEW</span>
                                                    </div>
                                                </div>
                                                <div class="product-body">
                                                    <p class="product-Iphone">{{ $item1->name }}</p>
                                                    <h3 class="product-name"><a href="{{ route('product.viewDetailName', ['id_product'=>$item1->id_product]) }}">{{ $item1->name }}</a></h3>
                                                    @if ($item1->discount != null && $item1->discount != 0)
                                                        <h4 class="product-price">@money($item1->price-($item1->price*($item1->discount/100))) <del class="product-old-price">@money($item1->price)</del></h4>
                                                    @else
                                                        <h4 class="product-price">@money($item1->price)</h4>
                                                    @endif
                                                    <div class="product-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
    
                                                    </div>
                                                    <div class="product-btns">
                                                        <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                                        <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                        <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                                    </div>
                                                </div>
                                                <div class="add-to-cart">
                                                    <button class="add-to-cart-btn" @if ($item1->quantity == 0) disabled @endif>
                                                        <i class="fa fa-shopping-cart"></i> add to cart
                                                    </button>
                                                </div>
                                            </div>
                                            <!-- /product -->
                                            @endif
                                            @endforeach
                                        </div>
                                        <div id="slick-nav-2" class="products-slick-nav"></div>
                                    </div>
								<!-- /tab -->
                    
                                @endforeach
							</div>
						</div>
					</div>
					<!-- /Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
<!-- /SECTION -->

<!-- SECTION -->
 <div class="section" id="Accessories">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Accessories</h3>
                    <div class="section-nav">
                        <ul class="section-tab-nav tab-nav">
                            {{-- <li class="active"><a data-toggle="tab" href="#hotprd_brand_1">Charger</a></li>
                            <li><a data-toggle="tab" href="#hotprd_brand_2">Tempered Glass</a></li>
                            <li><a data-toggle="tab" href="#tab2">Headphone</a></li>
                            <li><a data-toggle="tab" href="#tab2">Case</a></li> --}}
                            @foreach ($arrAccessories as $key => $item)
                                @if ($key == 0)
                                    <li class="active"><a data-toggle="tab" href="#Accessories_brand_{{ $item[0][0] }}">{{ $item[0][1] }}</a></li>
                                @else
                                    <li><a data-toggle="tab" href="#Accessories_brand_{{ $item[0][0] }}">{{ $item[0][1] }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /section title -->
            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <!-- tab -->
                        @foreach ($arrAccessories as $key => $item)
                            <div id="Accessories_brand_{{ $item[0][0] }}" class="tab-pane @if ($key == 0) {{'active'}} @else {{''}} @endif">
                                <div class="products-slick" data-nav="#slick-nav-1">
                                    @foreach ($item[1] as $item1)
                                       <!-- product -->
                                       <div class="product">
                                            <div class="product-img">
                                                <img src="{{ asset("Images/$item1->images") }}" alt="">
                                                <div class="product-label">
                                                    <span class="sale">-10%</span> <!-- discount -->
                                                    <span class="new">NEW</span>
                                                </div>
                                            </div>
                                            <div class="product-body">
                                                <p class="product-Iphone">{{ $item1->name }}</p>
                                                <h3 class="product-name"><a href="{{ route('product.viewDetailName', ['id_product'=>$item1->id_product]) }}">{{ $item1->name }}</a></h3>
                                                @if ($item1->discount != null && $item1->discount != 0)
                                                    <h4 class="product-price">@money($item1->price-($item1->price*($item1->discount/100))) <del class="product-old-price">@money($item1->price)</del></h4>
                                                @else
                                                    <h4 class="product-price">@money($item1->price)</h4>
                                                @endif
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>

                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                            </div>
                                        </div>
                                        <!-- /product -->
                                    @endforeach
                                </div>
                                <div id="slick-nav-1" class="products-slick-nav"></div>
                            </div>
                        @endforeach
                        <!-- /tab -->
                    </div>
                </div>
            </div>
            <!-- Products tab & slick -->

        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

@endsection
