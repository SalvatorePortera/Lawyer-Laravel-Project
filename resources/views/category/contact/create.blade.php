@extends('layouts.master', ['title' => __('contact.Create New Contact Category')])


@section('mainContent')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>{{ __('contact.New Contact Category') }}</h1>
      </div>
      <div class="col-sm-6">
            <ul class="breadcrumb float-sm-right">
                <li>
                    <a class="btn btn-primary mr-10 float-sm-right" href="{{ route('category.contact.index') }}">
                        <i class="fa fa-list"></i>  {{__('contact.Category List')}}
                    </a>
                </li>
            </ul>
     </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid">
        <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                    {!! Form::open(['route' => 'category.contact.store', 'class' => 'form-validate-jquery', 'id' =>
                    'content_form', 'files' => false, 'method' => 'POST']) !!}
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                {{Form::label('name', __('contact.Name'), ['class' => 'required'])}}
                                {{Form::text('name', null, ['required' => '', 'class' => 'form-control', 'placeholder' => __('contact.Designation Name')])}}
                            </div>
                        </div>
                    </div>
                    

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                        {{Form::label('description', __('contact.Description'))}}
                        {{Form::textarea('description', null, ['class' => 'form-control', 'placeholder' =>
                         __('contact.Designation Description'), 'rows' => 5, 'maxlength' => 1500,
                         'data-parsley-errors-container' =>
                         '#description_error' ])}}
                        <span id="description_error"></span>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-3">
                    <button class="btn btn-primary btn-lg submit" type="submit"><i class="ti-check"></i>{{ __('common.Create') }}
                    </button>

                    <button class="btn btn-primary btn-lg submitting" type="submit" disabled style="display: none;"><i class="ti-check"></i>{{ __('common.Creating') . '...' }}
                    </button>
                    </div>
                    {!! Form::close() !!}




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
            _formValidation();

        });
    </script>
@endpush

