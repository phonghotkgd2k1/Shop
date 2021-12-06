@extends('Admin.layout.master_layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title">Danh sách sản phẩm</h4>
                    <div class="action__btn">
                        <button class="btn btn-primary btn-round">
                            <a href="{{route('admin.hot_product.HotPrdForm')}}" class="title">
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
                                    {{-- <th class="text-center">STT</th> --}}
                                    <th class="text-center" width="100px">Ảnh</th>
                                    {{-- <th class="text-center">Nhãn hiệu</th> --}}
                                    <th class="text-center">Tên sản phẩm</th>
                                    <th class="text-center">Mô tả</th>
                                    {{-- <th class="text-center">Chi tiết</th> --}}
                                    <th class="text-center">Tồn kho</th>
                                    <th class="text-center">Giá</th>
                                    <th class="text-center">Trạng thái</th>
                                    <th class="text-center">Công cụ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($HotPrd as $key => $item) {{-- Đổi đúng params --}}
                                    <tr> {{-- Thay đổi các cột được lấy ra --}}
                                        {{-- <td>{{ $HotPrd->count()*($HotPrd->currentPage()-1)+($key+1) }}</td> --}}
                                        <td><img src="{{ asset("images/$item->images") }}" alt="" width="280px"></td>
                                        {{-- <td>{{ $item->name_brand }}</td> --}}
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->content }}</td>
                                        {{-- <td>{{ $item->description }}</td> --}}
                                        <td class="text-right">{{ $item->quantity }}</td>
                                        <td class="text-right">@money($item->price)</td>
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
                                                    <a class="dropdown-item" href="{{ route('admin.hot_product.HotPrdForm', ['id_hot_product' => $item->id_hot_product]) }}"><i
                                                        class="fa-2x fas fa-pen-square"></i> Chỉnh sửa</a>
                                                    <a class="dropdown-item" href="#"><i class="fa-2x fas fa-trash-alt"></i>
                                                        Xóa</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            {{-- <tfoot>
                                <tr>
                                    <td colspan="8">
                                        {{$HotPrd->onEachSide(1)->links('pagination::bootstrap-4') }}
                                    </td>
                                </tr>
                            </tfoot> --}}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
