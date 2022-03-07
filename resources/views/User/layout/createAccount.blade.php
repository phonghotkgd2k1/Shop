@extends('user.layout.master_layout')
@section('content')
  
		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
                <div class="success-wrap">
                    <div class="left">
                        <a href="{{ route('account.login') }}"><i class="fa fa-chevron-left"></i> Bạn đã có tài khoản</a>
                    </div>
                    <div class="clear"></div>
                </div>
				<!-- row -->
				<div class="row">

                <form action="{{ route('account.createSubmit') }}" method="post">	
				{{-- <form action="{{ route('user.product.checkoutSubmit') }}" method="post" enctype="multipart/form-data"> --}}
                    @csrf 
                    @isset($Customer_info)
                        <input type="hidden" name="id_customer_info" value="{{$Customer_info->id_customer_info}}">
                    @endisset
					<div class="col-md-7">
						<!-- Billing Details -->
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Đăng kí tài khoản</h3>
							</div>
                            
                            <div class="form-group">
								<label for="username">Tài khoản <span class="text-danger">*</span></label>
								<input class="input" type="text" name="username" placeholder="Tên tài khoản" id="username"
                                value="{{old('username') !== null ? old('username') : (isset($Customer_info) ? $Customer_info->username : '')}}">

                            <div class="form-group">
								<label for="password">Mật khẩu <span class="text-danger">*</span></label>
								<input class="input" type="password" name="password" placeholder="Nhập mật khẩu của bạn" id="password"
                                value="{{old('password') !== null ? old('password') : (isset($Customer_info) ? $Customer_info->password : '')}}">
							</div>
                            <div class="form-group">
								<label for="sex">Giới tính <span class="text-danger">*</span></label>
								<div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sex" id="sex" value="1" checked>
                                    <label class="form-check-label" for="sex">Nam</label>
                                
                                    <input class="form-check-input" type="radio" name="sex" id="sex" value="0">
                                    <label class="form-check-label" for="sex">Nữ</label>
                                </div>
							</div>     
                            <div class="form-group">
								<label for="name">Họ và tên <span class="text-danger">*</span></label>
								<input class="input" type="text" name="name" placeholder="Tên tài khoản" id="name"
                                        value="{{old('name') !== null ? old('name') : (isset($Customer_info) ? $Customer_info->name : '')}}">

							</div>
                            <div class="form-group">
                                <label for="phone">Số điện thoại<span class="text-danger">*</span></label>
								<input class="input" type="tel" name="phone" placeholder="Số điện thoại" id="phone"
                                value="{{old('phone') !== null ? old('phone') : (isset($Customer_info) ? $Customer_info->phone : '')}}">
							</div>   
							<div class="form-group">
                                <label for="email">Email<span class="text-danger"></span></label>
								{{-- <input class="input" type="email" name="email" placeholder="Email"> --}}
                                <input class="input" type="email" name="email" placeholder="Nhập email của bạn" id="email"    
								value="{{old('email')!== null ? old('email') : (isset($bill) ? $bill->email : '')}}">
							</div>
							
							<div class="order-notes">
                                <label for="address">Địa chỉ<span class="text-danger">*</span></label>
								{{-- <input class="input" type="address" name="address" placeholder="Nhập địa chỉ của bạn" id="address"> --}}
                                <textarea class="input" type = "address" placeholder="Nhập địa chỉ của bạn" name="address" id="address">
                                    {{old('address') !== null ? old('address') : (isset($Customer_info) ? $Customer_info->address : '') }}
                                </textarea>
                            </div>
						</div>
						<div>
                            {{-- <button type="submit"  class="primary-btn order-submit">Đăng Kí</button> --}}
                            <button type="submit" class="btn btn-fill btn-primary">Lưu</button>

                        </div>
					</div>

					<!-- Order Details -->
                    
					{{-- <div class="col-md-5 order-details">
						<button type="submit"  class="primary-btn order-submit">Đăng Kí</button>
					</div> --}}
            </form>	  
					<!-- /Order Details -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
    

@endsection               
{{-- @php
    dd($errors)
@endphp --}}