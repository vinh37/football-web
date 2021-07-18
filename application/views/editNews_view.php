<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'session_view.php';?>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css">
	<script src="<?php echo base_url(); ?>js/bootstrap.js"></script>
	<script src="<?php echo base_url(); ?>jquery/jquery-3.6.0.min.js"></script>
	<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
	<title>Edit News</title>
</head>
<body>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-9">
				<div class="jumbotron">				
				  <h1 class="display-4">Edit News</h1>				  
				  <hr class="my-4">
				  <div class="row">
				  	<form action="../editnews" method="post" enctype="multipart/form-data">
					  	<?php foreach ($newsToEdit as $key => $value): ?>
					  			<input name="id" type="hidden" value="<?php echo $value['id'] ?>">
					  			<fieldset class="form-group">
					  				<label for="title">Title</label>
					  				<input name="title" type="text" class="form-control" id="Title" placeholder="Title" value="<?php echo $value['title'] ?>">
					  			</fieldset>
					  			<fieldset class="form-group">
					  				<label for="game">Game</label>
					  				<select name="game" class="form-select" aria-label="Default select example">
									  <?php foreach ($showListGame as $k => $v): ?>
									  	<option <?php if($v['id']==$value['id_list_game'])echo "selected"; ?> value="<?php echo $v['id'] ?>"><?php echo $v['name_game'] ?></option>
									  <?php endforeach ?>
									</select>
					  			</fieldset>
					  			<fieldset class="form-group">
					  				<label for="content">Content</label>
					  				<textarea name="content" id="content" value="<?php echo $value['content'] ?>"></textarea>
					  			</fieldset>
					  			<fieldset class="form-group">
					  				<label for="">Image</label>
					  				<br>
					  				<input name="oldimage" type="hidden" value="<?php echo $value['image'] ?>">
					  				<img src="<?php echo $value['image'] ?>" alt="image news" width=200px >
					  				<input name="image" type="file" class="form-control" id="image">
					  			</fieldset>
					  			<fieldset class="form-group">
					  				<label for="quote">Quote</label>				  				
					  				<input name="quote" type="text" class="form-control" id="quote" value="<?php echo $value['quote'] ?>">
					  			</fieldset>
					  			<br>
					  			<input type="submit" class=" btn btn-outline-info btn-lg" value="Edit">		
					  	<?php endforeach ?>		
				  	</form>		  	
				  </div>			  	
				</div>
			</div>
		</div>
	</div>
</body>
<script>
	CKEDITOR.replace('content')
</script>
</html>