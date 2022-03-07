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
                    <h1 style="color: #2e7d32; display: block; text-align: center; font-size: 24px;">Danh sách hóa đơn</h1>
                </div>
              
                       <table class="table table-condensed" id="">
                            <thead>
                                <tr class="cart_menu">
                                    <th style="text-align:center;">Số đơn hàng: </th>
                                    <th style="text-align:center;">Tên khách hàng: </th>
                                    <th style="text-align:center;">Số điện thoại: </th>
                                    <th style="text-align:center;"> Địa chỉ email: </th>
                                    <th style="text-align:center;">Địa chỉ nhận hàng: </th>
                                    
                                </tr>
                            </thead>
                            {{-- <tbody>
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
                            </tbody>      --}}
                        </table> 
                     </div>
                </div>
            </div>
        </div>
    </div>
@endsection
