<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Vé máy bay trực tuyến</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="{{asset("")}}">
    <meta name="_token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('bootstrap-3.3.7-dist/css/bootstrap.min.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('css/master.css') }}" rel="stylesheet">
    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
    <link href="{{ asset('library/nprogress/nprogress.css') }}" rel="stylesheet">
    <link href="{{ asset('library/toastr/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/ctn-home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/flights.css') }}" rel="stylesheet">
    <link href="{{ asset('css/info.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
@yield('content')

<footer>
    <label class=" text-center"><a class="up-arrow" href="{{route('home')}}" data-toggle="tooltip" title="TO TOP">
        <span class="glyphicon glyphicon-chevron-up"></span>
        </a><br><br></label>
    <div class="row">
        <div class="col-sm-3">
            <ul class="list-unstyled">
                <li class="h4 text-uppercase">Vé máy bay trực tuyến</li>
                <li><a href="#">Đặt vé</a></li>
                <li><a href="#">Giới thiệu</a></li>
                <li><a href="#">Sổ tay du lịch</a></li>
                <li><a href="#">Liên hệ</a></li>
            </ul>
        </div>
        <div class="col-sm-3">
            <ul class="list-unstyled">
                <li class="h4 text-capitalize">Đối tác và liên kết</li>
                <li><a href="#">Vietnam Airline</a></li>
                <li><a href="#">Jetstar Airport</a></li>
                <li><a href="#">VietJect Air</a></li>
            </ul>
        </div>
        <div class="col-sm-3">
            <ul class="list-unstyled">
                <li class="h4 text-capitalize">Thông tin cần thiết</li>
                <li><a href="#">Điều khoản & điều kiện</a></li>
                <li><a href="#">Quy trình hoạt động</a></li>
                <li><a href="#">Câu hỏi thường gặp</a></li>
            </ul>
        </div>
        <div class="col-sm-3">
            <ul class="list-unstyled">
                <li class="h4 text-capitalize">Thông tin cần thiết</li>
                <li><a href="#">Điều khoản & điều kiện</a></li>
                <li><a href="#">Câu hỏi thường gặp</a></li>
                <li>&copy; 2018, Ho Chi Minh City</li>
                <li class="li-last">
                    <ul class="list-inline links">
                        <li><a href="#"><div class="link-twitter"></div></a></li>
                        <li><a href="#"><div class="link-fb"></div></a></li>
                        <li><a href="#"><div class="link-gmail"></div></a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{ asset('bootstrap-3.3.7-dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('bootstrap-3.3.7-dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('library/nprogress/nprogress.js') }}"></script>
<script src="{{ asset('library/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('js/ctn-home.js') }}"></script>
<script src="{{ asset('js/home.js') }}"></script>
<script src="{{ asset('js/cart.js') }}"></script>
</body>
</html>
