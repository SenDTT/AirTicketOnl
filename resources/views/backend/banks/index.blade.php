@extends('voyager::master')


@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_header')
    <h1 class="page-title">
        <a href="{{ URL::route('banks.create')  }}" class="btn btn-sm btn-primary"> Create</a>
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
                        <td>Name</td>
                        <td>Account Number</td>
                        <td>Account Name</td>
                        <td>Branch</td>
                        <td>Logo</td>
                        <td>Actions</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($banks as $bank)
                        <tr>
                            <td>{{ $bank->id }}</td>
                            <td>{{ $bank->bank_name }}</td>
                            <td>{{ $bank->account_number }}</td>
                            <td>{{ $bank->account_name }}</td>
                            <td>{{ $bank->branch }}</td>
                            <td>
                                <img style="max-width: 100px" src="{{ $bank->bank_img }}" alt="">
                            </td>
                            <td>
                                {{ Form::open(array('url' => URL::route('banks.destroy',$bank->id), 'class' => '')) }}
                                {{ Form::hidden('_method', 'DELETE') }}
                                <a  class="btn btn-sm btn-primary" href="{{ URL::route('banks.edit',$bank->id) }}">
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
