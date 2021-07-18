<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css">
	<script src="<?php echo base_url(); ?>js/bootstrap.js"></script>
	<title>Tin theo game</title>
	<style type="text/css">
	a{
		text-decoration: none;
		color: black;
	}
	ul{
		list-style-type: none;
	}
	.navbar > ul > li{
		float: left;
		margin-right: 25px;
		margin-top: 11px;
		font-weight: 500;
		font-size: 25px;
	}

	.page-footer ul li{
		color: blue;
	}
	.top-menu > ul > li{
		float: left;
		margin-right: 25px;
		margin-top: 11px;
		font-weight: 500;
		font-size: 25px;
		color: white;
	}
	body{
		background-image: url("<?php echo base_url() ?>image/c1.jpg");
	}
	.active{
		background-color: yellow;
		border: 2px solid yellow;
		border-radius: 20px;
	}
</style>
</head>
<body>
	<div class="container">
		<div class="row mt-2 header">
			<div class="col-4 logo">
				<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url() ?>image/logo/xoilaclive.png" alt="logo"></a>
			</div>
			<div class="col-8 title-top" style="color: white;">
				<h1>Xem bóng đá miễn phí tại xoilac.net</h1>			
				<h3>Ngoại hạng Anh , Laliga, Seria , Euro ,...</h3>
			</div>
		</div>
	</div>
	<div class="container" style="background-color:white;">
		<div class="navbar">
			<ul class="top-menu">
				<?php foreach ($listGameToShow as $key => $value): ?>
					<li <?php if($id==$value['id'] )echo 'class'.'='."'active'" ?>><a href="<?php echo base_url() ?>index.php/news/showTheoGame/<?php echo $value['id'] ?>"><?php echo $value['name_game'] ?></a></li>
				<?php endforeach ?>
				
			</ul>
		</div>
		<div class="row">
			<div class="col-6">
				<?php foreach ($showTinTheoGame as $key => $value): ?>
					<div class="onenews">
					<div class="content d-flex row" style="padding:5px">				
						<div class="discription col-8" style="padding-right: 30px;">
							<a href="<?php echo base_url(); ?>index.php/news/detailNews/<?php echo $value['id'] ?>">
								<h2><?php echo $value['title'] ?></h2>
							</a>
							<a href="<?php echo base_url(); ?>index.php/news/detailNews/<?php echo $value['id'] ?>">
								<p><?php echo $value['quote'] ?></p>
							</a>
						</div>
						<div class="img col-4">
							<a href="<?php echo base_url(); ?>index.php/news/detailNews/<?php echo $value['id'] ?>"><img src="<?php echo $value['image'] ?>" alt="image news" width="200px">
							</a> 
						</div>
					</div>
					<hr>
				</div>
				<?php endforeach ?>
			</div>
		</div>
	</div>
</body>
</html>