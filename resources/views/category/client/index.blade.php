@extends('layouts.master', ['title' => __('client.Client Category')])


@section('mainContent')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>{{ __('client.Client Category') }}</h1>
      </div>
      <div class="col-sm-6">
        @if(permissionCheck('category.client.store'))
            <ul class="breadcrumb float-sm-right">
                <li>
                    <a class="btn btn-primary mr-10 float-sm-right" href="{{ route('category.client.create') }}">
                        <i class="ti-plus"></i> {{ __('client.Add Category') }} 
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
                    <div class="card">
                        <!--div class="card-header">
                              <h3 class="card-title">{{ __('contact.Contact List') }}</h3>
                            </div-->
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center" scope="col">{{ __('common.SL') }}</th>
                                        <th>{{ __('client.Client Category') }}</th>
                                        <th>{{ __('client.Description') }}</th>
                                        <th>{{ __('client.On Behalf') }}</th>
                                        <th class="text-center">{{ __('common.Actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($models as $model)
                                    <tr>
                                    <td class="text-center">{{ $loop->index + 1 }}</td>
                                        <td>{{ $model->name }}</td>
                                        <td>{{ $model->description }}</td>
                                        <td>
                                            <span class="badge @switch($model->business_type) @case(0) bg-primary @break @case(1) bg-warning @break @case(2) bg-danger @break @endswitch">
                                                {{__(Config::get('global.business_type')[$model->business_type])}}
                                            </span>
                                            
                                        </td>
                                        <td class="text-center">
                                            <div class="dropdown CRM_dropdown">
                                                    <button class="btn btn-primary dropdown-toggle" type="button"
                                                            id="dropdownMenu2" data-toggle="dropdown"
                                                            aria-haspopup="true"
                                                            aria-expanded="false">
                                                        {{ __('common.Select') }}
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                                                    @if(permissionCheck('category.client.edit'))
                                                    <a href="{{ route('category.client.edit', $model->id) }}"
                                                    class="dropdown-item"><i class="icon-pencil"></i>  {{ __('common.Edit') }}</a>
                                                    @endif
                                                    @if(permissionCheck('category.client.destroy'))
                                                    <a href="#" data-id="{{ $model->id }}" data-url="{{ route
                                                    ('category.client.destroy', $model->id)
                                                    }}" class="dropdown-item delete_item"><i class="icon-trash"></i>  {{ __('common.Delete') }}</a>

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
    </div>
</section>

@stop


@push('admin.scripts')


    <script>
        $(document).ready(function() {

        });

    </script>
@endpush

