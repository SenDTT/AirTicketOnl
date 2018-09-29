@extends('voyager::master')


@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_header')
    <h1 class="page-title">
        <a href="{{ URL::route('locations.create')  }}" class="btn btn-sm btn-primary"> Create</a>
    </h1>
@stop

@section('content')
    <div class="page-content container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Code</td>
                            <td>Name</td>
                            <td>Description</td>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($locations as $location)
                    <tr>
                        <td>{{ $location->id }}</td>
                        <td>{{ $location->location_code }}</td>
                        <td>{{ $location->location_name }}</td>
                        <td>{{ $location->description }}</td>
                        <td>
                            {{ Form::open(array('url' => URL::route('locations.destroy',$location->id), 'class' => '')) }}
                            {{ Form::hidden('_method', 'DELETE') }}
                            <a  class="btn btn-sm btn-primary" href="{{ URL::route('locations.edit',$location->id) }}">
                                Edit
                            </a>
                            {{ Form::submit('Delete ', array('class' => 'btn btn-warning')) }}
                            {{ Form::close() }}
                        </td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('javascript')

@stop
