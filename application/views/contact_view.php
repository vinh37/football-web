<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css">
	<script src="<?php echo base_url(); ?>js/bootstrap.js"></script>
	<script src="<?php echo base_url(); ?>jquery/jquery-3.6.0.min.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>mycss/home.css">
	<title>Contact</title>
</head>
<body>
	<div class="container">
		<div class="row mt-2 header">
			<div class="col-3 logo">
				<a href="<?php echo base_url(); ?>"><img src="https://xoilac.net/wp-content/themes/bongda/dist/images/logo-xoilac-1.png" alt="logo"></a>
			</div>
			<div class="col-9 title-top">
				<h1>Xem bóng đá miễn phí tại xoilac.net</h1>			
				<h3>Ngoại hạng Anh , Laliga, Seria , Euro ,...</h3>
			</div>
		</div>
		<div class="row mt-2" style="background-color:white;">
			<div class="col-6 offset-3" style="margin-bottom: 5px;">
				<h3 class="text-center">Liên hệ chúng tôi </h3>
					<form id="idForm">
					<fieldset class="form-group">
						<label for="name">Người gửi</label>
						<input name="name" type="text" class="form-control" id="name" placeholder="Nguyễn Văn A">
					</fieldset>
					<fieldset class="form-group">
						<label for="name">Tiêu đề</label>
						<input name="title" type="text" class="form-control" id="title" placeholder="Liên hệ quảng cáo">
					</fieldset>
					<fieldset class="form-group">
						<label for="email">Email của bạn</label>
						<input name="email" type="email" class="form-control" id="email" placeholder="yourname@gmail.com">
					</fieldset>
					<br>
					<fieldset class="form-group">
						<label for="content">Nội dung</label><br>
						<textarea name="content" id="content" cols="50"></textarea>
					</fieldset>
					<br>
					<fieldset class="form-group">						
						<button type="button" class="btn btn-outline-info send" >Gửi</button>
						<div class="success"></div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('.send').click(function (e) {
			e.preventDefault();
			$.ajax({
				url: 'contact_controller/handleContact',
				type: 'POST',
				dataType: 'json',
				data: {
					name:$('#name').val(),
			  		title:$('#title').val(),
			  		email:$('#email').val(),
			  		content:$('#content').val()
			  		}
			})
			.done(function() {
				console.log("success");
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
				$('#idForm')[0].reset();
				$('.success').append('<h3 class="alert-success">Bạn đã gửi thành công</h3>');
				// setTimeout(function() {
				// 	$('.success').remove(".alert-success");
				// },2000);
			});
			
		});
	})
	</script>
	<?php include 'footer.php'; ?>
	
		
	
</body>		
</html>