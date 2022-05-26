@extends('layouts.master', ['title' => __('contact.Contact')])

@section('mainContent')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>{{ __('contact.Contact List') }}</h1>
      </div>
      <div class="col-sm-6">
        @if(permissionCheck('contact.store'))
        <a class="btn btn-primary float-sm-right" href="{{ route('contact.create') }}"><i class="ti-plus"></i>{{ __('contact.New Contact') }}</a>
        @endif
     </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid">
        <div class="row justify-content-center">
                <div class="col-lg-12">
                        <div class="card">
                            <!--div class="card-header">
                              <h3 class="card-title">{{ __('contact.Contact List') }}</h3>
                                
                            </div-->
                            <div class="card-body">
                                <table class="table table-striped table-hover dt">
                                    <thead>
                                        <tr>
                                            <th scope="col">{{ __('common.SL') }}</th>
                                            <th scope="col">{{ __('contact.Name') }}</th>
                                            <th scope="col">{{ __('contact.Category') }}</th>
                                            <th scope="col">{{ __('contact.Mobile') }}</th>
                                            <th scope="col">{{ __('contact.Email') }}</th>
                                            <th scope="col">{{ __('common.Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($models as $model)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td><a href="{{ route('contact.show', $model->id) }}">{{ $model->name }}</a></td>
                                            <td>{{ @$model->category->name }}</td>
                                            <td>{{ $model->mobile_no }}</td>
                                            <td>{{ $model->email }}</td>

                                            <td>
                                                <div class="dropdown CRM_dropdown">
                                                        <button class="btn btn-primary dropdown-toggle" type="button"
                                                                id="dropdownMenu2" data-toggle="dropdown"
                                                                aria-haspopup="true"
                                                                aria-expanded="false">
                                                            {{ __('common.Select') }}
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                                                                @if(permissionCheck('contact.show'))
                                                                <a href="{{ route('contact.show', $model->id) }}" class="dropdown-item edit_brand">{{__('common.View')}}</a>
                                                                @endif
                                                                @if(permissionCheck('contact.edit'))
                                                                <a href="{{ route('contact.edit', $model->id) }}" class="dropdown-item edit_brand">{{__('common.Edit')}}</a>
                                                                @endif

                                                                @if(permissionCheck('contact.destroy'))
                                                                 <a href="#" data-url="{{route('contact.destroy', $model->id)}}" class="dropdown-item delete_item">{{__('common.Delete')}}</a>
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

</script>
@endpush
