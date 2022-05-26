@if (permissionCheck('leave'))
    @php
        $leave = false;
        if(request()->is('leave') || request()->is('leave/*')) {
            $leave = true;
        }
    @endphp
	<li class="nav-item {{ $leave ? 'menu-open active' : '' }}">
        <a href="#" class="nav-link {{ $leave ? 'menu-open active' : '' }}">
            <i class="nav-icon fa fa-print"></i>
		  <p>
			{{ __('leave.Leave') }}
			<i class="right fas fa-angle-left"></i>
		  </p>
		</a>
			
        <ul class="nav nav-treeview">
            @if(permissionCheck('leave_types.index'))
            <li class="nav-item">
				<a href="{{route('leave_types.index')}}" class="nav-link {{ request()->is('leave/types') ? 'active' : '' }}">
				  <i class="far fa-circle nav-icon"></i>
				  <p>{{ __('leave.Leave Type') }}</p>
				</a>
			  </li>
			@endif
            @if(permissionCheck('leave_define.index'))
            
			<li class="nav-item">
				<a href="{{route('leave_define.index')}}" class="nav-link {{ request()->is('leave/define-lists') ? 'active' : '' }}">
				  <i class="far fa-circle nav-icon"></i>
				  <p>{{ __('leave.Leave Define') }}</p>
				</a>
			  </li>
            @endif
            @if(permissionCheck('apply_leave.index'))
            <li class="nav-item">
				<a href="{{route('apply_leave.index')}}" class="nav-link {{ request()->is('leave') ? 'active' : '' }}">
				  <i class="far fa-circle nav-icon"></i>
				  <p>{{ __('leave.Apply Leave') }}</p>
				</a>
			  </li>
            @endif
            @if(permissionCheck('approved_index'))
            <li class="nav-item">
				<a href="{{route('approved_index')}}" class="nav-link {{ request()->is('leave/approved') ? 'active' : '' }}">
				  <i class="far fa-circle nav-icon"></i>
				  <p>{{ __('leave.Approve Leave Request') }}</p>
				</a>
			  </li>
            @endif
            @if(permissionCheck('pending_index'))
            <li class="nav-item">
				<a href="{{route('pending_index')}}" class="nav-link {{ request()->is('leave/pending') ? 'active' : '' }}">
				  <i class="far fa-circle nav-icon"></i>
				  <p>{{ __('leave.Pending Leave') }}</p>
				</a>
			  </li>
            @endif
            @if(permissionCheck('holiday.setup'))
            <li class="nav-item">
				<a href="{{route('holidays.index')}}" class="nav-link {{ request()->is('leave/holidays') ? 'active' : '' }}">
				  <i class="far fa-circle nav-icon"></i>
				  <p>{{ __('holiday.Holiday Setup') }}</p>
				</a>
			  </li>
            @endif
            @if(permissionCheck('carry.forward'))
            
			<li class="nav-item">
				<a href="{{route('carry.forward')}}" class="nav-link {{ request()->is('leave/carry-forward') ? 'active' : '' }}">
				  <i class="far fa-circle nav-icon"></i>
				  <p> {{ __('leave.Carry Forward') }}</p>
				</a>
			  </li>
            @endif
        </ul>
    </li>
@endif
