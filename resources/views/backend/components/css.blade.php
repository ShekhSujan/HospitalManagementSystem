<link rel="stylesheet" href="{{asset("assets/backend/css/bootstrap.min.css")}}">
<link rel="stylesheet" href="{{asset("assets/backend/fonts/style.css")}}">
<link rel="stylesheet" href="{{asset("assets/backend/css/main.css")}}">
<link rel="stylesheet" href="{{asset("assets/backend/vendor/daterange/daterange.css")}}" />
<!-- Data Tables -->
<link rel="stylesheet" href="{{asset("assets/backend/vendor/datatables/dataTables.bs4.css")}}" />
<link rel="stylesheet" href="{{asset("assets/backend/vendor/datatables/dataTables.bs4-custom.css")}}" />
<link href="{{asset("assets/backend/vendor/datatables/buttons.bs.css")}}" rel="stylesheet" />

<link rel="stylesheet" href="{{asset("assets/backend/vendor/summernote/summernote-bs4.css")}}" />
<link rel="stylesheet" href="{{asset("assets/backend/vendor/input-tags/tagsinput.css")}}" />
<link rel="stylesheet" href="{{asset("assets/backend/vendor/notify/notify-flat.css")}}" />
<link rel="stylesheet" href="{{asset("assets/backend/vendor/bs-select/bs-select.css")}}" />
<link rel="stylesheet" href="{{asset("assets/backend/vendor/notify/notify-flat.css")}}" />
<link rel="stylesheet" href="{{asset("assets/backend/vendor/morris/morris.css")}}" />
<script src="{{asset("assets/backend/js/jquery.min.js")}}"></script>
<script src="{{asset("assets/backend/vendor/apex/apexcharts.min.js")}}"></script>
<script src="{{asset("assets/backend/vendor/morris/raphael-min.js")}}"></script>
<script src="{{asset("assets/backend/vendor/morris/morris.min.js")}}"></script>
<link rel="stylesheet" href="{{asset("assets/backend/vendor/particles/particles.css")}}">

<style>
/* Automatic Serial Number Row */
.css-serial tbody{
  counter-reset: serial-number; /* Set the serial number counter to 0 */
}
.css-serial tbody td:first-child:before {
  counter-increment: serial-number; /* Increment the serial number counter */
  content: counter(serial-number); /* Display the counter */
}
.label-design{
  display: block;
  background-color: #225de4;
  padding-left: 5px;
  padding-bottom: 5px;
  margin-bottom: 5px;
  color: #fff;
}
.m-button1{
  margin: 0px 10px 0px -5px;
  padding: 0px -5px 0px -5px;
}
.m-button2{
  margin: 0px -5px 0px -5px;
  padding: 0px -5px 0px -5px;
}
.app-actions li a {
  color: #fdfdfd;
  background: #225de4;
}
</style>

<script type="text/javascript">
function modalview(id) {
  var img = $('.img').val();
  //  alert(img);
  $('#adid').val(id);
  $('#img').val(img);
  //  alert(as);
}
function modalview_app(id) {
  $('#id-app').val(id);
}
function modalviews(id) {
  $('#adids').val(id);
}
function discharge(id) {
  $('#did').val(id);
}
</script>

<script>
$(document).ready(function () {
  $("#chkSelectAll").on('click', function () {
    // alert('okk');
    this.checked ? $(".chkDel").prop("checked", true) : $(".chkDel").prop("checked", false);
  })
})
</script>
<style>
.icn-size{
  height: 40px!important;
  width: 40px!important;
}
</style>
<style>
@page {
  size: A4 portrait;
  /*size: portrait;*/
  margin: 0px;
}
@media screen {
  div.divFooter {
    display: none;
  }

  div.divHeader {
    display: none;
  }
}
@media print {
  body * {
    visibility: hidden;
  }

  div.divHeader {
    position: fixed;
    top: 0;
  }

  div.divFooter {
    position: fixed;
    bottom: 0;
  }

  #printableArea, #printableArea * {
    visibility: visible;
  }
  #printableArea {
    position: absolute;
    left: 0;
    top: 50;
    padding:0 70px
  }
  .printableAreas {
    position: absolute;
    left: 0;
    top: 50;
    padding:0 70px;
    margin-top:-1000px!important;
  }
  #hid{
    display: none;
  }
  .hdd{
    display: none;
  }
  .content{

    margin: 0px;
  }
}
</style>
<script>
$(document).ready(function () {
  $("#print").click(function () {
    $("#pin-sidebar").click();
    window.print();
    $("#pin-sidebar").click();
    ;
  });
});
</script>
