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
  <title>{{ isset($title) ? $title .' | '. config('configs')->where('key','site_title')->first()->value :  config('configs')->where('key','site_title')->first()->value }}</title>
	<link rel="icon" href="{{ asset(config('configs')->where('key','favicon_logo')->first()->value) }}" type="image/png" />
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('public/AdminLTE/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{ asset($base_path . '/css/themify-icons.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('public/AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('public/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('public/AdminLTE/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/AdminLTE/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('public/AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('public/AdminLTE/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('public/AdminLTE/plugins/summernote/summernote-bs4.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/backEnd/')}}/css/style.css"/>
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
    <img class="animation__shake" src="public/AdminLTE/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  @include('partials.header')
  <!-- /.navbar -->

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
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                  System is expired, please contact the system Administrator.
                </div>
			</div>
		</div>
		@endif
		@yield('mainContent')
	</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('partials.footer')
  

  
</div>
<!-- ./wrapper -->

<!-- jQuery -->

<script type="text/javascript" src="{{asset('public/AdminLTE/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script type="text/javascript" src="{{asset('public/AdminLTE/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script type="text/javascript" src="{{asset('public/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script type="text/javascript" src="{{asset('public/AdminLTE/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script type="text/javascript" src="{{asset('public/AdminLTE/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script type="text/javascript" src="{{asset('public/AdminLTE/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/AdminLTE/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script type="text/javascript" src="{{asset('public/AdminLTE/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script type="text/javascript" src="{{asset('public/AdminLTE/plugins/moment/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/AdminLTE/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script type="text/javascript" src="{{asset('public/AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script type="text/javascript" src="{{asset('public/AdminLTE/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script type="text/javascript" src="{{asset('public/AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script type="text/javascript" src="{{asset('public/AdminLTE/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<script src="{{asset('public/bower_components/dist/js/pages/dashboard.js')}}"></script>
{!! Toastr::message() !!}
    @stack('script_before')
    @yield('scripts')
    @stack('script_after')
</body>
</html>
