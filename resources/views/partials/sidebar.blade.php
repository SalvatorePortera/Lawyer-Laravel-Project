<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<a href="index3.html" class="brand-link">
      <img src="{{ asset('public/AdminLTE/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>
    <!-- sidebar: style can be found in sidebar.less -->
    <div class="sidebar">
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
			  <img src="{{ file_exists(auth()->user()->avatar) ? asset(auth()->user()->avatar) : asset('public/backEnd/img/staff.jpg') }}" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
			  <a href="#" class="d-block">{{ auth()->user()->name }}</a>
			</div>
		</div>

      <!-- SidebarSearch Form -->
		<div class="form-inline">
			<div class="input-group" data-widget="sidebar-search">
			  <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
			  <div class="input-group-append">
				<button class="btn btn-sidebar">
				  <i class="fas fa-search fa-fw"></i>
				</button>
			  </div>
			</div>
		</div>
        
        <!-- /.search form -->
        @if(auth()->user()->role_id)
        <!-- sidebar menu: : style can be found in sidebar.less -->
		<!-- Sidebar Menu -->
		  <nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item {{ spn_active_link('home') }}">
				<a href="{{url('/home')}}" class="nav-link">
				  <i class="nav-icon fas fa-th"></i>
				  <p>
					{{__('dashboard.Dashboard')}}
				  </p>
				</a>
			</li>
            
            @if(permissionCheck('contact.index'))
            @php
                $contact = ['contact.index', 'contact.create', 'contact.edit', 'contact.show'];
                $category = ['category.contact.index', 'category.contact.create', 'category.contact.edit', 'category.contact.show'];
                $nav = array_merge($contact, $category)
            @endphp
				<li class="nav-item {{ spn_nav_item_open($nav, 'menu-open active') }}">
					<a href="#" class="nav-link {{ spn_nav_item_open($nav, 'menu-open active') }}">
					  <i class="nav-icon fa fa-address-book"></i>
					  <p>
						{{ __('contact.Contact') }}
						<i class="right fas fa-angle-left"></i>
					  </p>
					</a>
					<ul class="nav nav-treeview">
					  <li class="nav-item">
						<a href="{{route('contact.index')}}" class="nav-link {{ spn_active_link($contact, 'active') }}">
						  <i class="far fa-circle nav-icon"></i>
						  <p>{{ __('contact.Contact List') }}</p>
						</a>
					  </li>
					  @if(permissionCheck('category.contact.index'))
                        
						<li class="nav-item">
						<a href="{{route('category.contact.index')}}" class="nav-link {{ spn_active_link($category, 'active') }}">
						  <i class="far fa-circle nav-icon"></i>
						  <p>{{ __('contact.Contact  Category') }}</p>
						</a>
					  </li>
                        @endif
					  
					  
					</ul>
				  </li>
            @endif

            @if(permissionCheck('client.index'))
                @php
                    $client = ['client.index', 'client.create', 'client.edit', 'client.show'];
                    $category = ['category.client.index', 'category.client.create', 'category.client.edit', 'category.client.show'];
                    $nav = array_merge($client, $category, ['client.settings'])
                @endphp
                <li class="nav-item {{ spn_nav_item_open($nav, 'menu-open active') }}">
					<a href="#" class="nav-link {{ spn_nav_item_open($nav, 'menu-open active') }}">
					  <i class="nav-icon fa fa-users"></i>
					  <p>
						{{ __('client.Client') }}
						<i class="right fas fa-angle-left"></i>
					  </p>
					</a>
                    
                    <ul class="nav nav-treeview">
                        @if(permissionCheck('client.index'))
                        <li class="nav-item">
							<a href="{{route('client.index')}}" class="nav-link {{ spn_active_link($client, 'active') }}">
							  <i class="far fa-circle nav-icon"></i>
							  <p>{{ __('client.Client List') }}</p>
							</a>
						  </li>
                        @endif
                        @if(permissionCheck('category.client.index'))
                        
						<li class="nav-item">
							<a href="{{ route('category.client.index') }}" class="nav-link {{ spn_active_link($category, 'active') }}">
							  <i class="far fa-circle nav-icon"></i>
							  <p>{{ __('client.Client Category') }}</p>
							</a>
						  </li>
                        @endif
                    </ul>
                </li>
            @endif

            @if(permissionCheck('case.index'))
                @php
                    $case = ['case.index', 'case.edit', 'case.show', 'date.create', 'date.edit', 'putlist.create', 'putlist.edit', 'judgement.create', 'judgement.edit', 'case.court.change', 'date.send_mail' ];
                    $category = ['category.case.index', 'category.case.create', 'category.case.edit', 'category.case.show'];
                    $nav = array_merge($case, $category, ['causelist.index', 'case.create', 'judgement.index', 'judgement.closed', 'judgement.reopen', 'judgement.close', 'case.filter'])
                @endphp
                <li class="nav-item {{ spn_nav_item_open($nav, 'menu-open active') }}">
					<a href="#" class="nav-link {{ spn_nav_item_open($nav, 'menu-open active') }}">
					  <i class="nav-icon fa fa-list-ul"></i>
					  <p>
						{{ __('case.Case') }}
						<i class="right fas fa-angle-left"></i>
					  </p>
					</a>
                    
                    <ul class="nav nav-treeview">
                        @if(permissionCheck('causelist.index'))
                        <li class="nav-item">
							<a href="{{route('causelist.index')}}" class="nav-link {{ spn_active_link('causelist.index', 'active') }}">
							  <i class="far fa-circle nav-icon"></i>
							  <p>{{ __('case.Cause List') }}</p>
							</a>
						  </li>
                        @endif
                        <li class="nav-item">
							<a href="{{route('case.index')}}" class="nav-link {{ (isset($page_title) and $page_title != 'Running') ? 'active' : '' }}">
							  <i class="far fa-circle nav-icon"></i>
							  <p>{{ __('case.All Case') }}</p>
							</a>
						  </li>
                        
						<li class="nav-item">
							<a href="{{route('case.index', ['status' => 'Running'])}}" class="nav-link {{ (isset($page_title) and $page_title== 'Running') ? 'active' : '' }}">
							  <i class="far fa-circle nav-icon"></i>
							  <p>{{ __('case.Running Case') }}</p>
							</a>
						  </li>
                        @if(permissionCheck('case.store'))
                        
						<li class="nav-item">
							<a href="{{ route('case.create') }}" class="nav-link {{ spn_active_link('case.create', 'active') }}">
							  <i class="far fa-circle nav-icon"></i>
							  <p>{{ __('case.Add New Case') }}</p>
							</a>
						  </li>
                        @endif
                        @if(permissionCheck('category.case.index'))
                        
						<li class="nav-item">
							<a href="{{route('category.case.index')}}" class="nav-link {{ spn_active_link($category, 'active') }}">
							  <i class="far fa-circle nav-icon"></i>
							  <p>{{ __('case.Case  Category') }}</p>
							</a>
						  </li>
                        @endif
                        @if(permissionCheck('judgement.index'))
                        
						<li class="nav-item">
							<a href="{{route('judgement.index')}}" class="nav-link {{ spn_active_link(['judgement.index', 'judgement.reopen', 'judgement.close'], 'active') }}">
							  <i class="far fa-circle nav-icon"></i>
							  <p>{{ __('case.Judgement Case') }}</p>
							</a>
						  </li>
                        @endif
                        @if(permissionCheck('judgement.closed'))
                        <li class="nav-item">
							<a href="{{route('judgement.closed')}}" class="nav-link {{ spn_active_link(['judgement.closed'], 'active') }}">
							  <i class="far fa-circle nav-icon"></i>
							  <p>{{ __('case.Closed Case') }}</p>
							</a>
						  </li>
                        @endif
                        @if(permissionCheck('case.filter'))
                        <li class="nav-item">
							<a href="{{route('case.filter')}}" class="nav-link {{ spn_active_link(['case.filter'], 'active') }}">
							  <i class="far fa-circle nav-icon"></i>
							  <p>{{ __('case.Filter Case') }}</p>
							</a>
						  </li>
                        @endif
                    </ul>
                </li>
            @endif

            @if(permissionCheck('lawyer.index'))
                @php
                    $lawyer = ['lawyer.index', 'lawyer.create', 'lawyer.edit', 'lawyer.show']
                @endphp
                <li class="nav-item {{ spn_active_link($lawyer, 'active') }}">
					<a href="{{route('lawyer.index')}}" class="nav-link">
					  <i class="nav-icon fas fa-users"></i>
					  <p>
						{{ __('lawyer.Opposite Lawyer') }}
					  </p>
					</a>
				</li>
            @endif

            @if(permissionCheck('lobbying.index'))
                <li class="nav-item {{ spn_active_link(['lobbying.index', 'lobbying.edit', 'lobbying.show'], 'active') }}">
					<a href="{{route('lobbying.index')}}" class="nav-link">
					  <i class="nav-icon fa fa-th"></i>
					  <p>
						{{ __('case.Lobbying List') }}
					  </p>
					</a>
				</li>
            @endif

            @if(permissionCheck('putlist.index'))
                <li class="nav-item {{ spn_active_link('putlist.index', 'active') }}">
					<a href="{{route('putlist.index')}}" class="nav-link">
					  <i class="nav-icon fa fa-th"></i>
					  <p>
						{{ __('case.Put Up Date List') }}
					  </p>
					</a>
				</li>
            @endif

            @if(permissionCheck('court.index'))
                @php
                    $court = ['master.court.index', 'master.court.edit', 'master.court.show', 'master.court.create'];
                    $category = ['category.court.index', 'category.court.create', 'category.court.edit', 'category.court.show'];
                    $nav = array_merge($court, $category)
                @endphp
				<li class="nav-item {{ spn_nav_item_open($nav, 'menu-open active') }}">
					<a href="#" class="nav-link {{ spn_nav_item_open($nav, 'menu-open active') }}">
					  <i class="nav-icon fa fa-gavel"></i>
					  <p>
						{{ __('court.Court') }}
						<i class="right fas fa-angle-left"></i>
					  </p>
					</a>
                    <ul class="nav nav-treeview">
                        @if(permissionCheck('master.court.index'))
                        <li class="nav-item">
							<a href="{{route('master.court.index')}}" class="nav-link {{ spn_active_link($court, 'active') }}">
							  <i class="far fa-circle nav-icon"></i>
							  <p>{{ __('court.Court List') }}</p>
							</a>
						  </li>
                        @endif
                        @if(permissionCheck('category.court.index'))
                        <li class="nav-item">
							<a href="{{route('category.court.index')}}" class="nav-link {{ spn_active_link($category, 'active') }}">
							  <i class="far fa-circle nav-icon"></i>
							  <p>{{ __('court.Court Category') }}</p>
							</a>
						  </li>
                        @endif
                    </ul>
                </li>
            @endif

            @if(permissionCheck('appointment.index'))
                @php
                    $appoinment = ['appointment.index', 'appointment.create', 'appointment.edit', 'appointment.show']
                @endphp
                <li class="nav-item {{ spn_active_link($appoinment, 'active') }}">
					<a href="{{route('appointment.index')}}" class="nav-link">
					  <i class="nav-icon fa fa-calendar"></i>
					  <p>
						{{ __('appointment.Appointment') }}
					  </p>
					</a>
				</li>
            @endif

            @include('task::menu')
            @include('todo::menu')
            @include('partials.hr-menu')
            @include('leave::menu')

            @if(permissionCheck('setup'))
                @php
                    $stage = ['master.stage.index', 'master.stage.edit', 'master.stage.show', 'master.stage.create'];
                    $act = ['master.act.index', 'master.act.edit', 'master.act.show', 'master.act.create'];
                    $city = ['setup.city.index', 'setup.city.edit', 'setup.city.show', 'setup.city.create'];
                    $state = ['setup.state.index', 'setup.state.edit', 'setup.state.show', 'setup.state.create'];
                    $country = ['setup.country.index', 'setup.country.edit', 'setup.country.show', 'setup.country.create'];
                    $nav = array_merge($stage, $act, $city, $state, $country);
                @endphp
                <li class="nav-item {{ spn_nav_item_open($nav, 'menu-open active') }}">
					<a href="#" class="nav-link {{ spn_nav_item_open($nav, 'menu-open active') }}">
					  <i class="nav-icon fa fa-user"></i>
					  <p>
						{{ __('common.Setup') }}
						<i class="right fas fa-angle-left"></i>
					  </p>
					</a>
                    
                    <ul class="nav nav-treeview">
                        @if(permissionCheck('master.stage.index'))
                        <li class="nav-item">
							<a href="{{route('master.stage.index')}}" class="nav-link {{ spn_active_link($stage, 'active') }}">
							  <i class="far fa-circle nav-icon"></i>
							  <p>{{ __('case.Case Stage') }}</p>
							</a>
						  </li>
                        @endif
                        @if(permissionCheck('master.act.index'))
                        
						<li class="nav-item">
							<a href="{{route('master.act.index')}}" class="nav-link {{ spn_active_link($act, 'active') }}">
							  <i class="far fa-circle nav-icon"></i>
							  <p>{{ __('case.Act') }}</p>
							</a>
						  </li>
                        @endif
                        @if(permissionCheck('setup.city.index'))
                        
						<li class="nav-item">
							<a href="{{route('setup.city.index')}}" class="nav-link {{ spn_active_link($city, 'active') }}">
							  <i class="far fa-circle nav-icon"></i>
							  <p>{{ __('setting.City') }}</p>
							</a>
						  </li>
                        @endif
                        @if(permissionCheck('setup.state.index'))
                        
						<li class="nav-item">
							<a href="{{route('setup.state.index')}}" class="nav-link {{ spn_active_link($state, 'active') }}">
							  <i class="far fa-circle nav-icon"></i>
							  <p>{{ __('setting.State') }}</p>
							</a>
						  </li>
                        @endif
                        @if(permissionCheck('setup.country.index'))
                        
						<li class="nav-item">
							<a href="{{route('setup.country.index')}}" class="nav-link {{ spn_active_link($country, 'active') }}">
							  <i class="far fa-circle nav-icon"></i>
							  <p>{{ __('court.Country') }}</p>
							</a>
						  </li>
                        @endif
                    </ul>
                </li>
            @endif

            @includeIf('customfield::menu')
            @includeIf('finance::menu')
            @includeIf('setting::menu')
				</ul>
			</nav>
        @else
            @includeIf('clientlogin::sidebar')
        @endif
    </div>
    <!-- /.sidebar -->
</aside>

@push('script_after')
<script>
$("#livesearch").hide();

$("input[name='search']").on('input', function(e) {
    const url = $('#url').val(), val = $(this).val();
    let target = $('.livesearch');
    if (val.length == 0) {
         target.html();
         target.hide();
         return;
    }

    $.ajax({
        method:'POST',
        url: SET_DOMAIN + '/' + 'search',
        data:{
            "search": val,
            "_token": "{{ csrf_token() }}"
        },
        success:function(data) {
            target.show();
            target.html();
            let html = '<table class="table table-striped">';
            if (data.length != 0) {
             data.forEach(value => {
                html += `
                <tr>
                    <td>
                        <a href='${value.route}'>${value.name}</a>
                    </td>
                </tr>`;
             });
            } else {
                html += `
                <tr>
                    <td>
                        <a href='#'>Not Found</a>
                    </td>
                </tr>`;
            }

            html += '</table>'
            target.html(html);
        }
    });
});

$(document).on("click", function(e) {
    if (!$(e.target).closest('#serching').length)  {
        $("#livesearch").hide();
    }
});
</script>
@endpush
