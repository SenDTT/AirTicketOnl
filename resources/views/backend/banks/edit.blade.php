@extends('voyager::master')


@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_header')
    <h1 class="page-title">
       Edit banks
    </h1>
@stop

@section('content')
    <div class="page-content container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">
                @include('include.errors')
                <form action="{{ URL::route('banks.update',$banks->id) }}" method="post">
                    <input type="hidden" name="_method" value="put">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="code">Name</label>
                        <input type="text" value="{{ $banks->bank_name }}" name="bank_name" class="form-control" id="code" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Account number</label>
                        <input type="text" value="{{ $banks->account_number }}" name="account_number" class="form-control" id="exampleInputPassword1" placeholder="Account number">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Account number</label>
                        <input type="text" name="account_name" value="{{ $banks->account_name }}" class="form-control" id="exampleInputPassword1" placeholder="Account name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Branch</label>
                        <input type="text" name="branch" value="{{ $banks->branch }}" class="form-control" id="exampleInputPassword1" placeholder="Branch">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Link Image</label>
                        <input type="text" name="bank_img" value="{{ $banks->bank_img }}" class="form-control" id="exampleInputPassword1" placeholder="Link Image">
                    </div>

                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
        </div>
    </div>
@stop

@section('javascript')

@stop
