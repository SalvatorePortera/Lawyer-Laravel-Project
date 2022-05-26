@extends('layouts.master', ['title' => __('Manage Subscription')])

@section('mainContent')

<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid pt-3">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="box_header">
                    <div class="main-title d-flex justify-content-between w-100">
                        <h3 class="mb-0 mr-30">{{__('Add Subscription')}}</h3>
                            <ul class="d-flex">
                                <li>
                                    <a class="btn btn-primary mr-10" href="{{ route('subscriptions.index') }}">
                                        {{ __('Back To Subscriptions') }}
                                    </a>
                                </li>
                            </ul>
                    </div>
                </div>
            </div>
                <div class="col-12">
                    <div class="white_box_50px box_shadow_white">

                        {!! Form::open(['route' => 'subscriptions.store', 'class' => 'form-validate-jquery', 'id' =>
                        'content_form', 'files' => false, 'method' => 'POST']) !!}
                        
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="user">Activate Date:</label>
                                    <input type="date" class="form-control" name="activate_date" required="required" placeholder="Activate Date">
                                </div>
                                <div class="col-md-4">
                                    <label for="user">Allowed No of Lawyers:</label>
                                    <input type="number" class="form-control" name="allowed_no_lawyers"
                                       required="required"
                                       placeholder="Allowed No of Lawyers">
                                </div>
                                <div class="col-md-4">
                                    <label for="user">Disk Storage Limit:</label>
                                    <input type="text" class="form-control" name="disk_storage_limit"
                                       required="required"
                                       placeholder="Disk Storage Limit">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="user">Validity Period Type Value:</label>
                                    <input type="number" class="form-control" name="validity_period_type_value"
                                           required="required"
                                           placeholder="Validity Period Type Value">
                                </div>
                                <div class="col-md-6">
                                    <label for="purchasecode">Validity Period Type:</label>
                                    <select class="form-control" name="validity_period_type" required="required">
                                        <option value="" disabled selected>Select Type</option>
                                        <option value="day">Days</option>
                                        <option value="week">Weeks</option>
                                        <option value="month">Months</option>
                                        <option value="year">Years</option>
                                    </select>
                                </div>
                            </div>

                        <div class="text-center mt-3">
                        <button class="btn btn-primary submit" type="submit"><i class="ti-check"></i>{{ __('common.Create') }}
                        </button>

                        <button class="btn btn-primary submitting" type="submit" disabled style="display: none;"><i class="ti-check"></i>{{ __('common.Creating') . '...' }}
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

