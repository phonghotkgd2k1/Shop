@extends('Admin.layout.master_layout')
@section('content')
<div class="row"> <!-- Tràn tùy ý, mootj manf  hình gồm 12 cột--> 
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="title">{{ isset($SuperAdmin) ? 'Cập nhật Admin' : 'Thêm Admin' }}</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.SuperAdmin.SuperAdminSubmit') }}" method="post"> <!-- $errors biến đọc lỗi Request trả về,đọc lỗi => $errors('brand') -->
                    @csrf
                    @isset($SuperAdmin)
                        <input type="hidden" name="id_SuperAdmin" value="{{$SuperAdmin->id_SuperAdmin}}">
                    @endisset
                    <div class="row">
                        <div class="col-md-6 px-md-2">
                            <div class="form-group">
                                <label for="username">Tên tài khoản <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" placeholder="Tên tài khoản" name="username" id="username"
                                        value="{{old('username') !== null ? old('username') : (isset($SuperAdmin) ? $SuperAdmin->username : '')}}">
                            </div>
                        </div>
                        <div class="col-md-6 px-md-2">
                            <div class="form-group">
                                <label for="password ">Mật khẩu <span class="text-danger">(*)</span></label>
                                <input type="password" class="form-control" placeholder="Nhập mật khẩu" name="password" id="password"
                                         value="{{old('password') !== null ? old('password') : (isset($SuperAdmin) ? $SuperAdmin->password : '')}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 px-md-2">
                            <div class="form-group">
                                <label for="name">Tên đăng nhập <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" placeholder="Tên đăng nhập" name="name" id="name"
                                         value="{{old('name') !== null ? old('name') : (isset($SuperAdmin) ? $SuperAdmin->name : '')}}">
                            </div>
                        </div>
                        
                        <div class="col-md-6 px-md-2">
                            <div class="form-group">
                                <label for="sex">Giới tính <span class="text-danger">(*)</span></label>
                                {{-- <input type="text" class="form-control" placeholder="Giới tính" name="sex" id="sex"> --}}
                                <select class="form-control" name="sex" id="sex">
                                    <option value="1">Nam</option>
                                    <option value="2">Nữ</option>
                                    <option value="0">Khác</option>
                                  </select>
                            </div>
                        </div>
                        <div class="col-md-4 px-md-2">
                            <div class="form-group">
                                <label for="images">Ảnh <span class="text-danger">(*)</span></label>
                                <input type="file" class="form-control" placeholder="Tên ảnh" name="images[]" id="images" 
                                    value="" multiple> <!-- dung ajax -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 px-md-2">
                            <div class="form-group">
                                <label for="phone">Số điện thoại <span class="text-danger">(*)</span></label>
                                <input type="tel" class="form-control" placeholder="Số điện thoại khách hàng" name="phone" id="phone"
                                         value="{{old('phone') !== null ? old('phone') : (isset($SuperAdmin) ? $SuperAdmin->phone : '')}}">
                            </div>
                        </div>
                        <div class="col-md-6 px-md-2">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" placeholder="Email" name="email" id="email" 
                                        value="{{old('email') !== null ? old('email') : (isset($SuperAdmin) ? $SuperAdmin->email : '')}}">
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col-md-5 px-md-2">
                            <div class="form-group">
                                <label for="id_customer_info ">Mã khách hàng</label>
                                <input type="text" class="form-control" placeholder="Mã khách hàng" name="id_customer_info " id="id_customer_info "> 
                            </div>
                        </div>
                    </div> --}}
                    <div class="row">
                        <div class="col-md-12 px-md-2">
                            <div class="form-group">
                                <label for="address">Địa chỉ <span class="text-danger">(*)</span></label>
                                {{-- <input type="text" class="form-control" placeholder="Địa chỉ khách hàng" name="address" id="address"> --}}
                                <textarea class="form-control" name="address" id="address" cols="30" rows="10">{{old('address') !== null ? old('address') : (isset($SuperAdmin) ? $SuperAdmin->address : '') }}</textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="isactive" id="isactive" {{ (($errors->any() && old('isactive')) || (!$errors->any() && isset($SuperAdmin) && $SuperAdmin->isactive === 0) || ((!$errors->any() || old('isactive')) && !isset($SuperAdmin))) ? 'checked' : '' }}>
                                Sử dụng
                                <span class="form-check-sign">
                                    <span class="check"></span>
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <button type="submit" class="btn btn-fill btn-primary">Lưu</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
