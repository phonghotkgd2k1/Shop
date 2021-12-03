@extends('Admin.layout.master_layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title">Thông tin khách hàng</h4>
                    <div class="action__btn">
                        <button class="btn btn-primary btn-round">
                            {{-- <a href="#" class="title"> --}}
                            <a href="{{ route('admin.Customer_info.Customer_infoForm') }}" class="title">
                                <i class="fas fa-plus"></i> <span>Thêm khách hàng</span>
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
                                    {{-- <th class="text-center">Ảnh</th> --}}
                                    <th class="text-center">STT</th>
                                    <th class="text-center">Tên tài khoản</th>
                                    <th class="text-center">Tên khách hàng</th>
                                    <th class="text-center">Giới tính</th>
                                    <th class="text-center">Số điện thoại</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Địa chỉ</th>
                                    <th class="text-center">Trạng thái</th>
                                    <th class="text-center">Công cụ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Customer_info as $key => $item) {{-- Đổi đúng params --}}
                                    <tr> {{-- Thay đổi các cột được lấy ra --}}
                                        {{-- {<td><img src="{{ asset("images/$item->images") }}" alt="" width="300px"></td> --}}
                                        <td>{{ $Customer_info->count()*($Customer_info->currentPage()-1)+($key+1) }}</td>
                                        <td>{{ $item->username }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->sex }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->address }}</td>
                                        {{-- <td>{{ $item->address }}</td> --}}
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
                                                    <a class="dropdown-item" href="#"><i
                                                            class="fa-2x fas fa-info-circle"></i> Chi tiết</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="{{ route('admin.Customer_info.Customer_infoForm', ['id_customer_info' => $item->id_customer_info]) }}"><i
                                                            class="fa-2x fas fa-pen-square"></i> Chỉnh sửa</a>
                                                     <a class="dropdown-item change_isactive" href="{{ route('admin.Customer_info.changeIsActive', ['id_customer_info' => $item->id_customer_info, 'is_active' => ($item->isactive == 0 ? 1 : 0)]) }}">
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
                                        {{ $Customer_info->onEachSide(1)->links('pagination::bootstrap-4') }}
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
