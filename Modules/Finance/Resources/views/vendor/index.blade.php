@extends('finance::layouts.master')

@section('mainContent')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{ __('vendor.Vendor List') }}</h1>
        </div>
        <div class="col-sm-6">
            @if(permissionCheck('vendors.store'))
              <ul class="breadcrumb float-sm-right">
                  <li>
                      <a class="btn btn-primary" href="{{ route('vendors.create') }}">
                          <i class="fa fa-plus"></i> {{ __('vendor.New Vendor') }}
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
            <div class="row justify-content-center">
                <div class="col-lg-12">

                        <div class="card ">
                            <!-- table-responsive -->
                            <div class="card-body">
                                <table class="table table-striped table-hover dt">
                                    <thead>
                                    <tr>
                                        <th scope="col">{{ __('common.SL') }}</th>
                                        <th>{{ __('vendor.Name') }}</th>
                                        <th>{{ __('vendor.Contact') }}</th>
                                        <th>{{ __('vendor.Address') }}</th>
                                        <th>{{ __('common.Actions') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($models as $model)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>
                                                <a href="{{ route('vendors.show', $model->id) }}">{{ $model->name }}</a>
                                            </td>
                                            <td>
                                                {{ __('vendor.Mobile') }}: {{ $model->mobile }} <br>
                                                {{ __('vendor.Email') }}: {{ $model->email }}
                                            </td>
                                            <td>
                                                {!! $model->address ? $model->address  .', <br>' : '' !!}
                                                {{ $model->state ? $model->state->name .', ' : ''}}
                                                {{ $model->city ? $model->city->name .', ' : '' }}
                                                {{ $model->country ? $model->country->name : '' }}
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
                                                        @if(permissionCheck('vendors.show'))
                                                            <a href="{{ route('vendors.show', $model->id) }}"
                                                               class="dropdown-item edit_brand">{{__('common.Show')}}</a>
                                                        @endif
                                                        @if(permissionCheck('vendors.edit'))
                                                            <a href="{{ route('vendors.edit', $model->id) }}"
                                                               class="dropdown-item edit_brand">{{__('common.Edit')}}</a>
                                                        @endif
                                                        @if(permissionCheck('vendors.destroy'))
                                                            <a href="#" data-id="{{ $model->id }}" data-url="{{ route('vendors.destroy', $model->id)}}"
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

@stop


@push('admin.scripts')


    <script>
        $(document).ready(function () {
        });

    </script>
@endpush
