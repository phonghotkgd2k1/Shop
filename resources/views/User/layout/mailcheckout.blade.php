<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BuyComputersOnline</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/2.png') }}"/>

    <!-- Stylesheets -->
    <link type="text/css" rel="stylesheet" href="{{ asset('User/css/bootstrap.min.css') }}"/>
</head>
<style>
    * {
        font-family: DejaVu Sans !important;
    }
    p {
        font-size: 20px;
    }
</style>
<body class="scroll__bar">
    <div class="wrapper bg--white" id="wrapper">
        <div class="container">
            {{-- <div class="col-lg-12">
                <h2 class="text-capitalize text-center p-3 bg-dark text-white mt-4 mb-4">Thông tin đơn hàng</h2>
                <table class="table table-striped">
                    <tr>
                        <th class="col-4 text-capitalize align-middle" scope="row">Ngày hẹn giao</th>
                        <td class="col-8">{{ date('d/m/Y', strtotime($bill->expected_delivery_date)) }}</td>
                    </tr>
                    <tr>
                        <th class="col-4 text-capitalize align-middle" scope="row">Địa chỉ giao</th>
                        <td class="col-8">{{ $bill->address }}</td>
                    </tr>
                    <tr>
                        <th class="col-4 text-capitalize align-middle" scope="row">SĐT đặt hàng</th>
                        <td class="col-8">{{ $bill->phone }}</td>
                    </tr>
                    <tr>
                        <th class="col-4 text-capitalize align-middle" scope="row">Tiền sản phẩm</th>
                        <td class="col-8">@money($bill->total_price)</td>
                    </tr>
                    <tr>
                        <th class="col-4 text-capitalize align-middle" scope="row">Phí vận chuyển</th>
                        <td class="col-8">@money($bill->shipping_fee)</td>
                    </tr>
                    <tr>
                        <th class="col-4 text-capitalize align-middle" scope="row">Tổng tiền</th>
                        <td class="col-8">@money($bill->total_price+$bill->shipping_fee)</td>
                    </tr>
                </table>
            </div> --}}
            <div class="col-lg-12">
                <p class="text-capitalize text-center p-3 bg-dark text-white mt-4 mb-4">Chi tiết đơn hàng</p>
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center" scope="col">Sản phẩm</th>
                            <th class="text-center" scope="col">Giá</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartCustomerInfor as $billDetail)
                        <tr>
                            <td class="col-8">{{ $billDetail["model"]->name}}</td>
                            <td class="col-4 align-middle text-right">@money($billDetail["quantity"]*($billDetail["model"]->price-($billDetail["model"]->price*($billDetail["model"]->discount/100))))</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="{{ asset('User/js/bootstrap.min.js') }}"></script>
</body>
</html>
