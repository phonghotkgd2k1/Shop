@extends('user.layout.master_layout')
@section('content')
    <div class="section ">
        <div class="container">
            <div class="col-md-8 col-md-push-2">
                <div class="success-wrap">
                    <div class="left">
                        <a href="#"><i class="fa fa-chevron-left"></i> Tiếp tục tìm kiếm sản phẩm</a>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="module">
                    <h1 style="color: #2e7d32; display: block; text-align: center; font-size: 24px;">Đặt hàng thành công</h1>
                </div>
                {{-- <div class="module" style="border: solid 1px #eee; background: #fff; padding: 10px;">
                    <p>Cảm ơn Quý khách hàng đã chọn mua hàng tại SmartPhone. Trong<b> 15 phút</b>, SmartPhone sẽ <b>SMS hoặc
                            Gọi</b> để xác nhận đơn hàng.</p>
                    <p>* Các đơn hàng từ <b> 21h30 tối tới 8h</b> sáng hôm sau, SmartPhone sẽ liên hệ với Quý khách trước 10h
                        trưa cùng ngày.</p>
                    <p>Nếu anh/chị cần tư vấn, trợ giúp vui lòng gọi <strong>0358903368</strong>. Xin cám ơn !</p>
                    <strong style="margin-top: 20px;">Thông tin đặt hàng</strong>
                    <div style="background: rgba(65, 166, 116, 0.15); padding: 10px; border: solid 1px #eee; margin-top: 10px;"> --}}
                        {{-- <table class="table table-condensed" id="">
                            <thead>
                                <tr class="cart_menu">
                                    <th style="text-align:center;">Số đơn hàng: </th>
                                    <th style="text-align:center;">Tên khách hàng: </th>
                                    <th style="text-align:center;">Số điện thoại: </th>
                                    <th style="text-align:center;"> Địa chỉ email: </th>
                                    <th style="text-align:center;">Địa chỉ nhận hàng: </th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($billDetail as $key => $item)
                                <tr>
                                    <td>
                                        <span class="id">{{ $item['id_bill'] }}</span>
                                    </td>
                                
                                    <td class="product-name"><a href="{{ route('product.viewDetailName', ['id_product'=>$item['id_product']]) }}">{{ $item['model']->name }}</a></td> 
                                    
                                    <td style="text-align:center;"class="cart_price"class="product-price">@money($item['model']->price)</td>
                                    <td style="text-align:center;"class= "product_stock">{{$item['model']->quantity}}</td>
                                    <td style="text-align:center;"class="cart_quantity">
                                        <div class="cart_quantity_button">
                                            <a class="cart_quantity_up" href="">               </a>
                                           
                                            <span class="qty">{{ $item['quantity'] }}</span>
                                            <a class="cart_quantity_down" href="">             </a>
                                        </div> 
                                    </td>
                                    <td style="text-align:center;"class="cart_total"class="product-price">    
                                        @money($item['model']->price-($item['model']->price*($item['model']->discount/100)))
                                    </td>
                                    <td style="text-align:center;"class="cart_delete">
                                        <a class="cart_quantity_delete" href=""><i class="fa fa-trash-o" style="font-size:28px;color:red"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                 
                        </table> --}}
                        Số đơn hàng: <strong class="order-total">99NB56<strong>
                    <br>
                    Khách hàng : <strong>Trần Hùng</strong>
                    <br>
                    Số điện thoại: <strong>0358903368</strong>
                    <br>
                    Địa chỉ email: <strong>nguyenduyenvinh0108@gmail.com</strong>
                    <br>
                    Địa chỉ nhận hàng: <strong>
                        93 trần daaji nghia, Quận Hai Bà Trưng, Hà Nội </strong>
                    <br>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
