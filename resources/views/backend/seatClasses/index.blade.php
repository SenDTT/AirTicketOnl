@extends('voyager::master')


@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_header')
    <h1 class="page-title">
        <a href="{{ URL::route('seatClasses.create')  }}" class="btn btn-sm btn-primary"> Create</a>
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
                        <td>Seat Name</td>
                        <td>Actions</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($airplanes as $airplane)
                        <tr>
                            <td>{{ $airplane->id }}</td>
                            <td>{{ $airplane->airplane_code }}</td>
                            <td>{{ $airplane->airplane_name }}</td>
                            <td>
                                {{ Form::open(array('url' => URL::route('seatClasses.destroy',$seatClass->id), 'class' => '')) }}
                                {{ Form::hidden('_method', 'DELETE') }}
                                <a  class="btn btn-sm btn-primary" href="{{ URL::route('seatClasses.edit',$seatClass->id) }}">
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
