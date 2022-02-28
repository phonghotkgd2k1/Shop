@extends('Admin.layout.master_layout')
@section('content')
<div class="row"> <!-- Tràn tùy ý, mootj manf  hình gồm 12 cột--> 
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="title">{{ isset($product) ? 'Cập nhật sản phẩm' : 'Thêm sản phẩm' }}</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.product.productSubmit') }}" method="post" enctype="multipart/form-data"> <!-- $errors biến đọc lỗi Request trả về,đọc lỗi => $errors('brand') -->
                    @csrf
                    @isset($product)
                        <input type="hidden" name="id_product" value="{{$product->id_product}}">
                    @endisset
                    <div class="row">
                        <div class="col-md-4 px-md-2">
                            <div class="form-group">
                                <label for="name">Tên sản phẩm <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" name="name" id="name" 
                                    value="{{old('name') !== null ? old('name') : (isset($product) ? $product->name : '')}}">
                                {{-- @if ($errors('brand') != null)
                                    Lỗi
                                @endif --}}
                            </div>
                        </div>
                        <div class="col-md-4 px-md-2">
                            <div class="form-group">
                                <label for="images">Ảnh <span class="text-danger">(*)</span></label>
                                <input type="file" class="form-control" placeholder="Tên ảnh" name="images[]" id="images" 
                                    value="" multiple> <!-- dung ajax -->
                            </div>
                        </div>
                        <div class="col-md-4 px-md-2">
                            <div class="form-group">
                                
                                <label for="brand">Nhãn hiệu <span class="text-danger">(*)</span></label>
                                <select name="brand" id="brand" class="form-control">
                                    <option value="">Chọn nhãn hiệu </option>
                                    @if (isset($brand) && count($brand) > 0)
                                    @foreach ($brand as $item)
                                    <option value="{{ $item->id_brand }}" {{ ((old('brand') !== null && old('brand') == $item->id_brand) || (old('brand') === null && isset($product) && $product->id_brand == $item->id_brand)) ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 px-md-2">
                            <div class="form-group">
                                <label for="price">Giá sản phẩm (VND)<span class="text-danger">(*)</span></label>
                                <input type="number" class="form-control" placeholder="Giá sản phẩm" name="price" id="price" 
                                value="{{old('price') !== null ? old('price') : (isset($product) ? $product->price : '') }}">
                            </div>
                        </div>
                        <div class="col-md-4 px-md-2">
                            <div class="form-group">
                                <label for="discount">Giảm giá (%)</label>
                                <input type="number" class="form-control" placeholder="Giảm giá" name="discount" id="discount" 
                                value="{{old('discount') !== null ? old('discount') : (isset($product) ? $product->discount : 0) }}">
                            </div>
                        </div>
                        <div class="col-md-4 px-md-2">
                            <div class="form-group">
                                <label for="quantity">Số lượng <span class="text-danger">(*)</span></label>
                                <input type="number" class="form-control" placeholder="Số lượng tồn kho " name="quantity" id="quantity" 
                                value="{{old('quantity')!== null ? old('quantity') : (isset($product) ? $product->quantity : '') }}">
                            </div>
                        </div>
                        <div class="col-md-4 px-md-2">
                            <div class="form-group">
                                <label for="date_nhap">Ngày nhập <span class="text-danger">(*)</span></label>
                                <input type="date" class="form-control" placeholder="Ngày nhập " name="date_nhap" id="date_nhap" 
                                value="{{old('date_nhap')!== null ? old('date_nhap') : (isset($product) ? $product->date_nhap : '') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="content">Nội Dung </label>
                                <textarea rows="1" cols="80" name="content" id="content" class="form-control"> {{old('content') !== null ? old('content') : (isset($product) ? $product->content : '')}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="description">Chi Tiết Sản Phẩm</label>
                                <textarea rows="4" cols="80" name="description" id="description" class="form-control">{{old('description') !== null ? old('description') : (isset($product) ? $product->description : '')}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="isactive" id="isactive" {{ (($errors->any() && old('isactive')) || (!$errors->any() && isset($product) && $product->isactive === 0) || ((!$errors->any() || old('isactive')) && !isset($product))) ? 'checked' : '' }}>
                                Sử dụng
                                <span class="form-check-sign">
                                    <span class="check"></span>
                                </span>
                            </label>
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
