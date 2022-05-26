@extends('layouts.master', ['title' => __('contact.Update Contact Category')])

@section('mainContent')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>{{ __('contact.Update Contact Category') }}</h1>
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

                        {!! Form::model($model, ['route' => ['category.contact.update', $model->id], 'class' =>
                        'form-validate-jquery',
                        'id' => 'content_form', 'method' => 'PUT']) !!}
                        <div class="primary_input">
                            {{Form::label('name', __('contact.Designation Name'),['class' => 'required'])}}
                            {{Form::text('name', null, ['required' => '', 'class' => 'form-control', 'placeholder' => __
                            ('contact.Designation Name')])}}
                        </div>

                        <div class="primary_input">
                            {{Form::label('description', __('contact.Description'))}}
                            {{Form::textarea('description', null, ['class' => 'form-control', 'placeholder' =>
                             __('contact.Designation Description'), 'rows' => 5 ])}}
                        </div>

                        <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary semi_large2" id="submit" value="submit">{{ __ ('common.Update')
                            }}</button>
                        </div>
                        {!! Form::close() !!}

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
        $(document).ready(function () {
            _formValidation();

        });
    </script>
@endpush

