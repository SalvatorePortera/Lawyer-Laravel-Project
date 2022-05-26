@extends('layouts.master', ['title' => __('case.Judgement')])

@section('mainContent')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>{{__('case.Add Judgement')}}</h1>
      </div>
      <div class="col-sm-6">
            
     </div>
    </div>
  </div><!-- /.container-fluid -->
</section>    
    <!-- Vertical form options -->
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                    <div class="card-body">
                        {!! Form::open(['route' => 'judgement.store', 'class' => 'form-validate-jquery form-horizontal', 'id' => 'content_form', 'files' => false, 'method' => 'POST']) !!}
                        {{Form::hidden('case', $case)}}
                        <div class="form-group row">
                            {{Form::label('judgement_date', __('case.Judgement Date'), ['class' => 'required col-sm-2 control-label'])}}
                            <div class="input-group date col-sm-10" id="judgementDateTime" data-target-input="nearest">
                                {{Form::text('judgement_date', date('Y-m-d H:i'), ['class' => 'form-control datetimepicker-input', "data-target"=>"#judgementDateTime",'placeholder' => __('case.Judgement Date')])}}
                                <div class="input-group-append" data-target="#judgementDateTime" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>



                        @includeIf('customfield::fields', ['fields' => $fields, 'model' => null])
                        <div class="primary_input">
                            {{Form::label('judgement', __('case.Judgement'), ['class' => 'required'])}}
                            {{Form::textarea('judgement', null, ['class' => 'form-control summernote', 'placeholder' => __('case.Judgement'), 'rows' => 5, 'required', 'data-parsley-errors-container' => '#judgement_error' ])}}
                            <span id="judgement_error"></span>
                        </div>
                        @includeIf('case.file')

                        <div class="text-center mt-3">
                            <button class="btn btn-primary submit" type="submit"><i
                                    class="ti-check"></i>{{ __('common.Create') }}
                            </button>

                            <button class="btn btn-primary submitting" type="submit" disabled style="display: none;">
                                <i class="ti-check"></i>{{ __('common.Creating') . '...' }}
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
            $('#judgementDateTime').datetimepicker({ icons: { time: 'far fa-clock' } });
        });
    </script>
@endpush
