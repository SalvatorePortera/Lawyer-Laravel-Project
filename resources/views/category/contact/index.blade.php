@extends('layouts.master', ['title' => __('contact.Contact Category')])


@section('mainContent')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>{{ __('contact.Contact Category') }}</h1>
      </div>
      <div class="col-sm-6">
        @if(permissionCheck('category.contact.store'))
            <ul class="breadcrumb float-sm-right">
                <li>
                    <a class="btn btn-primary" href="{{ route('category.contact.create') }}"><i class="fa fa-plus"></i> {{ __('contact.New Category') }}</a>
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
                                            <th >{{ __('contact.SL') }}</th>
                                            <th>{{ __('contact.Contact Category') }}</th>
                                            <th>{{ __('contact.Description') }}</th>
                                            <th>{{ __('contact.Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($models as $model)
                                        <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $model->name }}</td>
                                            <td>{!! $model->description !!}</td>
                                           
                                            <td>


                                                <div class="dropdown CRM_dropdown">
                                                        <button class="btn btn-primary dropdown-toggle" type="button"
                                                                id="dropdownMenu2" data-toggle="dropdown"
                                                                aria-haspopup="true"
                                                                aria-expanded="false">
                                                            {{ __('common.Select') }}
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">

                                                        @if(permissionCheck('category.contact.edit'))
                                                        <a href="{{ route('category.contact.edit', $model->id) }}"
                                                        class="dropdown-item"><i class="icon-pencil"></i>  {{ __('common.Edit') }}</a>
                                                        @endif

                                                        
                                                        @if(permissionCheck('category.contact.destroy'))
                                                        <a href="#" data-id="{{ $model->id }}" data-url="{{ route
                                                        ('category.contact.destroy', $model->id)
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

