@extends('Admin.layout.master_layout')
@section('content')
<div class="row"> <!-- Tràn tùy ý, mootj manf  hình gồm 12 cột--> 
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="title">{{ isset($khoxuat) ? 'Cập nhật' : 'Xuất kho' }}</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.khoxuat.khoXuatSubmit') }}" method="post" enctype="multipart/form-data"> <!-- $errors biến đọc lỗi Request trả về,đọc lỗi => $errors('brand') -->
                    @csrf
                    <div class="row">
                         <!-- <div class="col-md-4 px-md-2">
                            <div class="form-group">
                                <label for="name">Tên kho <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" placeholder="Nhập tên" name="name" id="name" 
                                    value="">
                                {{-- @if ($errors('brand') != null)
                                    Lỗi
                                @endif --}}
                            </div>
                        </div> -->
                        <div class="col-md-4 px-md-2">
                            <div class="form-group">
                                <label for="product">Sản phẩm<span class="text-danger">(*)</span></label>
                                {{-- <input type="text" class="form-control" placeholder="Tên sản phẩm" name="name" id="name" 
                                    value="" multiple> <!-- dung ajax --> --}}
                                <select name="name" class="form-control">
                                    @foreach ($product as $item)
                                        <option value="{{$item->id_product}}">{{$item->name}}</option>
                                    @endforeach
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 px-md-2">
                            <div class="form-group">
                                
                                <label for="created_at">Ngày Xuất<span class="text-danger">(*)</span></label>
                                <input type="date" class="form-control" placeholder="Ngày xuất" name="created_at" id="created_at" 
                                value="" multiple> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 px-md-2">
                            <div class="form-group">
                                <label for="name_admin">Người xuất<span class="text-danger">(*)</span></label>
                                <select name="admin" class="form-control">
                                    @foreach ($admin as $item)
                                        <option value="{{$item->id_admin}}">{{$item->username}}</option>
                                    @endforeach
                                    
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-4 px-md-2">
                            <div class="form-group">
                                <label for="quantity">Số lượng <span class="text-danger">(*)</span></label>
                                <input type="number" class="form-control" placeholder="Số lượng tồn kho " name="quantity" id="quantity" 
                                value="">
                            </div>
                        </div>
                        
                    </div>
                   
                    
                   
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <button type="submit" class="btn btn-fill btn-primary">Lưu</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- @php
    dd($errors)
@endphp --}}