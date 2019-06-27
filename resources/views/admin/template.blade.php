<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>UAB "Girteka"</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- lightbox -->

  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ asset('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('assets/bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/dist/css/skins/_all-skins.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/iCheck/all.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/bower_components/select2/dist/css/select2.min.css') }}">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="stylesheet" href="{{ asset('assets/bower_components/morris.js/morris.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/bower_components/jvectormap/jquery-jvectormap.css') }}">


	<!-- jQuery 2.2.3 -->
	<link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/admin_style.css') }}">
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">



<!-- PRANESIMAI -->

<div id="modalPranesimas" class="modal fade modal-success" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Pranešimas</h4>
      </div>
      <div class="modal-body">
        <p>Txt</p>
      </div>
      <div class="modal-footer">
		<!--<button type="button" class="btn btn-primary">Save changes</button>-->
        <button type="button" class="btn btn-outline" data-dismiss="modal">Uždaryti</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- ********** -->

<!-- ERRORAS -->

<div id="modalKlaida" class="modal fade modal-danger" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Pranešimas</h4>
      </div>
      <div class="modal-body">
        <p>Txt</p>
      </div>
      <div class="modal-footer">
		<!--<button type="button" class="btn btn-primary">Save changes</button>-->
        <button type="button" class="btn btn-outline" data-dismiss="modal">Uždaryti</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- ********** -->

<!-- PERSPĖJIMAS -->

<div id="modalPerspejimas" class="modal fade modal-warning" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Pranešimas</h4>
      </div>
      <div class="modal-body">
        <p>Txt</p>
      </div>
      <div class="modal-footer">
		<!--<button type="button" class="btn btn-primary">Save changes</button>-->
        <button type="button" class="btn btn-outline" data-dismiss="modal">Uždaryti</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- ********** -->




<div class="wrapper">

 <!-- Header -->
    @include('admin/header')
  <!-- Sidebar -->
    @include('admin/sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	@if(Session::has('klaida'))
	<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Klaida!</h4>
                {{Session::get('klaida')}}
              </div>
	@endif
	@if (Session::has('gerai'))
	<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Pranešimas!</h4>
                {{Session::get('gerai')}}
              </div>
	@endif
      <h1>
		@if(isset($lapo_pavadinimas))
			{{$lapo_pavadinimas}}
		@else
			{{"Pradžia"}}
		@endif
        <small>
		@if(isset($lapo_optional))
			{{$lapo_optional}}
		@endif
		</small>
      </h1>
     <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>-->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
		@yield('content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Footer -->
    @include('admin/footer')

  <!-- Control Sidebar -->

</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- <script src="{{ asset('assets/lightbox/js/lightbox.js') }}"></script>
<script src="{{ asset('assets/plugins/jQueryUI/jquery-ui.min.js') }}"></script>

Bootstrap 3.3.6 
<script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>-->
<!-- AdminLTE App -->

<script src="{{ asset('assets/dist/js/app.min.js') }}"></script>
	

<!-- MANO scriptai -->

<script src="{{ asset('assets/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('assets/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>

<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Morris.js charts -->
<!--<script src="{{ asset('assets/bower_components/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('assets/bower_components/morris.js/morris.min.js') }}"></script>-->
 Sparkline 
<script src="{{ asset('assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('assets/bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('assets/bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('assets/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('assets/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) 
<script src="{{ asset('assets/dist/js/pages/dashboard.js') }}"></script>-->
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/plugins/iCheck/icheck.js') }}"></script>
<script src="{{ asset('assets/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/dist/js/demo.js') }}"></script>
<!--<script src="{{ asset('assets/dist/js/main.js') }}"></script>
 Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
	 <script>
function matchStart (term, text) {
if (text.toUpperCase().indexOf(term.toUpperCase()) == 0) {
return true;
}

return false;
}
//Red color scheme for iCheck
    $('input[type="checkbox"].minimal-blue, input[type="radio"].minimal-blue').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
	
	$(document).ready(function() {
  $(".select2").select2({
  minimumResultsForSearch: Infinity
});
	$("#gamintojai").select2({
		minimumResultsForSearch: 2
	});
	$("#gamintojas").select2({
		minimumResultsForSearch: 2
	});
	$("#modeliai").select2({
		minimumResultsForSearch: 2
	});
	$("#miestas").select2({
		minimumResultsForSearch: 2
	});
	
	$.fn.select2.amd.require(['select2/compat/matcher'], function (oldMatcher) {
  $("#gamintojai").select2({
    matcher: oldMatcher(matchStart)
  });
  $("#modeliai").select2({
    matcher: oldMatcher(matchStart)
  });
  $("#miestas").select2({
    matcher: oldMatcher(matchStart)
  });
});

$(".select2.paieska").select2();
});
  /*$( function() {

    $( "#sortable" ).sortable({
		stop: update_rikiavima,
		helper: function(e, tr)
				{
					var $originals = tr.children();
					var $helper = tr.clone();
					$helper.children().each(function(index)
					{
						// Set helper cell sizes to match the original sizes
						$(this).width($originals.eq(index).outerWidth());
					});
					return $helper;
				}
	});
    //$( "#sortable" ).disableSelection();
  });*/
</script>
</body>
</html>
