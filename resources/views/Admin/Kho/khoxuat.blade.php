@extends('Admin.layout.master_layout')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <h4 class="card-title">Kho Xuất hàng</h4>
                <div class="action__btn">
                    <button class="btn btn-primary btn-round">
                        <a href="{{ route('admin.khoxuat.khoXuatForm') }}" class="title">
                            <i class="fas fa-plus"></i> <span>Sản phẩm xuất kho</span>
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
                        <thead class="text-primary">
                            <tr> {{-- Thay đổi tiêu đề phù hợp --}}
                                <th>MÃ</th>
                                {{-- <th class="text-center" width="150px">Kho xuất </th> --}}
                                <th>Sản phẩm</th>
                                <th>Ngày xuất</th>
                                <th>Người xuất</th>
                                {{-- <th class="text-center">Chi tiết</th> --}}
                                <th>Số lượng</th>
                              
                                <th>Trạng thái</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($khoxuat as $key => $item) 
                                <tr> 
                                    <td>{{ $khoxuat->count()*($khoxuat->currentPage()-1)+($key+1) }}</td>
                                   
                                    <td>{{$item->name_product}}</td>
                                    <td>{{ $item->date_xuat }}</td>
                                    <td>{{ $item->name_admin }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-danger dropdown-toggle-split"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#"><i class="fa-2x fas fa-info-circle"></i> Chi tiết</a>

                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#"><i
                                                    class="fa-2x fas fa-pen-square"></i> Chỉnh sửa</a>
                                                    {{-- <a class="dropdown-item change_isactive" href="#">
                                                        {!! $item->isactive == 0 ? '<i class="fa-2x fas fa-eye-slash"></i> Bỏ sử dụng' : '<i class="fa-2x fas fa-eye"></i> Sử dụng' !!}
                                                    </a> --}}
                                            </div>
                                        </div>
                                    </td>
                                
                                   
                                    
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="8">
                                    {{ $khoxuat->onEachSide(1)->links('pagination::bootstrap-4') }}
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