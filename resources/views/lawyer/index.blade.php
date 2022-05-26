@extends('layouts.master', ['title' => __('lawyer.Opposite Lawyer')])
@section('mainContent')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>{{ __('lawyer.Opposite Lawyer') }}</h1>
      </div>
      <div class="col-sm-6">
            @if(permissionCheck('lawyer.store'))
            <ul class="breadcrumb float-sm-right">
                <li>
                    <a class="btn btn-primary" href="{{ route('lawyer.create') }}">
                        <i class="fa fa-plus"></i> {{ __('lawyer.New Lawyer') }}
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
                        <div class="card">
                            <!-- table-responsive -->
                            <div class="card-body">
                                <table class="table table-striped table-hover dt">
                                    <thead>
                                    <tr>
                                        <th scope="col">{{ __('common.SL') }}</th>
                                        <th scope="col">{{ __('lawyer.Lawyer') }}</th>
                                        <th scope="col">{{ __('lawyer.Mobile') }}</th>
                                        @if(moduleStatusCheck('EmailtoCL'))
                                            <th>{{ __('case.Email') }}</th>
                                        @endif
                                        <th scope="col">{{ __('common.Actions') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($models as $model)
                                        <tr>

                                            <td>{{ $loop->index + 1 }}</td>
                                            <td><a href="{{ route('lawyer.show', $model->id) }}">{{ $model->name }}</a>
                                            </td>
                                            <td>{{ $model->mobile_no }}</td>
                                            @if(moduleStatusCheck('EmailtoCL'))
                                                <td>{{ $model->email }}</td>
                                            @endif

                                            <td>


                                                <div class="dropdown CRM_dropdown">
                                                    <button class="btn btn-primary bg-hover-yellow dropdown-toggle" type="button"
                                                            id="dropdownMenu2" data-toggle="dropdown"
                                                            aria-haspopup="true"
                                                            aria-expanded="false">
                                                        {{ __('common.Select') }}
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right"
                                                         aria-labelledby="dropdownMenu2">
                                                        <a href="{{ route('lawyer.show', $model->id) }}"
                                                           class="dropdown-item">{{__('common.show')}}</a>
                                                        @if(permissionCheck('lawyer.edit'))

                                                            <a href="{{ route('lawyer.edit', $model->id) }}"
                                                               class="dropdown-item edit_brand">{{__('common.Edit')}}</a>
                                                        @endif

                                                        @if(permissionCheck('lawyer.destroy'))
                                                            <a href="#" data-url="{{route('lawyer.destroy', $model->id)}}"
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
        </div>
    </section>

@stop


@push('admin.scripts')

    <script>
        $(document).ready(function () {

        });

    </script>
@endpush

