@extends('layouts.master')

@section('mainContent')
    <section class="mb-40 student-details">
        @if(session()->has('message-success'))
            <div class="alert alert-success">
                {{ session()->get('message-success') }}
            </div>
        @elseif(session()->has('message-danger'))
            <div class="alert alert-danger">
                {{ session()->get('message-danger') }}
            </div>
        @endif
        <div class="container-fluid pt-3">
            <div class="row">
                <div class="col-lg-3">
                    <!-- Start Student Meta Information -->
                    <div class="main-title">
                        <h3 class="mb-20">@lang('client.Client Details')</h3>
                    </div>
                    <div class="student-meta-box">
                        <div class="student-meta-top"></div>
                        <img class="student-meta-img img-100"
                             src="{{ file_exists($user->avatar) ? asset($user->avatar) : asset('public\backEnd/img/staff.jpg') }}"
                             alt="">
                        <div class="white-box">
                            <div class="single-meta mt-10">
                                <div class="d-flex justify-content-between">
                                    <div class="name">
                                        {{ __('client.Name') }}
                                    </div>
                                    <div class="value">
                                        @if(isset($user)){{@$user->name}}@endif
                                    </div>
                                </div>
                            </div>

                            <div class="single-meta">
                                <div class="d-flex justify-content-between">
                                    <div class="name">
                                        {{ __('client.Mobile') }}
                                    </div>
                                    <div class="value">
                                        @if(isset($user)){{@$user->mobile}}@endif
                                    </div>
                                </div>
                            </div>

                            <div class="single-meta">
                                <div class="d-flex justify-content-between">
                                    <div class="name">
                                        {{ __('client.Email') }}
                                    </div>
                                    <div class="value">
                                        @if(isset($user)){{@$user->email}}@endif
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- End Student Meta Information -->
                </div>
                <!-- Start Student Details -->
                <div class="col-lg-9 staff-details">
                    <ul class="nav nav-tabs tabs_scroll_nav" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#studentProfile" role="tab"
                               data-toggle="tab">{{ __('client.Profile') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#invoicesTab" role="tab"
                               data-toggle="tab">{{ __('finance.Invoices') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="#transactionsTab" role="tab"
                               data-toggle="tab">{{ __('finance.Transactions') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="#uploadfileTab" role="tab"
                               data-toggle="tab">{{ __('finance.File Uplaod') }}</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <!-- Start Profile Tab -->
                        <div role="tabpanel" class="tab-pane fade show active" id="studentProfile">
                            <div class="white-box">
                                <h4 class="stu-sub-head">{{ __('client.Client Info') }}</h4>
                                <div class="single-info">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5">
                                            <div class="">
                                                {{ __('client.Name') }}
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-6">
                                            <div class="">
                                                @if(isset($user)){{$user->name}}@endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-info">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5">
                                            <div class="">
                                                {{ __('client.Mobile') }}
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-6">
                                            <div class="">
                                                @if(isset($user)){{$user->mobile}}@endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-info">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5">
                                            <div class="">
                                                {{ __('client.Email') }}
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-6">
                                            <div class="">
                                                @if(isset($user)){{$user->email}}@endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-info">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5">
                                            <div class="">
                                                {{ __('client.Client Category') }}
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-6">
                                            <div class="">
                                                @if(isset($user->category)){{@$user->category->name}}@endif
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="single-info">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5">
                                            <div class="">
                                                {{ __('client.Address') }}
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-6">
                                            <div class="">
                                                @if(isset($user)){{$user->address}}@endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-info">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5">
                                            <div class="">
                                                {{ __('client.Country') }}
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-6">
                                            <div class="">
                                                {{ $user->country ? $user->country->name : '' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="single-info">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5">
                                            <div class="">
                                                {{ __('client.State') }}
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-6">
                                            <div class="">
                                                {{ $user->state ? $user->state->name : '' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-info">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5">
                                            <div class="">
                                                {{ __('client.City') }}
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-6">
                                            <div class="">
                                                {{ $user->city ? $user->city->name : '' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="single-info">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5">
                                            <div class="">
                                                {{ __('client.Description') }}
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-6">
                                            <div class="">
                                                @if(isset($user)){!! $user->description !!}@endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @if(moduleStatusCheck('CustomField') and $user->customFields)
                                    @foreach($user->customFields as $field)
                                        <div class="single-info">
                                            <div class="row">
                                                <div class="col-lg-5 col-md-5">
                                                    <div class="">
                                                        {{ $field->field->title }}
                                                    </div>
                                                </div>
                                                <div class="col-lg-7 col-md-6">
                                                    <div class="">

                                                        {!!  $field->show_value !!}

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif


                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="invoicesTab">
                            <div class="white-box">
                                <div class="QA_section QA_section_heading_custom check_box_table">
                                    <div class="QA_table ">
                                <table class="check_box_table table table-sm Crm_table_active ">
                                    <thead>
                                    <tr>
                                        <th scope="col">{{ __('common.SL') }}</th>
                                        <th>{{ __('finance.Date') }}</th>
                                        <th>{{ __('finance.Invoice No') }}</th>
                                        <th>{{ __('case.Case') }}</th>
                                        <th>{{ __('finance.Total Amount') }}</th>
                                        <th>{{ __('finance.Paid') }}</th>
                                        <th>{{ __('finance.Due') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($user->invoices as $invoice)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>
                                                {{ formatDate($invoice->transaction_date) }}
                                            </td>
                                            <td>
                                                <a href="{{ route('invoice.incomes.show', $invoice->id) }}"
                                                   target="_blank"> {{ $invoice->invoice_no }} </a>
                                            </td>
                                            <td>

                                                @if($invoice->case)
                                                    <a href="{{ route('case.show', $invoice->case_id) }}" target="_blank">{{ $invoice->case->title }}</a>
                                                @endif
                                            </td>
                                            <td>{{ amountFormat($invoice->grand_total) }}</td>
                                            <td>{{ amountFormat($invoice->paid) }}</td>
                                            <td>{{ amountFormat($invoice->due) }}</td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="transactionsTab">
                            <div class="white-box">

                                @php
                                    $user->invoice_type = 'income';
                                @endphp
                                <div class="QA_section QA_section_heading_custom check_box_table">
                                    <div class="QA_table ">
                                        <table class="table table-sm {{ $dataTable ?? '' }}">
                                            <thead>
                                            <tr>
                                                <th>{{ __('finance.Sl') }}</th>
                                                <th>{{ __('finance.Date') }}</th>
                                                <th>{{ __('finance.Title') }}</th>
                                                <th>{{ __('finance.Method') }}</th>
                                                <th class="text-right">{{ __('finance.Amount') }}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php
                                                $payment_total = 0;
                                            @endphp

                                            @foreach($user->transactions as $transaction)
                                                @php
                                                    if (($user->invoice_type == 'income' and $transaction->type == 'in') or ($user->invoice_type == 'expense' and $transaction->type == 'out')){
                                                        $payment_total += $transaction->amount;
                                                    } else {
                                                        $payment_total -= $transaction->amount;
                                                    }
                                                @endphp
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ formatDate($transaction->transaction_date) }}</td>
                                                    <td>{{ $transaction->title }}</td>
                                                    <td>
                                                        {{ $transaction->payment_method_display }}
                                                    </td>
                                                    <td class="text-right">
                                                        @if(($user->invoice_type == 'income' and $transaction->type == 'out') or ($user->invoice_type == 'expense' and $transaction->type == 'in'))
                                                            (-)
                                                        @endif
                                                        {{ amountFormat($transaction->amount) }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <td colspan="4" class="text-right"> {{ __('finance.Total') }}</td>
                                                <td class="text-right"> {{ amountFormat($payment_total) }}</td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="uploadfileTab">
                            
                                <div class="row">
                                    <div class="col-md-12 white-box student-details">
                                        {!! Form::open(['url' => route('client.upload_my_file'), 'method' => 'post', 'id' => 'content_form', 'files' =>true, 'data-parsley-focus' => 'none' ]) !!}
                                        <div class="row">        
                                            <div class="col-xl-4">
                                                {{Form::label('invoice_id', __('finance.Select Invoice'))}}
                                                {{Form::select('invoice_id', $invoices,  null, ['class' => 'primary_select', 'data-parsley-errors-container' => '#invoice_id_error'])}}
                                                <span id="invoice_id_error"></span>
                                            </div>
                                            <div class="col-xl-8">
                                                {{Form::label('case_id', __('finance.Select Case'))}}
                                                <select class="primary_select" data-parsley-errors-container="#case_id_error" id="case_id" name="case_id">
                                                    <option value="0" selected="selected">{{__('finance.Select Case')}}</option>
                                                    @foreach ($cases as $case)
                                                    <option value="{{$case->id}}">{{$case->title}}</option>
                                                    @endforeach
                                                </select>
                                                <span id="case_id_error"></span>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-xl-12 mt-3 attach-file-row">
                                                    <div class="attach-file-section d-flex align-items-center mb-2">
                                                        <div class="primary_input flex-grow-1">
                                                            <div class="primary_file_uploader">
                                                                <input class="primary-input require" require type="text" id="placeholderAttachFile" placeholder="{{ __('common.Browse file') }}" readonly>
                                                                <button class="" type="button">
                                                                    <label class="primary-btn small fix-gr-bg"
                                                                           for="attach_file">{{__("common.Browse")}} </label>
                                                                    <input type="file" class="d-none" name="file[]" id="attach_file">
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <span style="cursor:pointer;" class="primary-btn small fix-gr-bg icon-only" type="button" id="file_add"> <i class="ti-plus"></i> </span>
                                                    </div>

                                                </div>

                                                <div class="col-xl-12 text-center mt-3">
                                                    <button class="primary-btn fix-gr-bg submit" type="submit"><i
                                                            class="ti-check"></i>{{ __('common.Create') }}
                                                    </button>
                                                    <button class="primary-btn fix-gr-bg submitting" type="submit" disabled style="display: none;">
                                                        <i class="ti-check"></i>{{ __('common.Creating') . '...' }}
                                                    </button>
                                                </div>
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <div class="white-box student-details pt-2 pb-3">
                                        @if($files)
                                            <table class="table table-striped">
                                              <thead>
                                                <tr>
                                                  <th class="text-center" width="50px">#</th>
                                                  <th>Invoice No</th>
                                                  <th>Case No</th>
                                                  <th>Case File No</th>
                                                  <th>File Name</th>
                                                  <th width="100px"></th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                            @foreach($files as $file)
                                                <tr>
                                                    <td class="text-center">{{ $loop->index + 1}}.</td>
                                                    <td>@if($file->invoice)
                                                        {{ $file->invoice->invoice_no}}
                                                        @endif</td>
                                                    <td>
                                                        @if($file->case)
                                                        {{ $file->case->case_no}}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($file->case)
                                                        {{ $file->case->file_no}}
                                                        @endif
                                                    </td>
                                                    <td> 
                                                        {{ $file->user_filename}}
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('file.download', ['id' => $file->uuid]) }}" class="primary-btn small fix-gr-bg icon-only">
                                                            <i class="ti-download"></i>
                                                        </a>
                                                        <a href="#" style="cursor: pointer;"
                                                                      data-url="{{route('client.destroy_my_file', ['id' => $file->uuid])}}" class="primary-btn small fix-gr-bg icon-only delete_item"><i class="ti-trash"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                                </tbody>
                                            </table>
                                        @endif
                                        </div>
                                    </div>
                                </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade animated file_modal infix_biz_modal" id="remote_modal" tabindex="-1" role="dialog"
         aria-labelledby="remote_modal_label" aria-hidden="true" data-backdrop="static">
    </div>
    
@endsection

@push('admin.scripts')
    <script>
        _formValidation();
        _componentAjaxChildLoad('#content_form', '#country_id', '#state_id', 'state')
        _componentAjaxChildLoad('#content_form', '#state_id', '#city_id', 'city')
    </script>
@endpush
