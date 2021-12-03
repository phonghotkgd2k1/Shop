@extends('Admin.layout.master_layout')
@section('content')
<div class="row"> <!-- Tràn tùy ý, mootj manf  hình gồm 12 cột--> 
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="title">{{ isset($bill) ? 'Cập nhật hóa đơn' : 'Thêm hóa đơn' }}</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.bill.billSubmit') }}" method="post"> <!-- $errors biến đọc lỗi Request trả về,đọc lỗi => $errors('brand') -->
                    @csrf
                    @isset($bill)
                        <input type="hidden" name="id_bill" value="{{$bill->id_bill}}">
                    @endisset
                    <div class="row">
                        <div class="col-md-6 px-md-2">
                            <div class="form-group">
                                <label for="name">Tên khách hàng<span class="text-danger">(*)</span></label>
                                <input type="name" class="form-control" placeholder="Tên người nhận" name="name" id="name" value="{{old('name')!== null ? old('name') : (isset($bill) ? $bill->name : '')}}">
                            </div>
                        </div>
                        <div class="col-md-6 px-md-2">
                            <div class="form-group">
                                <label for="phone">Số điện thoại <span class="text-danger">(*)</span></label>
                                <input type="tel" class="form-control" placeholder="Số điện thoại người nhận" name="phone" id="phone" value="{{old('phone')!== null ? old('phone') : (isset($bill) ? $bill->phone : '')}}">
                            </div>
                        </div>
                        
                        <div class="col-md-6 px-md-2">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" placeholder="Email" name="email" id="email" value="{{old('email')!== null ? old('email') : (isset($bill) ? $bill->email : '')}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        {{-- <div class="col-md-3 px-md-2">
                            <div class="form-group">
                                <label for="id_bill">Hóa đơn</label>
                                <input type="text" class="form-control" placeholder="Mã hóa đơn" name="id_bill" id="id_bill">
                                
                            </div> --}}
                        {{-- </div> --}}
                        <div class="col-md-6 px-md-2">
                            <div class="form-group">
                                <label for="order_date">Ngày tạo</label>
                                <input type="date" class="form-control" placeholder="Ngày tạo hóa đơn" name="order_date" id="order_date"
                                         value="{{old('order_date')!== null ? old('order_date') : (isset($bill) ? $bill->order_date : '')}}">
                            </div>
                        </div>
                        <div class="col-md-6 px-md-2">
                            <div class="form-group">
                                <label for="expected_delivery_date">Ngày giao dự kiến</label>
                                <input type="date" class="form-control" placeholder="Ngày giao hàng dự kiến" name="expected_delivery_date" id="expected_delivery_date"  
                                        value="{{old('expected_delivery_date')!== null ? old('expected_delivery_date') : (isset($bill) ? $bill->expected_delivery_date : '')}}">
                            </div>
                        </div>
                    </div> 
                    {{-- <div class="row">
                        <div class="col-md-6 px-md-2">
                            <div class="form-group">
                                <label for="id_customer_info">Mã khách hàng</label>
                                <input type="text" class="form-control" placeholder="Mã khách hàng" name="id_customer_info" id="id_customer_info" value="{{old('id_customer_info')!== null ? old('bill') : (isset($bill) ? $bill->id_customer_info : '')}}">
                            </div>
                        </div>
                        <div class="col-md-6 px-md-2">
                            <div class="form-group">
                                <label for="id_payment">Mã thanh toán</label>
                                <input type="text" class="form-control" placeholder="Mã thanh toán" name="id_payment" id="id_payment" value="{{old('id_payment')!== null ? old('bill') : (isset($bill) ? $bill->id_payment : '') }}">
                            </div>
                        </div>
                    </div> --}}
                    <div class="row">
                        <div class="col-md-6 px-md-2">
                            <div class="form-group">
                                <label for="address">Địa chỉ <span class="text-danger">(*)</span></label>
                                <textarea class="form-control" name="address" id="address" cols="30" rows="10">{{old('address')!== null ? old('address') : (isset($bill) ? $bill->address : '') }}</textarea>
                                {{-- <textarea rows="4" name="description" id="description" class="form-control">{{ old('description') !== null ? old('description') : (isset($brand) ? $brand->description : '') }}</textarea> --}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 px-md-2">
                            <div class="form-group">
                                <label for="total_price">Tổng tiền</label>
                                <input type="decimal" class="form-control" placeholder="Tổng tiền" name="total_price" id="total_price"
                                     value="{{old('total_price')!== null ? old('total_price') : (isset($bill) ? $bill->total_price : '')}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="isactive" id="isactive" {{ (($errors->any() && old('isactive')) || (!$errors->any() && isset($product) && $product->isactive === 0) || ((!$errors->any() || old('isactive')) && !isset($product))) ? 'checked' : '' }}>
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
{{-- @php
    dd($errors)
@endphp --}}