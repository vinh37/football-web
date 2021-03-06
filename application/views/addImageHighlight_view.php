<!DOCTYPE html>
<html lang="en">
<head>

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
  <?php include 'session_view.php';?>
<?php include 'templateAdmin_view.php'; ?>
<div class="container text-center mt-3">
	<div class="row justify-content-center">
		<div class="col-6">
			<h3>Upload Image Highlight Here!</h3>
			<form method="POST" action="UploadImageHighlight_controller/handleUploadImageHighligh" enctype="multipart/form-data">
				<fieldset class="form-group">
					<label for="id-image">Id image</label>
					<input name="id-image" type="text" class="form-control" id="id-image" placeholder="Ex : 1">
				</fieldset>
				<fieldset class="form-group">
					<label for="title-image">Discription image</label>
					<input name="title-image" type="text" class="form-control" id="title-image" placeholder="Ex : Highlight tr???n ?????u Vi???t Nam v?? Th??i Lan ng??y 14/07">
				</fieldset>
				<fieldset class="form-group">
					<label for="image-highligh">File image</label>
					<input name="image-highligh" type="file" class="form-control" id="image-highligh" >
				</fieldset>
				<button type="submit" class="btn btn-outline-info">Add Image</button>
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
	$('#highlightImage').addClass('active');
</script>
</body>
</html>

