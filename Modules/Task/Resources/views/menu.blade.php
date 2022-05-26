@php
    $task = ['task.index', 'task.edit', 'task.show', 'task.create'];
    $nav = array_merge($task, ['my-task', 'completed-task']);
@endphp


<li class="nav-item {{ spn_nav_item_open($nav, 'menu-open active') }}">
	<a href="#" class="nav-link {{ spn_nav_item_open($nav, 'menu-open active') }}">
	  <i class="nav-icon fa fa-th"></i>
	  <p>
		{{ __('task.Task') }}
		<i class="right fas fa-angle-left"></i>
	  </p>
	</a>
    <ul class="nav nav-treeview">
        @if(permissionCheck('task.index'))
        <li class="nav-item">
			<a href="{{route('task.index')}}" class="nav-link {{ spn_active_link($task, 'active') }}">
			  <i class="far fa-circle nav-icon"></i>
			  <p>{{ __('task.Task List') }}</p>
			</a>
		  </li>
        @endif
        <li class="nav-item">
			<a href="{{route('my-task')}}" class="nav-link {{ spn_active_link('my-task', 'active') }}">
			  <i class="far fa-circle nav-icon"></i>
			  <p>{{ __('task.My Task') }}</p>
			</a>
		  </li>
		  <li class="nav-item">
			<a href="{{route('completed-task')}}" class="nav-link {{ spn_active_link('completed-task', 'active') }}">
			  <i class="far fa-circle nav-icon"></i>
			  <p>{{ __('task.Completed Task') }}</p>
			</a>
		  </li>
    </ul>
</li>
