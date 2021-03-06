<!DOCTYPE html>
<html lang="en">
<head>
	<title>{{$title}}</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{ asset('login/images/icons/favicon.ico') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================--> 
	<link rel="stylesheet" type="text/css" href="{{ asset('login/fonts/iconic/css/material-design-iconic-font.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login/vendor/animate/animate.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('login/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('login/vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('login/css/main.css')}}">
<!--===============================================================================================-->

    <link rel="stylesheet" href="{{ asset('User/css/toastr.min.css') }}">
</head>
<body>

	
	<div class="limiter">
		<div class="container-login100" style="background-image: url({{asset('login/images/bg-01.jpg')}});">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" action="{{ route('store') }}" method="post">
					@csrf
					<span class="login100-form-title p-b-49">
						????ng Nh???p
					</span>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<span class="label-input100">T??i Kho???n</span>
						<input class="input100" type="text" name="username" placeholder="Nh???p t??i kho???n ">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">M???t Kh???u</span>
						<input class="input100" type="password" name="pass" placeholder="Nh???p m???t kh???u">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					
					<div class="text-right p-t-8 p-b-31">
						<a href="#">
							Qu??n m???t kh???u?
						</a>
					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								????ng Nh???p
							</button>
						</div>
					</div>

					{{-- <div class="flex-col-c p-t-155">
						<span class="txt1 p-b-17">
							????ng k?? b???ng:
						</span> --}}
					<div class="txt1 text-center p-t-54 p-b-20">
						<a href="#" class="txt2">
							????ng k??
						</a>
					</div>
				{{-- 
					<div class="txt1 text-center p-t-54 p-b-20">
						<span>
							????ng nh???p b???ng
						</span>
					</div>

					<div class="flex-c-m">
						<a href="https://www.facebook.com/" class="login100-social-item bg1">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="https://www.twitter.com/" class="login100-social-item bg2">
							<i class="fa fa-twitter"></i>
						</a>

						<a href="https://www.google.com/" class="login100-social-item bg3">
							<i class="fa fa-google"></i>
						</a>
					</div> --}}
					
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>

	
<!--===============================================================================================-->
	<script src="{{asset('login/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('login/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('login/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('login/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('login/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('login/vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{asset('login/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('login/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('login/js/main.js')}}"></script>
    <script src="{{ asset('User/js/toastr.min.js') }}"></script>

	<script>
		 @if (Session::has("msgErr"))
			// alert(`{{ Session::get("msgErr") }}`);
			// sweet alert
			toastr.error(`{{ Session::get("msgErr") }}`);
		@endif

		@if (Session::has("msgSuc"))
			// alert(`{{ Session::get("msgSuc") }}`);
			toastr.success(`{{ Session::get("msgSuc") }}`);
		@endif
	</script>

</body>
</html>