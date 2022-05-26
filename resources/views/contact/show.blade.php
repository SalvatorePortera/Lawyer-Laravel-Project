@extends('layouts.master', ['title' => __('contact.Contact Details')])
@section('mainContent')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>{{ __('contact.Contact Details') }}</h1>
      </div>
      <div class="col-sm-6">
        <a class="btn btn-primary float-sm-right" href="{{ route('contact.index') }}">
            <i class="fa fa-list"></i> {{ __('contact.Contact List') }}
        </a>
    </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
    <section class="mb-40 student-details">
        @if(session()->has('message-success'))
            <div class="alert alert-success">
                {{ session()->get('message-success') }}
            </div>
        @elseif(session()->has('message-danger'))
            <div class="alert alert-danger">
                {{ session()->get('message-danger') }}
            </div>
        @endif
        <div class="container-fluid pt-3">
            <div class="row">
                <div class="col-lg-3">
                    <!-- Start Student Meta Information -->
                    <div class="student-meta-box">
                        <div class="student-meta-top"></div>
                        <img class="student-meta-img img-100"
                             src="{{ asset('/')}}@if(isset($model) && $model->avatar!=''){{@$model->avatar}}@else{{'public/uploads/staff/user.png'}} @endif "
                             alt="">
                        <div class="white-box">
                            <div class="single-meta mt-10">
                                <div class="d-flex justify-content-between">
                                    <div class="name">
                                        {{ __('contact.Name') }}
                                    </div>
                                    <div class="value">
                                        @if(isset($model)){{@$model->name}}@endif
                                    </div>
                                </div>
                            </div>

                            <div class="single-meta">
                                <div class="d-flex justify-content-between">
                                    <div class="name">
                                        {{ __('contact.Mobile') }}
                                    </div>
                                    <div class="value">
                                        @if(isset($model)){{@$model->mobile_no}}@endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Student Meta Information -->
                </div>
                <!-- Start Student Details -->
                <div class="col-lg-9 staff-details">
                    <ul class="nav nav-tabs tabs_scroll_nav d-flex justify-content-between" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#studentProfile" role="tab"
                               data-toggle="tab">{{ __('contact.Profile') }}</a>
                        </li>

                        <li class="nav-item edit-button">
                            @if(permissionCheck('contact.edit'))
                                <a href="{{ route('contact.edit', $model->id) }}" class="btn btn-primary"
                                >{{ __('common.Edit') }}
                                </a>
                            @endif
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <!-- Start Profile Tab -->
                        <div role="tabpanel" class="tab-pane fade show active" id="studentProfile">
                            <div class="white-box">
                                <h4 class="stu-sub-head">{{ __('contact.Contact Info') }}</h4>
                                <div class="single-info">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5">
                                            <div class="">
                                                {{ __('contact.Name') }}
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-6">
                                            <div class="">
                                                @if(isset($model)){{$model->name}}@endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-info">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5">
                                            <div class="">
                                                {{ __('contact.Mobile') }}
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-6">
                                            <div class="">
                                                @if(isset($model)){{$model->mobile_no}}@endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-info">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5">
                                            <div class="">
                                                {{ __('contact.Email') }}
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-6">
                                            <div class="">
                                                @if(isset($model)){{$model->email}}@endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-info">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5">
                                            <div class="">
                                                {{ __('contact.Category') }}
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-6">
                                            <div class="">
                                                @if(isset($model->category)){{$model->category->name}}@endif
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="single-info">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5">
                                            <div class="">
                                                {{ __('contact.Description') }}
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-6">
                                            <div class="">
                                                @if(isset($model)){!! $model->description !!}@endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @if(moduleStatusCheck('CustomField') and $model->customFields)
                                    @includeIf('customfield::details.show', ['customFields' => $model->customFields])
                                @endif


                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@push('admin.scripts')
    <script type="text/javascript">

    </script>
@endpush
