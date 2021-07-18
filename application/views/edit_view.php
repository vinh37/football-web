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
<?php include 'templateAdmin_view.php'; ?>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-8">
				<h3 class="text-center">Edit Content Slide</h3>
			</div>
		</div>
		<div class="row justify-content-center">
				<?php $count=1; ?>
				<div class="col-8">
					<form method="POST" action="Edit_controller/Edit" enctype="multipart/form-data">
						<?php foreach ($dataToEdit as $key => $value): ?>
						<div class="one-sile">
							<h3><?php echo "Slide number ".$count++; ?></h3>
							<button class="btn btn-outline-info remove-slide" data-href="removeslide_controller/removeSlide/<?php echo $value['id'] ?>">Xóa slide này</button>
							<fieldset class="form-group">
								<label for="title">Id slide</label>
								<input name="oldid" type="hidden" value="<?php echo $value['id'] ?>">
								<input name="id[]" value="<?php echo $value['id'] ?>" type="text" class="form-control" >
							</fieldset>
							<fieldset class="form-group">
								<label for="title">Title slide</label>
								<input name="title[]" value="<?php echo $value['title'] ?>" type="text" class="form-control" >
							</fieldset>
							<fieldset class="form-group">
								<label for="discription">Discription slide</label>
								<input name="discription[]" value="<?php echo $value['discription'] ?>" type="text" class="form-control"  placeholder="Discription">
							</fieldset>
							<fieldset class="form-group">
								<label for="link_button">Link of button</label>
								<input name="link_button[]" value="<?php echo $value['link_button'] ?>" type="text" class="form-control"  placeholder="Link button">
							</fieldset>
							<fieldset class="form-group">
								<label for="text_button">Text of button</label>
								<input name="text_button[]" value="<?php echo $value['text_button'] ?>" type="text" class="form-control"  placeholder="Text button">
							</fieldset>
							<fieldset class="form-group">
								<label for="image">Upload image</label>
								<input name="image_old[]" type="hidden" value="<?php echo $value['image'] ?>">
								<img src="<?php echo $value['image'] ?>" alt="image slide" width="30%">
								<input name="image[]" type="file" class="form-control" >
							</fieldset>					
						</div>
						<?php endforeach ?>
						<fieldset class="form-group">			
							<input name="button_submit" type="submit" class="form-control btn btn-outline-info">
						</fieldset>
					</form>
				</div>						
		</div>
	</div>
<!-- jQuery -->
<script type="text/javascript">
	$('body').on('click', '.remove-slide', function(event) {
		event.preventDefault();
		xoa=$(this).parent();
		linkxoa=$(this).data('href');
		console.log('chay ko');
		$.ajax({
			url: linkxoa,
			type: 'POST',
			dataType: 'json',
			
		})
		.done(function() {
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
			xoa.remove();
		});
		
	});
</script>
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

