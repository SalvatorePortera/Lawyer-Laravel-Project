@extends('layouts.master', ['title' => __('case.Re-open Case')])
@section('mainContent')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>{{__('Re-open Case')}}</h1>
      </div>
      <div class="col-sm-6">
        
     </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
    <!-- Vertical form options -->
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid">
            <div class="row justify-content-center">
                
                <div class="col-12">
                    <div class="card">
                    <div class="card-body">


                        {!! Form::open(['route' => 'judgement.reopen_store', 'class' => 'form-validate-jquery', 'id' => 'content_form',
                        'files' => false, 'method' => 'POST']) !!}
                        <div class="row">
                            <div class="primary_input col-md-12">
                                {{Form::hidden('case', $case)}}
                                {{Form::label('judgement_date', __('case.Re-open Date'), ['class' => 'required'])}}
                                {{Form::text('judgement_date', $model->judgement_date, ['required' => '','class' => 'form-control primary-input form-control datetime', 'placeholder' => __('case.Re-open Date')])}}
                            </div>
                        </div>
                        @includeIf('customfield::fields', ['fields' => $fields, 'model' => null])
                        <div class="primary_input">
                            {{Form::label('judgement',  __('case.Re-open Description'), ['class' => 'required'])}}
                            {{Form::textarea('judgement', $model->description, ['class' => 'form-control summernote', 'placeholder' => __('case.Re-open Description'), 'rows' => 5, 'data-parsley-errors-container' => '#judgement_error' ])}}
                            <span id="judgement_error"></span>
                        </div>
                        @includeIf('case.file')

                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-primary" id="submit" value="submit">{{ __
                        ('common.Update')
                        }}</button>
                        </div>

                        {!! Form::close() !!}
                    </div></div>
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
