@if(auth()->user()->role_id == 1)
<li
	class="bg-red treeview {{ in_array(request()->segment(1), ['superadmin', 'sample-medical-product-import', 'site-settings', 'pay-online']) ? 'active active-sub' : '' }}">
	<a href="#" class="has-arrow">
		<i class="fa fa-bank"></i>
		<span class="title">@lang('superadmin::lang.superadmin')</span>
	</a>

	<ul class="treeview-menu">

		<li class="{{ request()->segment(2) == 'business' ? 'active active-sub' : '' }}">
			<a href="{{ route('business.index') }}">
				<i class="fa fa-bank"></i>
				<span class="title">
					@lang('superadmin::lang.all_business')
				</span>
			</a>
		</li>
		<!-- superadmin subscription -->
		<li class="{{ request()->segment(2) == 'superadmin-subscription' ? 'active active-sub' : '' }}">
			<a href="{{ route('packages.index') }}"><i
					class="fa fa-refresh"></i>
				<span class="title">@lang('superadmin::lang.subscription')</span>
			</a>
		</li>

		<li class="{{ request()->segment(2) == 'packages' ? 'active active-sub' : '' }}">
			<a href="#">
				<i class="fa fa-credit-card"></i>
				<span class="title">
					@lang('superadmin::lang.subscription_packages')
				</span>
			</a>
		</li>

		<li class="{{ request()->segment(2) == 'settings' ? 'active active-sub' : '' }}">
			<a href="#">
				<i class="fa fa-cogs"></i>
				<span class="title">
					@lang('superadmin::lang.super_admin_settings')
				</span>
			</a>
		</li>

		<li class="{{ request()->segment(1) == 'pay-online' ? 'active active-sub' : '' }}">
			<a href="#">
				<i class="fa fa-list"></i>
				<span class="title">
					@lang('superadmin::lang.pay_online_list')
				</span>
			</a>
		</li>
		<li class="{{ request()->segment(2) == 'help-explanation' ? 'active active-sub' : '' }}">
			<a href="#">
				<i class="fa fa-info-circle"></i>
				<span class="title">
					@lang('superadmin::lang.help_explanation')
				</span>
			</a>
		</li>
</ul>
</li>
@endif