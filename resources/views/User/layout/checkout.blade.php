@extends('user.layout.master_layout')
@section('content')

		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">THANH TOÁN</h3>
						<ul class="breadcrumb-tree">
							<li><a href="http://localhost/smartphone/public/">Trang Chủ</a></li>
							<li class="active">THANH TOÁN</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

			<form action="{{ route('cart.checkOutSubmit') }}" method="post">
				@csrf
				<div class="col-md-7">
					<!-- Billing Details -->
					<div class="billing-details">
						<div class="section-title">
							<h3 class="title">ĐỊA CHỈ GIAO HÀNG</h3>
						</div>

						<div class="form-group">
							<label for="name">Tên <span class="text-danger">*</span></label>
							<input class="input" type="text" name="name" placeholder="Nhập tên của bạn" id="name"
							value="{{old('name') !== null ? old('name') : (isset($bill) ? $bill->name : '')}}">

						</div>     
						<div class="form-group">
							<label for="phone">Số điện thoại<span class="text-danger">*</span></label>
							<input class="input" type="tel" name="phone" placeholder="Số điện thoại" id="phone">
						</div>   
						<div class="form-group">
							<label for="name">Email<span class="text-danger"></span></label>
							{{-- <input class="input" type="email" name="email" placeholder="Email"> --}}
							<input class="input" type="email" name="user_name" placeholder="Nhập email của bạn" id="email"
							value="{{old('email')!== null ? old('email') : (isset($bill) ? $bill->email : '')}}">
						</div>
						
						<div class="order-notes">
							<label for="address">Địa chỉ<span class="text-danger">*</span></label>
							{{-- <input class="input" type="address" name="address" placeholder="Nhập địa chỉ của bạn" id="address"> --}}
							<textarea class="input" placeholder="Nhập địa chỉ nhận hàng" name="address" id="address"></textarea>
						</div>
						<!-- Order notes -->
						{{-- <div class="order-notes">
							<label for="name">Ghi chú<span class="text-danger"></span></label>
							<textarea class="input" placeholder="Ghi chú về đơn hàng của bạn, ví dụ như ghi chú đặc biệt để giao hàng."></textarea>
						</div> --}}
						<!-- /Order notes -->
						{{-- <div class="form-group">
							<div class="input-checkbox">
								<input type="checkbox" id="create-account">
								<label for="create-account">
									<span></span>
									Create Account?
								</label>
							</div>
						</div> --}}
					</div>
					
				</div>

				<!-- Order Details -->
				
				<div class="col-md-5 order-details">
					<div class="section-title text-center">
						<h3 class="title">Giỏ Hàng</h3>
					</div>
					<div class="order-summary">
						<div class="order-col">
							<div><strong>SẢN PHẨM</strong></div>
							<div><strong>GIÁ</strong></div>
						</div>
						@foreach($cartCustomerInfor as $key => $item)
						<div class="order-products">
							<div class="order-col">
								<div>
									
									<td class="product-name">
										<a href="{{ route('product.viewDetailName', ['id_product'=>$item['id_product']]) }}">{{ $item['model']->name }}
											
										</a>
									</td> 

								</div>
								<div>
									<td style="text-align:center;"class="cart_total"class="product-price">    
										
										@money($item['model']->price-($item['model']->price*($item['model']->discount/100)))
										<span class="qty">  x{{ $item['quantity'] }}</span>
									</td>
								</div>
							</div>
							
						</div>
						{{-- <div class="order-col">
							<div>Shiping</div>
							<div><strong>FREE</strong></div>
						</div> --}}
						@endforeach
						<div class="order-col">
							<div><strong>TỔNG GIÁ </strong></div>
							<div>
								<strong class="order-total" >
									<i style="font-size:17px;">@money($totalPrice) </i>
									</strong>
							</div>
						</div>
					</div>
					
					<div class="input-checkbox">
						<input type="checkbox" id="terms">
						<label for="terms">
							<span></span>
							Tôi đã đọc và chấp nhận các <a href="#">điều khoản & điều kiện</a>
						</label>
					</div>
					
					{{-- <a href="#" class="primary-btn order-submit">Thanh Toán</a> --}}
					<button type="submit"  class="primary-btn order-submit">Thanh Toán</button>
					
				</div>
            </form>	  
					<!-- /Order Details -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

 @endsection		