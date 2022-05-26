@extends('layouts.master', ['title' => __('lawyer.Lawyer Details')])
@section('mainContent')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>{{ __('lawyer.Lawyer Info') }}</h1>
      </div>
      <div class="col-sm-6">
            
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
                    <div class="card card-widget widget-user">
                      <!-- Add the bg color to the header using any of the bg-* classes -->
                      <div class="widget-user-header bg-warning">
                        <div class="widget-user-image">
                          <img class="img-circle elevation-2" src="{{ asset('/')}}@if(isset($model) && $model->avatar!=''){{@$model->avatar}}@else{{'public/uploads/staff/user.png'}} @endif" alt="User Avatar">
                        </div>
                        <!-- /.widget-user-image -->
                        
                      </div>
                      <div class="card-footer p-0">
                        <ul class="nav flex-column">
                          <li class="nav-item">
                            <a href="#" class="nav-link">
                              {{ __('lawyer.Name') }} <span class="float-right">@if(isset($model)){{@$model->name}}@endif</span>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="#" class="nav-link">
                              {{ __('lawyer.Mobile') }} <span class="float-right">@if(isset($model)){{@$model->mobile_no}}@endif</span>
                            </a>
                          </li>
                          <li class="nav-item">
                              @if(permissionCheck('lawyer.edit'))
                                <a href="{{ route('lawyer.edit', $model->id) }}" class="btn btn-primary btn-sm btn-block">
                                    {{ __('common.Edit') }}
                                </a>
                            @endif
                          </li>
                        </ul>
                      </div>
                    </div>
                </div>
                <!-- Start Student Details -->
                <div class="col-lg-9 staff-details">
                    <ul class="nav nav-tabs tabs_scroll_nav" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#studentProfile" role="tab"
                               data-toggle="tab">{{ __('lawyer.Profile') }}</a>
                        </li>

                        <li class="nav-item edit-button">
                        
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <!-- Start Profile Tab -->
                        <div role="tabpanel" class="tab-pane fade show active" id="studentProfile">
                            <div class="white-box">
                                <h4 class="stu-sub-head">{{ __('lawyer.Personal Info') }}</h4>
                                <div class="single-info">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5">
                                            <div class="">
                                                {{ __('lawyer.Name') }}
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
                                                {{ __('lawyer.Mobile') }}
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
                                                {{ __('lawyer.Description') }}
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
