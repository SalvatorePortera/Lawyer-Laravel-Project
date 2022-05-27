@extends('layouts.master', ['title' => __('lawyer.Create New Lawyer')])

@section('mainContent')
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid pt-3">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="box_header">
                        <div class="main-title d-flex justify-content-between w-100">
                            <h3 class="mb-0 mr-30">{{__('lawyer.Add lawyer')}} </h3>
                            <h3>Allowed No of Lawyers : {{ getSystemSubscriptionAllowedLawyers() }}</h3>
                            <ul class="d-flex">
                                
                                <li>
                                    <a class="primary-btn semi_large2 fix-gr-bg" href="{{ route('lawyer.index') }}">
                                        {{ __('Back To Lawyers') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">    
                <div class="col-md-12">
                    <div class="white_box_50px box_shadow_white">
                        {!! Form::open(['route' => 'lawyer.store', 'class' => 'form-validate-jquery', 'id' =>
                        'content_form', 'files' => false, 'method' => 'POST']) !!}
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
                                    @if(getSystemSubscriptionAllowedLawyers()>0)
                                    {{Form::text('name', null, ['required' => '', 'class' => 'primary_input_field','placeholder' => __
                                    ('lawyer.Name')])}}
                                    @else
                                    {{Form::text('name', null, ['required' => '', 'class' => 'primary_input_field','disabled','placeholder' => __
                                    ('lawyer.Name')])}}
                                    @endif
                                </div>
                                <div class="primary_input">
                                    {{Form::label('mobile_no', __('lawyer.Mobile No'),['class' => 'required'] )}}
                                    @if(getSystemSubscriptionAllowedLawyers()>0)
                                    {{Form::number('mobile_no', null, ['required' => '', 'class' => 'primary_input_field', 'placeholder' => __('lawyer.Lawyer Mobile No')])}}
                                    @else
                                    {{Form::number('mobile_no', null, ['required' => '', 'class' => 'primary_input_field','disabled','placeholder' => __('lawyer.Lawyer Mobile No')])}}
                                    @endif
                                </div>

                                @if(moduleStatusCheck('EmailtoCL'))
                                    <div class="primary_input">
                                        {{Form::label('email', __('case.Email'))}}
                                        @if(getSystemSubscriptionAllowedLawyers()>0)
                                        {{Form::email('email', null, ['class' => 'primary_input_field', 'placeholder' => __('case.Email')])}}
                                        @else
                                        {{Form::email('email', null, ['class' => 'primary_input_field','disabled','placeholder' => __('case.Email')])}}
                                        @endif
                                    </div>
                                @endif

                                @includeIf('customfield::fields', ['fields' => $fields, 'model' => null])
                            </div>
                        </div>
                        <div class="row">
                            <div class="primary_input col-md-12">
                                    {{Form::label('description', __('lawyer.Description'))}}
                                    

                                    {{Form::textarea('description', null, ['class' => 'primary_textarea summernote', 'placeholder' =>
                                    __('lawyer.Lawyer Description'),'disabled', 'rows' => 15, 'maxlength' => 1500,
                                    'data-parsley-errors-container' =>
                                    '#description_error' ])}}
                                    <span id="description_error"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="text-center col-md-12 mt-3">
                                    @if(getSystemSubscriptionAllowedLawyers()>0)
                                    <button class="primary-btn fix-gr-bg semi_large2 submit"  type="submit"><i
                                            class="ti-check"></i>{{ __('common.Create') }}
                                    </button>

                                    <button class="primary-btn semi_large2 fix-gr-bg submitting" type="submit" disabled
                                            style="display: none;"><i class="ti-check"></i>{{ __('common.Creating') . '...' }}
                                    </button>
                                    @else
                                    <button class="primary-btn semi_large2 fix-gr-bg"  disabled>
                                        <i class="ti-check"></i>{{ __('common.Create') }}
                                    </button>                            
                                    @endif
                                    
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

