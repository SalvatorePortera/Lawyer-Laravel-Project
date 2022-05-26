@extends('finance::layouts.master')

@section('mainContent')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>{{ __('finance.Expense Invoice List') }}</h1>
      </div>
      <div class="col-sm-6">
            @if(permissionCheck('invoice.expenses.store'))
            <ul class="breadcrumb float-sm-right">
                <li>
                    <a class="btn btn-primary" href="{{ route('invoice.expenses.create') }}">
                        <i class="fa fa-plus"></i> {{ __('finance.New Expense Invoice') }}
                    </a>
                </li>
            </ul>
            @endif
     </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    
                        <div class="card ">
                            <!-- table-responsive -->
                            <div class="card-body">
                                <table class="table table-striped table-hover dt">
                                    <thead>
                                    <tr>
                                        <th scope="col">{{ __('common.SL') }}</th>
                                        <th>{{ __('finance.Date') }}</th>
                                        <th>{{ __('finance.Invoice No') }}</th>
                                        <th>{{ __('finance.Client') }}</th>
                                        <th>{{ __('finance.Total Amount') }}</th>
                                        <th>{{ __('finance.Paid') }}</th>
                                        <th>{{ __('finance.Due') }}</th>
                                        <th>{{ __('common.Actions') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($models as $model)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>
                                                {{ formatDate($model->invoice_date) }}
                                            </td>
                                            <td>
                                                <a href="{{ route('invoice.expenses.show', $model->id) }}"> {{ $model->invoice_no }} </a>
                                            </td>
                                            <td>
                                                @if($model->clientable)
                                                {{ $model->clientable->name }}
                                                @endif
                                            </td>
                                            <td>{{ amountFormat($model->grand_total) }}</td>
                                            <td>{{ amountFormat($model->paid) }}</td>
                                            <td>{{ amountFormat($model->due) }}</td>

                                            <td>
                                                <div class="dropdown CRM_dropdown">
                                                    <button class="btn btn-primary dropdown-toggle" type="button"
                                                            id="dropdownMenu2" data-toggle="dropdown"
                                                            aria-haspopup="true"
                                                            aria-expanded="false">
                                                        {{ __('common.Select') }}
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right"
                                                         aria-labelledby="dropdownMenu2">
                                                        @if(permissionCheck('invoice.expenses.show'))
                                                            <a href="{{ route('invoice.expenses.show', $model->id) }}"
                                                               class="dropdown-item edit_brand">{{__('common.Show')}}</a>
                                                        @endif

                                                        @if(permissionCheck('invoice.expenses.show'))
                                                            <a
                                                               class="dropdown-item edit_brand print_window"
                                                               href="{{ route('invoice.print',$model->id) }}">{{__('common.Print')}}</a>
                                                        @endif

                                                        @if($model->due >  0 and permissionCheck('invoice.payment.add'))
                                                            <a class="dropdown-item edit_brand btn-modal" data-container="payment_modal" href="{{ route('invoice.payment.add',$model->id) }}">{{__('finance.Add Payment')}}</a>
                                                        @endif

                                                        @if(permissionCheck('invoice.expenses.edit'))
                                                            <a href="{{ route('invoice.expenses.edit', $model->id) }}"
                                                               class="dropdown-item edit_brand">{{__('common.Edit')}}</a>
                                                        @endif
                                                        @if(permissionCheck('invoice.expenses.destroy'))
                                                            <a href="#" data-id="{{ $model->id }}" data-url="{{ route('invoice.expenses.destroy', $model->id)}}"
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


                @include('partials.delete_modal')
            </div>
        </div>
    </section>

    <div class="modal fade animated payment_modal infix_biz_modal" id="remote_modal" tabindex="-1" role="dialog"
         aria-labelledby="remote_modal_label" aria-hidden="true" data-backdrop="static">
    </div>


@stop


@push('admin.scripts')


    <script>
        $(document).ready(function () {
        });

    </script>
@endpush
