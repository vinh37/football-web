<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css">
	<script src="<?php echo base_url(); ?>js/bootstrap.js"></script>
	<script src="<?php echo base_url(); ?>jquery/jquery-3.6.0.min.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>mycss/shownews.css">
	<title>News sport</title>
</head>
<style type="text/css">

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
	
</style>
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
	<div class="container" style="background-color:white;margin-top:15px">
		<div class="navbar">
			<ul class="top-menu">
				<?php foreach ($listGameToShow as $key => $value): ?>
					<li><a href="<?php echo base_url() ?>index.php/news/showTheoGame/<?php echo $value['id'] ?>"><?php echo $value['name_game'] ?></a></li>
				<?php endforeach ?>
				
			</ul>
		</div>
		<div class="row">
			<div class="col-6">	
				<?php foreach ($newsToShow as $key => $value): ?>			
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
			<div class="col-4" style="margin-left: 50px;">
				<a target="_blank" href="https://blog.webico.vn/top-10-cac-website-du-lich-noi-tieng-nhat-viet-nam/"><h2>Du lịch nước Nga xinh đẹp với giá cả hấp dẫn</h2></a>
				<a target="_blank" href="https://blog.webico.vn/top-10-cac-website-du-lich-noi-tieng-nhat-viet-nam/"><img src="https://dulichfestival.com.vn/images/tourspot/1111.jpg" alt="ronaldo" width="400px" height="500px"></a>
			</div>		
		</div>
		<nav aria-label="Page navigation example">
		  <ul class="pagination">
		    <li class="page-item <?php if($pageHighlight-1==0)echo 'disabled'; ?>">
		      <a class="page-link " href="<?php echo base_url(); ?>index.php/news/page/<?php echo $pageHighlight-1 ?>" aria-label="Previous">
		        <span aria-hidden="true">&laquo;</span>
		        <span class="sr-only">Previous</span>
		      </a>
		    </li>
		    	<?php 
		    		for ($i=0; $i <$numberPage ; $i++) { 
		    			if($i+1==$pageHighlight){
		    				$temp='<li class="page-item active"><a class="page-link" href="';
			    			$temp=$temp.base_url().'index.php/news/page/';
			    			$temp=$temp.$i+1;
			    			$temp=$temp.'">';
			    			$temp=$temp.$i+1;
			    			$temp=$temp.'</a></li>';
			    			echo $temp;
		    			}
		    			else{
		    				$temp='<li class="page-item"><a class="page-link" href="';
			    			$temp=$temp.base_url().'index.php/news/page/';
			    			$temp=$temp.$i+1;
			    			$temp=$temp.'">';
			    			$temp=$temp.$i+1;
			    			$temp=$temp.'</a></li>';
			    			echo $temp;
		    			}	    			
		    		}

		    	 ?>	    			       
		    <li class="page-item <?php if($pageHighlight+1>$numberPage)echo 'disabled' ?>">
		      <a class="page-link" href="<?php echo base_url(); ?>index.php/news/page/<?php echo $pageHighlight+1 ?>" aria-label="Next">
		        <span aria-hidden="true">&raquo;</span>
		        <span class="sr-only">Next</span>
		      </a>
		    </li>
		  </ul>
		</nav>
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>