@if(permissionCheck('vendors.index'))
   
	<li class="nav-item {{ spn_active_link(['vendors.index', 'vendors.create', 'vendors.edit', 'vendors.show'], 'active') }}">
					<a href="{{route('vendors.index')}}" class="nav-link">
					  <i class="nav-icon fas fa-store"></i>
					  <p>
						{{ __('vendor.Vendor') }}
					  </p>
					</a>
				</li>
@endif

@if(permissionCheck('services.index'))
    
	<li class="nav-item {{ spn_active_link(['services.index', 'services.create', 'services.edit', 'services.show'], 'active') }}">
					<a href="{{route('services.index')}}" class="nav-link">
					  <i class="nav-icon fas fa-store"></i>
					  <p>
						{{ __('finance.Service') }}
					  </p>
					</a>
				</li>
@endif

@if(permissionCheck('finance.index'))
    @php
        $income_type = ['income_types.index', 'income_types.edit', 'income_types.show', 'income_types.create'];
        $expense_type = ['expense_types.index', 'expense_types.edit', 'expense_types.show', 'expense_types.create'];
        $bank_account = ['bank_accounts.index', 'bank_accounts.edit', 'bank_accounts.show', 'bank_accounts.create'];
        $tax = ['taxes.index', 'taxes.edit', 'taxes.show', 'taxes.create'];
        $income = ['incomes.index', 'incomes.edit', 'incomes.show', 'incomes.create'];
        $expense = ['expenses.index', 'expenses.edit', 'expenses.show', 'expenses.create'];
        $paymentdue = ['paymentdue.index', 'paymentdue.edit', 'paymentdue.show', 'paymentdue.create'];
        $nav = array_merge($income_type, $expense_type, $bank_account, $tax, $income, $expense, ['report.profit', 'report.transaction', 'report.statement'])
    @endphp
	<li class="nav-item {{ spn_nav_item_open($nav, 'menu-open active') }}">
        
		<a href="#" class="nav-link {{ spn_nav_item_open($nav, 'menu-open active') }}">
		  <i class="nav-icon fa fa-dollar"></i>
		  <p>
			{{ __('finance.Finance') }}
			<i class="right fas fa-angle-left"></i>
		  </p>
		</a>
        <ul class="nav nav-treeview">
            @if(permissionCheck('income_types.index'))
            
			<li class="nav-item">
				<a href="{{route('income_types.index')}}" class="nav-link {{ spn_active_link($income_type, 'active') }}">
				  <i class="far fa-circle nav-icon"></i>
				  <p>{{ __('finance.Income Type List') }}</p>
				</a>
			  </li>
            @endif
            @if(permissionCheck('expense_types.index'))
            <li class="nav-item">
				<a href="{{route('expense_types.index')}}" class="nav-link {{ spn_active_link($expense_type, 'active') }}">
				  <i class="far fa-circle nav-icon"></i>
				  <p>{{ __('finance.Expense Type List') }}</p>
				</a>
			  </li>
            @endif
            @if(permissionCheck('bank_accounts.index'))
            <li class="nav-item">
				<a href="{{route('bank_accounts.index')}}" class="nav-link {{ spn_active_link($bank_account, 'active') }}">
				  <i class="far fa-circle nav-icon"></i>
				  <p>
				  {{ __('finance.Bank Account List') }}
				  </p>
				</a>
			  </li>
            @endif
            @if(permissionCheck('taxes.index'))
            <li class="nav-item">
				<a href="{{route('taxes.index')}}" class="nav-link {{ spn_active_link($tax, 'active') }}">
				  <i class="far fa-circle nav-icon"></i>
				  <p>
				  {{ __('finance.Tax List') }}
				  </p>
				</a>
			  </li>
            @endif
            @if(permissionCheck('incomes.index'))
            
			<li class="nav-item">
				<a href="{{route('incomes.index')}}" class="nav-link {{ spn_active_link($income, 'active') }}">
				  <i class="far fa-circle nav-icon"></i>
				  <p>
				  {{ __('finance.Income List') }}
				  </p>
				</a>
			  </li>
            @endif
            @if(permissionCheck('expenses.index'))
            
			<li class="nav-item">
				<a href="{{route('expenses.index')}}" class="nav-link {{ spn_active_link($expense, 'active') }}">
				  <i class="far fa-circle nav-icon"></i>
				  <p>
				  {{ __('finance.Expense List') }}
				  </p>
				</a>
			  </li>
            @endif
            @if(permissionCheck('report.profit'))
            <li class="nav-item">
				<a href="{{route('report.profit')}}" class="nav-link {{ spn_active_link('report.profit', 'active') }}">
				  <i class="far fa-circle nav-icon"></i>
				  <p>
				  {{ __('finance.Profit') }}
				  </p>
				</a>
			  </li>
            @endif
            @if(permissionCheck('report.paymentdue'))
            <li class="nav-item">
                <a href="{{route('report.paymentdue')}}" class="nav-link {{ spn_active_link('report.paymentdue', 'active') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                  {{ __('finance.Payment Due') }}
                  </p>
                </a>
              </li>
            @endif
            @if(permissionCheck('report.transaction'))
            
			<li class="nav-item">
				<a href="{{route('report.transaction')}}" class="nav-link {{ spn_active_link('report.transaction', 'active') }}">
				  <i class="far fa-circle nav-icon"></i>
				  <p>
				  {{ __('finance.Transactions') }}
				  </p>
				</a>
			  </li>
            @endif
            @if(permissionCheck('report.statement'))
            
			<li class="nav-item">
				<a href="{{route('report.statement')}}" class="nav-link {{ spn_active_link('report.statement', 'active') }}">
				  <i class="far fa-circle nav-icon"></i>
				  <p>
				  {{ __('finance.Statements') }}
				  </p>
				</a>
			  </li>
            @endif
        </ul>
    </li>
@endif

@if(permissionCheck('invoice.index'))
    @php
        $income = ['invoice.incomes.index', 'invoice.incomes.edit', 'invoice.incomes.show', 'invoice.incomes.create'];
        $expense = ['invoice.expenses.index', 'invoice.expenses.edit', 'invoice.expenses.show', 'invoice.expenses.create'];
        $nav = array_merge($income, $expense, ['invoice.settings'])
    @endphp
    <li class="nav-item {{ spn_nav_item_open($nav, 'menu-open active') }}">
        <a href="#" class="nav-link {{ spn_nav_item_open($nav, 'menu-open active') }}">
		  <i class="nav-icon fa fa-clipboard"></i>
		  <p>
			{{ __('finance.Invoices') }}
			<i class="right fas fa-angle-left"></i>
		  </p>
		</a>
        <ul class="nav nav-treeview">
            @if(permissionCheck('invoice.incomes.index'))
            <li class="nav-item">
				<a href="{{route('invoice.incomes.index')}}" class="nav-link {{ spn_active_link($income, 'active') }}">
				  <i class="far fa-circle nav-icon"></i>
				  <p>
				  {{ __('finance.Income Invoice List') }}
				  </p>
				</a>
			  </li>
            @endif
            @if(permissionCheck('invoice.expenses.index'))
            
			<li class="nav-item">
				<a href="{{route('invoice.expenses.index')}}" class="nav-link {{ spn_active_link($expense, 'active') }}">
				  <i class="far fa-circle nav-icon"></i>
				  <p>
				  {{ __('finance.Expense Invoice List') }}
				  </p>
				</a>
			  </li>
            @endif
            @if(permissionCheck('invoice.settings'))
            
			<li class="nav-item">
				<a href="{{route('invoice.settings')}}" class="nav-link {{ spn_active_link(['invoice.settings'], 'active') }}">
				  <i class="far fa-circle nav-icon"></i>
				  <p>
				  {{ __('finance.Invoice Settings') }}
				  </p>
				</a>
			  </li>
            @endif
        </ul>
    </li>
@endif
