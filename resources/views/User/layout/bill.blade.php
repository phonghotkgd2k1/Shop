@extends('user.layout.master_layout')
@section('content')
    	<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Thông Tin Đơn Hàng</h3>
						<ul class="breadcrumb-tree">
							<li><a href="http://localhost/smartphone/public/">Trang Chủ</a></li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- TABLE -->
		<table class="table table-condensed" id="">
            <thead>
                <tr class="cart_menu">
                    <th style="text-align:center;">Số đơn hàng: </th>
                    <th style="text-align:center;">Tên khách hàng: </th>
                    <th style="text-align:center;">Số điện thoại: </th>
                    <th style="text-align:center;"> Địa chỉ email: </th>
                     <th style="text-align:center;">Địa chỉ nhận hàng: </th>
                                    
                </tr>
            </thead>
            {{-- <tbody>
                @foreach($bill as $key => $item)
                <tr>
                    <td style="text-align:center;">
                        <img src="{{ asset("/Images") }}/{{ $item['model']->images }}" alt="" width="100px">
                      
                    </td>
                
                    <td class="product-name"><a href="{{ route('product.viewDetailName', ['id_product'=>$item['id_product']]) }}">{{ $item['model']->name }}</a></td> 
                    
                    <td style="text-align:center;"class="cart_price"class="product-price">@money($item['model']->price)</td>
                    <td style="text-align:center;"class= "product_stock">{{$item['model']->quantity}}</td>
                    <td style="text-align:center;"class="cart_quantity">
                        <div class="cart_quantity_button">
                            <a class="cart_quantity_up" href="">               </a>
                            <span class="qty">{{ $item['quantity'] }}</span>
                            <a class="cart_quantity_down" href="">             </a>
                        </div> 
                    </td>
                    <td style="text-align:center;"class="cart_total"class="product-price">    
                        @money($item['model']->price-($item['model']->price*($item['model']->discount/100)))
                    </td>
                    <td style="text-align:center;"class="cart_delete">
                        <a class="cart_quantity_delete" href=""><i class="fa fa-trash-o" style="font-size:28px;color:red"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
                    
            </tbody> --}}
        <!-- /TABLE -->
@endsection		