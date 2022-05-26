@if(permissionCheck('custom_fields.index'))
    @php
        $custom_fields = ['custom_fields.index', 'custom_fields.create', 'custom_fields.edit', 'custom_fields.show'];
    @endphp
    
	<li class="nav-item {{ spn_active_link($custom_fields, 'active') }}">
					<a href="{{route('custom_fields.index')}}" class="nav-link">
					  <i class="nav-icon fa fa-th"></i>
					  <p>
						{{__('custom_fields.custom_fields')}}
					  </p>
					</a>
				</li>
@endif
