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
                <form action="{{ route('airplaneModel.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group col-md-12 {{ form_error_class('model_code', $errors) }}">
                        <label for="code">Airplane Model Code</label>
                        <?= Form::text('model_code',null,['class'=>'form-control','placeholder'=>'Airplane Model Code']); ?>
                        <p class="block-helper text-primary">Tên máy bay</p>
                        {!! form_error_message('model_code', $errors) !!}
                    </div>
                    <div class="form-group col-md-12 {{ form_error_class('airplane_id', $errors) }}">
                        <label for="position">Airplane</label>
                        <?= Form::select('airplane_id',$airplanes,null,['class'=>'form-control select2']); ?>
                        <p class="block-helper text-primary">Loại máy bay</p>
                        {!! form_error_message('airplane_id', $errors) !!}
                    </div>

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

            // ajax get content
            function getContent(type) {
                $.ajaxSetup({
                    headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')}
                });
                $.ajax({
                    type: 'POST',
                    url: '/admin/widgets/get-content',
                    data: {'type': type},
                    success: function (data) {
                        $('.js-content').html(data.content);
                        InitTinyMce();
                    },
                    error: function (error) {}
                });
            }

            getContent($('#type').val());

            $('.js-get-content').change(function (e) {
                getContent($('#type').val());
            });

        });
    </script>
@stop
