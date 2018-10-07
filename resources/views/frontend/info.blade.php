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
    <div class="bg-content-info">
        <div class="pd-content-info">
            <div class="content-info flight-choose">
                <label class="h4 text-uppercase txtTittle"><span class="glyphicon glyphicon-info-sign"></span> Chi tiết chuyến bay</label>
                <div class="row tittle-choose">
                    <div class="col-sm-2">Chuyến đi:</div>
                    <div class="col-sm-6">
                        <ul class="list-inline">
                            <li>Điểm đi - Sân bay</li>
                            <li><span class="glyphicon glyphicon-transfer"></span></li>
                            <li>Điểm đến - Sân bay</li>
                        </ul>
                    </div>
                    <div class="text-right col-sm-4">Thời gian bay:</div>
                </div>
                <div class="flight-info-choose">
                    <div class="flight-choose">
                        <div id="flightDetail-choose">
                            <div class="detail-choose">
                                <div class="row">
                                    <div class="col-sm-1"><img src="https://ibev2.maybay.net/Statics/Images/Airline/vj.gif" alt="name" ></div>
                                    <div class="col-sm-2 text-right">
                                        <ul class="list-unstyled">
                                            <li class="text-capitalize">Điểm đi</li>
                                            <li>sân bay</li>
                                            <li class="time-date">time - ngay bay</li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4 text-center">
                                        <ul class="list-unstyled">
                                            <li>Chuyến bay: </li>
                                            <li><i class="material-icons">flight_takeoff</i></li>
                                            <li>thời gian bay: </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-2 text-left">
                                        <ul class="list-unstyled">
                                            <li class="text-capitalize">Điểm đến</li>
                                            <li>sân bay</li>
                                            <li class="time-date">time - ngay tới</li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-2">
                                        <ul class="list-unstyled">
                                            <li>hạng chỗ: </li>
                                            <li>Máy bay: </li>
                                            <li>Hành lý xách tay: </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="list-inline tittle-choose">
                    <li>Chuyến về:</li>
                    <li>
                        <ul class="list-inline">
                            <li>Điểm đến - Sân bay</li>
                            <li><span class="glyphicon glyphicon-transfer"></span></li>
                            <li>Điểm đi - Sân bay</li>
                        </ul>
                    </li>
                    <li class="text-right">
                        <label>Thời gian bay: </label>
                    </li>
                </ul>
                <div class="returnFlight-info-choose">
                    <div class="flight-choose">
                        <div id="flightReturnDetail-choose">
                            <div class="detail-choose">
                                <div class="row">
                                    <div class="col-sm-1"><img src="https://ibev2.maybay.net/Statics/Images/Airline/vj.gif" alt="name" ></div>
                                    <div class="col-sm-2 text-right">
                                        <ul class="list-unstyled">
                                            <li class="text-capitalize">Điểm đi</li>
                                            <li>sân bay</li>
                                            <li class="time-date">time - ngay bay</li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4 text-center">
                                        <ul class="list-unstyled">
                                            <li>Chuyến bay: </li>
                                            <li><i class="material-icons">flight_takeoff</i></li>
                                            <li>thời gian bay: </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-2 text-left">
                                        <ul class="list-unstyled">
                                            <li class="text-capitalize">Điểm đến</li>
                                            <li>sân bay</li>
                                            <li class="time-date">time - ngay tới</li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-2">
                                        <ul class="list-unstyled">
                                            <li>hạng chỗ: </li>
                                            <li>Máy bay: </li>
                                            <li>Hành lý xách tay: </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flight-detail-info-choose">
                    <div class="table-responsive js-content-cart">
                        <table class="table table-bordered table-hover table-secondary">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Chuyến bay</th>
                                <th>Loại vé</th>
                                <th>Giá vé</th>
                                <th>Số lượng</th>
                                <th>Tổng tiền</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($carts as $item)
                                <?php
                                $flight = \App\Flight::findFlight($item->attributes->flight_id);
                                ?>
                                <tr>
                                    <td>#</td>
                                    <td>{{ $flight->name }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ format_currency($item->price) }} VNĐ</td>
                                    <td>{{ $item->quantity }}   </td>
                                    <td>{{ format_currency($item->quantity*$item->price) }} VNĐ</td>
                                </tr>
                            @endforeach
                            </tbody>
                            @if(!Cart::isEmpty())
                            @else
                                <tfoot>
                                <tr>
                                    <td class="text-center" colspan="99">Không có vé</td>
                                </tr>
                                </tfoot>
                            @endif
                        </table>
                    </div>
                </div>
                @if(!Cart::isEmpty())
                    <div class="sum">
                        <label>Tổng giá vé: </label>
                        <label class="text-right">{{ format_currency(Cart::getTotal()) }} <span class="unit text-uppercase">VND</span></label>
                    </div>
                @else
                    <div class="sum">
                        <label>Empty: </label>
                    </div>
                @endif

            </div>
            {{--contact-info--}}
            <div class="content-info flight-choose">
                <label class="h4 text-uppercase txtTittle"><span class="glyphicon glyphicon-earphone"></span> Thông tin liên hệ</label>
                <form action="{{ route('web.postPayment') }}" method="post">
                    {{ csrf_field() }}
                <div class="contact-info">
                    <div class="row row-last">
                        <div class="col-sm-6">
                            <h5>Danh xưng</h5>
                            <div class="input-group selects">
                                <select name="reservation_gender" class="form-control">
                                    <option value="gentlement" selected>Quý ông</option>
                                    <option value="lady">Quý bà</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <h5>Họ và tên</h5>
                                <div class="input-group {{ form_error_class('name', $errors) }}">
                                    <?= Form::text('name',null,['class'=>'form-control']); ?>
                                    {!! form_error_message('name', $errors) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row row-last">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <h5>Số điện thoại</h5>
                                <div class="input-group {{ form_error_class('phone', $errors) }}">
                                    <?= Form::text('phone',null,['class'=>'form-control']); ?>
                                    {!! form_error_message('phone', $errors) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <h5>Email</h5>
                                <div class="input-group {{ form_error_class('email', $errors) }}">
                                    <?= Form::text('email',null,['class'=>'form-control']); ?>
                                    {!! form_error_message('email', $errors) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-last">
                        <h5>Yêu cầu </h5>
                        <div class="input-group">
                            <div class="input-group {{ form_error_class('requirement', $errors) }}">
                                <?= Form::textarea('requirement',null,['class'=>'form-control']); ?>
                                {!! form_error_message('requirement', $errors) !!}
                            </div>
                        </div>
                    </div>

                    <div class="row-last" style="margin: 1em 0">
                        <button class="btn btn-sm btn-primary" type="submit">Đặt vé</button>
                    </div>
                </div>
                </form>
            </div>
            {{--Terms of payments--}}
            <div class="content-info flight-choose">
                <label class="h4 text-uppercase txtTittle">
                    <i class="material-icons">payment</i>
                    <span>Phương thức thanh toán</span>
                </label>
                <div class="pd-li-customer">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#banks">Chuyển khoản qua ngân hàng</a></li>
                        <li><a data-toggle="tab" href="#direct">Thanh toán trực tiếp tại văn phòng</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="banks" class="tab-pane fade in active">
                            <ul class="nav nav-tabs nav-tabs-banks">
                                <li class="active">
                                    <a class="tab-banks" role="button" data-toggle="tab" href="#vietcom">
                                        <img src="https://ibev2.maybay.net/statics/images/bank-logos/vcb.png">
                                    </a>
                                    <span class="glyphicon glyphicon-chevron-up icon-chevron-up"></span>
                                </li>
                                <li>
                                    <a class="tab-banks" role="button" data-toggle="tab" href="#agri">
                                        <img src="https://ibev2.maybay.net/statics/images/bank-logos/vbarb.png">
                                    </a>
                                    <span class="glyphicon glyphicon-chevron-up icon-chevron-up"></span>
                                </li>
                            </ul>
                            <div class="tab-content tab-content-banks">
                                <div id="vietcom" class="tab-pane fade in active">
                                    <ul class="list-unstyled">
                                        <li class="h3">Ngân hàng Vietcombank</li>
                                        <li>Tên tài khoản:</li>
                                        <li>Số tài khoản:</li>
                                        <li>Chi nhánh</li>
                                    </ul>
                                </div>
                                <div id="agri" class="tab-pane fade">
                                    <ul class="list-unstyled">
                                        <li class="h3">Ngân hàng Agribank</li>
                                        <li>Tên tài khoản:</li>
                                        <li>Số tài khoản:</li>
                                        <li>Chi nhánh</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div id="direct" class="tab-pane fade">
                            <ul class="ul-info-contact list-unstyled">
                                <li class="h3">Địa chỉ văn phòng</li>
                                <li>Địa chỉ:</li>
                                <li>Số điện thoại:</li>
                                <li>Email:</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
