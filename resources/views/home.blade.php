@push('css_before')
  <!-- fullCalendar -->
  <link rel="stylesheet" href="{{asset('public/AdminLTE/plugins/fullcalendar/main.min.css')}}">
@endpush
@extends('layouts.master')
@section('mainContent')
<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid pt-3">
@if(permissionCheck('dashboard_quick_summery.index'))
<div class="row">
    <div class="col-lg-3 col-md-6 mt-40">
        <a href="{{route('client.index')}}" class="d-block">
            <div class="white-box single-summery">
                <div class="d-flex justify-content-between">
                    <div>
                        <h3>{{__('dashboard.Client')}} </h3>
                        <p class="mb-0">{{__('dashboard.Total Client')}}</p>
                    </div>
                    <h1 class="gradient-color2">{{App\Models\Client::all()->count()}}
                    </h1>
                </div>
            </div>
        </a>
    </div>
	<div class="col-lg-3 col-md-6 mt-40">
		<a href="{{route('lawyer.index')}}" class="d-block">
			<div class="white-box single-summery">
				<div class="d-flex justify-content-between">
					<div>
						<h3>{{__('dashboard.Lawyer')}}</h3>
						<p class="mb-0">{{__('dashboard.Total Lawyer')}}</p>
					</div>
					<h1 class="gradient-color2">{{App\Models\Lawyer::all()->count()}}
					</h1>
				</div>
			</div>
		</a>
	</div>

	<div class="col-lg-3 col-md-6 mt-40">
		<a href="{{route('report.paymentdue')}}" class="d-block">
			<div class="white-box single-summery">
				<div class="d-flex justify-content-between">
					<div>
						<h3>{{__('dashboard.Payment Due')}}</h3>
						<p class="mb-0">{{__('dashboard.Total Amount')}}</p>
                        <p>({{__('dashboard.Total No Of Due Bills')}})</p>
					</div>
					<div>
                        <h3 class="gradient-color2">
                        $ {{Modules\Finance\Entities\Invoice::where('payment_status','!=','paid')->where('invoice_type','=','income')->sum('grand_total')}}
                        </h3>
                        <h3 class="gradient-color2">
                            {{Modules\Finance\Entities\Invoice::where('payment_status','!=','paid')->where('invoice_type','=','income')->count()}} <span>items</span>
                        </h3>
                    </div>

				</div>
			</div>
		</a>
	</div>

	<div class="col-lg-3 col-md-6 mt-40">
		<a href="{{route('case.index')}}" class="d-block">
			<div class="white-box single-summery">
				<div class="d-flex justify-content-between">
					<div>
						<h3>{{__('dashboard.Running Cases')}}</h3>
						<p class="mb-0">{{__('dashboard.Total Running Cases')}}</p>
					</div>
					<h1 class="gradient-color2">{{App\Models\Cases::where('status', 'Open')->where('judgement_status', '=', 'Open')->count()}}
					</h1>
				</div>
			</div>
		</a>
	</div>

    <div class="col-lg-3 col-md-6 mt-40">
                <a href="{{route('case.index', ['status' => 'Waiting'])}}" class="d-block">
                    <div class="white-box single-summery">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h3>{{__('dashboard.Waiting Cases')}}</h3>
                                <p class="mb-0">{{__('dashboard.Total Waiting Cases')}}</p>
                            </div>
                            <h1 class="gradient-color2">{{App\Models\Cases::where('hearing_date', '<', date('Y-m-d'))->where('status', 'Open')->where('judgement_status', '=', 'Open')->count()}}
                            </h1>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 mt-40">
                <a href="{{route('case.index', ['status' => 'Archieved'])}}" class="d-block">
                    <div class="white-box single-summery">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h3>{{__('dashboard.Closed Cases')}}</h3>
                                <p class="mb-0">{{__('dashboard.Total Closed Cases')}}</p>
                            </div>
                            <h1 class="gradient-color2">{{App\Models\Cases::where('judgement_status', 'Close')->count()}}
                            </h1>
                        </div>
                    </div>
                </a>
            </div>


            <div class="col-lg-3 col-md-6 mt-40">
                <a href="{{route('staffs.index')}}" class="d-block">
                    <div class="white-box single-summery">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h3>{{__('dashboard.Staff')}}</h3>
                                <p class="mb-0">{{__('dashboard.Total Staff')}}</p>
                            </div>
                            <h1 class="gradient-color2">{{App\Staff::count()}}
                            </h1>
                        </div>
                    </div>
                </a>
            </div>



            <div class="col-lg-3 col-md-6 mt-40">
                <a href="{{route('my-task')}}" class="d-block">
                    <div class="white-box single-summery">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h3>{{__('dashboard.Pending Task')}}</h3>
                                <p class="mb-0">{{__('dashboard.Total Pending task')}}</p>
                            </div>
                            <h1 class="gradient-color2">{{Modules\Task\Entities\Task::where('status', 0)->count()}}
                            </h1>
                        </div>
                    </div>
                </a>
            </div>
</div>
@endif

<div class="row mt-40">
    @if(permissionCheck('dashboad_calender.index'))
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    {{__('common.Calendar')}}
                </h3>
            </div>
            <div class="card-body">
                <div id='common_calendar' class='common-calendar'></div>
            </div>
        </div>
    </div>
    @endif

    @if(permissionCheck('dashboard_todo.index'))
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    {{__('todo.To Do List')}}
                </h3>
                <div class="card-tools">
                  <a class="btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#add_to_do" title="Add To Do" data-modal-size="modal-md">
                            <i class="ti-plus"></i> {{ __('event.Add') }}
                        </a>
                </div>

            </div>
            <div class="card-body">
                <input type="hidden" id="url" value="{{url('/')}}">
                @if(@$toDos->count() > 0)
                <ul class="todo-list" data-widget="todo-list">
                    @foreach($toDos->sortByDesc('date') as $toDoList)
                        <li id="to_do_list_div{{@$toDoList->id}}" class="toDoList">
                            <div  class="icheck-primary d-inline ml-2">
                              <input @if($toDoList->status==1) checked disabled @else class="complete_task" @endif type="checkbox" id="midterm{{@$toDoList->id}}" name="complete_task" value="{{@$toDoList->id}}">
                              <label for="midterm{{@$toDoList->id}}"></label>
                            </div>
                            <span class="text">{{@$toDoList->title}}</span>
                            <small class="badge badge-danger"><i class="far fa-calendar"></i> {{$toDoList->date }}</small>
                            <div class="tools">
                              <!--i class="fas fa-edit"></i-->
                              <i data-id="{{@$toDoList->id}}" class="fas fa-trash del-to-do-item"></i>
                            </div>
                        </li>
                    @endforeach

                </ul>
                @else
                    <div class="single-to-do d-flex justify-content-between">
                        @lang('todo.no_do_lists_assigned_yet')
                    </div>

                @endif
            </div>
        </div>
    </div>

@endif
</div>

<div class="row mt-40">
    @if(permissionCheck('dashboard_appointment.index'))
	<div class="col-lg-6 col-md-6">
		<div class="card">
            <!-- table-responsive -->
            <div class="card-header">
                <h3 class="mb-0 mr-30 mb_xs_15px mb_sm_20px">{{__('dashboard.Appointment')}}</h3>
            </div>
            <div class="card-body">
                <table class="table dataTable pt-0 shadow_none pb-0 ">
                    <tbody>
                        <tr>
                            <th>{{__('dashboard.Title')}}</th>
                            <th>{{__('dashboard.Date')}}</th>
                            <th>{{__('dashboard.Contact')}}</th>
                        </tr>
                        @foreach($appointments as $appointment)
                         <tr>
                            <td><a href="{{ route('appointment.show', $appointment->id) }}">{{ $appointment->title }}</a></td>
                            <td>{{ formatDate($appointment->date) }}</td>
                            <td>{{ $appointment->contact->name }}</td>
                        </tr>
                        @endforeach
                   </tbody>
                </table>
            </div>
        </div>
	</div>
	@endif



@if(permissionCheck('dashboard_appointment.index'))
<div class="col-lg-6 col-md-6">
    <div class="card">
        <div class="card-header">
            <h3 class="mb-0 mr-30 mb_xs_15px mb_sm_20px">{{__('dashboard.Upcomming Date')}}</h3>
        </div>
        <div class="card-body">
        <table class="table pt-0 shadow_none pb-0 ">
                <tbody>
                <tr>
                    <th>{{__('dashboard.Case Name')}}</th>
                    <th>{{__('dashboard.Date')}}</th>
                </tr>
                @foreach($upcommingdate as $date)
                     <tr>
                        <td><a href="{{ route('case.show', $date->id) }}">{{ $date->title }}</a></td>
                        <td>{{ formatDate($date->date) }}</td>
                    </tr>
                      @endforeach
               </tbody>
            </table>
        </div>
    </div>
</div>
@endif
</div>
</div>
</section>
@if(permissionCheck('dashboard_upcoming_date.index'))
    <div class="modal fade" id="add_to_do">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                  <h4 class="modal-title">{{trans('todo.Add To Do')}}</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
                {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'to_dos.store',
                                    'method' => 'POST', 'enctype' => 'multipart/form-data', 'onsubmit' => 'return validateToDoForm()']) }}
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="form-group row" id="sibling_class_div">
                            <label for="" class="col-sm-2 control-label">{{__('common.Title')}}*</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" placeholder="{{__('common.Title')}}" name="title" value="{{ old('title') }}">
                              <span class="text-danger">{{$errors->first('title')}}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 control-label">{{ __('common.Date') }}*</label>
                            <div class="col-sm-10">

                                <div class="input-group date" id="startDate" data-target-input="nearest">
                                    <input placeholder="{{ __('common.Date') }}" type="text" class="form-control datetimepicker-input" data-target="#startDate" name="date">
                                    <div class="input-group-append" data-target="#startDate" data-toggle="datetimepicker">
                                      <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                      </span>
                                    </div>
                                </div>
                                <span class="text-danger">{{$errors->first('date')}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>

             {{ Form::close() }}
        </div>
          <!-- /.modal-content -->
    </div>
        <!-- /.modal-dialog -->
@endif
@endsection

@push('admin.scripts')
<script type="text/javascript" src="{{asset('public/AdminLTE/plugins/fullcalendar/main.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/AdminLTE/plugins/fullcalendar/locales-all.min.js')}}"></script>
<script>
    $(document).ready(function(){
        var date = new Date()
        var d    = date.getDate(),
            m    = date.getMonth(),
            y    = date.getFullYear()
        var Calendar = FullCalendar.Calendar;
        var calendarEl = document.getElementById('common_calendar');
        if ($('#common_calendar').length) {
            var calendar = new Calendar(calendarEl, {
              headerToolbar: {
                left  : 'prev,next today',
                center: 'title',
                right : 'dayGridMonth,timeGridWeek,timeGridDay'
              },
              locale: LANG,
              rtl : RTL,
              themeSystem: 'bootstrap',
              eventClick: function (event, jsEvent, view) {
                    $('#modalTitle').html(event.title);
                    $('#modalBody').html(event.description);

                    $('#image').attr('src', event.url);
                    $('#fullCalModal').modal();
                    return false;
                },
              //Random default events
              events: <?php echo json_encode($calendar_events);?> ,
              editable  : true,
              droppable : true, // this allows things to be dropped onto the calendar !!!
              drop      : function(info) {
                // is the "remove after drop" checkbox checked?
                if (checkbox.checked) {
                  // if so, remove the element from the "Draggable Events" list
                  info.draggedEl.parentNode.removeChild(info.draggedEl);
                }
              }
            });
            calendar.render();





            //$('.common-calendar').fullCalendar();
            // $('.common-calendar').fullCalendar({
            //     locale: LANG,
            //     rtl : RTL,
            //     header: {
            //         left: 'prev,next today',
            //         center: 'title',
            //         right: 'month,agendaWeek,agendaDay'
            //     },
                // eventClick: function (event, jsEvent, view) {
                //     $('#modalTitle').html(event.title);
                //     $('#modalBody').html(event.description);

                //     $('#image').attr('src', event.url);
                //     $('#fullCalModal').modal();
                //     return false;
                // },
            //     height: 650,
            //     events: <?php echo json_encode($calendar_events);?> ,
            // });
        }
        setTimeout(function () {
            $('#yearly').fadeOut(500);
            $('#weekly_profit').fadeOut(500);
            $('#monthly_profit').fadeOut(500);
            $('#yearly_profit').fadeOut(500);
            $('.purchase_table').fadeOut(500);
        }, 1000);



        $(document).on('click', '.filtering', function () {
            $('.filtering').removeClass('active');
            $(this).addClass('active');
            let type = $(this).data('type');
            $('.gradient-color2').hide();
            $('.demo_wait').show();
            $.ajax({
                method: "POST",
                url: "{{url('dashboard-cards-info')}}" + "/" + type,
                success: function (data) {
                    $('.total_purchase').text(data.purchase_amount);
                    $('.total_sale').text(data.sale_amount);
                    $('.expenses').text(data.expense);
                    $('.purchase_due').text(data.purchase_due);
                    $('.invoice_due').text(data.sale_due);
                    $('.total_bank').text(data.bank);
                    $('.total_cash').text(data.cash);
                    $('.total_income').text(data.income);
                    $('.gradient-color2').show();
                    $('.demo_wait').hide();
                }
            })
        });

        $(".complete_task").on("click", function() {
                var url = $("#url").val();
                var id = $(this).val();
                var formData = {
                    id: $(this).val(),
                };

                // get section for student
                $.ajax({
                    type: "GET",
                    data: formData,
                    dataType: "json",
                    url: url + "/" + "complete-to-do",
                    success: function(data) {


                        setTimeout(function() {
                            toastr.success('Operation Success!');
                        }, 500);
                    },
                    error: function(data) {

                    },
                });
            });
            $("#toDoList").on("click", function(e) {
            e.preventDefault();

            if ($(this).hasClass("tr-bg")) {
                $(this).removeClass("tr-bg");
                $(this).addClass("fix-gr-bg");
            }


            $(".toDoList").show();

        });


        $(".del-to-do-item").on("click", function(e) {
            e.preventDefault();
            var todoId = $(this).data('id');
            var url = $("#url").val();
            $.ajax({
                type: "GET",
                data: formData,
                dataType: "json",
                url: url + "/" + "get-to-do-list",
                success: function(data) {
                    $(".toDoListsCompleted").empty();

                    $.each(data, function(i, value) {
                        var appendRow = "";

                        appendRow +=
                            "<div class='single-to-do d-flex justify-content-between'>";
                        appendRow += "<div>";
                        appendRow += "<h5 class='d-inline'>" + value.title + "</h5>";
                        appendRow += "<p>" + value.date + "</p>";
                        appendRow += "</div>";
                        appendRow += "</div>";

                        $(".toDoListsCompleted").append(appendRow);
                    });
                },
                error: function(data) {

                },
            });
        });
    });


    </script>
@endpush

