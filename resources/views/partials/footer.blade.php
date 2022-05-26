</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- ./wrapper -->
<div class="has-modal modal fade" id="showDetaildModal">
    <div class="modal-dialog modal-dialog-centered" id="modalSize">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" id="showDetaildModalTile">New Client Information</h4>
                <button type="button" class="close icons" data-dismiss="modal">
                    <i class="ti-close"></i>
                </button>
            </div>

            <!-- Modal body -->
            <div class="modal-body" id="showDetaildModalBody">

            </div>

            <!-- Modal footer -->

        </div>
    </div>
</div>


<!--  Start Modal Area -->
<div class="modal fade invoice-details" id="showDetaildModalInvoice">
    <div class="modal-dialog large-modal modal-dialog-centered" >
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Invoice</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="ti-close"></i>
                </button>
            </div>

            <div class="modal-body" id="showDetaildModalBodyInvoice">
            </div>

        </div>
    </div>
</div>


<!-- ================Footer Area ================= -->
@includeIf('partials.deleteModalAjax')
<footer class="footer-area pt-10 pb-20">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 text-center">
        <p> {!! config('configs')->where('key', 'copyright_text')->first()->value !!} </p>
            </div>
        </div>
    </div>
</footer>

</div>

<!-- jQuery -->

<script type="text/javascript" src="{{asset('public/jquery/dist/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/AdminLTE/plugins/popper/umd/popper.min.js')}}"></script>
<!-- Bootstrap 4 -->
<!-- @if(rtl())
<script type="text/javascript" src="{{asset('public/bootstrap/dist/js/bootstrap-rtl.min.js')}}"></script>
@else
<script type="text/javascript" src="{{asset('public/bootstrap/dist/js/bootstrap.min.js')}}"></script>
@endif -->
<script type="text/javascript" src="{{asset('public/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script type="text/javascript" src="{{asset('public/AdminLTE/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script type="text/javascript" src="{{asset('public/AdminLTE/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script type="text/javascript" src="{{asset('public/AdminLTE/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/AdminLTE/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- Typehead --->
<script type="text/javascript" src="{{asset('public/AdminLTE/plugins/typeahead/jquery.typeahead.min.js')}}"></script>

<!-- jQuery Knob Chart -->
<script type="text/javascript" src="{{asset('public/AdminLTE/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/AdminLTE/plugins/toastr/toastr.min.js')}}"></script>
<!-- fileupload-->
<script type="text/javascript" src="{{asset('public/AdminLTE/plugins/bootstrap-fileinput/js/fileinput.min.js')}}"></script>

<!-- daterangepicker -->
<script type="text/javascript" src="{{asset('public/AdminLTE/plugins/moment/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/AdminLTE/plugins/daterangepicker/daterangepicker.js')}}"></script>

<script type="text/javascript" src="{{asset('public/AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/AdminLTE/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/AdminLTE/dist/js/adminlte.min.js?v=3.2.0')}}"></script>
<!-- Select2 -->
<script type="text/javascript" src="{{asset('public/AdminLTE/plugins/select2/js/select2.full.min.js')}}"></script>
<!-- <script src="{{asset('public/backEnd/')}}/vendors/js/select2/select2.min.js"></script> -->
<script src="{{ asset('public/js/parsley.min.js') }}"></script>


<script>
    function trans(string, args){
        let value = _.get(window.jsi18n, string);

        _.eachRight(args, (paramVal, paramKey) => {
            value = paramVal.replace(`:${paramKey}`, value);
        });

        if(typeof value == 'undefined'){
            return string;
        }

        return value;
    }
</script>



<script type="text/javascript" src="{{asset('public/AdminLTE/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/AdminLTE/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/AdminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/AdminLTE/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>


<script type="text/javascript" src="{{asset('public/AdminLTE/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/AdminLTE/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script type="text/javascript" src="{{asset('public/AdminLTE/plugins/jszip/jszip.min.js')}}"></script>

<script src="{{asset('public/frontend/')}}/vendors/nestable/jquery.nestable.js"></script>
<script src="{{ asset('public/backEnd/vendors/js/loadah.min.js') }}"></script>
<script src="{{ asset('public/backEnd/js/parsley_i18n/'.session()->get('locale', Config::get('app.locale')).'.js') }}"></script>

<!-- <script src="{{asset('public/backEnd/')}}/vendors/js/nice-select.min.js"></script>
<script src="{{asset('public/backEnd/')}}/vendors/js/jquery.magnific-popup.min.js"></script>
<script src="{{asset('public/backEnd/')}}/js/sweetalert.min.js"></script> -->
<!-- <script src="{{asset('public/backEnd/')}}/js/custom.js"></script> -->
<!-- <script src="{{asset('public/backEnd/')}}/js/main.js"></script> -->
<!-- <script src="{{asset('public/backEnd/')}}/js/developer.js"></script> -->



<script src="{{ asset('public/js/main.js') }}"></script>
{!! Toastr::message() !!}
@stack('admin.scripts')
@stack('js_before')
@stack('js_after')
@stack('scripts')
<script type="text/javascript">

    _formValidation('#item_delete_form', true, 'deleteAdvocateItemModal')
    setTimeout(function() {
        $('.preloader').fadeOut('slow', function() {
            $(this).hide();
        });
    }, 0);


    // for select2 multiple dropdown in send email/Sms in Individual Tab
    $("#selectStaffss").select2();
    $("#checkbox").click(function () {
        if ($("#checkbox").is(':checked')) {
            $("#selectStaffss > option").prop("selected", "selected");
            $("#selectStaffss").trigger("change");
        } else {
            $("#selectStaffss > option").removeAttr("selected");
            $("#selectStaffss").trigger("change");
        }
    });


    // for select2 multiple dropdown in send email/Sms in Class tab
    $("#selectSectionss").select2();
    $("#checkbox_section").click(function () {
        if ($("#checkbox_section").is(':checked')) {
            $("#selectSectionss > option").prop("selected", "selected");
            $("#selectSectionss").trigger("change");
        } else {
            $("#selectSectionss > option").removeAttr("selected");
            $("#selectSectionss").trigger("change");
        }
    });

</script>

 <script>


    $('.close_modal').on('click', function() {
        $('.custom_notification').removeClass('open_notification');
    });
    $('.notification_icon').on('click', function() {
        $('.custom_notification').addClass('open_notification');
    });
    $(document).click(function(event) {
        if (!$(event.target).closest(".custom_notification").length) {
            $("body").find(".custom_notification").removeClass("open_notification");
        }
    });
    function startDataTable(){
        $("table.dt").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('.dataTables_wrapper .col-md-6:eq(0)');
    }


    $(document).ready(function () {
        $('.date').datetimepicker({
            format: 'L'
        });
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });
        $('.select2nsb').select2({
            minimumResultsForSearch: -1,
            theme: 'bootstrap4'
        });
        //$('.datetime').datetimepicker({format: 'LT'});
        $('#language_code').on('change', function () {
            var code = $(this).val();
            $.post('{{ route('language.change') }}', {_token: '{{ csrf_token() }}', code: code}, function (data) {

                if (data.success) {
                    //location.reload();
                    toastr.options = {
                        animation: true,
                          autohide: false,
                          delay: 9999
                    };
                    toastr.options.timeOut = 30000; // 3s
                    console.log(toastr);
                    toastr.error(data.success);
                } else {
                    toastr.error(data.error);
                }
            });
        });
        startDataTable();
    });
</script>

<script src="{{asset('public/backEnd/')}}/js/search.js"></script>
@yield('script')
</body>
</html>
