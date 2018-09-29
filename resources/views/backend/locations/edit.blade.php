@extends('voyager::master')


@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_header')
    <h1 class="page-title">
       Edit locations
    </h1>
@stop

@section('content')
    <div class="page-content container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">
                @include('include.errors')
                <form action="{{ URL::route('locations.update',$locations->id) }}" method="post">
                    <input type="hidden" name="_method" value="put">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="code">Locations code</label>
                        <input type="text" value="{{ $locations->location_code }}" name="location_code" class="form-control" id="code" placeholder="Location code">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Location name</label>
                        <input type="text" value="{{ $locations->location_name }}" name="location_name" class="form-control" id="exampleInputPassword1" placeholder="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Description</label>
                        <input type="text" name="description" value="{{ $locations->description }}" class="form-control" id="exampleInputPassword1" placeholder="description">
                    </div>

                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
        </div>
    </div>
@stop

@section('javascript')

@stop
