<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css">
	<script src="<?php echo base_url(); ?>js/bootstrap.js"></script>
	<title>Detail news</title>
	<style>
		footer{
			background-color: black;
			color: white;
		}
		a{
			text-decoration: none;
		}
		ul {
			list-style-type: none;
		}
		.menu-top li{
			float: left;
			margin-right: 20px;
		}
		.menu-top{
			background-color: black;
			color: white;
			padding-top: 5px;
			position: -webkit-sticky;
		    position: sticky;
		    top: 0;
		    margin-left: 115px;
		}
	</style>
</head>
<body>
	
		<div class="row menu-top">
			<ul>
				<li><a href="<?php echo base_url(); ?>">Home</a></li>
				<li><a href="<?php echo base_url(); ?>">BXH</a></li>
				<li><a href="<?php echo base_url(); ?>">LiveScore</a></li>
				<li><a href="<?php echo base_url(); ?>">Kết quả</a></li>
				
			</ul>
		</div>
	
	<div class="container">
		<div class="row">
			<div class="col-8">
				<?php foreach ($dataToShow as $key => $value): ?>
					<p><?php echo $value['content'] ?></p>
				<?php endforeach ?>
			</div>
		</div>
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>