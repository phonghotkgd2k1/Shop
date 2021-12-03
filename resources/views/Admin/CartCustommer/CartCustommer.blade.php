@extends('Admin.layout.master_layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title">Danh sách sản phẩm</h4>
                    <div class="action__btn">
                        <button class="btn btn-primary btn-round">
                            <a href="#" class="title">
                                <i class="fas fa-plus"></i> <span>Thêm sản phẩm</span>
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
                                    <th class="text-center">Ảnh</th>
                                    <th class="text-center">Tên sản phẩm</th>
                                    <th class="text-center">Mô tả</th>
                                    <th class="text-center">Chi tiết</th>
                                    <th class="text-center">Tồn kho</th>
                                    <th class="text-center">Giá</th>
                                    <th class="text-center">Trạng thái</th>
                                    <th class="text-center">Công cụ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($CartCustommer as $item) {{-- Đổi đúng params --}}
                                    <tr> {{-- Thay đổi các cột được lấy ra --}}
                                        {{-- <td><img src="{{ asset("Images/$item->images") }}" alt="" width="300px"></td>
                                        <td>{{ $item->images }}</td>
                                        <td>{{ $item->product }}</td>
                                        <td>{{ $item->content }}</td>
                                        <td>{{ $item->depscription }}</td>
                                        <td>{{ $item->product_stock }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td class="text-right">{{ $item->quantity }}</td>
                                        <td class="text-right">@money($item->price)</td>
                                        <td>{{ $item->isactive }}</td>
                                        <td>{{ $item->tools }}</td>
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
                                                    <a class="dropdown-item" href="#"><i
                                                            class="fa-2x fas fa-pen-square"></i> Chỉnh sửa</a>
                                                    <a class="dropdown-item" href="#"><i class="fa-2x fas fa-trash-alt"></i>
                                                        Xóa</a>
                                                </div>
                                            </div>
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
