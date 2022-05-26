@extends('finance::layouts.master', ['title' => __('finance.Create New Expense Invoice')])

@section('mainContent')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>{{ __('finance.Add Expense Invoice') }}</h1>
      </div>
      <div class="col-sm-6">
        @if(permissionCheck('invoice.expenses.index'))
            <ul class="breadcrumb float-sm-right">
                <li>
                    <a class="btn btn-primary mr-10 float-sm-right" href="{{ route('invoice.expenses.index') }}">
                        <i class="fa fa-list"></i>  {{ __('finance.Expense Invoice List') }}
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
                <div class="col-12">
                    <div class="card">
                    <div class="card-body">
                        {!! Form::open(['route' => 'invoice.expenses.store', 'class' => 'form-validate-jquery', 'id' => 'content_form', 'files' => false, 'method' => 'POST']) !!}
                        @includeIf('finance::invoice.components.form')
                        <div class="text-center mt-3">
                            <button class="btn btn-primary submit" type="submit"><i
                                    class="ti-check"></i>{{ __('common.Create') }}
                            </button>

                            <button class="btn btn-primary submitting" type="submit" disabled style="display: none;">
                                <i class="ti-check"></i>{{ __('common.Creating') . '...' }}
                            </button>
                        </div>
                        {!! Form::close() !!}
                    </div></div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade animated service_type_add infix_biz_modal" id="remote_modal" tabindex="-1" role="dialog"
         aria-labelledby="remote_modal_label" aria-hidden="true" data-backdrop="static">
    </div>

@stop
@push('admin.scripts')

  @include('finance::invoice.script')
@endpush
