@extends('admin.layout.master_layout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">Chi tiết hóa đơn</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        
                        <div class="col-md-8">
                            <div class="table-responsive">
                                
                                    
                               
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <th class="col-3" scope="row">Tên khách hàng</th>
                                            <td class="col-9">{{ $Bill->name_customer }}</td>
                                        </tr>
                                        <tr>
                                            <th class="col-3" scope="row">Ngày đặt</th>
                                            {{-- <td class="col-9">{{ date(Config::get('app.time_format_simple'), strtotime($product->created_at)) }}</td> --}}
                                            <td class="col-9">{{ $Bill->order_date }}</td>
                                        </tr>
                                        <tr>
                                            <th class="col-3" scope="row">NGH dự kiến</th>
                                            <td class="col-9">{{ $Bill->expected_delivery_date }}</td>
                                        </tr>
                                        <tr>
                                            <th class="col-3" scope="row">Địa chỉ</th>
                                            <td class="col-9">{{$Bill->address_customer}}</td>
                                        </tr>
                                        <tr>
                                            <th class="col-3" scope="row">Số điện thoại</th>
                                            <td class="col-9">{{$Bill->phone_customer}}</td>
                                        </tr>
                                        <tr>
                                            <th class="col-3" scope="row">Email</th>
                                            <td class="col-9">{{$Bill->email_customer}}</td>
                                        </tr>
                                        <tr>
                                            <th class="col-3" scope="row">Tổng giá</th>
                                            <td class="col-9">{{$Bill->total_price}}</td>
                                        </tr>
                                        
                                            <th class="col-3" scope="row">Trạng thái sử dụng</th>
                                            <td class="col-9">
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" disabled @if ($Bill->isactive === 0) checked @endif>
                                                            <span class="form-check-sign">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
