@extends('voyager::master')


@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_header')
    <h1 class="page-title">
       Create new Airplane
    </h1>
@stop

@section('content')
    <div class="page-content container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">
                @include('include.errors')
                <form action="{{ route('airplanes.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="code">Airplane Code</label>
                        <input type="text"  name="airplane_code" class="form-control" id="code" placeholder="Airplane Code">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Airplane Name</label>
                        <input type="text"  name="airplane_name" class="form-control" id="exampleInputPassword1" placeholder="Airplane Name">
                    </div>


                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
        </div>
    </div>
@stop

@section('javascript')

@stop
