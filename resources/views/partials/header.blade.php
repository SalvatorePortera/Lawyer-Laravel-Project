<!DOCTYPE html>
@if(rtl())
    <html dir="rtl"  class="rtl">
@else
    <html>
@endif
<head>
@php
        $base_path = 'public/vendor/spondonit';
    @endphp
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ isset($title) ? $title .' | '. config('configs')->where('key','site_title')->first()->value :  config('configs')->where('key','site_title')->first()->value }}</title>

  <link rel="icon" href="{{ asset(config('configs')->where('key','favicon_logo')->first()->value) }}" type="image/png" />
  <!-- Google Font: Source Sans Pro -->
  <!--link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"-->
  <!-- Font Awesome -->
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/AdminLTE/dist/css/adminlte.css')}}">
  <link rel="stylesheet" href="{{asset('public/AdminLTE/plugins/fontawesome-free/css/all.min.css')}}">
  <!--link rel="stylesheet" href="{{asset('public/AdminLTE/plugins/fontawesome-free/css/v4-shims.min.css')}}">
  <link rel="stylesheet" href="{{ asset($base_path . '/css/themify-icons.css') }}"-->
  <!-- Ionicons -->
  <!--link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"-->
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('public/AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('public/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('public/AdminLTE/plugins/jqvmap/jqvmap.min.css')}}">

  <link rel="stylesheet" href="{{asset('public/AdminLTE/plugins/toastr/toastr.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('public/AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- typehead--->
  <link rel="stylesheet" href="{{asset('public/AdminLTE/plugins/typeahead/jquery.typeahead.min.css')}}">

  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('public/AdminLTE/plugins/daterangepicker/daterangepicker.css')}}">
   <!-- Select2 -->
   <link rel="stylesheet" href="{{asset('public/AdminLTE/plugins/select2/css/select2.min.css')}}">
   <link rel="stylesheet" href="{{asset('public/AdminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('public/AdminLTE/plugins/summernote/summernote-bs4.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <!-- fileupload-->
  <link rel="stylesheet" href="{{asset('public/AdminLTE/plugins/bootstrap-fileinput/css/fileinput.min.css')}}">
  @if(rtl())
  <link rel="stylesheet" href="{{asset('public/bootstrap/dist/css/bootstrap-rtl.min.css')}}"/>
  <link rel="stylesheet" href="{{asset('public/AdminLTE/dist/css/custom.css')}}">
  @else
  <link rel="stylesheet" href="{{asset('public/bootstrap/dist/css/bootstrap.min.css')}}"/>
  @endif
  <!-- <link rel="stylesheet" href="{{asset('public/backEnd/')}}/vendors/css/nice-select.css"/>
  <link rel="stylesheet" href="{{asset('public/backEnd/')}}/vendors/css/magnific-popup.css"/>
  <link rel="stylesheet" href="{{asset('public/backEnd/')}}/vendors/js/select2/select2.css"/>
  <link rel="stylesheet" href="{{asset('public/backEnd/vendors/css/fullcalendar.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/css/parsley.css')}}"/> -->
  <link rel="stylesheet" href="{{asset('public/backEnd/css/style.css')}}"/>


        {{-- <link rel="stylesheet" href="{{asset('public/frontend/')}}/css/style.css" /> --}}
  @stack('css_before')
    @yield('css')
    @stack('css_after')
	<script>
        const SET_DOMAIN="{{ url('/')}}"
        const RTL = {{  rtl() ? "true" : "false" }};
        const LANG = "{{ session()->get('locale', Config::get('app.locale')) }}";
    </script>
</head>
<body class="sidebar-mini control-sidebar-slide-open sidebar-mini-xs sidebar-mini-md sidebar-collapse skin-purple">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('public/AdminLTE/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
  </div>
@php
    Illuminate\Support\Facades\Cache::rememberForever('languages', function() {
       return \Modules\Localization\Entities\Language::where('status', 1)->get();
    });
@endphp

<nav class="main-header navbar navbar-expand navbar-dark navbar-primary">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">
    			@if(getSystemSubscription())
    				System is Expired. Please contact the System Administrator
    			@else
    				Subscription Remaining Days : {{getSubscriptionDays()}}
    			@endif
    		</a>
	     </li>
       <li class="nav-item d-none d-sm-inline-block">
          @php
              $sizeStorage = getSizeDiskStatus();
            @endphp

          <a href="index3.html" class="nav-link">
          @if($sizeStorage['balance_storage_size']<0)
            System storage limit is exceeded. Please contact the System Administrator.
          @else
            Allocated Disk space : {{$sizeStorage['disk_storage_limit']}} MB,
            Balance Disk space : {{$sizeStorage['balance_storage_size']}} MB
          @endif
          </a>
       </li>
    </ul>
    <form class="form-inline ml-3">
        <div class="input-group input-group-sm typeahead__container">
            <input class="form-control form-control-navbar liveSearch" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
            </button>
            </div>
        </div>
    </form>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto mr-auto-navbav">
      <!-- Navbar Search -->
      <!--li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li-->
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          Language
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          @if(auth()->user()->role_id)
        <form class="navbar-form navbar-left" role="language">
            @php
                if(session()->has('locale')) {
                    $locale = session()->get('locale');
                } else{
                    session()->put('locale', config('configs')->where('key','language_name')->first()->value);
                    $locale = session()->get('locale');
                }
            @endphp

            <select name="code" id="language_code" class="form-control">
                @foreach (Illuminate\Support\Facades\Cache::get('languages') as $key => $language)
                    <option value="{{ $language->code }}"@if ($locale == $language->code) selected @endif>{{ $language->name }}</option>
                @endforeach
            </select>
        </form>
        @endif
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" target="_blank" href="{{config('configs')->where('key','help_url')->first()->value}}">
          Help
        </a>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>

        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">
                  <!-- Message Start -->
                  <div class="media">
                    <img src="{{ file_exists(auth()->user()->avatar) ? asset(auth()->user()->avatar) : asset('public/backEnd/img/staff.jpg') }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                    <div class="media-body">
                      <h3 class="dropdown-item-title">
                        {{ auth()->user()->name }}
                      </h3>
                      <p class="text-sm">Call me whenever you can...</p>
                      <p class="text-sm text-muted"><i class="fas fa-envelope mr-1"></i> {{ auth()->user()->email }}</p>
                    </div>
                  </div>
                  <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                @if(permissionCheck('setting.index'))
                      <a href="{{ route('setting.index')}}" class="profile-info-details">
                        <i class="ti-settings "></i>
                          <span>{{ __('common.Setting') }}</span>
                      </a>
                  @endif
                  @if(auth()->user()->role_id)
                      <a href="{{ route('profile_view') }}" class="profile-info-details">
                          <i class="ti-user"></i>
                          <span>{{ __('common.Profile') }}</span>
                      </a>
                  @else
                      <a href="{{ route('client.my_profile') }}" class="profile-info-details">
                          <i class="ti-user"></i>
                          <span>{{ __('common.Profile') }}</span>
                      </a>
                  @endif

                  <a href="{{ route('change_password') }}" class="profile-info-details">
                      <i class="ti-key"></i>
                      <span>{{ __('common.Change Password') }}</span>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="{{ route('logout') }}" class="dropdown-item dropdown-footer" id="logout">
                      <i class="ti-unlock"></i>
                      <span>{{__('common.Logout')}}</span>
                  </a>

        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
    <!-- Main Sidebar Container -->
    @include('partials.sidebar')

    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
	@stack('content_header')

    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
		@if(getSystemSubscription())
		<!-- Messages: style can be found in dropdown.less-->
		<div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h5><i class="icon fas fa-ban"></i> Alert!</h5>
      System is Expired, Please contact the System Administrator.
    </div>
		@endif
