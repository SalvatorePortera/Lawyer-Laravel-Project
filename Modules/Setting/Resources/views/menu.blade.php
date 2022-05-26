@if(permissionCheck('setting.index'))
    @php
        $lang = ['languages.index', 'languages.edit', 'languages.show', 'languages.create' , 'language.translate_view'];
        $nav = array_merge(['setting', 'modulemanager.index'],  ['setting.updatesystem'])
    @endphp
	<li class="nav-item {{ spn_nav_item_open($nav, 'menu-open active') }}">
        <a href="#" class="nav-link {{ spn_nav_item_open($nav, 'menu-open active') }}">
			<i class="nav-icon fa fa-cog"></i>
		  <p>
			{{ __('setting.Settings') }}
			<i class="right fas fa-angle-left"></i>
		  </p>
		</a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
				<a href="{{url('setting')}}" class="nav-link {{ spn_active_link('setting', 'active') }}">
				  <i class="far fa-circle nav-icon"></i>
				  <p>
				  {{ __('setting.General Settings') }}
				  </p>
				</a>
			  </li>
            @if(permissionCheck('subscriptions.index'))
            <li class="nav-item">
				<a href="{{route('subscriptions.index')}}" class="nav-link {{ spn_active_link('subscriptions.index', 'active') }}">
				  <i class="far fa-circle nav-icon"></i>
				  <p>
				  Subscriptions
				  </p>
				</a>
			  </li>
            @endif
            @if(permissionCheck('modulemanager.index'))
            
			<li class="nav-item">
				<a href="{{route('modulemanager.index')}}" class="nav-link {{ spn_active_link('modulemanager.index', 'active') }}">
				  <i class="far fa-circle nav-icon"></i>
				  <p>
				  {{ __('common.Module Manager') }}
				  </p>
				</a>
			  </li>
            @endif
            @if(permissionCheck('languages.index'))
            
			<li class="nav-item">
				<a href="{{route('languages.index')}}" class="nav-link {{ spn_active_link($lang, 'active') }}">
				  <i class="far fa-circle nav-icon"></i>
				  <p>
				  {{ __('common.Language') }}
				  </p>
				</a>
			  </li>
            @endif
            @if(permissionCheck('setting.updatesystem'))
            
			<li class="nav-item">
				<a href="{{route('setting.updatesystem')}}" class="nav-link {{ spn_active_link('setting.updatesystem', 'active') }}">
				  <i class="far fa-circle nav-icon"></i>
				  <p>
				  {{ __('setting.Update') }}
				  </p>
				</a>
			  </li>
            @endif
        </ul>
    </li>
@endif

@if(permissionCheck('utilities'))
    <li class="nav-item">
				<a href="{{route('utilities')}}" class="nav-link {{ spn_active_link('utilities', 'active') }}">
				  <i class="fas fa-store"></i>
				  <p>
				  {{ __('setting.Utilities') }}
				  </p>
				</a>
			  </li>
@endif
