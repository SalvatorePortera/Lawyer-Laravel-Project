@php
    $to_dos = ['to_dos.index', 'to_dos.create', 'to_dos.edit', 'to_dos.show'];
@endphp

<li class="nav-item {{ spn_active_link($to_dos, 'active') }}">
	<a href="{{route('to_dos.index')}}" class="nav-link">
	  <i class="nav-icon fas fa-list-ul"></i>
	  <p>
		{{ __('todo.To Do List') }}
	  </p>
	</a>
</li>
