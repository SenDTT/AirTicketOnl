@extends('voyager::master')


@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_header')
    <h1 class="page-title">
        <i class="icon voyager-logbook"></i>
        {{ __('voyager::generic.add').' ' }}
    </h1>
@stop

@section('content')
    <div class="page-content container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">
                @include('include.errors')
                <form action="{{ URL::route('tickets.update',$airplanes->id) }}" method="post">
                    <input type="hidden" name="_method" value="put">
                    {{ csrf_field() }}
                    <div class="panel-body">
                        <div class="form-group col-md-12 {{ form_error_class('reservation_id', $errors) }}">
                            <label for="position">Reservation Code</label>
                            <?= Form::select('reservation_id',$reservations,$tickets->reservation_id,['class'=>'form-control select2']); ?>
                            <p class="block-helper text-primary">Mã đặt vé</p>
                            {!! form_error_message('reservation_id', $errors) !!}
                        </div>
                        <div class="form-group col-md-12 {{ form_error_class('flight_id', $errors) }}">
                            <label for="position">Flight</label>
                            <?= Form::select('flight_id',$flights,$tickets->flight_id,['class'=>'form-control select2']); ?>
                            <p class="block-helper text-primary">Chuyến bay</p>
                            {!! form_error_message('flight_id', $errors) !!}
                        </div>
                        <div class="form-group col-md-12 {{ form_error_class('status', $errors) }}">
                            <label for="name">Status</label>
                            <?= Form::text('status',$tickets->status,['class'=>'form-control']); ?>
                            <p class="block-helper text-primary">tình trạng</p>
                            {!! form_error_message('status', $errors) !!}
                        </div>
                    </div><!-- panel-body -->

                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        var params = {};
        var $image;

        $('document').ready(function () {
            $('.toggleswitch').bootstrapToggle();

            //Init datepicker for date fields if data-datepicker attribute defined
            //or if browser does not handle date inputs
            $('.form-group input[type=date]').each(function (idx, elt) {
                if (elt.type != 'date' || elt.hasAttribute('data-datepicker')) {
                    elt.type = 'text';
                    $(elt).datetimepicker($(elt).data('datepicker'));
                }
            });

            $('.side-body').multilingual({"editing": true});

            $('.side-body input[data-slug-origin]').each(function(i, el) {
                $(el).slugify();
            });

            $('.form-group').on('click', '.remove-multi-image', function (e) {
                e.preventDefault();
                $image = $(this).siblings('img');

                params = {
                    slug:   'create',
                    image:  $image.data('image'),
                    id:     $image.data('id'),
                    field:  $image.parent().data('field-name'),
                    _token: '{{ csrf_token() }}'
                };

                $('.confirm_delete_name').text($image.data('image'));
                $('#confirm_delete_modal').modal('show');
            });

            $('#confirm_delete').on('click', function(){
                $.post('{{ route('voyager.media.remove') }}', params, function (response) {
                    if ( response
                        && response.data
                        && response.data.status
                        && response.data.status == 200 ) {

                        toastr.success(response.data.message);
                        $image.parent().fadeOut(300, function() { $(this).remove(); })
                    } else {
                        toastr.error("Error removing image.");
                    }
                });

                $('#confirm_delete_modal').modal('hide');
            });
            $('[data-toggle="tooltip"]').tooltip();

        });
    </script>
@stop
