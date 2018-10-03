@extends('voyager::master')

@section('page_title', __('voyager::generic.viewing').' Widgets')

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title"><i class="icon voyager-logbook"></i> Reservations </h1>
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
                                                        <th>Reservation_gender</th>
                                                        <th>Name</th>
                                                        <th>Phone</th>
                                                        <th>Email</th>
                                                        <th>Requirement</th>
                                                        <th>Status</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($reservations  as $key => $reservation)
                                                        <tr role="row">
                                                        <td>#{{ $reservation->id }}</td>
                                                        <td>{{ $reservation->reservation_code }}</td>
                                                        <td>{{ $reservation->reservation_gender }}</td>
                                                        <td>{{ $reservation->name }}</td>
                                                        <td>{{ $reservation->phone }}</td>
                                                        <td>{{ $reservation->email }}</td>
                                                        <td>{{ $reservation->requirement }}</td>
                                                        <td>{{ $reservation->status }}</td>
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
