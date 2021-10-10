<!-- Required jQuery first, then Bootstrap Bundle JS -->

<script src="{{asset('assets/backend/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/backend/js/moment.js')}}"></script>
<script src="{{asset('assets/backend/vendor/slimscroll/slimscroll.min.js')}}"></script>
<script src="{{asset('assets/backend/vendor/slimscroll/custom-scrollbar.js')}}"></script>
<script src="{{asset('assets/backend/vendor/daterange/daterange.js')}}"></script>
<script src="{{asset('assets/backend/vendor/daterange/custom-daterange.js')}}"></script>
<script src="{{asset('assets/backend/vendor/polyfill/polyfill.min.js')}}"></script>

{{-- <script src="{{asset("assets/backend/vendor/apex/apexcharts.min.js")}}"></script> --}}
<script src="{{asset('assets/backend/vendor/apex/admin/visitors.js')}}"></script>
<script src="{{asset('assets/backend/vendor/apex/examples/bar/basic-bar-negative-values.js')}}"></script>
<script src="{{asset("assets/backend/vendor/morris/raphael-min.js")}}"></script>
<script src="{{asset("assets/backend/vendor/morris/morris.min.js")}}"></script>
<script src="{{asset('assets/backend/vendor/apex/admin/deals.js')}}"></script>
<script src="{{asset('assets/backend/vendor/apex/admin/income.js')}}"></script>
<script src="{{asset('assets/backend/vendor/apex/admin/customers.js')}}"></script>

<script src="{{asset('assets/backend/js/main.js')}}"></script>
<!-- Data Tables -->
<script src="{{asset('assets/backend/vendor/datatables/dataTables.min.js')}}"></script>
<script src="{{asset('assets/backend/vendor/datatables/dataTables.bootstrap.min.js')}}"></script>
<!-- Custom Data tables -->
<script src="{{asset('assets/backend/vendor/datatables/custom/custom-datatables.js')}}"></script>
<script src="{{asset('assets/backend/vendor/datatables/custom/fixedHeader.js')}}"></script>
<script src="{{asset('assets/backend/vendor/summernote/summernote-bs4.js')}}"></script>
<script src="{{asset('assets/backend/vendor/input-tags/tagsinput-custom.js')}}"></script>
<script src="{{asset('assets/backend/vendor/input-tags/tagsinput.min.js')}}"></script>
<script src="{{asset('assets/backend/vendor/input-tags/typeahead.js')}}"></script>

<script src="{{asset('assets/backend/vendor/bs-select/bs-select.min.js')}}"></script>
<script src="{{asset('assets/backend/js/jquery.easing.1.3.js')}}"></script>
<script src="{{asset('assets/backend/vendor/notify/notify.js')}}"></script>

<!-- Download / CSV / Copy / Print -->
  <script src="{{asset('assets/backend/vendor/datatables/buttons.min.js')}}"></script>
  <script src="{{asset('assets/backend/vendor/datatables/jszip.min.js')}}"></script>
  <script src="{{asset('assets/backend/vendor/datatables/pdfmake.min.js')}}"></script>
  <script src="{{asset('assets/backend/vendor/datatables/vfs_fonts.js')}}"></script>
  <script src="{{asset('assets/backend/vendor/datatables/html5.min.js')}}"></script>
  <script src="{{asset('assets/backend/vendor/datatables/buttons.print.min.js')}}"></script>

  <script src="{{asset("assets/backend/vendor/particles/particles.min.js")}}"></script>
  <script src="{{asset("assets/backend/vendor/particles/particles-custom-error.js")}}"></script>
<script>
    $(document).ready(function() {
    $('.summernote').summernote({
    height: 250,
            tabsize: 2
    });
    });</script>
<script>
    $(document).ready(function() {
    $('.summernote').summernote({
    height: 170,
            tabsize: 2
    });
    });</script>
<script>
    function readURLa(input) {
    if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
    $('#imgload').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
    }
    }
    $("#imgInp").change(function () {
    readURLa(this);
    });
  </script>
<script>
    function readURLb(input) {

    if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
    $('#imgload2').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
    }
    }

    $("#imgInp2").change(function () {
    readURLb(this);
    });
  </script>
