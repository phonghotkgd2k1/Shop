@extends('items.master_layout')
@section('content')
@include('items.bradcaump')
<!-- Start My Account Area -->
<section class="my_account_area pt--80 pb--55 bg--white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-12">
                <div class="my__account__wrapper">
                    @if (Session::has('success') || Session::has('user_name'))
                    @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                    @else
                    <div class="alert alert-success" role="alert">
                        Đã đăng nhập
                    </div>
                    @endif
                    @else
                    <h3 class="account__title">Đăng nhập</h3>
                    <form action="{{ route('process_login') }}" method="post" id="form_login">
                        {{ csrf_field() }}
                        <div class="account__form">
                            @if (Session::has('error'))
                            <div class="input__box">
                                <div class="alert alert-danger" role="alert">
                                    {{ Session::get('error') }}
                                </div>
                            </div>
                            @endif
                            <div class="input__box">
                                <label>Tài khoản email <span>*</span></label>
                                <input type="email" name="user_name" id="user_name" value="{{ old('user_name') }}">
                                @if ($errors->has('user_name'))
                                <p style="color: red; font-style: italic">{{ $errors->first('user_name') }}</p>
                                @endif
                            </div>
                            <div class="input__box">
                                <label>Mật khẩu <span>*</span></label>
                                <input type="password" name="password" id="password">
                            </div>
                            <div class="form__btn text-center">
                                <button>Đăng nhập</button>
                                <label class="label-for-checkbox">
                                    <input id="rememberme" class="input-checkbox" name="rememberme" value="forever"
                                        type="checkbox">
                                    <span>Nhớ mật khẩu</span>
                                </label>
                            </div>
                            <a class="forget_pass text-center" href="#">Quên mật khẩu?</a>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End My Account Area -->
@endsection

