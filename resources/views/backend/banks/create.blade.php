@extends('voyager::master')


@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_header')
    <h1 class="page-title">
       Create new bank
    </h1>
@stop

@section('content')
    <div class="page-content container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">
                @include('include.errors')
                <form action="{{ route('banks.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="code">Name</label>
                        <input type="text"  name="bank_name" class="form-control" id="code" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Account_number</label>
                        <input type="text"  name="account_number" class="form-control" id="exampleInputPassword1" placeholder="account_number">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Account_name</label>
                        <input type="text"  name="account_name" class="form-control" id="exampleInputPassword1" placeholder="account_number">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Branch</label>
                        <input type="text"  name="branch" class="form-control" id="exampleInputPassword1" placeholder="branch">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Link Image</label>
                        <input type="text"  name="bank_img" class="form-control" id="exampleInputPassword1" placeholder="link_img">
                    </div>

                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
        </div>
    </div>
@stop

@section('javascript')

@stop
