@extends('voyager::master')

@section('page_title', __('voyager::generic.viewing').' Widgets')

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title"><i class="icon voyager-logbook"></i> Reservation Details </h1>
    </div>
    @stop

        @section('content')
            <div class="page-content browse container-fluid">
                @include('voyager::alerts')
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-bordered">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <div id="dataTable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table id="dataTable" class="table table-hover dataTable no-footer"
                                                       role="grid" aria-describedby="dataTable_info">
                                                    <thead>
                                                    <tr>
                                                        <th>#ID</th>
                                                        <th>Reservation_code</th>
                                                        <th>ticket_type_price_id</th>
                                                        <th>Quantity</th>
                                                        <th>Total</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($reservationDetails  as $key => $reservationDetail)
                                                        <tr role="row">
                                                        <td>#{{ $reservationDetail->id }}</td>
                                                        <td>{{ $reservationDetail->reservation_id }}</td>
                                                        <td>{{ $reservationDetail->ticket_type_price_id }}</td>
                                                        <td>{{ $reservationDetail->quantity }}</td>
                                                        <td>{{ $reservationDetail->total }}</td>
                                                    </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @stop

    @section('css')

    @stop

    @section('javascript')

    @stop
