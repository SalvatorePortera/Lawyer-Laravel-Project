@extends('layouts.master', ['title' => 'Payroll'])
@section('mainContent')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>{{ __('payroll.Payroll') }}</h1>
      </div>
      <div class="col-sm-6">

     </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                <div class="card-body">
                    <form class="" action="{{ route('staff_search_for_payroll') }}" method="GET">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="primary_input mb-15">
                                    <label class="primary_input_label" for="">{{ __('payroll.Select Role') }}</label>
                                    <select class="form-control select2bs4 mb-15" name="role_id" id="role_id">
                                        <option selected disabled>{{__('payroll.Choose One')}}</option>
                                        @foreach (\Modules\RolePermission\Entities\Role::where('type', 'regular_user')->get() as $role)
                                            @isset($r)
                                                <option value="{{ $role->id }}"@if ($r == $role->id) selected @endif>{{ $role->name }}</option>
                                            @else
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endisset
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{$errors->first('role_id')}}</span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="primary_input mb-15">
                                    <label class="primary_input_label" for="">{{ __('payroll.Select Month') }}</label>
                                    <select class="form-control select2nsb mb-15" name="month" id="month">
                                        @foreach ($months as $month)
                                            @isset($m)
                                                <option value="{{ $month }}"@if ($m == $month) selected @endif>{{ __('common.'.$month) }}</option>
                                            @else
                                                <option value="{{ $month }}" {{date('F') == $month ? 'selected' : ''}} >{{ __('common.'.$month) }}</option>
                                            @endisset
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{$errors->first('month')}}</span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="primary_input mb-15">
                                    <label class="primary_input_label" for="">{{ __('payroll.Select Year') }}</label>
                                    <select class="form-control select2nsb mb-15" name="year" id="year">
                                        @foreach (range(\carbon\Carbon::now()->year, 2015) as $year)
                                            @isset($y)
                                                <option value="{{ $year }}"@if ($y == $year) selected @endif>{{ $year }}</option>
                                            @else
                                                <option value="{{ $year }}">{{ $year }}</option>
                                            @endisset

                                        @endforeach'
                                    </select>
                                    <span class="text-danger">{{$errors->first('year')}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 mb-2 mt-3 text-right">
                                {{-- <div class="d-flex"> --}}
                                    <button type="submit" class="btn btn-sm btn-primary"id="save_button_parent"><i class="ti-search"></i>
                                    {{ __('payroll.Search') }}</button>
                                {{-- </div> --}}
                            </div>
                        </div>
                    </form>
                </div></div>
            </div>
        </div>
            @isset($users)
        <div class="row">
                <div class="col-lg-12">

                        <div class="card">
                            <!-- table-responsive -->
                            <div class="card-body">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">{{ __('common.SL') }}</th>
                                            <th scope="col">{{ __('staff.Staff') }}</th>
                                            <th scope="col">{{ __('role.Role') }}</th>
                                            <th scope="col">{{ __('payroll.Phone') }}</th>
                                            <th scope="col">{{ __('payroll.Basic Salary') }}</th>
                                            <th scope="col">{{ __('common.Status') }}</th>
                                            <th scope="col">{{ __('common.Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $key => $user)
                                            @if ($user->staff)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $user->name }}</td>

                                                    <td>
                                                        @if ($user->role)
                                                            {{ @$user->role->name }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($user->staff)
                                                            {{ @$user->staff->phone }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($user->staff)
                                                            {{ @$user->staff->basic_salary }}
                                                        @endif
                                                    </td>

                                                    @php
                                                        if ($user->staff) {
                                                            $getPayrollDetails = \Modules\Payroll\Entities\Payroll::getPayrollDetails($user->staff->id, $m, $y);
                                                        }
                                                    @endphp
                                                    <td>
                                                    <div class="dropdown CRM_dropdown">
                                                        @if(!empty($getPayrollDetails))
                                                            @if($getPayrollDetails->payroll_status == 'G')
                                                            <button class="btn btn-block btn-sm btn-warning"> {{ __('payroll.Generated') }}</button>
                                                            @endif

                                                           @if($getPayrollDetails->payroll_status == 'P')
                                                            <button class="btn btn-block btn-sm btn-white"> {{ __('payroll.Paid') }}</button>
                                                            @endif
                                                            @else
                                                            <button class="btn btn-block btn-sm btn-danger">{{ __('payroll.Not generated') }}</button>

                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td>
                                                    <div class="dropdown CRM_dropdown">
                                                        @if(!empty($getPayrollDetails))
                                                            @if($getPayrollDetails->payroll_status == 'G')
                                                                <a title="Proceed to pay" onclick="payrollPayment({{ $getPayrollDetails->id }},{{ $user->role_id }})"><button class="btn btn-block btn-outline-primary btn-sm">{{ __('payroll.Proceed To Pay') }}</button></a>
                                                                <div class="mt-1"></div>
                                                                <a onclick="viewSlip({{ $getPayrollDetails }})" data-toggle="modal" data-target="#SlipForm"><button class="btn btn-block btn-outline-primary btn-sm">{{ __('payroll.View PaySlip') }}</button></a>
                                                            @endif
                                                            @if($getPayrollDetails->payroll_status == 'P')
                                                                <a onclick="viewSlip({{ $getPayrollDetails }})" data-toggle="modal" data-target="#SlipForm"><button class="btn btn-block btn-outline-primary btn-sm">{{ __('payroll.View PaySlip') }}</button></a>
                                                            @endif
                                                        @else
                                                            <a class="" href="{{ url('hr/payroll/generate-Payroll/'.$user->id.'/'.$m.'/'.$y)}}"><button class="btn btn-block btn-outline-primary btn-sm"> {{ __('payroll.Generate Payroll') }}</button></a>
                                                        @endif
                                                    </div>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                </div>
            @endisset
        </div>
    </div>
</section>
<div class="form_payment">

</div>
<div class="modal fade admin-query" id="SlipForm">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('payroll.View Payslip Details') }}</h4>
                <button type="button" onclick="modal_close()" class="close" data-dismiss="modal">
                    <i class="ti-close"></i>
                </button>
            </div>

            <div class="modal-body">
                <div id="printablePos">
                    <div class="row mb-25">
                        <div class="col-lg-12 text-center">
                            <h2>d{{ config('configs')->where('key','company_name')->first()->value }}</h3>
                            <h4>{{ config('configs')->where('key','address')->first()->value }}</h6>
                        </div>
                        <div class="col-lg-12 text-center">
                            <h4>{{ __('payroll.Payslip for the period of') }}<span class="period"></span></h5>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5 payslip">
                            <p>{{ __('payroll.Payslip') }} - <span class="payroll_id"></span></p>
                        </div>
                        <div class="col-md-7 text-right">
                            <p class="payment_date"></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <dl class="row">
                                <dt class="col-md-5">{{ __('common.Name') }}:</dt>
                                <dd class="col-md-7 primary_input_label user_name"></dd>
                                <dt class="col-md-5 primary_input_label" for="">{{ __('payroll.Payment Method') }}:</dt>
                                <dd class="col-md-7 primary_input_label payment_mode" for=""></dd>
                                <dt class="col-md-5 primary_input_label" for="">{{ __('payroll.Basic Salary') }}:</dt>
                                <dd class="col-md-7 primary_input_label basic_salary" for=""></dd>
                                <dt class="col-md-5 primary_input_label" for="">{{ __('payroll.Total Earning') }}:</dt>
                                <dd class="col-md-7 primary_input_label total_earning" for=""></dd>
                                <dt class="col-md-5 primary_input_label" for="">{{ __('payroll.Total Deduction') }}:</dt>
                                <dd class="col-md-7 primary_input_label total_deduction" for=""></dd>
                                <dt class="col-md-5 primary_input_label" for="">{{ __('payroll.Net Salary') }}:</dt>
                                <dd class="col-md-7 primary_input_label net_salary" for=""></dd>
                                <dt class="col-md-5 primary_input_label" for="">{{ __('payroll.Gross Salary') }}:</dt>
                                <dd class="col-md-7 primary_input_label gross_salary" for=""></dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <a href="" target="_blank" class="btn btn-primary mr-2 pdf_btn">{{__('payroll.PDF')}}</a>
                    <button type="button" onclick="printDiv('printablePos')" class="btn btn-primary mr-2">{{__('common.Print')}}</button>
                    <button type="button" onclick="modal_close()" class="btn btn-primary">{{__('common.Close')}}</button>
                </div>
            </div>

        </div>
    </div>
</div>
<input type="hidden" name="app_base_url" id="app_base_url" value="{{ URL::to('/') }}">
@include('backEnd.partials.delete_modal')
@endsection
@push('scripts')
    <script type="text/javascript">
        function payrollPayment(el, role_id)
        {
            $.post('{{ route('payroll_payment_modal') }}',{_token:'{{ csrf_token() }}', id:el, role_id:role_id}, function(data){
                $(".form_payment").html(data);
                $('#PaymentForm').modal('show');
                $('.date').datepicker('setDate', new Date());
                $('.datetime').datetimepicker({format : 'YYYY-MM-DD H:mm'});
                $('select').niceSelect();
            });
        }
        function printDiv(divName) {
                var printContents = document.getElementById(divName).innerHTML;
                var originalContents = document.body.innerHTML;
                document.body.innerHTML = printContents;
                window.print();
                document.body.innerHTML = originalContents;
                setTimeout(function(){ window.location.reload(); }, 15000);
            }
            function modal_close(){
                $('#SlipForm').remove();
                $('.modal-backdrop').remove();
            }

        function viewSlip(payroll)
        {
            let currency = '{{config('configs')->where('key','currency_symbol')->first()->value}}';
            $('.period').text(' '+payroll.payroll_month+' - '+payroll.payroll_year);
            $('.payroll_id').text(payroll.id);
            $('.payment_date').text(payroll.payment_date);
            $('.user_name').text(payroll.staff.user.name);
            if (payroll.payment_mode ==  null) {
                $('.payment_mode').text("Not Payment Yet.");
            }
            else {
                $('.payment_mode').text(payroll.payment_mode);
            }
            $('.basic_salary').text(currency +' '+payroll.basic_salary);
            $('.total_earning').text(currency +' '+payroll.total_earning);
            $('.total_deduction').text(currency +' '+payroll.total_deduction);
            $('.net_salary').text(currency +' '+payroll.net_salary);
            $('.gross_salary').text(currency +' '+payroll.gross_salary);
            var baseUrl = $('#app_base_url').val();
            var url = baseUrl + "/hr/payroll/pdf/" + payroll.id;
            $('.pdf_btn').attr('href', url);
        }
    </script>
@endpush
