<div class="row">
    <div class="primary_input col-md-12">
        <div id="expensefor" class="btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn primary-btn fix-gr-bg active">
                <input type="radio" name="expensefor" id="option_general" value="General" class="expensefor_group_option" autocomplete="off" @if(isset($model) && $model->client)
                @else
                    checked
                @endif > General Expense
            </label>
            <label class="btn primary-btn fix-gr-bg">
            <input type="radio" name="expensefor" id="option_case" value="Case" class="expensefor_group_option" autocomplete="off" @if(isset($model) && $model->client)
                    checked
                @else
                    
                @endif> Case / Service related
            </label>
        </div>
    </div>
</div>
<div id="row_general" class="row @if(isset($model) && $model->client) d-none  @endif" >
    <div class="primary_input col-md-6">
        {{Form::label('title', __('finance.Expense Title'), ['class' => 'required'])}}
        {{Form::text('title', null, ['required' => '', 'class' => 'primary_input_field', 'placeholder' => __('finance.Expense Title')])}}
    </div>

</div>
<div id="row_case" class="row @if(!isset($model) || !isset($model->client)) d-none @endif">
    <div class="primary_input col-md-4">
        {{Form::label('clientable_id', __('finance.'.ucfirst($client_type)), ['class' => 'required'])}}
        {{Form::select('clientable_id', $clients,  null, [ 'class' => 'primary_select', 'data-parsley-errors-container' => '#clientable_id_error'])}}
        <span id="clientable_id_error"></span>
    </div>
    <div class="primary_input col-md-4" id="case_column">
        {{Form::label('case_id', __('finance.Select Case'))}}
        {{Form::select('case_id', $cases,  null, ['class' => 'primary_select', 'data-parsley-errors-container' => '#case_id_error'])}}
        <span id="case_id_error"></span>
    </div>
    <div class="primary_input col-md-4">

        <div class="d-flex justify-content-between">
            {{Form::label('service_type', __('finance.Select Service'), ['class' => ''])}}
        </div>
        {{Form::select('service_type', $service_types,  ((isset($model) and $model) ? $model->servicetype_id : null), ['class' => 'primary_select', 'data-parsley-errors-container' => '#service_type_error', 'id' => 'service_type'])}}
        <span id="service_type_error"></span>
    </div>
</div>
<div class="row">
    <div class="primary_input col-md-6">

        <div class="d-flex justify-content-between">
            {{Form::label('service_type', __('finance.Expense Type'), ['class' => ''])}}
            @if(permissionCheck('services.store'))
                <label class="primary_input_label green_input_label" for="service_type">
                    <a href="{{ route('expense_types.create', ['quick_add' => true]) }}"
                       class="btn-modal"
                       data-container="service_type_add">{{ __('finance.New Expense Type') }}
                        <i class="fas fa-plus-circle"></i></a></label>
            @endif
        </div>
        {{Form::select('expense_type', $expense_types,  ((isset($model) and $model) ? $model->morphable_id : null), ['class' => 'primary_select', 'data-parsley-errors-container' => '#expense_type_error', 'id' => 'expense_type'])}}
        <span id="expense_type_error"></span>
    </div>

    <div class="primary_input col-md-6">
        {{Form::label('payment_method', __('finance.Payment Method'), ['class' => 'required'])}}
        {{Form::select('payment_method', $payment_methods,  null, ['required' => '', 'class' => 'primary_select', 'data-parsley-errors-container' => '#payment_method_error'])}}
        <span id="payment_method_error"></span>
    </div>

    <div class="primary_input col-md-6" id="bank_column">
        {{Form::label('bank_account_id', __('finance.Bank Account'), ['class' => 'required'])}}
        {{Form::select('bank_account_id', $bank_accounts,  null, ['required' => '', 'class' => 'primary_select', 'data-parsley-errors-container' => '#bank_account_id_error'])}}
        <span id="bank_account_id_error"></span>
    </div>

    <div class="primary_input col-md-6">
        {{Form::label('amount', __('finance.Expense Amount'), ['class' => 'required'])}}
        {{Form::text('amount', null, ['required' => '', 'class' => 'primary_input_field', 'placeholder' => __('finance.Expense Amount')])}}
    </div>
    <div class="primary_input col-md-6">
        {{Form::label('transaction_date', __('finance.Transaction Date'), ['class' => 'required'])}}
        {{Form::text('transaction_date', (isset($model) and $model->transaction_date) ? $model->transaction_date :date('Y-m-d'), ['required' => '','class' => 'primary_input_field primary-input date form-control date', 'placeholder' => __('finance.Transaction Date')])}}

    </div>

    <div class="col-md-12">
        <div class="primary_input mb-15">
            <label class="primary_input_label" for="">{{ __('common.File') }}</label>
            <div class="primary_file_uploader">
                <input class="primary-input" type="text" id="placeholderFileTwoName" placeholder="{{ __('common.Browse file') }}" readonly="">
                <button class="" type="button">
                    <label class="primary-btn small fix-gr-bg" for="document_file_2">{{ __('common.Browse') }}</label>
                    <input type="file" class="d-none" name="file" id="document_file_2">
                </button>
            </div>
        </div>
    </div>
</div>

@includeIf('customfield::fields', ['fields' => $fields, 'model' => $model ?? null])
<div class="row">
    <div class="primary_input col-md-12">
        {{Form::label('description', __('finance.Description'))}}
        {{Form::textarea('description', null, ['class' => 'primary_input_field summernote', 'placeholder' => __('finance.Description')])}}
    </div>
</div>



