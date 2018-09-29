@extends('voyager::master')


@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_header')
    <h1 class="page-title">
       Create new seat classes
    </h1>
@stop

@section('content')
    <div class="page-content container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">
                @include('include.errors')
                <form action="{{ route('seatClasses.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="code">Seat Class</label>
                        <input type="text"  name="seat_name" class="form-control" id="code" placeholder="Seat Name">
                    </div>

                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
        </div>
    </div>
@stop

@section('javascript')

@stop
