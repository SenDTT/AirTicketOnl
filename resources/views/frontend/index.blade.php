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
                <a href="{{route('web.index')}}" class="h3 navbar-brand">Vé máy bay trực tuyến</a>
            </div>
            <div class="collapse navbar-collapse text-uppercase" id="navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-active"><a href="{{route('web.index')}}" class=" nav-hover">Đặt vé</a></li>
                    <li><a href="#" class=" nav-hover">Giới thiệu</a></li>
                    <li><a href="#" class=" nav-hover">Sổ tay du lịch</a></li>
                    <li><a href="#" class=" nav-hover">Liên hệ</a></li>
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
    {{--find-flights--}}
    <div class="container find-flight">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#flights">Tìm chuyến bay</a></li>
        </ul>

        <div class="tab-content">
            <div id="flights" class="tab-pane fade in active">
                <form action="{{ route('web.search') }}" method="post">
                    {{ csrf_field() }}
                    <div class="row form-group">
                        {{--From ...city To ... city--}}
                        <div class="col-sm-3">
                            <h5><label for="from">Điểm đi</label></h5>
                            <select  name="from" id="from" class="form-control list-unstyled">
                                @foreach($locations as $location)
                                    <option class="li-locations" value="{{ $location->id }}">{{$location->location_name}}({{$location->location_code}})</option>
                                @endforeach
                            </select>
                            @if($errors->has('from'))
                                <label class="text-danger">{!! $errors->first('from') !!}</label>
                            @endif

                            <h5><label for="to"></label></h5>
                            <select name="to" id="to" class="form-control list-unstyled" >
                                @foreach($locations as $location)
                                    <option class="li-locations" value="{{ $location->id }}">{{$location->location_name}}({{$location->location_code}})</option>
                                @endforeach
                            </select>
                            @if($errors->has('to'))
                                <label class="text-danger">{!! $errors->first('to') !!}</label>
                            @endif
                        </div>
                        {{--Date and returnDate--}}
                        <div class="col-sm-3">
                            <h5><label for="toDate">Ngày đi</label></h5>
                            <div class="input-group">
                                <span class="input-group-addon" id="add-on-date">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                                <input type="date" class="form-control" id="toDate" name="toDate" aria-describedby="add-on-date" required/>
                            </div>
                            @if($errors->has('toDate'))
                                <label class="text-danger">{!! $errors->first('toDate') !!}</label>
                            @endif
                            <h5>
                                <input type="checkbox" id="checkbox" onclick="myFunc()" name="cbReturnDate">
                                <label for="checkbox">Ngày về</label>
                            </h5>
                            <div id="idReturnDate">
                                <div class="input-group">
                                <span class="input-group-addon" id="add-on-return-date">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                                    <input type="date" class="form-control" id="toReturnDate" name="returnDate"
                                           aria-describedby="add-on-return-date" required/>
                                </div>
                            </div>
                            @if($errors->has('returnDate'))
                                <label class="text-danger">{!! $errors->first('returnDate') !!}</label>
                            @endif
                        </div>
                        {{----}}
                        <div class="col-sm-3">
                            <h5>Người lớn</h5>
                            <div class="input-group selects">
                                <select name="adult" class="form-control">
                                    <option value="1" selected>1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                </select>
                            </div>
                            <h5>Trẻ em</h5>
                            <div class="input-group selects">
                                <select name="child" class="form-control">
                                    <option value="0" selected>0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                </select>
                            </div>
                        </div>
                        {{----}}
                        <div class="col-sm-3">
                            <h5>Em bé(< 2 tuổi)</h5>
                            <div class="input-group selects">
                                <select name="baby" class="form-control">
                                    <option value="0" selected>0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                </select>
                            </div>
                            <h5 class="hide-h5">button find flight</h5>
                            <div class="text-right" >
                                <input type="submit" class="btn btn-info" name="btnFindFlights" value="Tìm chuyến bay">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{----}}
    <div class="row info-website text-center">
        <div class="col-sm-3">
            <img class="img img-circle" src="images/Search-icon.png">
            <div class="caption">
                <h4 class="text-capitalize">Tìm kiếm dễ dàng</h4>
                <h6 class="small">Dễ dàng tìm kiếm chuyến bay của bạn.</h6>
            </div>
        </div>
        <div class="col-sm-3">
            <img class="img img-circle" src="images/24-71.png">
            <div class="caption">
                <p><h4 class="text-capitalize">Tìm kiếm dễ dàng</h4>
                <h6 class="small">Dễ dàng tìm kiếm chuyến bay của bạn.</h6>
                </p>
            </div>
        </div>
        <div class="col-sm-3">
            <img class="img img-circle" src="images/dulich.jpg">
            <div class="caption">
                <p><h4 class="text-capitalize">Tìm kiếm dễ dàng</h4>
                <h6 class="small">Dễ dàng tìm kiếm chuyến bay của bạn.</h6>
                </p>
            </div>
        </div>
        <div class="col-sm-3">
            <img class="img img-circle" src="images/eat.jpg">
            <div class="caption">
                <h4 class="text-capitalize">Tìm kiếm dễ dàng</h4>
                <h6 class="small">Dễ dàng tìm kiếm chuyến bay của bạn.</h6>
                </p>
            </div>
        </div>
    </div>
    {{--Famous Places--}}
    <div class="fm-places">
        <label class="h2 h2-tittle">Điểm đến nổi tiếng</label><br>
        <a href="#" class="small">Xem thêm</a>
        <div class="row list-inline" id="famous-places">
            <div class="col-sm-3">
                <a href="#" ><img class="img-places img-thumbnail" src="images/pl-hoi-an.jpg" alt="img-1"></a>
                <a href="#" class="text-uppercase h4">Place Name</a>
                <p class="content-detail small">Mô tả</p>
                <div  class="text-right small" ><a href="#">Đọc thêm</a></div>
            </div>
            <div class="col-sm-3">
                <a href="#" ><img class="img-places img-thumbnail" src="images/pl-nha-trang.jpg" alt="img-1"></a>
                <a href="#" class="text-uppercase h4">Place Name</a>
                <p class="content-detail small">Mô tả</p>
                <div  class="text-right small" ><a href="#">Đọc thêm</a></div>
            </div>
            <div class="col-sm-3">
                <a href="#" ><img class="img-places img-thumbnail" src="images/pl-phan-thiet.jpg" alt="img-1"></a>
                <a href="#" class="text-uppercase h4">Place Name</a>
                <p class="content-detail small">Mô tả</p>
                <div  class="text-right small" ><a href="#">Đọc thêm</a></div>
            </div>
            <div class="col-sm-3">
                <a href="#" ><img class="img-places img-thumbnail" src="images/pl-sa-pa.jpg" alt="img-1"></a>
                <a href="#" class="text-uppercase h4">Place Name</a>
                <p class="content-detail small">Mô tả</p>
                <div  class="text-right small" ><a href="#">Đọc thêm</a></div>
            </div>
        </div>
    </div>
    {{--Famous Dishes--}}
    <div class="fm-dishes">
        <label class="h2 h2-tittle">Món ngon</label><br>
        <a href="#" class="small">Xem thêm</a>
        <div class="list-inline" id="famous-dishes">
            <div class="row">
                <div class="col-sm-6 row">
                    <div class="col-sm-6">
                        <a href="#" ><img class="img-places img-thumbnail" src="images/dish.jpg" alt="img-1"></a>
                    </div>
                    <div class="col-sm-6">
                        <a href="#" class="text-uppercase h4">Dish Name</a>
                        <p class="content-detail small">Mô tả</p>
                        <a class="small" href="#">Đọc thêm</a>
                    </div>
                </div>
                <div class="col-sm-6 row">
                    <div class="col-sm-6">
                        <a href="#" ><img class="img-places img-thumbnail" src="images/dish-banh-mi.jpg" alt="img-1"></a>
                    </div>
                    <div class="col-sm-6">
                        <a href="#" class="text-uppercase h4">Dish Name</a>
                        <p class="content-detail small">Mô tả</p>
                        <a class="small" href="#">Đọc thêm</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 row">
                    <div class="col-sm-6">
                        <a href="#" ><img class="img-places img-thumbnail" src="images/dish-pho.jpg" alt="img-1"></a>
                    </div>
                    <div class="col-sm-6">
                        <a href="#" class="text-uppercase h4">Dish Name</a>
                        <p class="content-detail small">Mô tả</p>
                        <a class="small" href="#">Đọc thêm</a>
                    </div>
                </div>
                <div class="col-sm-6 row">
                    <div class="col-sm-6">
                        <a href="#" ><img class="img-places img-thumbnail" src="images/dish-xoi.jpg" alt="img-1"></a>
                    </div>
                    <div class="col-sm-6">
                        <a href="#" class="text-uppercase h4">Dish Name</a>
                        <p class="content-detail small">Mô tả</p>
                        <a class="small" href="#">Đọc thêm</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
