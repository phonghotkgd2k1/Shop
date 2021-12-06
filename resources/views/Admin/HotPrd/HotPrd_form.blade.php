@extends('Admin.layout.master_layout')
@section('content')
<div class="row"> <!-- Tràn tùy ý, mootj manf  hình gồm 12 cột--> 
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="title">{{ isset($HotPrd) ? 'Cập nhật sản phẩm ' : 'Thêm sản phẩm ' }}</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.hot_product.HotPrdSubmit') }}" method="post"> <!-- $errors biến đọc lỗi Request trả về,đọc lỗi => $errors('brand') -->
                    @csrf
                    @isset($HotPrd)
                        <input type="hidden" name="id_hot_product" value="{{ $HotPrd->id_hot_product }}">
                    @endisset
                    {{-- <div class="row">
                        <div class="col-md-3 px-md-1">
                            <div class="form-group">
                                <label for="HotPrd">Tên sản phẩm </label>
                                <input type="text" class="form-control" placeholder="Tên sản phẩm bán chạy" name="HotPrd" id="HotPrd">
                                
                            </div>
                        </div>
                        <div class="col-md-3 px-md-1">
                            <div class="form-group">
                                <label for="images">Ảnh</label>
                                <input type="text" class="form-control" placeholder="Tên ảnh" name="images" id="images">
                            </div>
                        </div>
                    </div> --}}
                    <div class="row">
                        <div class="col-md-4 pl-md-1">
                            <div class="form-check">
                                <label for="id_hot_product">Mã sản phẩm nổi bật</label>
                                <input type="text" class="form-control" placeholder="Nhập mã sản phẩm nổi bật" name="id_hot_product" id="id_hot_product" 
                                    value="{{old('id_hot_product') !== null ? old('id_hot_product') : (isset($HotPrd) ? $HotPrd->id_hot_product : '')}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 pl-md-1">
                            <div class="form-check">
                                <label for="id_product">Mã sản phẩm</label>
                                <input type="text" class="form-control" placeholder="hập mã sản phẩm" name="id_product" id="id_product" 
                                    value="{{old('id_product') !== null ? old('id_product') : (isset($HotPrd) ? $HotPrd->id_product : '')}}">
                            </div>
                        </div>
                        {{-- <div class="col-md-4 pl-md-1">
                            <div class="form-check">
                                <label for="brand">Thương hiệu</label>
                                <input type="text" class="form-control" placeholder="Thuơng hiệu" name="brand" id="brand">
                            </div>
                        </div> --}}
                    </div>
                    {{-- <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="description">Mô tả</label>
                                <textarea rows="4" cols="80" name="description" id="description" class="form-control"></textarea>
                            </div>
                        </div>
                    </div> --}}
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