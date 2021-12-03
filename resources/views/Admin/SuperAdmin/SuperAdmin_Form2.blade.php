@extends('Admin.layout.master_layout')

@Section('content')

@if (Session::has('error'))
{{ Session::get('error') }}
@endif

<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Thêm admin mới</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form action="#" method="post">
    {{ csrf_field() }}
    <div class="card-body">
      <div class="form-group">
        <label for="username">Tài khoản</label>
        @if ($errors->first('txt_user'))
          <input type="email" id="username" name="txt_user" class='form-control is-invalid' value="{{old('txt_user')}}">
          <span  class="error invalid-feedback">{{ $errors->first('txt_user')}}(*)</span>
        @else
          <input type="email" class="form-control" id="username" placeholder="Nhập username" name="txt_user"
            value="{{old('txt_user')}}">
        @endif
      </div>
      <div class="form-group">
        <label for="pass">Mật khẩu</label>
        @if ($errors->first('txt_pass'))
        <input type="password" id="pass" name="txt_pass" class='form-control is-invalid' value="{{old('txt_pass')}}">
        <span  class="error invalid-feedback">{{ $errors->first('txt_pass')}}(*)</span>
        @else
        <input type="password" class="form-control" id="pass" placeholder="Nhập password" name="txt_pass"
          value="{{old('txt_pass')}}">
        @endif
      </div>
      <div class="form-group">
        <label for="tenadmin">Tên admin</label>
        @if ($errors->first('txtten_admin'))
        <input type="text" id="tenadmin" name="txtten_admin" class='form-control is-invalid'
          value="{{old('txtten_admin')}}">
        <span  class="error invalid-feedback">{{ $errors->first('txtten_admin')}}(*)</span>
        @else
        <input type="text" class="form-control" id="tenadmin" placeholder="Tên admin" name="txtten_admin"
          value="{{old('txtten_admin')}}">
        @endif
      </div>
      <div class="form-group">
        <label for="email">Địa chỉ</label>
        @if ($errors->first('txt_user'))
          <input type="email" id="email" name="txt_user" class='form-control is-invalid' value="{{old('txt_user')}}">
          <span  class="error invalid-feedback">{{ $errors->first('txt_user')}}(*)</span>
        @else
          <input type="email" class="form-control" id="email" placeholder="Nhập email" name="txt_user"
            value="{{old('txt_user')}}">
        @endif
      </div>
      <div class="form-group">
        <label for="anh">Ảnh</label>
        @if ($errors->first('txt_anh'))
        <input type="file" id="anh" name="txt_anh" class='form-control is-invalid' value="{{old('txt_anh')}}">
        <span  class="error invalid-feedback">{{ $errors->first('txt_anh')}}(*)</span>
        @else
        <input type="file" class="form-control" id="anh" placeholder="Hình ảnh" name="txt_anh"
          value="{{old('txt_anh')}}">
        @endif
      </div>
      <div class="form-group">
        <label for="diachi">Địa chỉ</label>
        @if ($errors->first('txt_dia'))
        <textarea name="txt_dia" id="diachi" cols="40" rows="2" class="form-control is-invalid"
          value="{{old('txt_dia')}}"></textarea>
        <span  class="error invalid-feedback">{{ $errors->first('txt_dia')}}(*)</span>
        @else
        <textarea name="txt_dia" id="diachi" cols="40" rows="2" class="form-control"
          value="{{old('txt_dia')}}"></textarea>
        @endif
      </div>
      <div class="form-group">
        <label for="trang">Trạng thái</label>
        <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="txt_trang" id="trang" value="0">
            <label class="form-check-label" for="trang">Hoạt động</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" checked="" name="txt_trang" id="trangnu" value="1">
            <label class="form-check-label" for="trangnu">Khóa</label>
          </div>
        </div>
      </div>
      
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Thêm</button>
    </div>
  </form>
</div>

@endSection