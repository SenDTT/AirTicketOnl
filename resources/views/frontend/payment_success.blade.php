
@extends('frontend.template.master')

@section('content')
    <header id="home">
        <div class="navbar navbar-fixed-top navbar-default">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed " data-toggle="collapse"
                        data-target="#navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="{{route('home')}}" class="h3 navbar-brand">Vé máy bay trực tuyến</a>
            </div>
            <div class="collapse navbar-collapse text-uppercase" id="navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{route('home')}}">Đặt vé</a></li>
                    <li><a href="#">Giới thiệu</a></li>
                    <li><a href="#">Sổ tay du lịch</a></li>
                    <li><a href="#">Liên hệ</a></li>
                </ul>
            </div>
        </div>
    </header>
    {{--content--}}
    {{--slide--}}
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="images/slide2.jpg" alt="slide2">
            </div>
            <div class="item">
                <img src="images/slide4.jpg" alt="slide4">
            </div>
            <div class="item">
                <img src="images/slide3.jpg" alt="slide3">
            </div>
        </div>
        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="bg-content">
        <div class="pd-content">
            <h3>Thanh toán</h3>
            <p class="text-primary">Đặt vé thành công</p>
            <a href="{{ route('web.index') }}">Quay trở về</a>
        </div>
    </div>
@endsection
