@extends('layouts.master', ['title' => __('lawyer.Update Lawyer')])

@section('mainContent')

    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid pt-3">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="box_header">
                        <div class="main-title d-flex justify-content-between w-100">
                            <h3 class="mb-0 mr-30">{{__('lawyer.Edit lawyer')}}</h3>

                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="white_box_50px box_shadow_white">
                        {!! Form::model($model, ['route' => ['lawyer.update', $model->id], 'class' =>
                        'form-validate-jquery',
                        'id' => 'content_form', 'method' => 'PUT']) !!}
                        <div class="row">
                            <div class="col-sm-6 col-md-4 text-center">
                                <div class="kv-avatar">
                                    <div class="file-loading">
                                        <input id="avatarImage" name="avatarImage" value="fasdf.jpg" type="file">

                                    </div>
                                </div>
                                <div class="kv-avatar-hint">
                                    <small>Select file < 1500 KB</small>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-8">
                                <div class="primary_input">
                                    {{Form::label('name', __('lawyer.Name'),['class' => 'required'])}}
                                    {{Form::text('name', null, ['required' => '', 'class' => 'primary_input_field', 'placeholder' => __
                                    ('lawyer.Name')])}}
                                </div>
                                <div class="primary_input">
                                    {{Form::label('mobile_no', __('lawyer.Mobile No'),['class' => 'required'])}}
                                    {{Form::number('mobile_no', null, ['required' => '', 'class' => 'primary_input_field', 'placeholder' => __('lawyer.Lawyer Mobile No')])}}
                                </div>

                                @if(moduleStatusCheck('EmailtoCL'))
                                    <div class="primary_input">
                                        {{Form::label('email', __('case.Email'))}}
                                        {{Form::email('email', null, ['class' => 'primary_input_field', 'placeholder' => __('case.Email')])}}
                                    </div>
                                @endif

                                @includeIf('customfield::fields', ['fields' => $fields, 'model' => $model])
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="primary_input">
                                    {{Form::label('description', __('lawyer.Description'))}}
                                    {{Form::textarea('description', null, ['class' => 'primary_input_field summernote', 'placeholder' => __('lawyer.Case Category Description'), 'rows' => 5 ])}}
                                </div>

                                <div class="text-center mt-3">
                                    <button class="primary-btn semi_large2 fix-gr-bg submit" type="submit"><i
                                            class="ti-check"></i>{{ __('common.Update') }}
                                    </button>

                                    <button class="primary-btn semi_large2 fix-gr-bg submitting" type="submit" disabled
                                            style="display: none;"><i class="ti-check"></i>{{ __('common.Updating') . '...' }}
                                    </button>

                                </div>
                            </div>
                        </div>

                        
                        {!! Form::close() !!}

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
    <script type="text/javascript">
    $("#avatarImage").fileinput({
        overwriteInitial: true,
        maxFileSize: 1500,
        showClose: false,
        showCaption: false,
        showBrowse: false,
        browseOnZoneClick: true,
        removeLabel: '',
        removeIcon: '<i class="fa fa-times"></i>',
        removeTitle: 'Cancel or reset changes',
        elErrorContainer: '#kv-avatar-errors-2',
        msgErrorClass: 'alert alert-block alert-danger',
        defaultPreviewContent: '<img src="'+SET_DOMAIN +'/<?php if(isset($model) && $model->avatar!='') echo $model->avatar; else echo 'public/uploads/staff/user.png';?>'+'" alt="Your Avatar"><h6 class="text-muted">Click to select</h6>',
        layoutTemplates: {main2: '{preview} ' + ' {remove} {browse}'},
        allowedFileExtensions: ["jpg", "png", "gif"]
    });
    </script>
@endpush

