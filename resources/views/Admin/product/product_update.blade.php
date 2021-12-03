@extends('Admin.layout.master_layout')
@section('content')
<div class="row"> <!-- Tràn tùy ý, mootj manf  hình gồm 12 cột--> 
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="title">Sửa sản phẩm</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.product.productSubmit') }}" method="post"> <!-- $errors biến đọc lỗi Request trả về,đọc lỗi => $errors('brand') -->
                    @csrf
                    <div class="row">
                        <div class="col-md-4 px-md-2">
                            <div class="form-group">
                                <label for="name">Tên sản phẩm</label>
                                <input type="text" class="form-control" placeholder="Tên sản phẩm" name="name" id="name" value="{{old('name') !== null ? old('product') : (isset($product) ? $product->name : '')}}">
                                {{-- @if ($errors('brand') != null)                                                            value="{{old('username') !== null ? old('Customer_info') : (isset($Customer_info) ? $Customer_info->username : '')}}">
                                    Lỗi
                                @endif --}}
                            </div>
                        </div>
                        <div class="col-md-4 px-md-2">
                            <div class="form-group">
                                <label for="images">Ảnh</label>
                                <input type="file" class="form-control" placeholder="Tên ảnh" name="images" id="images" value=""> <!-- dung ajax -->
                            </div>
                        </div>
                        <div class="col-md-4 px-md-2">
                            <div class="form-group">
                                <label for="id_brand">Mã nhãn hiệu</label>
                                <select class="form-control" name="id_brand" id="id_brand">
                                    <option value="1"></option>
                                    <option value="2"></option>
                                    <option value="3"></option>
                                    <option value="9"></option>
                                    <option value="11"></option>
                                    <option value="12"></option>
                                  </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 px-md-2">
                            <div class="form-group">
                                <label for="price">Giá sản phẩm</label>
                                <input type="number" class="form-control" placeholder="Giá sản phẩm" name="price" id="price" value="{{old('price')}}">
                            </div>
                        </div>
                        <div class="col-md-4 px-md-2">
                            <div class="form-group">
                                <label for="discount">Giảm giá</label>
                                <input type="number" class="form-control" placeholder="Giảm giá" name="discount" id="discount" value="{{old('discount')}}">
                            </div>
                        </div>
                        <div class="col-md-4 px-md-2">
                            <div class="form-group">
                                <label for="quantity">Số lượng</label>
                                <input type="number" class="form-control" placeholder="Số lượng" name="quantity" id="quantity" value="{{old('quantity')}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="content">Nội Dung</label>
                                <textarea rows="1" cols="80" name="content" id="content" class="form-control"> {{old('content')}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="description">Mô tả</label>
                                <textarea rows="4" cols="80" name="description" id="description" class="form-control">{{old('description')}}</textarea>
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
