@extends('admin.layout.master_layout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">Chi tiết sản phẩm</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 images__product">
                            <div class="row">
                                <img class="image__view" src="{{ asset("images/$product->images") }}" alt="">
                            </div>
                            <div class="row images__detail">
                                <div class="col-md-4 col-lg-3 col-3">
                                    <img src="{{ asset("images/$product->images") }}" alt="">
                                </div>
                                {{-- @foreach ($images as $item)
                                <div class="col-md-4 col-lg-3 col-3">
                                    <img src="{{ asset("images/$item->name") }}" alt="">
                                </div>
                                @endforeach --}}
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <th class="col-3" scope="row">Tên sản phẩm</th>
                                            <td class="col-9">{{ $product->name }}</td>
                                        </tr>
                                        <tr>
                                            <th class="col-3" scope="row">Ngày tạo</th>
                                            {{-- <td class="col-9">{{ date(Config::get('app.time_format_simple'), strtotime($product->created_at)) }}</td> --}}
                                            <td class="col-9">{{ $product->created_at }}</td>
                                        </tr>
                                        <tr>
                                            <th class="col-3" scope="row">Mô tả</th>
                                            <td class="col-9">{{ $product->content }}</td>
                                        </tr>
                                        <tr>
                                            <th class="col-3" scope="row">Mô tả chi tiết</th>
                                            <td class="col-9">{!! nl2br($product->description) !!}</td>
                                        </tr>
                                        <tr>
                                            <th class="col-3" scope="row">Thương hiệu</th>
                                            <td class="col-9">
                                                {{ $product->brand_name }}
                                                {!! ($product->brand_isactive === 0 ? '<i class="fa-1_5x fas fa-check-circle color--green ml-2" title="Đang sử dụng"></i>' : '<i class="fa-1_5x fas fa-times-circle color--red ml-2" title="Đang khóa"></i>') !!}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="col-3" scope="row">Số lượng tồn kho</th>
                                            <td class="col-9">{{ $product->quantity }}</td>
                                        </tr>
                                        <tr>
                                            <th class="col-3" scope="row">Đã bán</th>
                                            <td class="col-9">{{ $product->buy_quantity }}</td>
                                        </tr>
                                        <tr>
                                            <th class="col-3" scope="row">Giá</th>
                                            <th class="col-3" scope="row">{{$product->price}}</th>
                                            <td class="col-9">
                                                {{-- @if ($product->discount != 0)
                                                @money($product->newprice) <span class="text-line-through">(@money($product->price))</span>
                                                @else
                                                @money($product->price)
                                                @endif --}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="col-3" scope="row">Trạng thái sử dụng</th>
                                            <td class="col-9">
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" disabled @if ($product->isactive === 0) checked @endif>
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
