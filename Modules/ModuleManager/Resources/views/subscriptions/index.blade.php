@extends('layouts.master', ['title' => __('Manage Subscriptions')])
@section('mainContent')
<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid pt-3">
        <div class="row justify-content-center">
                <div class="col-12">
                    <div class="box_header common_table_header xs_mb_0">
                        <div class="main-title d-md-flex">
                            <h3 class="mb-0 mr-30 mb_xs_15px mb_sm_20px" >{{ __('Subscriptions') }}</h3>
                            <ul class="d-flex">
                            @if(permissionCheck('subscriptions.store'))
                                <li>
                                    <a class="primary-btn mr-10 fix-gr-bg" href="{{ route('subscriptions.create') }}"><i class="ti-plus"></i>
                                        {{ __('Add Subscription') }}
                                    </a>
                                </li>
                            @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="QA_section QA_section_heading_custom check_box_table">
                        <div class="QA_table ">
                            <!-- table-responsive -->
                            <div class="">
                                <table class="table Crm_table_active3">
                                    <thead>
                                        <tr>
                                            <th scope="col">{{ __('common.SL') }}</th>
                                            <th>{{ __('Activate Date') }}</th>
                                            <th>{{ __('Allowed No of Lawyers') }}</th>
                                            <th>{{ __('Validity Period Type Value') }}</th>
                                            <th>{{ __('Validity Period Type') }}</th>
                                            <th>{{ __('Expiry Date') }}</th>
                                            <th>{{ __('Disk Storage Limit') }}</th>
                                            <th>{{ __('common.Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($models as $model)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $model->activate_date }}</td>
                                            <td>{{ $model->allowed_no_lawyers }}</td>
                                            <td>{{ $model->validity_period_type_value }}</td>
                                            <td>{{ ucfirst($model->validity_period_type) }}</td>
                                            <td>{{ $model->expiry_date }}</td>
                                            <td>{{ $model->disk_storage_limit }}</td>
                                            <td>
                                                <div class="dropdown CRM_dropdown">
                                                    <button class="primary-btn fix-gr-bg bg-hover-yellow dropdown-toggle" type="button"
                                                            id="dropdownMenu2" data-toggle="dropdown"
                                                            aria-haspopup="true"
                                                            aria-expanded="false">
                                                        {{ __('common.Select') }}
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                                                    @if(permissionCheck('subscriptions.edit'))
                                                    <a href="{{ route('subscriptions.edit', $model->id) }}"
                                                    class="dropdown-item"><i class="icon-pencil"></i>  {{ __('common.Edit') }}</a>
                                                    @endif
                                                    @if(permissionCheck('subscriptions.destroy'))
                                                    <a href="#" data-id="{{ $model->id }}" data-url="{{ route
                                                    ('subscriptions.destroy', $model->id)
                                                    }}" class="dropdown-item delete_item"><i class="icon-trash"></i>  {{ __('common.Delete') }}</a>
                                                    @endif 
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop


