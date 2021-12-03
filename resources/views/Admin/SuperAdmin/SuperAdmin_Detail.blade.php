@extends('admin.layout.master_layout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">Chi tiết Admin</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 images__SuperAdmin">
                            <div class="row">
                                <img class="image__view" src="{{ asset("images/$SuperAdmin->images") }}" alt="">
                            </div>
                            <div class="row images__detail">
                                <div class="col-md-4 col-lg-3 col-3">
                                    <img src="{{ asset("images/$SuperAdmin->images") }}" alt="">
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
                                            <th class="col-3" scope="row">Tên</th>
                                            <td class="col-9">{{ $SuperAdmin->name }}</td>
                                        </tr>
                                        <tr>
                                            <th class="col-3" scope="row">Số điện thoại</th>
                                            {{-- <td class="col-9">{{ date(Config::get('app.time_format_simple'), strtotime($product->created_at)) }}</td> --}}
                                            <td class="col-9">{{ $SuperAdmin->phone }}</td>
                                        </tr>
                                        <tr>
                                            <th class="col-3" scope="row">Địa chỉ</th>
                                            <td class="col-9">{{ $SuperAdmin->address }}</td>
                                        </tr>
                                        <tr>
                                            <th class="col-3" scope="row">Giới tính</th>
                                            <td class="col-9">{{($SuperAdmin->sex)}}</td>
                                        </tr>
                                        <tr>
                                            <th class="col-3" scope="row">Chức vụ</th>
                                            <td class="col-9">{!! $SuperAdmin->role === 0 ? 'Admin'
                                                                                    : 'SuperAdmin' !!}</td>
                                        </tr>
                                       
                                        <tr>
                                            <th class="col-3" scope="row">Trạng thái sử dụng</th>
                                            <td class="col-9">
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" disabled @if ($SuperAdmin->isactive === 0) checked @endif>
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
