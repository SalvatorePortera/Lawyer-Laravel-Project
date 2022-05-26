@extends('finance::layouts.master', ['title' => __('finance.Create New Expense')])

@section('mainContent')

    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid pt-3">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="box_header">
                        <div class="main-title d-flex justify-content-between ">
                            <h3 class="mb-0 mr-30">{{ __('finance.Add Expense') }}</h3>
                            <ul class="d-flex">
                                @if(permissionCheck('expenses.index'))
                                    <li><a class="btn btn-primary mr-10" href="{{ route('expenses.index') }}"><i class="ti-list"></i> {{ __
                        ('finance.Expense List') }}</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="white_box_50px box_shadow_white">
                        {!! Form::open(['route' => 'expenses.store', 'class' => 'form-validate-jquery', 'id' => 'content_form', 'files' => false, 'method' => 'POST']) !!}
                        @includeIf('finance::expense.components.form')
                        <div class="text-center mt-3">
                            <button class="btn btn-primary submit" type="submit"><i
                                    class="ti-check"></i>{{ __('common.Create') }}
                            </button>

                            <button class="btn btn-primary submitting" type="submit" disabled style="display: none;">
                                <i class="ti-check"></i>{{ __('common.Creating') . '...' }}
                            </button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade animated service_type_add infix_biz_modal" id="remote_modal" tabindex="-1" role="dialog"
         aria-labelledby="remote_modal_label" aria-hidden="true" data-backdrop="static">
    </div>


@stop
@push('admin.scripts')

    <script>
        $(document).ready(function () {
            _formValidation();
            bankOrCash($('#payment_method').val());
            
            $("input.expensefor_group_option").click(function(e){
               if($(e.target).is(':checked') && $(e.target).prop('id')=='option_general'){
                    $('#row_general').removeClass('d-none');
                    $('#row_case').addClass('d-none');
                    $('#title').prop('required', true);
                    $('#clientable_id').prop('required', false);
                    $('#case_id').prop('required', false);
                    $('#expense_type').prop('required', false);
                }else{
                    $('#row_case').removeClass('d-none');
                    $('#row_general').addClass('d-none');

                    $('#title').prop('required', false);
                    $('#clientable_id').prop('required', true);
                    $('#case_id').prop('required', true);
                    $('#expense_type').prop('required', true);
                }
                
            });
            $(document).on('change', '#clientable_id', function(){
                let client_id = $(this).val();
                    $.ajax({
                        type: 'GET',
                        url: SET_DOMAIN + "/invoice/case",
                        data: {
                            client_id: client_id
                        },
                        dateType: 'json',
                        success: function (data) {
                            $("#case_column").html(data.html);
                            $('.select_case').niceSelect()
                        },
                        error: function(data){
                            ajax_error(data);
                        }
                    });
            });
        });
    </script>
@endpush
