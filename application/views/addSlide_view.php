<!DOCTYPE html>
<html lang="en">
<head>
  <?php include 'session_view.php';?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href=".././plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href=".././plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href=".././plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href=".././plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href=".././dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href=".././plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href=".././plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href=".././plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>jquery/jquery-3.6.0.min.js">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<?php include 'templateAdmin_view.php'; ?>
<div class="container">
		<div class="row justify-content-center">
			<div class="col-6">
				<h3 class="text-center">Add New Slide</h3>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-6">
				<form method="POST" action="SlideHomepage_controller/addSlide" enctype="multipart/form-data">
					<fieldset class="form-group">
						<label for="title">Id slide</label>
						<input name="id" type="text" class="form-control" id="id" placeholder="id">
					</fieldset>
					<fieldset class="form-group">
						<label for="title">Title slide</label>
						<input name="title" type="text" class="form-control" id="title" placeholder="Title">
					</fieldset>
					<fieldset class="form-group">
						<label for="discription">Discription slide</label>
						<input name="discription" type="text" class="form-control" id="discription" placeholder="Discription">
					</fieldset>
					<fieldset class="form-group">
						<label for="link_button">Link of button</label>
						<input name="link_button" type="text" class="form-control" id="link_button" placeholder="Link button">
					</fieldset>
					<fieldset class="form-group">
						<label for="text_button">Text of button</label>
						<input name="text_button" type="text" class="form-control" id="text_button" placeholder="Text button">
					</fieldset>
					<fieldset class="form-group">
						<label for="image">Upload image</label>
						<input name="image" type="file" class="form-control" id="image">
					</fieldset>
					<fieldset class="form-group">			
						<input name="button_submit" type="submit" class="form-control btn btn-outline-info">
					</fieldset>
				</form>
			</div>
		</div>
	</div>
<!-- jQuery -->
<script src=".././plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src=".././plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src=".././plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src=".././plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src=".././plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src=".././plugins/jqvmap/jquery.vmap.min.js"></script>
<script src=".././plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src=".././plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src=".././plugins/moment/moment.min.js"></script>
<script src=".././plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src=".././plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src=".././plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src=".././plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src=".././dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src=".././dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src=".././dist/js/pages/dashboard.js"></script>
<script>
	$('a').removeClass('active');
	$('#slide').addClass('active');
</script>
</body>
</html>

