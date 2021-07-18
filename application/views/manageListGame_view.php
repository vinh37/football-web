<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'session_view.php';?>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css">
	<script src="https://kit.fontawesome.com/4e34373e01.js" crossorigin="anonymous"></script>
	<script src="<?php echo base_url(); ?>js/bootstrap.js"></script>
	<script src="<?php echo base_url(); ?>jquery/jquery-3.6.0.min.js"></script>
	<title>Danh mục tin</title>
</head>
<body>
	<?php include 'menuNews_view.php'; ?>
	<div class="container">
		<div class="row">
			<div class="col-6">
				<div class="jumbotron">
				  <h1 class="display-4 text-center">Thêm mới danh mục tin</h1>
				</div>
				<form>
					<fieldset class="form-group">
						<label for="nameGame">Name game</label>
						<input name="nameGame" id="nameGame" type="text" class="form-control " placeholder="Football">
					</fieldset>
					<br>
					<button class="btn btn-outline-info create-game">Tạo game</button>
				</form>
			</div>

			<div class="col-6 show-list-game">

				<?php foreach ($listGameToShow as $key => $value): ?>
					
					<div class="card text-white bg-primary mb-3" style="width: 100%;">	
					  <div class="card-header">Name game</div>	
					  <div class="card-body">
					  	<div class="icons" style="float:right">
					  		<i class="fas fa-pen btn btn-danger edit" style="margin-right: 5px;"></i>
					  		<i class="far fa-trash-alt btn btn btn-warning remove"></i>
					  	</div>
					  	<div class="abc<?php echo $value['id']?>">
					  		<h5 class="card-title"><?php echo $value["name_game"] ?></h5>
					  	</div>	    
					    <div class="d-none" style="float:right;">
					    	<i data-id="<?php echo $value['id'] ?>" class="far fa-check-square btn btn-success save"></i>
					    </div>
					    <div class="content-edit d-none">
					    	<input type="text" class="game<?php echo $value['id']?>" value="<?php echo $value['name_game']?>">
					    </div>
					  </div>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</div>
</body>
<script>
	$('body').on('click', '.create-game', function(event) {
		event.preventDefault();
		$.ajax({
			url: 'listgame_controller/createGame',
			type: 'POST',
			dataType: 'json',
			data: {
				nameGame:$('#nameGame').val(),
			},
		})
		.done(function() {
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
			var newGame='<div class="card text-white bg-primary mb-3" style="width: 100%;">';
				newGame+='<div class="card-header">Name game</div>';
				newGame+=		  '<div class="card-body">';
				newGame+='<div class="icons" style="float:right">';
				newGame+='<i class="fas fa-pen btn btn-danger edit" style="margin-right: 5px;"></i>';
				newGame+='<i class="far fa-trash-alt btn btn btn-warning remove"></i>';
				newGame+='</div>';
				newGame+='<div>';
				newGame+='<h5 class="card-title">'+$('#nameGame').val()+'</h5>';
				newGame+='</div>';	
				newGame+='<div class="d-none" style="float:right;">';
				newGame+='<i class="far fa-check-square btn btn-success save"></i>';
				newGame+='</div>';
				newGame+='<div class="content-edit d-none">';
				newGame+='<input type="text" value="'+$("#nameGame").val()+'">';
				newGame+='</div>';							
				newGame+='</div>';
				newGame+='</div>';
			$('.show-list-game').append(newGame);
			//$('#nameGame').reset();
		});
		
	});
	$('body').on('click', '.edit', function(event) {
		event.preventDefault();
		$(this).parent().next().addClass('d-none');
		$(this).parent().next().next().removeClass('d-none');
		$(this).parent().next().next().next().removeClass('d-none');
		$(this).parent().addClass('d-none');
	});
	
	$('body').on('click', '.save', function(event) {
		event.preventDefault();
		$(this).parent().addClass('d-none');
		$(this).parent().next().addClass('d-none');
		$(this).parent().prev().removeClass('d-none');
		$(this).parent().prev().prev().removeClass('d-none');
	});
	$('body').on('click', '.save', function(event) {
		event.preventDefault();
		$(this).parent().prev().children().addClass('d-none');
		var newItem='<h5 class="card-title">'+$(".game"+$(this).data("id")).val()+'</h5>';
		$('.abc'+$(this).data('id')).append(newItem)
		$.ajax({
			url: 'listgame_controller/updateListGame/'+$(this).data('id'),
			type: 'POST',
			dataType: 'json',
			data: {nameGame: $(".game"+$(this).data('id')).val()},
		})
		.done(function() {
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
			

		});		
	});

</script>
</html>