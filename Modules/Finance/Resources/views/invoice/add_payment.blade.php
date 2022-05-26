<div class="modal-dialog  modal-dialog-centered modal-lg">
    <div class="modal-content">


        <div class="modal-header">
            <h4 class="modal-title">{{ __('finance.Add Payment') }}</h4>
            <button type="button" class="close " data-dismiss="modal">
                <i class="ti-close "></i>
            </button>
        </div>

        <div class="modal-body">
            <div class="row">
                <div class="col-12">
                    {!! Form::open(['route' => ['invoice.payment.add', $model->id], 'class' => 'form-validate-jquery', 'id' => 'payment_add', 'files' => false, 'method' => 'POST']) !!}
                    <div class="row">
                        <div class="primary_input col-md-6">
                            {{Form::label('transaction_date', __('finance.Payment Date'), ['class' => 'required'])}}
                            <div class="input-group date" id="reservation_transaction_date" data-target-input="nearest">
                                {{Form::text('transaction_date', date('Y-m-d'), ['required' => '','class' => 'form-control datetimepicker-input date','autocomplete'=>'off','data-target'=> '#reservation_transaction_date','placeholder' => __('finance.Payment Date')])}}
                                <div class="input-group-append" data-target="#reservation_transaction_date" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>


                            
                        </div>
                        <div class="primary_input col-md-6" id="method_column" data-old_class="col-md-6" data-new_class="col-md-6">
                            {{Form::label('payment_method', __('finance.Payment Method'))}}
                            {{Form::select('payment_method', $payment_methods,  null, ['class' => 'form-control select2bs4', 'data-parsley-errors-container' => '#payment_method_error', 'id' => 'payment_method'])}}
                            <span id="payment_method_error"></span>
                        </div>

                        <div class="primary_input col-md-12" id="bank_column" style="display: none;">
                            {{Form::label('bank_account_id', __('finance.Bank Account'))}}
                            {{Form::select('bank_account_id', $bank_accounts,  null, ['class' => 'form-control select2bs4', 'data-parsley-errors-container' => '#bank_account_id_error'])}}
                            <span id="bank_account_id_error"></span>
                        </div>
                        <div class="primary_input col-md-12">
                            <label class="font_13 theme_text f_w_500 mb-0"
                                   for="paid">{{__('finance.Paid Amount')}}</label>
                            <input type="text" value="{{ $model->due }}" id="paid" max="{{ $model->due }}" min="1" required autofocus
                                   class="form-control paid input_number" placeholder="{{__('finance.Paid Amount')}}"
                                   name="paid">
                        </div>

                        <div class="primary_input col-md-12">
                            <label class="font_13 theme_text f_w_500 mb-0"
                                   for="due">{{__('finance.Due Amount')}}</label>
                            <input type="text" value="0" id="due" readonly
                                   class="form-control paid input_number" placeholder="{{__('finance.Due Amount')}}"
                                   name="due">
                        </div>

                        <div class="col-md-12 text-center mt-3">
                            <button type="submit" class="btn btn-primary submit" id="submit"
                                    value="submit"> {{ __('common.Create') }} </button>

                            <button type="button" class="btn btn-primary submitting" id="submit"
                                    disabled style="display: none;"> {{ __ ('common.Creating') }}...
                            </button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    _formValidation('#payment_add', true, 'payment_modal');


</script>
