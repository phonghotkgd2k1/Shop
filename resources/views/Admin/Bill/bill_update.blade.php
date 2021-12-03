@extends('Admin.layout.master_layout')
@section('content')
<div class="row"> <!-- Tràn tùy ý, mootj manf  hình gồm 12 cột--> 
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="title">Sửa bill</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.bill.billSubmit') }}" method="post"> <!-- $errors biến đọc lỗi Request trả về,đọc lỗi => $errors('brand') -->
                    @csrf
                    <div class="row">
                        <div class="col-md-4 px-md-2">
                            <div class="form-group">
                                <label for="name">Tên khách hàng</label>
                                <input type="text" class="form-control" placeholder="Tên sản phẩm" name="name" id="name" value="{{old('name') !== null ? old('bill') : (isset($bill) ? $bill->name : '')}}">
                                {{-- @if ($errors('brand') != null)                                                            value="{{old('username') !== null ? old('Customer_info') : (isset($Customer_info) ? $Customer_info->username : '')}}">
                                    Lỗi
                                @endif --}}
                            </div>
                        </div>
                        {{-- <div class="col-md-4 px-md-2">
                            <div class="form-group">
                                <label for="images">Ảnh</label>
                                <input type="file" class="form-control" placeholder="Tên ảnh" name="images" id="images" value=""> <!-- dung ajax -->
                            </div>
                        </div> --}}
                        <div class="col-md-4 px-md-2">
                            <div class="form-group">
                                <label for="id_brand">Mã nhãn hiệu</label>
                                <select class="form-control" name="id_brand" id="id_brand">
                                    <option value="1"></option>
                                    <option value="2"></option>
                                    <option value="3"></option>
                                    <option value="9"></option>
                                    <option value="11"></option>
                                    <option value="12"></option>
                                  </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 px-md-2">
                            <div class="form-group">
                                <label for="order_date">Ngày đặt</label>
                                <input type="date" class="form-control" placeholder="Ngày đặt" name="order_date" id="order_date" value="{{old('order_date')}}">
                            </div>
                        </div>
                        <div class="col-md-4 px-md-2">
                            <div class="form-group">
                                <label for="expected_delivery_date">Ngày giao hàng dự kiến</label>
                                <input type="date" class="form-control" placeholder="Ngày giao hàng dự kiến" name="expected_delivery_date" id="expected_delivery_date" value="{{old('expected_delivery_date')}}">
                            </div>
                        </div>
                        <div class="col-md-4 px-md-2">
                            <div class="form-group">
                                <label for="address">Địa chỉ</label>
                                <input type="text" class="form-control" placeholder="Địa chỉ" name="address" id="address" value="{{old('address')}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="phone">Số điện thoại</label>
                                <input type="number" class="form-control" placeholder="Số điện thoại" name="phone" id="phone" value="{{old('phone')}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" placeholder="Email" name="email" id="email" value="{{old('email')}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="total_price">Tổng tiền</label>
                                <input type="number" class="form-control" placeholder="Tổng tiền" name="total_price" id="total_price" value="{{old('total_price')}}">
                            </div>
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
