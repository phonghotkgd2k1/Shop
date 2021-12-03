@extends('Admin.layout.master_layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title">Danh Sách Hóa Đơn</h4>
                    <div class="action__btn">
                        <button class="btn btn-primary btn-round">
                            <a href="{{ route('admin.bill.billForm') }}" class="title">
                                <i class="fas fa-plus"></i> <span>Thêm Hóa Đơn</span>
                            </a>
                        </button>
                        {{-- <button class="btn btn-primary btn-round">
                            <a href="#" class="title">
                                <i class="far fa-file-excel"></i> <span>Thêm sản phẩm bằng excel</span>
                            </a>
                        </button> --}}
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <tr> {{-- Thay đổi tiêu đề phù hợp --}}
                                    <th class="text-center">STT</th>
                                    <th class="text-center">Tên Khách Hàng</th>
                                    <th class="text-center">Ngày Đặt</th>
                                    <th class="text-center">NGH Dự Kiến</th>
                                    <th class="text-center">Địa Chỉ</th>
                                    <th class="text-center">Số Điện Thoại</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Tổng Tiền</th>
                                    <th class="text-center">Trạng thái</th>
                                    <th class="text-center">Công cụ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Bill as $key => $item) {{-- Đổi đúng params --}}
                                    <tr> {{-- Thay đổi các cột được lấy ra --}}
                                        {{-- <td><img src="{{ asset("images/$item->images") }}" alt="" width="300px"></td> --}}
                                        <td>{{$Bill->count()*($Bill->currentPage()-1)+($key+1) }}</td>
                                        <td>{{ $item->name_customer }}</td>
                                        <td>{{ $item->order_date }}</td>
                                        <td>{{ $item->expected_delivery_date}}</td>
                                        <td>{{ $item->address_customer }}</td>
                                        <td>{{ $item->phone_customer }}</td>
                                        <td>{{ $item->email_customer }}</td>
                                        <td>{{ $item->total_price }}</td>
                                        <td class="text-center">
                                            {!! $item->isactive === 0 ? '<i class="fa-2x fas fa-check-circle color--green ml-2" title="Đang sử dụng">
                                                                         </i>' : '<i class="fa-2x fas fa-times-circle color--red ml-2" title="Đang khóa"></i>' !!}
                                        </td>
                                        
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-danger dropdown-toggle-split"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{ route('admin.bill.billDetail', ['id_bill' => $item->id_bill]) }}"><i class="fa-2x fas fa-info-circle"></i> Chi tiết</a>

                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="{{ route('admin.bill.billSubmit', ['id_bill' => $item->id_bill]) }}"><i
                                                            class="fa-2x fas fa-pen-square"></i> Chỉnh sửa</a>
                                                    <a class="dropdown-item change_isactive" href="{{ route('admin.bill.changeIsActive', ['id_bill' => $item->id_bill, 'is_active' => ($item->isactive == 0 ? 1 : 0)]) }}">
                                                            {!! $item->isactive == 0 ? '<i class="fa-2x fas fa-eye-slash"></i> Bỏ sử dụng' : '<i class="fa-2x fas fa-eye"></i> Sử dụng' !!}
                                                        </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="8">
                                        {{ $Bill->onEachSide(1)->links('pagination::bootstrap-4') }}
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- @php
    dd($errors)
@endphp --}}