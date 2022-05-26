@extends('layouts.master', ['title' =>'Payroll'])
@section('mainContent')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>{{ __('payroll.Generate Payroll') }}</h1>
      </div>
      <div class="col-sm-6">

     </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<section class="student-details">
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-lg-6">
                    <!-- Widget: user widget style 2 -->
                    <div class="card card-widget widget-user-2">
                      <!-- Add the bg color to the header using any of the bg-* classes -->
                      <div class="widget-user-header bg-warning">
                        <div class="widget-user-image">
                          <img class="img-circle elevation-2" src="{{asset($staffDetails->avatar ?? 'public/backEnd/img/staff.jpg')}}" alt="User Avatar">
                        </div>
                        <!-- /.widget-user-image -->
                        <h3 class="widget-user-username">@if(isset($staffDetails)){{$staffDetails->name}}@endif</h3>
                        <h5 class="widget-user-desc">@if(isset($staffDetails)){{$staffDetails->role->name}}@endif</h5>
                      </div>
                      <div class="card-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <dl class="row">
                                    <dt class="col-md-1"></dt>
                                    <dt class="col-md-2">{{ __('common.Name') }}</dt>
                                    <dd class="col-md-3">@if(isset($staffDetails)){{$staffDetails->name}}@endif</dd>
                                    <dt class="col-md-2">{{ __('payroll.Month') }}</dt>
                                    <dd class="col-md-3">
                                        <div class="d-flex">
                                            <div class="value" data-toggle="tooltip" title="{{ __('attendance.Present') }}">
                                               {{ __('attendance.P') }}
                                            </div>
                                            <div class="value ml-20" data-toggle="tooltip" title="{{ __('attendance.Late') }}">
                                                {{ __('attendance.L') }}
                                            </div>
                                            <div class="value ml-20" data-toggle="tooltip" title="{{ __('attendance.Absent') }}">
                                                {{ __('attendance.A') }}
                                            </div>
                                            <div class="value ml-20" data-toggle="tooltip" title="{{ __('attendance.Half Day') }}">
                                                {{ __('attendance.F') }}
                                            </div>
                                            <div class="value ml-20" data-toggle="tooltip" title="{{ __('attendance.Holiday') }}">
                                                {{ __('attendance.H') }}
                                            </div>
                                        </div>
                                    </dd>
                                </dl>
                                <dl class="row">
                                    <dt class="col-md-1"></dt>
                                    <dt class="col-md-2">{{ __('common.Phone') }}</dt>
                                    <dd class="col-md-3">@if(isset($staffDetails) && $staffDetails->staff){{$staffDetails->staff->phone}}@endif</dd>
                                    <dt class="col-md-2">{{ __('common.'.$payroll_month) }}</dt>
                                    <dd class="col-md-3"><div class="d-flex">
                                        <div class="value mr-20">
                                                {{$p}}
                                            </div>
                                            <div class="value mr-20">
                                                {{$l}}
                                            </div>
                                            <div class="value mr-20">
                                                {{$a}}
                                            </div>
                                            <div class="value mr-20">
                                                {{$f}}
                                            </div>
                                            <div class="value mr-20">
                                                {{$h}}
                                            </div></div></dd>
                                </dl>
                                <dl class="row">
                                    <dt class="col-md-1"></dt>
                                    <dt class="col-md-2">{{ __('role.Role') }}</dt>
                                    <dd class="col-md-3">@if(isset($staffDetails)){{$staffDetails->role->name}}@endif</dd>

                                </dl>
                                <dl class="row">
                                    <dt class="col-md-1"></dt>
                                    <dt class="col-md-2">{{ __('common.Email') }}</dt>
                                    <dd class="col-md-3">@if(isset($staffDetails)){{$staffDetails->email}}@endif</dd>
                                </dl>
                                <dl class="row">
                                    <dt class="col-md-1"></dt>
                                    <dt class="col-md-2">{{ __('common.Date of Joining') }}</dt>
                                    <dd class="col-md-3">@if(isset($staffDetails) && $staffDetails->staff)
                                                   {{ $staffDetails->staff->date_of_joining ? formatDate($staffDetails->staff->date_of_joining) : ''}}
                                                @endif</dd>
                                </dl>
                            </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.widget-user -->
            </div>
        </div>
    </div>
</section>
 <form class="" action="{{ route('save_payroll') }}" method="post" enctype="multipart/form-data">
     @csrf
     <section class="">
         <div class="container-fluid pt-3">
             <div class="row">
                 <div class="col-lg-4 no-gutters">
                    <div class="card">
                         <div class="card-header">
                            <h3 class="card-title">{{ __('payroll.Earnings') }}</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-sm btn-primary icon-only" onclick="addMoreEarnings()">
                                     <i class="fa fa-plus"></i>
                                </button>
                            </div>
                         </div>

                         <div class="card-body">
                             <table class="w-100 table-responsive" id="tableID">
                                 <tbody id="addEarningsTableBody">
                                     <tr id="row0">
                                         <td width="80%" class="pr-30">
                                             <div class="mt-10">
                                                 <input class="form-control" type="text" id="earningsType0" name="earningsType[]" placeholder="{{ __('payroll.Type') }}">
                                             </div>
                                         </td>
                                         <td width="20%">
                                             <div class="mt-10">
                                                 <input class="form-control" type="number" oninput="this.value = Math.abs(this.value)" id="earningsValue0" placeholder="{{ __('payroll.Value') }}" name="earningsValue[]">
                                             </div>
                                         </td>

                                     </tr>
                                 </tbody>
                             </table>
                         </div>
                    </div>
                 </div>

                 <div class="col-lg-4 no-gutters">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('payroll.Deductions') }}</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-sm btn-primary icon-only" onclick="addDeductions()">
                                    <span class="fa fa-plus"></span>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                             <table class="table table-responsive" id="tableDeduction">
                                 <tbody id="addDeductionsTableBody">
                                     @isset($loans)
                                         @if (count($loans) > 0)
                                             @foreach ($loans as $key => $loan)
                                                 <input type="hidden" name="loan_id[]" value="{{ $loan->id }}">
                                                 <input type="hidden" name="paid_loans[]" value="{{ $loan->monthly_installment }}">
                                                 <tr id="DeductionRow{{ $key+1 }}">
                                                     <td width="60%" class="pr-30">
                                                         <div class="mt-10">
                                                             <input class="form-control" placeholder="{{ __('payroll.Type') }}" type="text" id="deductionstype0" name="deductionstype[]" value="{{ $loan->title }}" readonly>
                                                         </div>
                                                     </td>
                                                     <td width="20%">
                                                         <div class="mt-10">
                                                             <input class="form-control" placeholder="{{ __('payroll.Value') }}" type="number" oninput="this.value = Math.abs(this.value)" value="{{ $loan->monthly_installment }}" id="deductionsValue0" name="deductionsValue[]">
                                                         </div>
                                                     </td>

                                                 </tr>
                                             @endforeach
                                         @else
                                             <tr id="DeductionRow0">
                                                 <td width="60%" class="pr-30">
                                                     <div class="mt-10">
                                                         <input class="form-control" placeholder="{{ __('payroll.Type') }}" type="text" id="deductionstype0" name="deductionstype[]">
                                                     </div>
                                                 </td>
                                                 <td width="20%">
                                                     <div class="mt-10">
                                                         <input class="form-control" type="number" placeholder="{{ __('payroll.Value') }}" oninput="this.value = Math.abs(this.value)" id="deductionsValue0" name="deductionsValue[]">
                                                     </div>
                                                 </td>

                                             </tr>
                                         @endif

                                         @else
                                          <tr id="DeductionRow0">
                                                 <td width="60%" class="pr-30">
                                                     <div class="mt-10">
                                                         <input class="form-control" placeholder="{{ __('payroll.Type') }}" type="text" id="deductionstype0" name="deductionstype[]">
                                                     </div>
                                                 </td>
                                                 <td width="20%">
                                                     <div class="mt-10">
                                                         <input class="form-control" placeholder="{{ __('payroll.Value') }}" type="number" oninput="this.value = Math.abs(this.value)" id="deductionsValue0" name="deductionsValue[]">
                                                     </div>
                                                 </td>

                                             </tr>
                                     @endisset
                                 </tbody>
                                </table>
                            </div>
                        </div>
                 </div>

                 <div class="col-lg-4 no-gutters">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('payroll.Payroll Summary') }}</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-sm btn-primary" onclick="calculateSalary()">
                                     {{ __('payroll.Calculate') }}
                                </button>
                                <input type="hidden" name="staff_id" @if ($staffDetails->staff) value="{{$staffDetails->staff->id}}" @endif>
                                <input type="hidden" name="payroll_month" value="{{$payroll_month}}">
                                <input type="hidden" name="payroll_year" value="{{$payroll_year}}">
                                <input type="hidden" name="role_id" value="{{$staffDetails->role_id}}">
                            </div>
                        </div>
                     <div class="card-body">
                        <table class="table table-responsive">
                             <tbody class="d-block">
                                 <tr class="d-block">
                                     <td width="100%" class="pr-30 d-block">
                                         <label class="primary_input_label" for="">{{ __('payroll.Basic Salary') }}</label>
                                         <input name="basic_salary" id="basicSalary" readonly class="form-control" type="text" @if ($staffDetails->staff) value="{{$staffDetails->staff->basic_salary}}" @endif>
                                     </td>
                                 </tr>
                                 <tr class="d-block">
                                     <td width="100%" class="pr-30 d-block">
                                         <label class="primary_input_label" for="">{{ __('payroll.Earnings') }}</label>
                                         <input name="total_earnings" id="total_earnings" readonly class="form-control" type="text" value="0">
                                     </td>
                                 </tr>
                                 <tr class="d-block">
                                     <td width="100%" class="pr-30 d-block">
                                         <label class="primary_input_label" for="">{{ __('payroll.Deductions') }}</label>
                                         <input name="total_deduction" id="total_deduction" readonly class="form-control" type="text" value="0">
                                     </td>
                                 </tr>
                                 <tr class="d-block">
                                     <td width="100%" class="pr-30 d-block">
                                         <label class="primary_input_label" for="">{{ __('payroll.Gross Salary') }}</label>
                                         <input name="final_gross_salary" id="final_gross_salary" readonly class="form-control" type="text" value="0">
                                     </td>
                                 </tr>
                                 <tr class="d-block">
                                     <td width="100%" class="pr-30 d-block">
                                         <label class="primary_input_label" for="">{{ __('payroll.Tax') }}</label>
                                         <input name="tax" id="tax" class="form-control" type="text" value="0">
                                     </td>
                                 </tr>
                                 <tr class="d-block">
                                     <td width="100%" class="pr-30 d-block">
                                         <div class="mt-30 mb-30">
                                             <input class="form-control{{ $errors->has('net_salary') ? ' is-invalid' : '' }}" readonly type="text" id="net_salary" name="net_salary">
                                             <label for="net_salary"{{ __('payroll.Net Salary') }}></label>
                                             <span class="focus-border"></span>

                                             @if ($errors->has('net_salary'))
                                             <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $errors->first('net_salary') }}</strong>
                                             </span>
                                             @endif
                                         </div>
                                     </td>
                                 </tr>

                                 <tr class="d-block">
                                    <td width="100%" class="pr-30 d-block">
                                        <div class="col-lg-12 mt-20 text-center">
                                            <button class="btn btn-primary">
                                                <span class="ti-check"></span>
                                                {{ __('common.Save') }}
                                            </button>
                                        </div>
                                    </td>
                                 </tr>
                             </tbody>
                         </table>
                     </div>
                    </div>



                 </div>
             </div>
         </div>

     </section>
 </form>

<!-- End Modal Area -->
@endsection
@push('scripts')
    <script type="text/javascript">
    // payroll calculate for staff
     function calculateSalary() {
        var basicSalary = $("#basicSalary").val();
        if (basicSalary == 0) {
            toastr.warning('Please Add Employees Basic Salary from Staff Update Form First');
        } else {
            var earningsType = document.getElementsByName('earningsValue[]');
            var earningsValue = document.getElementsByName('earningsValue[]');
            var tax = $("#tax").val();
            var total_earnings = 0;
            var total_deduction = 0;
            var deductionstype = document.getElementsByName('deductionstype[]');
            var deductionsValue = document.getElementsByName('deductionsValue[]');
            for (var i = 0; i < earningsValue.length; i++) {
                var inp = earningsValue[i];
                if (inp.value == '') {
                    var inpvalue = 0;
                } else {
                    var inpvalue = inp.value;
                }
                total_earnings += parseInt(inpvalue);
            }
            for (var j = 0; j < deductionsValue.length; j++) {
                var inpd = deductionsValue[j];
                if (inpd.value == '') {
                    var inpdvalue = 0;
                } else {
                    var inpdvalue = inpd.value;
                }
                total_deduction += parseInt(inpdvalue);
            }
            var gross_salary = parseInt(basicSalary) + parseInt(total_earnings) - parseInt(total_deduction);
            var net_salary = parseInt(basicSalary) + parseInt(total_earnings) - parseInt(total_deduction) - parseInt(tax);

            $("#total_earnings").val(total_earnings);
            $("#total_deduction").val(total_deduction);
            $("#gross_salary").val(gross_salary);
            $("#final_gross_salary").val(gross_salary);
            $("#net_salary").val(net_salary);

            if ($('#total_earnings').val() != '') {
                $('#total_earnings').focus();
            }

            if ($('#total_deduction').val() != '') {
                $('#total_deduction').focus();
            }

            if ($('#net_salary').val() != '') {
                $('#net_salary').focus();
            }
        }
    }

    // for add staff earnings in payroll
    function addMoreEarnings(){
        var table = document.getElementById("tableID");
        var table_len = (table.rows.length);
        var id = parseInt(table_len);
        var row = table.insertRow(table_len).outerHTML = "<tr id='row" + id + "'><td width='70%' class='pr-30'><div><input class='form-control has-content' type='text' placeholder='"+trans('type')+"' id='earningsType" + id + "' name='earningsType[]'></div></td><td width='20%'><div class=''><input class='form-control has-content' placeholder='"+trans('value')+"' type='number' oninput='this.value = Math.abs(this.value)' id='earningsValue" + id + "' name='earningsValue[]'></div></td><td width='10%' class=''><button class='btn btn-primary btn-sm icon-only close-deductions' onclick='delete_earings(" + id + ")'><i class='fas fa-times'></i></button></td></tr>";
        window.getComputedStyle(table, null);
    }

    function delete_earings(id){
        var table = document.getElementById("tableID");
        var rowCount = table.rows.length;
        $("#row" + id).html("");
    }

    // for minus staff deductions in payroll
    function addDeductions(){
        var table = document.getElementById("tableDeduction");
        var table_len = (table.rows.length);
        var id = parseInt(table_len);
        var row = table.insertRow(table_len).outerHTML = "<tr id='DeductionRow" + id + "'><td width='50%' class='pr-30'><div class=''><input class='form-control  has-content' placeholder='"+trans('type')+"' type='text' id='deductionstype" + id + "' name='deductionstype[]'></div></td><td width='20%'><div class=''><input class='form-control has-content' placeholder='"+trans('value')+"' oninput='this.value = Math.abs(this.value)' type='number' id='deductionsValue" + id + "' name='deductionsValue[]'></div></td><td width='10%' class='pt-30'><button type='button' class='btn btn-primary btn-sm icon-only close-deductions' onclick='delete_deduction(" + id + ")'><i class='fas fa-times'></i></button></td></tr>";
    }

     function delete_deduction(id){
        var table = document.getElementById("tableDeduction");
        var rowCount = table.rows.length;
        $("#DeductionRow" + id).html("");

    }

    </script>
@endpush
