@extends('Admin.layout.master_layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title">Quản Lí Admin</h4>
                    <div class="action__btn">
                        <button class="btn btn-primary btn-round">
                            <a href="{{ route('admin.SuperAdmin.SuperAdminForm') }}" class="title">
                                <i class="fas fa-plus"></i> <span>Thêm Admin</span>
                            </a>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <tr> {{-- Thay đổi tiêu đề phù hợp --}}
                                    <th class="text-center">STT</th>
                                    {{-- <th class="text-center">ID</th> --}}
                                    <th class="text-center" width="150px">Ảnh</th>
                                    <th class="text-center">Tên</th>
                                    <th class="text-center">Số điện thoại</th>
                                    <th class="text-center">Địa chỉ</th>
                                    <th class="text-center">Giới tính</th>
                                    <th class="text-center">Chức vụ</th>
                                    <th class="text-center">Trạng thái</th>
                                    <th class="text-center">Công cụ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($SuperAdmin as $key => $item) {{-- Đổi đúng params --}}
                                    <tr> {{-- Thay đổi các cột được lấy ra --}}
                                        <td>{{$SuperAdmin->count()*($SuperAdmin->currentPage()-1)+($key+1) }}</td>
                                        <td><img src="{{ asset("images/$item->images") }}" alt="" width="180px"></td>
                                        <td>{{ $item->name}}</td>
                                        <td>{{ $item->phone}}</td>
                                        <td>{{ $item->address }}</td>
                                        <td>{{ $item->sex }}</td>
                                        <td class="text-center">
                                            {!! $item->role === 0 ? 'Admin'
                                                                 : 'SuperAdmin' !!}
                                        </td>
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
                                                    <a class="dropdown-item" href="{{ route('admin.SuperAdmin.SuperAdminDetail',  ['id_admin' => $item->id_admin]) }}"><i class="fa-2x fas fa-info-circle"></i> Chi tiết</a>

                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="{{ route('admin.SuperAdmin.SuperAdminForm',  ['id_admin' => $item->id_admin]) }}"><i
                                                            class="fa-2x fas fa-pen-square"></i> Chỉnh sửa</a>
                                                    <a class="dropdown-item change_isactive" href="{{ route('admin.SuperAdmin.changeIsActive', ['id_admin' => $item->id_admin, 'is_active' => ($item->isactive == 0 ? 1 : 0)]) }}">
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
                                        {{ $SuperAdmin->onEachSide(1)->links('pagination::bootstrap-4') }}
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
{{-- {{ route('admin.SuperAdmin.SuperAdminDetail',  ['id_admin' => $item->id_admin]) }} --}}
