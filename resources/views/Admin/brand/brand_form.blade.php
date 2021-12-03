@extends('Admin.layout.master_layout')
@section('content')
<div class="row"> <!-- Tràn tùy ý, mootj manf  hình gồm 12 cột--> 
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="title">{{ isset($brand) ? 'Cập nhật nhãn hiệu' : 'Thêm nhãn hiệu' }}</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.brand.brandSubmit') }}" method="post"> <!-- $errors biến đọc lỗi Request trả về,đọc lỗi => $errors('brand') -->
                    @csrf
                    @isset($brand)
                        <input type="hidden" name="id_brand" value="{{$brand->id_brand}}">
                    @endisset
                    <div class="row">
                        <div class="col-md-3 px-md-1">
                            <div class="form-group">
                                <label for="brand">Tên nhãn hiệu</label>
                                <input type="text" class="form-control" placeholder="Tên nhãn hiệu" name="brand" id="brand" value="{{ old('brand') !== null ? old('brand') : (isset($brand) ? $brand->name : '')}}">
                                {{-- @if ($errors('brand') != null)
                                    Lỗi
                                @endif --}}
                            </div>
                        </div>
                        {{-- <div class="col-md-4 pl-md-1">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                        </div> --}}
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="description">Mô tả</label>
                                <textarea rows="4" name="description" id="description" class="form-control">{{ old('description') !== null ? old('description') : (isset($brand) ? $brand->description : '') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="isactive" id="isactive" {{ (($errors->any() && old('isactive')) || (!$errors->any() && isset($brand) && $brand->isactive === 0) || ((!$errors->any() || old('isactive')) && !isset($brand))) ? 'checked' : '' }}>
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
