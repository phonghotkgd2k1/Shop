<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>SmartPhoneVN</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{ asset('User/css/bootstrap.min.css') }}"/>

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="{{ asset('User/css/slick.css') }}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('User/css/slick-theme.css') }}"/>

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="{{ asset('User/css/nouislider.min.css') }}"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{ asset('User/css/font-awesome.min.css') }}">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('User/css/style.css') }}"/>

    <link rel="stylesheet" href="{{ asset('User/css/toastr.min.css') }}">

    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> --}}


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
    @include('user.layout.header')
    {{-- @include('user.layout.search') --}}
    @yield('content')
    @include('user.layout.footer')
    {{-- @include('user.layout.quickview') --}}
    {{-- @php
    dd(SESSION::all());    
@endphp --}}
    <!-- jQuery Plugins -->
    {{-- <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script> --}}
    <script src="{{ asset('User/js/jquery.min.js') }}"></script>
    <script src="{{ asset('User/js/toastr.min.js') }}"></script>
    <script src="{{ asset('User/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('User/js/slick.min.js') }}"></script>
    <script src="{{ asset('User/js/nouislider.min.js') }}"></script>
    <script src="{{ asset('User/js/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('User/js/main.js') }}"></script>
    <!-- Thêm chạy chức năng nào đó ? -->
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> --}}
    <script src="{{ asset('User/js/custom.js') }}"></script>
    <script>
        // alert(`sss`);
        @if (Session::has("msgErr"))
            // alert(`{{ Session::get("msgErr") }}`);
            // sweet alert
            toastr.error(`{{ Session::get("msgErr") }}`);
        @endif

        @if (Session::has("msgSuc"))
            // alert(`{{ Session::get("msgSuc") }}`);
            toastr.success(`{{ Session::get("msgSuc") }}`);
        @endif

        //11/10/2021
        //k có msgErr cho form checkout
        @if ($errors->any())
                @foreach ($errors->toArray() as $key => $item)
                    $(`[id='{{ $key }}']`).addClass('is-invalid');
                    $(`[id='{{ $key }}']`).parent().append(`<div class="invalid-feedback">{{ $item[0] }}</div>`);
                @endforeach
                toastr.error(`Vui lòng điền đủ thông tin !`);
            @endif
    </script>
    {{-- {!! Toastr::message() !!} --}}
</body>
</html>
