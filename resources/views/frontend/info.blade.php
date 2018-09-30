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
                    <table class="table-detail-choose">
                        <tr>
                            <th>Hành khách</th>
                            <th class="text-center">Số lượng</th>
                            <th class="text-right">Tổng giá vé</th>
                        </tr>
                        <tr>
                            <td>Người lớn</td>
                            <td class="text-center">1</td>
                            <td class="text-right">42423432 <span class=" text-uppercase">VND</span></td>
                        </tr>
                        <tr>
                            <td>Trẻ em</td>
                            <td class="text-center">1</td>
                            <td class="text-right">42423432 <span class="text-uppercase">VND</span></td>
                        </tr>
                        <tr>
                            <td>Em bé</td>
                            <td class="text-center">1</td>
                            <td class="text-right">42423432 <span class="text-uppercase">VND</span></td>
                        </tr>
                    </table>
                </div>
                <div class="sum">
                    <label>Tổng giá vé: </label>
                    <label class="text-right">'tổng' <span class="unit text-uppercase">VND</span></label>
                </div>
            </div>
            {{--customer-Info--}}
            <div class="content-info flight-choose">
                <label class="h4 text-uppercase txtTittle"><span class="glyphicon glyphicon-user"></span>Thông tin hành khách</label>
                <ol>
                    <li class="pd-li-customer">
                        <span>Người lớn</span>
                        <div class="row info-customer">
                            <div class="col-sm-2">
                                <h5>Danh xưng</h5>
                                <div class="input-group selects">
                                    <select class="form-control">
                                        <option value="gentlement" selected>Quý ông</option>
                                        <option value="lady">Quý bà</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <h5>Họ và tên đệm</h5>
                                <div class="input-group">
                                    <input type="text" class="form-control text-capitalize" id="lastName" name="txtLastName"/>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <h5>Tên</h5>
                                <div class="input-group">
                                    <input type="text" class="form-control text-capitalize" id="firstName" name="txtFirstName"/>
                                </div>
                            </div>
                        </div>
                        <div class="bags-order">
                            <h5 class="font-weight-bold">Hành lý ký gửi</h5>
                            <ul class="list-inline">
                                <li>Chuyến đi:</li>
                                <li class="bags"><input type="radio" name="radioFlight" id="rdDefault">Không, cảm ơn</li>
                                <li class="bags"><input type="radio" name="radioFlight" id="rdDefault1">Không, cảm ơn</li>
                                <li class="bags"><input type="radio" name="radioFlight" id="rdDefault">Không, cảm ơn</li>
                                <li class="bags"><input type="radio" name="radioFlight" id="rdDefault">Không, cảm ơn</li>
                                <li class="bags"><input type="radio" name="radioFlight" id="rdDefault">Không, cảm ơn</li>
                                <li class="bags"><input type="radio" name="radioFlight" id="rdDefault">Không, cảm ơn</li>
                                <li class="bags"><input type="radio" name="radioFlight" id="rdDefault">Không, cảm ơn</li>
                            </ul>
                            <ul class="list-inline">
                                <li>Chuyến về:</li>
                                <li class="bags"><input type="radio" name="radioReturnFlight" id="rdDefault">Không, cảm ơn</li>
                                <li class="bags"><input type="radio" name="radioReturnFlight" id="rdDefault">Không, cảm ơn</li>
                                <li class="bags"><input type="radio" name="radioReturnFlight" id="rdDefault">Không, cảm ơn</li>
                                <li class="bags"><input type="radio" name="radioReturnFlight" id="rdDefault">Không, cảm ơn</li>
                                <li class="bags"><input type="radio" name="radioReturnFlight" id="rdDefault">Không, cảm ơn</li>
                                <li class="bags"><input type="radio" name="radioReturnFlight" id="rdDefault">Không, cảm ơn</li>
                                <li class="bags"><input type="radio" name="radioReturnFlight" id="rdDefault">Không, cảm ơn</li>
                            </ul>
                        </div>
                    </li>
                </ol>
            </div>
            {{--contact-info--}}
            <div class="content-info flight-choose">
                <label class="h4 text-uppercase txtTittle"><span class="glyphicon glyphicon-earphone"></span> Thông tin liên hệ</label>
                <div class="contact-info">
                    <div class="row row-last">
                        <div class="col-sm-6">
                            <h5>Danh xưng</h5>
                            <div class="input-group selects">
                                <select class="form-control">
                                    <option value="gentlement" selected>Quý ông</option>
                                    <option value="lady">Quý bà</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <h5>Họ và tên</h5>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="nameContact" name="txtNameContact"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row row-last">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <h5>Số điện thoại</h5>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="phoneContact" name="txtPhoneContact"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <h5>Email</h5>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="emailContact" name="txtEmailContact"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-last">
                        <h5>Yêu cầu </h5>
                        <div class="input-group">
                            <textarea rows="3" id="txta" name="txta"></textarea>
                        </div>
                    </div>
                </div>
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
