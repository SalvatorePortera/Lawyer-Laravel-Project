<div id="add_leave_define_modal">
    <div class="modal fade" id="leave_define_add">
        <div class="modal-dialog modal_800px modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        {{ __('common.Add New') }}
                        {{ __('leave.Leave Define') }}</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="ti-close"></i>
                    </button>
                </div>

                <div class="modal-body">
                    <form id="leave_define_create_form">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label class="primary_input_label" for="">{{ __('role.Role') }} *</label>
                                    <select onchange="getUserByRole(this)" class="form-control select2bs4 mb-25" name="role_id"
                                            required>
                                        <option selected value="">{{__('attendance.Choose One')}}</option>
                                        @foreach ($RoleList as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    <span id="role_id_error" class="text-danger"></span>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="primary_input_label"
                                           for="">{{ __('common.Select User') }}</label>
                                    <select class="form-control select2bs4 mb-15" name="user_id" id="user_id">
                                        <option selected value="">{{__('attendance.Choose One')}}</option>
                                        @isset($user_id)
                                            @foreach($staffs as $staff)
                                                <option
                                                    value="{{$staff->id}}" {{$staff->id == $user_id ? 'selected' :''}}>{{$staff->name}}</option>
                                            @endforeach
                                        @endisset

                                    </select>
                                    <span class="text-danger">{{$errors->first('user_id')}}</span>
                                </div>
                            </div>

                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label class="primary_input_label" for="">{{ __('leave.Leave Type') }} *</label>
                                    <select class="form-control select2bs4 mb-25" name="leave_type_id" required>
                                        @foreach ($LeaveTypeList as $type)
                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                    <span id="leave_type_id_error" class="text-danger"></span>
                                </div>
                            </div>

                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label id='details' class="primary_input_label" for="">{{ __('leave.Total Days') }}
                                        *</label>
                                    <input name="total_days" class="form-control name total_days" id="total_days_id"
                                           placeholder="{{ __('leave.Total Days') }}" type="number">
                                    <span id="total_days_error" class="text-danger"></span>
                                </div>
                            </div>

                            <div class="col-xl-12">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input name="balance_forward" id="status_active" onchange="setMaxForward(this)" value="1" class="custom-control-input" type="checkbox">
                                        <label for="status_active" class="custom-control-label">{{ __('leave.Balance Forward') }}</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-12 max_forward displayNone">
                                <div class="form-group">
                                    <label id='details' class="primary_input_label"
                                           for="">{{ __('leave.Max Forward Balance') }} *</label>
                                    <input name="max_forward" oninput="checkForwardBalance(this)"
                                           class="form-control name" placeholder="{{ __('leave.Total Days') }}"
                                           type="number">
                                    <span id="max_forward_error" class="text-danger"></span>
                                </div>
                            </div>

                            <div class="col-lg-12 text-center">
                                <div class="d-flex justify-content-center pt_20">
                                    <button type="submit" id="leave_define_create_form_button"
                                            class="btn btn-primary"><i class="ti-check"></i>
                                        {{ __('common.Save') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
