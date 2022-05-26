<nav class="mt-2">
	<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
	<li class="nav-item {{ spn_active_link('client.my_dashboard') }}">
		<a href="{{route('client.my_dashboard')}}" class="nav-link">
		  <i class="nav-icon fas fa-th"></i>
		  <p>
			{{__('dashboard.Dashboard')}}
		  </p>
		</a>
	</li>
    <li class="nav-item {{ spn_active_link(['client.my_cases', 'client.case.show']) }}">
		<a href="{{ route('client.my_cases') }}" class="nav-link">
		  <i class="nav-icon fa fa-list"></i>
		  <p>
			{{__('client.my_cases')}}
		  </p>
		</a>
	</li>
	
	
	
	
    
	<li class="nav-item {{ spn_active_link(['client.my_waiting_cases']) }}">
		<a href="{{ route('client.my_waiting_cases') }}" class="nav-link">
		  <i class="nav-icon fa fa-list"></i>
		  <p>
			{{__('client.my_waiting_cases')}}
		  </p>
		</a>
	</li>
    
	
	<li class="nav-item {{ spn_active_link(['client.my_closed_cases']) }}">
		<a href="{{ route('client.my_closed_cases') }}" class="nav-link">
		  <i class="nav-icon fa fa-list"></i>
		  <p>
			{{__('client.my_closed_cases')}}
		  </p>
		</a>
	</li>
    
	
	<li class="nav-item {{ spn_active_link(['client.my_judgement_cases']) }}">
		<a href="{{ route('client.my_judgement_cases') }}" class="nav-link">
		  <i class="nav-icon fa fa-list"></i>
		  <p>
			{{__('client.my_judgement_cases')}}
		  </p>
		</a>
	</li>
    
	<li class="nav-item {{ spn_active_link(['client.my_profile']) }}">
		<a href="{{ route('client.my_profile') }}" class="nav-link">
		  <i class="nav-icon fa fa-list"></i>
		  <p>
			{{__('common.Profile')}}
		  </p>
		</a>
	</li>
    
	<li class="nav-item {{ spn_active_link(['change_password']) }}">
		<a href="{{ route('change_password') }}" class="nav-link">
		  <i class="nav-icon fa fa-key"></i>
		  <p>
			{{__('common.Change Password')}}
		  </p>
		</a>
	</li>
	</ul>
</nav>
