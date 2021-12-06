@extends('Admin.layout.master_layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title">Danh sách nhãn hiệu</h4>
                    <div class="action__btn">
                        <button class="btn btn-primary btn-round">
                            <a href="{{ route('admin.brand.brandForm') }}" class="title">
                                <i class="fas fa-plus"></i> <span>Thêm nhãn hiệu</span>
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
                                    <th class="text-center">Tên nhãn hiệu</th>
                                    {{-- <th class="text-center">Mô tả</th> --}}
                                    <th class="text-center">Chi tiết</th>
                                    {{-- <th class="text-center">Tồn kho</th>
                                    <th class="text-center">Giá</th> --}}
                                    <th class="text-center">Trạng thái</th>
                                    <th class="text-center">Công cụ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allBrand as $item) {{-- Đổi đúng params --}}
                                    <tr> {{-- Thay đổi các cột được lấy ra --}}
                                        {{-- <td><img src="{{ asset("images/$item->images") }}" alt="" width="300px"></td> --}}
                                        <td>{{ $item->name }}</td>
                                        {{-- <td>{{ $item->content }}</td> --}}
                                        <td>{{ $item->description }}</td>
                                        {{-- <td class="text-right">{{ $item->quantity }}</td>
                                        <td class="text-right">@money($item->price)</td> --}}
                                        <td>
                                            @if ($item->isactive == 0)
                                                Hoạt động
                                            @else
                                                Khóa
                                            @endif
                                        </td>
                                        {{-- <td>{{ $item->isactive == 0 ? 'Hoạt động' : 'Khóa' }}</td> <!-- (dk if) ? true : false --> --}}
                                        <td class="text-center">{!! $item->isactive === 0 ? '<i class="fa-2x fas fa-check-circle color--green ml-2" title="Đang sử dụng"></i>' : '<i class="fa-2x fas fa-times-circle color--red ml-2" title="Đang khóa"></i>' !!}</td>
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
                                                    <a class="dropdown-item" href="{{ route('admin.brand.brandForm', ['id_brand' => $item->id_brand]) }}"><i
                                                            class="fa-2x fas fa-pen-square"></i> Chỉnh sửa</a>
                                                    <a class="dropdown-item change_isactive" href="{{ route('admin.brand.changeIsActive', ['id_brand' => $item->id_brand, 'is_active' => ($item->isactive == 0 ? 1 : 0)]) }}">
                                                            {!! $item->isactive == 0 ? '<i class="fa-2x fas fa-eye-slash"></i> Bỏ sử dụng' : '<i class="fa-2x fas fa-eye"></i> Sử dụng' !!}
                                                        </a>
                                                </div>
                                            </div>
                                        </td>
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
