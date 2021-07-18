<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'session_view.php';?>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css">
	<script src="https://kit.fontawesome.com/4e34373e01.js" crossorigin="anonymous"></script>
	<script src="<?php echo base_url(); ?>js/bootstrap.js"></script>	
	<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
	<script src="<?php echo base_url(); ?>jquery/jquery-3.6.0.min.js"></script>
	<title>Manage News</title>
</head>
<body>
	<?php include 'menuNews_view.php'; ?>
		<div class="row">
			<div class="col-6">
				<div class="jumbotron text-center">
				  <h1 class="display-4">Thêm tin tức</h1>			  
				  <hr class="my-4">
				  <form action="managenews_controller/addNews" method="post" enctype="multipart/form-data">
				  	<fieldset class="form-group">
				  		<label for="title">Title</label>
				  		<input name="title" type="text" class="form-control" id="title" placeholder="title">
				  	</fieldset>
				  	<fieldset class="form-group">
				  		<label for="image-news">Image</label>
				  		<input name="image-news" type="file" class="form-control" id="image-news">
				  	</fieldset>
				  	<br>
				  	<fieldset class="form-group">
				  		<select class="form-select" aria-label="Default select example" name="name-game">
						  <option selected>---Select game---</option>
						  <?php foreach ($listGame as $key => $value): ?>
						  	<option value="<?php echo $value['id'] ?>"><?php echo $value['name_game'] ?></option>
						  <?php endforeach ?>
						  
						</select>
				  	</fieldset>
				  	<fieldset class="form-group">
				  		<label for="quote">Quote</label>
				  		<br>
				  		<textarea name="quote"></textarea>
				  	</fieldset>
				  	<fieldset class="form-group">
				  		<label for="editor">Content</label>
				  		<br>
				  		<textarea name="content" id="editor"></textarea>
				  	</fieldset>				  	
				  	<input type="submit" class="btn btn-outline-info" value="Thêm tin">
				  </form>
				</div>
			</div>
			<div class="col-6">
				<div class="jumbotron text-center">
				  <h1 class="display-4">Danh sách tin tức</h1>				  
				  <hr class="my-4">
				  <div class="row">
				  	<?php foreach ($news as $key => $value): ?>
				  		<div class="col-4">
				  		<div class="card-group">
					  		<div class="card">
					  			<img class="card-img-top" src="<?php echo $value['image'] ?>" alt="image news">
					  			<div class="card-body">
					  				<h4 class="card-title"><?php echo $value['title'] ?></h4>
					  				<p class="card-text"><?php echo $value['quote'] ?></p>
					  				<p class="card-text"><small class="text-muted"><?php echo date('d/m/Y',$value['date_create']) ?></small></p>
					  			</div>
					  			<a href="<?php echo base_url(); ?>index.php/managenews_controller/passInfoNewsToEdit/<?php echo $value['id'] ?>"><i class="fas fa-pen"></i></a>
					  			<a href="<?php echo base_url(); ?>index.php/managenews_controller/removeNews/<?php echo $value['id'] ?>"><i class="far fa-trash-alt"></i></a>
					  			
					  		</div>					  				  		
				  		</div>
				  	</div>
				  	<?php endforeach ?>				  	
				  </div>			  	
				</div>
			</div>
		</div>
	
</body>
<script>
	
        CKEDITOR.replace( 'editor' );
</script>
</html>