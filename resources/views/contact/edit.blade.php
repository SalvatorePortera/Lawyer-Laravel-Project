@extends('layouts.master', ['title' => __('contact.Update Contact')])


@section('mainContent')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>{{__('contact.Edit Contact')}}</h1>
      </div>
      <div class="col-sm-6">
            <ul class="breadcrumb float-sm-right">
                <li>
                    <a class="btn btn-primary mr-10 float-sm-right" href="{{ route('contact.index') }}">
                        <i class="fa fa-list"></i>  {{__('contact.Contact List')}}
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
                        {!! Form::model($model, ['route' => ['contact.update', $model->id], 'class' =>
                          'form-validate-jquery', 'id' => 'content_form', 'method' => 'PUT']) !!}
                        <div class="row">
                            <div class="col-12 col-sm-6 col-xl-2 text-center">
                                <div class="kv-avatar">
                                    <div class="file-loading">
                                        <input id="avatarImage" name="avatarImage" value="fasdf.jpg" type="file">

                                    </div>
                                </div>
                                <div class="kv-avatar-hint">
                                    <small>Select file < 1500 KB</small>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-xl-10">
                                <div class="row">
                                    <div class="primary_input col-md-12">
                                        <div class="d-flex justify-content-between">
                                            {{Form::label('contact_category_id', __('contact.Category'))}}
                                            @if(permissionCheck('category.contact.store'))
                                                <label class="primary_input_label green_input_label" for="">
                                                    <a href="{{ route('category.contact.create', ['quick_add' => true]) }}"
                                                       class="btn-modal"
                                                       data-container="contact_category_add_modal">{{ __('case.Create New') }}
                                                        <i class="fas fa-plus-circle"></i></a></label>
                                            @endif
                                        </div>
                                        {{Form::select('contact_category_id', $contact_categories, null, ['class' => 'form-control select2bs4', 'data-placeholder' => __('contact.Select Designation'),  'data-parsley-errors-container' => '#contact_category_id_error'])}}
                                        <span id="contact_category_id_error"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="primary_input col-md-12">
                                        <div class="d-flex justify-content-between">
                                        {{Form::label('name', __('contact.Name'), ['class' => 'required'])}}
                                        </div>
                                        {{Form::text('name', null, ['required' => '','class' => 'form-control', 'placeholder' => __('contact.Name')])}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="primary_input col-md-6">
                                        <div class="d-flex justify-content-between">
                                        {{Form::label('mobile_no', __('contact.Mobile No'))}}
                                        </div>
                                        {{Form::text('mobile_no', null, ['class' => 'form-control ', 'placeholder' => __('contact.Mobile No')])}}
                                    </div>
                                    <div class="primary_input col-md-6">
                                        <div class="d-flex justify-content-between">
                                        {{Form::label('email', __('contact.Email'))}}
                                        </div>
                                        {{Form::email('email', null, ['class' => 'form-control', 'placeholder' => __('contact.Email')])}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @includeIf('customfield::fields', ['fields' => $fields, 'model' => $model])
                        <div class="primary_input">
                            {{Form::label('description', __('contact.Description'))}}
                            {{Form::textarea('description', null, ['class' => 'form-control summernote', 'placeholder' => __('contact.Contact Description'), 'rows' => 5, 'data-parsley-errors-container' =>
                            '#description_error' ])}}
                            <span id="description_error"></span>
                        </div>
                        <div class="text-center mt-3">

                            <button class="btn btn-primary submit" type="submit"><i
                                    class="ti-check"></i>{{ __('common.Update') }}
                            </button>

                            <button class="btn btn-primary submitting" type="submit" disabled style="display: none;">
                                <i class="ti-check"></i>{{ __('common.Updating') . '...' }}
                            </button>

                        </div>
                        {!! Form::close() !!}

                    </div></div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade animated contact_category_add_modal infix_advocate_modal" id="remote_modal" tabindex="-1"
         role="dialog"
         aria-labelledby="remote_modal_label" aria-hidden="true" data-backdrop="static">
    </div>

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
