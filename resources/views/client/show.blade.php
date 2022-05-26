@extends('layouts.master', ['title' => __('client.Client Details')])
@section('mainContent')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>{{ __('client.Client Details') }}</h1>
      </div>
      <div class="col-sm-6">
            <ul class="breadcrumb float-sm-right">
                <li>
                    <a class="btn btn-primary" href="{{ route('client.index') }}"><i class="fa fa-list"></i> {{ __('client.Client List') }}</a>
                </li>
            </ul>
     </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
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
                    <!-- Widget: user widget style 2 -->
                    <div class="card card-widget widget-user-2">
                      <!-- Add the bg color to the header using any of the bg-* classes -->
                      <div class="widget-user-header bg-warning">
                        <div class="widget-user-image">
                          <img class="img-circle elevation-2" src="{{ file_exists($model->avatar) ? asset($model->avatar) : asset('public\backEnd/img/staff.jpg') }}" alt="User Avatar">
                        </div>
                        <!-- /.widget-user-image -->
                        <h3 class="widget-user-username"> @if(isset($model)){{@$model->name}}@endif</h3>
                        <h5 class="widget-user-desc">@if(isset($model->category)){{@$model->category->name}}@endif</h5>

                      </div>
                      <div class="card-footer p-0">
                        <ul class="nav flex-column">
                          <li class="nav-item">
                            <a href="#" class="nav-link">
                              {{ __('client.Name') }} <span class="float-right">@if(isset($model)){{@$model->name}}@endif</span>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="#" class="nav-link">
                              {{ __('client.Mobile') }} <span class="float-right"> @if(isset($model)){{@$model->mobile}}@endif</span>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="#" class="nav-link">
                              {{ __('client.Email') }} <span class="float-right">@if(isset($model)){{@$model->email}}@endif</span>
                            </a>
                          </li>
                            <li class="nav-item">
                                <a href="{{ route('client.edit', $model->id) }}" class="nav-link btn btn-primary sm"
                                        >{{ __('common.Edit') }}
                                        </a>
                            </li>
                        </ul>
                      </div>
                    </div>
                </div>
                <!-- Start Student Details -->
                <div class="col-lg-9 staff-details">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#studentProfile" role="tab"
                                       data-toggle="tab">{{ __('client.Profile') }}</a>
                                </li>
                                @if(moduleStatusCheck('Finance'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="#invoicesTab" role="tab"
                                           data-toggle="tab">{{ __('finance.Invoices') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="#transactionsTab" role="tab"
                                           data-toggle="tab">{{ __('finance.Transactions') }}</a>
                                    </li>
                                @endif
                                    <li class="nav-item">
                                        <a class="nav-link " href="#clientUploadFileTab" role="tab"
                                           data-toggle="tab">{{ __('common.Client Uploaded files') }}</a>
                                    </li>
                            </ul>
                            <div class="tab-content">
                                <!-- Start Profile Tab -->
                                <div role="tabpanel" class="tab-pane fade show active" id="studentProfile">
                                    <ul class="nav flex-column">

                                      <li class="nav-item">
                                            
                                      </li>  
                                      <li class="nav-item">
                                        <a class="nav-link">
                                          {{ __('client.Name') }} <span class="float-right">@if(isset($model)){{$model->name}}@endif</span>
                                        </a>
                                      </li>
                                      <li class="nav-item">
                                        <a class="nav-link">
                                          {{ __('client.Mobile') }} <span class="float-right">@if(isset($model)){{$model->mobile}}@endif</span>
                                        </a>
                                      </li>
                                      <li class="nav-item">
                                        <a class="nav-link">
                                          {{ __('client.Email') }} <span class="float-right">@if(isset($model)){{$model->email}}@endif</span>
                                        </a>
                                      </li>
                                      <li class="nav-item">
                                        <a class="nav-link">
                                          {{ __('client.Client Category') }} <span class="float-right">@if(isset($model->category)){{@$model->category->name}}@endif</span>
                                        </a>
                                      </li>
                                      <li class="nav-item">
                                        <a class="nav-link">
                                          {{ __('client.Address') }} <span class="float-right">@if(isset($model)){{$model->address}}@endif</span>
                                        </a>
                                      </li>
                                      <li class="nav-item">
                                        <a class="nav-link">
                                          {{ __('client.Country') }} <span class="float-right">{{ $model->country ? $model->country->name : '' }}</span>
                                        </a>
                                      </li>
                                      <li class="nav-item">
                                        <a class="nav-link">
                                          {{ __('client.State') }} <span class="float-right">{{ $model->state ? $model->state->name : '' }}</span>
                                        </a>
                                      </li>
                                      <li class="nav-item">
                                        <a class="nav-link">
                                          {{ __('client.City') }} <span class="float-right">{{ $model->city ? $model->city->name : '' }}</span>
                                        </a>
                                      </li>
                                      <li class="nav-item">
                                        <a class="nav-link">
                                          {{ __('client.Description') }} <span class="float-right">@if(isset($model)){!! $model->description !!}@endif</span>
                                        </a>
                                      </li>
                                    </ul>
                                    @if(moduleStatusCheck('CustomField') and $model->customFields)
                                            @includeIf('customfield::details.show', ['customFields' => $model->customFields])
                                        @endif
                                    
                                </div>

                                @if(moduleStatusCheck('Finance'))
                                    <div role="tabpanel" class="tab-pane fade" id="invoicesTab">
                                        <div class="">
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
                                                    <th class="d-print-none text-center">{{ __('common.Actions') }}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($model->invoices as $invoice)
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


                                                        <td class="d-print-none text-center">

                                                            <div class="dropdown CRM_dropdown">
                                                                <button class="btn btn-primary dropdown-toggle"
                                                                        type="button"
                                                                        id="dropdownMenu2" data-toggle="dropdown"
                                                                        aria-haspopup="true"
                                                                        aria-expanded="false">
                                                                    {{ __('common.Select') }}
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-right"
                                                                     aria-labelledby="dropdownMenu2">
                                                                    @if(permissionCheck('invoice.incomes.show'))
                                                                        <a href="{{ route('invoice.incomes.show', $invoice->id) }}"
                                                                           class="dropdown-item edit_brand">{{__('common.Show')}}</a>
                                                                    @endif

                                                                    @if(permissionCheck('invoice.incomes.show'))
                                                                        <a
                                                                            class="dropdown-item edit_brand print_window"
                                                                            href="{{ route('invoice.print',$invoice->id) }}">{{__('common.Print')}}</a>
                                                                    @endif

                                                                    @if($invoice->due >  0 and permissionCheck('invoice.payment.add'))
                                                                        <a class="dropdown-item edit_brand btn-modal"
                                                                           data-container="payment_modal"
                                                                           href="{{ route('invoice.payment.add',$invoice->id) }}">{{__('finance.Add Payment')}}</a>
                                                                    @endif

                                                                    @if(permissionCheck('invoice.incomes.edit'))
                                                                        <a href="{{ route('invoice.incomes.edit', $invoice->id) }}"
                                                                           class="dropdown-item edit_brand">{{__('common.Edit')}}</a>
                                                                    @endif
                                                                    @if(permissionCheck('invoice.incomes.destroy'))
                                                                        <a
                                                                            data-id="{{ $invoice->id }}"
                                                                              data-url="{{ route('invoice.incomes.destroy', $invoice->id)}}"
                                                                           class="dropdown-item delete_item">{{__('common.Delete')}}</a>
                                                                    @endif


                                                                </div>
                                                            </div>


                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div role="tabpanel" class="tab-pane fade" id="transactionsTab">
                                        <div class="">

                                            @php
                                                $model->invoice_type = 'income';
                                            @endphp
                                            @includeIf('finance::invoice.payment_table', ['dataTable' => 'Crm_table_active '])
                                        </div>
                                    </div>
                                @endif
                                    <div role="tabpanel" class="tab-pane fade" id="clientUploadFileTab">
                                        <div class="">
                                            @if($model->user && $model->user->uploads)
                                            
                                            @includeIf('case.file_show', ['files' => $model->user->uploads, 'type' => 'lobbying'])
                                            
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
@if(moduleStatusCheck('Finance'))
    <div class="modal fade animated payment_modal infix_biz_modal" id="remote_modal" tabindex="-1" role="dialog"
         aria-labelledby="remote_modal_label" aria-hidden="true" data-backdrop="static">
    </div>
    @endif
@endsection
@push('admin.scripts')
    <script type="text/javascript">

    </script>
@endpush

