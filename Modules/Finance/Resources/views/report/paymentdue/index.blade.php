@extends('finance::layouts.master')
@section('mainContent')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{ __('finance.Payment Due') }}</h1>
        </div>
        <div class="col-sm-6">

       </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <form method="GET" action="{{ route('report.paymentdue') }}" id="content_form">
                                <input type="hidden" id="start">
                                    <input type="hidden" id="end">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="far fa-calendar-alt"></i>
                                            </span>
                                            </div>
                                            {{ Form::text('date_range', null, ['class' => 'form-control float-right', 'required', 'placeholder' => __('common.select_criteria'),  'data-parsley-errors-container' => '#date_range_error', 'id' => 'date_range', 'readonly']) }}
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <button type="submit" class="btn btn-primary submit">
                                            <i class="fa fa-search pr-2"></i> {{ __('common.Search') }}
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div class="card-body" id="report_data">
                                    @includeIf('finance::report.paymentdue.data')

                        </div>
                    </div>
                </div>

            </div>


        </div>
    </section>
@endsection
@push('js_after')
    <script>
        $('input[name="date_range"]').daterangepicker({
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            "startDate": moment().subtract(7, 'days'),
            "endDate": moment()
        }, function (start, end, label) {
            $('#start').val(start.format('YYYY-MM-DD'))
            $('#end').val(end.format('YYYY-MM-DD'))
            get_filter_data({
                start: start.format('YYYY-MM-DD'),
                end: end.format('YYYY-MM-DD')
            });
        });
        $(document).ready(function(){
            $('#start').val(moment().subtract(7, 'days').format('YYYY-MM-DD'))
            $('#end').val(moment().format('YYYY-MM-DD'))
        });

        $(document).on('submit', '#content_form', function(e){
            e.preventDefault();
            get_filter_data({
                start: $('#start').val(),
                end: $('#end').val()
            })
        })

        function get_filter_data(data) {
            var form = $('#content_form');
            showFormSubmitting(form);
            const submit_url = form.attr('action');
            const method = form.attr('method');
            $.ajax({
                url: submit_url,
                type: method,
                data: data,
                dataType: 'html',
                success: function (data) {
                    $('#report_data').html(data);
                    startDataTable();
                    hideFormSubmitting(form);
                },
                error: function (data) {
                    ajax_error(data);
                    hideFormSubmitting(form);
                }

            })
        }
    </script>

@endpush
