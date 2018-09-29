@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', __('voyager::generic.add'))

@section('page_header')
    <h1 class="page-title">
        <i class="icon voyager-logbook"></i>
        {{ __('voyager::generic.add').' ' }}
    </h1>
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-bordered">
                    <!-- form start -->
                        <?= Form::open([
                            'url' => URL::route('airlines.update',$airline->id),
                            'method' =>'put',
                            'class'=>'form-add'
                        ])?>

                        <div class="panel-body">
                            <div class="form-group col-md-12 {{ form_error_class('airline_code', $errors) }}">
                                <label for="name">airline code</label>
                                <?= Form::text('airline_code',$airline->airline_code,['class'=>'form-control']); ?>
                                <p class="block-helper text-primary">airline_code</p>
                                {!! form_error_message('airline_code', $errors) !!}
                            </div>
                            <div class="form-group  col-md-12">
                                <label for="title">airline_name</label>
                                <?= Form::text('airline_name',$airline->airline_name,['class'=>'form-control','placeholder'=>'airline_name']); ?>
                                <p class="block-helper text-primary">airline_name</p>
                                {!! form_error_message('airline_name', $errors) !!}
                            </div>
                            <div class="form-group  col-md-12">
                                <label for="title">airline_img</label>
                                <?= Form::text('airline_img',$airline->airline_img,['class'=>'form-control','placeholder'=>'airline_img']); ?>
                                <p class="block-helper text-primary">airline_img</p>
                                {!! form_error_message('airline_img', $errors) !!}
                            </div>
                        </div><!-- panel-body -->

                        <div class="panel-footer" style="padding: 15px 30px">
                            <button type="submit" class="btn btn-primary save">{{ __('voyager::generic.save') }}</button>
                        </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-danger" id="confirm_delete_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="voyager-warning"></i> {{ __('voyager::generic.are_you_sure') }}</h4>
                </div>

                <div class="modal-body">
                    <h4>{{ __('voyager::generic.are_you_sure_delete') }} '<span class="confirm_delete_name"></span>'</h4>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                    <button type="button" class="btn btn-danger" id="confirm_delete">{{ __('voyager::generic.delete_confirm') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete File Modal -->
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
