@extends('finance::layouts.master')

@section('mainContent')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>{{ __('finance.Expense List') }}</h1>
      </div>
      <div class="col-sm-6">
            @if(permissionCheck('expenses.store'))
            <ul class="breadcrumb float-sm-right">
                <li>
                    <a class="btn btn-primary" href="{{ route('expenses.create') }}">
                        <i class="fa fa-plus"></i> {{ __('finance.New Expense') }}
                    </a>
                </li>
            </ul>
            @endif
     </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid pt-3">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="QA_section QA_section_heading_custom check_box_table">
                        <div class="QA_table ">
                            <!-- table-responsive -->
                            <div class="">
                                <table class="table table-striped table-hover dt">
                                    <thead>
                                    <tr>
                                        <th scope="col">{{ __('common.SL') }}</th>
                                        <th>{{ __('finance.Title') }}</th>
                                        <th>{{ __('finance.Client') }}</th>
                                        <th>{{ __('finance.Service') }}</th>
                                        <th>{{ __('case.Case') }}</th>
                                        <th>{{ __('finance.Type') }}</th>
                                        <th>{{ __('finance.Amount') }}</th>
                                        <th>{{ __('finance.Date') }}</th>
                                        <th>{{ __('finance.Payment By') }}</th>
                                        <th>{{ __('finance.Description') }}</th>
                                        <th>{{ __('common.Actions') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($models as $model)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>
                                                {{ $model->title }}
                                            </td>
                                            <td>
                                                @if($model->client)
                                                {{ $model->client->name }}
                                                @endif
                                            </td>
                                            <td>
                                                @if($model->servicetype)
                                                {{ $model->servicetype->name }}
                                                @endif
                                            </td>
                                            <td>
                                                @if($model->case)
                                                {{ $model->case->title }}
                                                @endif
                                            </td>
                                            <td>
                                                @if($model->morphable)
                                                {{ $model->morphable->name }}
                                                @endif
                                            </td>
                                            <td>{{ amountFormat($model->amount) }}</td>
                                            <td>{{ formatDate($model->transaction_date) }}</td>
                                            <td>

                                                    @if ($model->payment_method == 'bank')
                                                    {{ __('list.'.$model->payment_method) . "  ({$model->bank->bank_name})" }}
                                                @else
                                                {{__('list.'.$model->payment_method)}}
                                                        @endif

                                            </td>
                                            <td>
                                                {!!  $model->description !!}
                                            </td>

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
                                                        @if($model->file)
                                                            <a href="{{ asset('public/uploads/file/'.$model->file) }}" download=""
                                                               class="dropdown-item ">{{__('finance.Download File')}}</a>
                                                            @endif
                                                            @if(permissionCheck('expenses.index'))
                                                                <a href="{{ route('expenses.show', $model->id) }}"
                                                                   class="dropdown-item edit_brand">{{__('common.Show')}}</a>
                                                            @endif
                                                        @if(permissionCheck('expenses.edit'))
                                                            <a href="{{ route('expenses.edit', $model->id) }}"
                                                               class="dropdown-item edit_brand">{{__('common.Edit')}}</a>
                                                        @endif
                                                        @if(permissionCheck('expenses.destroy'))
                                                            
                                                            <a href="#" data-id="{{ $model->id }}" data-url="{{ route('expenses.destroy', $model->id)}}"
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


                @include('partials.delete_modal')
            </div>
        </div>
    </section>

@stop


@push('admin.scripts')


    <script>
        $(document).ready(function () {
        });

    </script>
@endpush
