@extends('Admin.layout.master_layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title">Đánh giá của khách hàng</h4>
                    <div class="action__btn">
                        <button class="btn btn-primary btn-round">
                            <a href="{{ route('admin.Feedback.FeedbackForm') }}" class="title">
                                <i class="tim-icons icon-zoom-split"></i> <span>Tìm kiếm</span>
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
                                    <th class="text-center">Mã đánh giá</th>
                                    <th class="text-center">Tên</th>
                                    <th class="text-center">Nội dung</th>
                                    <th class="text-center">Ngày đánh giá</th>
                                    <th class="text-center">Email</th>
                                    {{-- <th class="text-center">Trả lời</th> --}}
                                    <th class="text-center">Công cụ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Feedback as $item) {{-- Đổi đúng params --}}
                                    <tr> {{-- Thay đổi các cột được lấy ra --}}
                                        {{-- {<td><img src="{{ asset("images/$item->images") }}" alt="" width="300px"></td> --}}
                                        <td>{{ $item->id_feedback }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->content }}</td>
                                        <td>{{ $item->send_date }}</td>
                                        <td>{{ $item->email }}</td>
                                        {{-- <td>{{ $item->reply }}</td> --}}
                                        {{-- <td>{{ $item->isactive }}</td> --}}
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
