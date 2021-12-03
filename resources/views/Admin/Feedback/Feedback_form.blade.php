@extends('Admin.layout.master_layout')
@section('content')
<div class="row"> <!-- Tràn tùy ý, mootj manf  hình gồm 12 cột--> 
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="title"></h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.Feedback.FeedbackSubmit') }}" method="post"> <!-- $errors biến đọc lỗi Request trả về,đọc lỗi => $errors('brand') -->
                    @csrf
                    <div class="row">
                        <div class="col-md-3 px-md-2">
                            <div class="form-group">
                                <label for="title">Chức vụ</label>
                                <input type="text" class="form-control" placeholder="Chức vụ" name="title " id="title ">
                            </div>
                        </div>
                        <div class="col-md-3 px-md-1">
                            <div class="form-group">
                                <label for=" send_date">Ngày</label>
                                <input type="text" class="form-control" placeholder="Ngày đánh giá" name="send_date " id="send_date ">
                                
                            </div>
                        </div>   
                    </div>
                    <div class="row">
                        <div class="col-md-4 px-md-2">
                            <div class="form-group">
                                <label for=" name">Tên đăng nhập</label>
                                <input type="text" class="form-control" placeholder="Tên đăng nhập" name="name" id="name">
                            </div>
                        </div>
                        <div class="col-md-4 px-md-2">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" placeholder="Email" name="email" id="email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 px-md-2">
                            <div class="form-group">
                                <label for="id_customer_info ">Mã khách hàng</label>
                                <input type="text" class="form-control" placeholder="Mã khách hàng" name="id_customer_info " id="id_customer_info "> 
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">   
                        {{-- <div class="col-md-3 px-md-2">
                            <div class="form-group">
                                <label for="phone">Số điện thoại</label>
                                <input type="text" class="form-control" placeholder="Số điện thoại khách hàng" name="phone" id="phone">
                            </div>
                        </div> --}}
                       
                    </div>
                    {{-- <div class="row">
                        <div class="col-md-3 px-md-1">
                            <div class="form-group">
                                <label for="id_payment">Mã thanh toán</label>
                                <input type="text" class="form-control" placeholder="Mã thanh toán" name="id_payment " id="id_payment ">
                            </div>
                        </div>
                    </div>
                 --}}
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="content">Nội dung</label>
                                <textarea rows="4" cols="80" name="content" id="content" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <button type="submit" class="btn btn-fill btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
