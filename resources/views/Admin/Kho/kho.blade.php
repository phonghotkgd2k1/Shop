@extends('Admin.layout.master_layout')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <h4 class="card-title">Kho hàng</h4>
                <div class="action__btn">
                    <button class="btn btn-primary btn-round">
                        <a href="{{ route('admin.product.productForm') }}" class="title">
                            <i class="fas fa-plus"></i> <span></span>
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
                                <th class="text-center">MÃ</th>
                                <th class="text-center" width="150px">Kho xuất </th>
                                <th class="text-center">Tình trạng</th>
                                <th class="text-center">Ngày xuất</th>
                                <th class="text-center">Người xuất</th>
                                {{-- <th class="text-center">Chi tiết</th> --}}
                                <th class="text-center">Tồn kho</th>
                                <th class="text-center">Tổng tiền</th>
                                <th class="text-center">Trạng thái</th>
                                <th class="text-center">Công cụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($khonhap as $key => $item) 
                                <tr> 
                                    <td>{{ $product->count()*($product->currentPage()-1)+($key+1) }}</td>
                                    <td><img src="{{ asset("images/$item->images") }}" alt="" width="280px"></td>
                                    <td>{{ $item->name_brand }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->content }}</td>
                                   
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
                                                <a class="dropdown-item" href="{{ route('admin.product.productDetail', ['id_product' => $item->id_product]) }}"><i class="fa-2x fas fa-info-circle"></i> Chi tiết</a>

                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="{{ route('admin.product.productForm', ['id_product' => $item->id_product]) }}"><i
                                                    class="fa-2x fas fa-pen-square"></i> Chỉnh sửa</a>
                                                    <a class="dropdown-item change_isactive" href="{{ route('admin.product.changeIsActive', ['id_product' => $item->id_product, 'is_active' => ($item->isactive == 0 ? 1 : 0)]) }}">
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
                                    {{ $khonhap->onEachSide(1)->links('pagination::bootstrap-4') }}
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