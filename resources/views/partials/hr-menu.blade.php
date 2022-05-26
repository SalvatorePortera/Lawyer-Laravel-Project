@if (permissionCheck('human_resource'))
@php
    $staffs = ['staffs.index', 'staffs.edit', 'staffs.view', 'staffs.create'];
    $roles = ['permission.roles.index', 'permission.roles.edit', 'permission.roles.view', 'permission.roles.create', 'permission.permissions.index'];
    $events = ['events.index', 'events.edit', 'events.view', 'events.create'];
    $payroll = ['payroll.index', 'payroll.edit', 'payroll.view', 'payroll.create', 'genrate_payroll', 'staff_search_for_payroll'];
    $nav = array_merge($staffs, $roles, $events, $payroll, ['attendances.index', 'attendance_report.index', 'payroll_reports.index', 'payroll_reports.search', 'attendance_report.search']);
@endphp


<li class="nav-item {{ spn_nav_item_open($nav, 'menu-open active') }}">
	<a href="#" class="nav-link {{ spn_nav_item_open($nav, 'menu-open active') }}">
    	<i class="nav-icon fa fa-users"></i>
	  <p>
		{{ __('common.Human Resource') }}
		<i class="right fas fa-angle-left"></i>
	  </p>
	</a>
    <ul class="nav nav-treeview">
        @if(permissionCheck('staffs.index'))
        <li class="nav-item">
			<a href="{{route('staffs.index')}}" class="nav-link {{ spn_active_link($staffs, 'active') }}">
			  <i class="far fa-circle nav-icon"></i>
			  <p>{{ __('common.Staff') }}</p>
			</a>
		  </li>
        @endif
        @if(permissionCheck('permission.roles.index'))
        
		<li class="nav-item">
			<a href="{{route('permission.roles.index')}}" class="nav-link {{ spn_active_link($roles, 'active') }}">
			  <i class="far fa-circle nav-icon"></i>
			  <p>{{ __('role.Role') }}</p>
			</a>
		  </li>
        @endif
        @if(permissionCheck('attendances.index'))
        
		<li class="nav-item">
			<a href="{{route('attendances.index')}}" class="nav-link {{ spn_active_link('attendances.index', 'active') }}">
			  <i class="far fa-circle nav-icon"></i>
			  <p>{{ __('attendance.Attendance') }}</p>
			</a>
		  </li>
        @endif
        @if(permissionCheck('attendance_report.index'))
        <li class="nav-item">
			<a href="{{route('attendance_report.index')}}" class="nav-link {{ spn_active_link(['attendance_report.index', 'attendance_report.search'], 'active') }}">
			  <i class="far fa-circle nav-icon"></i>
			  <p>{{ __('attendance.Attendance Report') }}</p>
			</a>
		  </li>
        @endif
        @if(permissionCheck('events.index'))
        
		<li class="nav-item">
			<a href="{{route('events.index')}}" class="nav-link {{ spn_active_link($events, 'active') }}">
			  <i class="far fa-circle nav-icon"></i>
			  <p>{{ __('event.Event') }}</p>
			</a>
		  </li>
        @endif
        @if(permissionCheck('payroll.index'))
        <li class="nav-item">
			<a href="{{route('payroll.index')}}" class="nav-link {{ spn_active_link($payroll, 'active') }}">
			  <i class="far fa-circle nav-icon"></i>
			  <p>{{ __('payroll.Payroll') }}</p>
			</a>
		  </li>
        @endif
        @if(permissionCheck('payroll_reports.index'))
        
		<li class="nav-item">
			<a href="{{route('payroll_reports.index')}}" class="nav-link {{ spn_active_link(['payroll_reports.index', 'payroll_reports.search'], 'active') }}">
			  <i class="far fa-circle nav-icon"></i>
			  <p>{{ __('payroll.Payroll Reports') }}</p>
			</a>
		  </li>
        @endif
    </ul>
</li>
@endif
