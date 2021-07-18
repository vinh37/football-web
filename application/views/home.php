<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>mycss/home.css">
	<script src="<?php echo base_url(); ?>js/bootstrap.js"></script>
	<title>Xoilac TV Football</title>
	<style>
		.bxh>ul>li>ul>li{
			background-color: red;
			margin-top: 5px;
		}
		.bxh>ul>li>ul{
			opacity: 0;
			visibility: hidden;	
			position: absolute;
		}
		.bxh>ul>li:hover>ul{
			opacity: 1;
			visibility: visible;	
			transition: 1s;
			position: relative;
		}
		.bxh>ul>li>ul>li>ul{
			opacity: 0;
			visibility: hidden;	
			position: absolute;
			left: 300px;
			top: 1px;
			
		}
		.bxh>ul>li>ul>li>ul>li{
			background-color: yellow;
			margin-top: 5px;
			
		}
		.bxh>ul>li>ul>li:hover>ul{
			opacity: 1;
			visibility: visible;	
			transition: 1s;
			position: absolute;
		   	left: 250px;   
			width: 200px;
		}
		li.nav-item.bxh {
		    padding-top: 7px;
		}
	</style>	
</head>
<body>
	
	<div class="container">
		<div class="row mt-2 header">
			<div class="col-3 logo">
				<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url() ?>image/logo/xoilaclive.png" alt="logo"></a>
			</div>
			<div class="col-9 title-top">
				<h1>Xem bóng đá miễn phí tại xoilac.net</h1>			
				<h3>Ngoại hạng Anh , Laliga, Seria , Euro ,...</h3>
			</div>
		</div>
		<div class="row nav-bar">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
			  <div class="container-fluid">
			    <!-- <a class="navbar-brand" href="#">Home</a>
			    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			      <span class="navbar-toggler-icon"></span>
			    </button> -->
			    <div class="collapse navbar-collapse" id="navbarSupportedContent">
			      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
			      	<li class="nav-item">
			          <a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link" href="<?php echo base_url(); ?>index.php/Contact_controller">Liên hệ</a>
			        </li>		        
			        <li class="nav-item">
			          <a class="nav-link" href="<?php echo base_url() ?>index.php/news/page/1">Tin tức</a>
			        </li> 
			        <li class="nav-item bxh">
			          <!-- <a class="nav-link" href="<?php echo base_url() ?>">Bảng xếp hạng</a> -->
			          <?php
			          	function recursiveMenu($data, $parent_id=1000, $sub=true){
						    echo $sub ? '<ul>': '<ul class="sub-menu">';
						    foreach ($data as $key => $item) {
						         if($item['parent'] == $parent_id){
						            unset($data[$key]);
						          ?>    
						     <li>
						      <a href="<?php echo $item['link']?>"><?php echo $item['name']?></a>
						      
						      <?php recursiveMenu($data, $item['id'], false); ?>
						     </li>
						        <?php }} 
						     echo "</ul>";
						}
			          	foreach ($dataToShow[3] as $key => $value) {
			          		
			          		recursiveMenu($value);
			          	}
			          ?>
			          
			        </li>            
			      </ul>     
			    </div>
			  </div>
			</nav>
		</div>
		<!-- top slide -->

		<div class="row top-slide mt-2">
			<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
			  <div class="carousel-indicators">
			    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
			    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
			    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
			  </div>
			  <?php $count=1; ?>
			  <div class="carousel-inner">		  			  	
			  		<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
					  <div class="carousel-inner">
					  	<?php foreach ($dataToShow[0] as $key => $item): ?>
					  		<?php foreach ($item as $key => $value): ?>
					  			<div class="carousel-item <?php if($count==1){echo 'active';$count++;} ?>">
							       <a href="https://<?php echo $value['link_button']; ?>" target="_blank"><img src="<?php echo $value['image']; ?>" class="d-block w-100" alt="logo nha cai" height="120px"></a>
							    </div>
					  		<?php endforeach ?>					    						    
					    <?php endforeach ?>				    
					  </div>
					  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
					    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
					    <span class="visually-hidden">Previous</span>
					  </button>
					  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
					    <span class="carousel-control-next-icon" aria-hidden="true"></span>
					    <span class="visually-hidden">Next</span>
					  </button>
					</div>			    
			  </div>
			  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
			    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			    <span class="visually-hidden">Previous</span>
			  </button>
			  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
			    <span class="carousel-control-next-icon" aria-hidden="true"></span>
			    <span class="visually-hidden">Next</span>
			  </button>
			</div>
		</div>
		<!-- end top slide -->
		<div class="row list-match">
			<div class="top-list-match">
				<h3 style="color:white;font-size: 15px;padding-left: 40px;padding-top: 13px;">LINK XEM BÓNG ĐÁ TRỰC TUYẾN TỐC ĐỘ CAO, TRỰC TIẾP BÓNG ĐÁ EURO 2021</h3>
				<div class="choose-match">
					<ul>
						<li><a href="#">Tất cả</a></li>
						<li><a href="#">Trận hot</a></li>
						<li><a href="#">Đang đá</a></li>
						<li><a href="#">Hôm nay</a></li>
						<li><a href="#">Ngày mai</a></li>
					</ul>
				</div>
			</div>
			<!-- mỗi body-list-match là 1 trận đấu -->
			
				<?php foreach ($dataToShow[1] as $key => $item): ?>	
							
					<?php foreach ($item as $key => $value): ?>
						
						<div class="body-list-match mt-3 col-6 h-100">
							<div class="card" style="background-color: #fc5407;">
							  <div class="match-and-time">
							  	<div class="team-home text-center">
							  		<img src="<?php echo $value['imageHome'] ?>" alt="team home">
							  		<p class="text-light"><?php echo $value['nameHome'] ?></p>
							  	</div>
							  	<div class="time-this-match">
							  		<div style="padding-top: 23px;color: white;font-family: 'Muli',Arial,Helvetica,sans-serif;" class="text-center">
							  			<p><b><?php echo $value['time'] ?></b></p>
								  		<p><?php echo $value['date'] ?></p>
								  		<?php if($value['check']=='off')echo '<p style="padding: 5px 10px;background-color: #007bff;" class="text-center">VS</p>';
								  			else{

								  				echo '<p style="padding: 5px 10px;background-color: #007bff;" class="text-center">'.$value["scorehome"].'   :   '.$value["scoreway"].'</p>';
								  			}
								  		 ?>
								  		
							  		</div>				  		
							  	</div>
							  	<div class="team-way text-center">
							  		<img src="<?php echo $value['imageWay'] ?>" alt="team way">
							  		<p class="text-light"><?php echo $value['nameWay'] ?></p>
							  	</div>
							  </div>
							  <div class="league" style="display: flex;">
							  	<div class="d-flex justify-content-around"><span class="name-league"><?php echo $value['nameLeague'] ?></span></div>
							  	<div class="watch-match-button"><button class="btn btn-outline-info float-end">Xem ngay</button></div>
							  </div>
							</div>	
						</div>
					<?php endforeach ?>				
				<?php endforeach ?>			
			<!-- end body-list-match -->
			<!-- discription website -->
			<div class="row">
				<p class="discription-site" style="color: white;font-size: 18px;margin-top: 10px;">Xoilac TV cập nhật link xem trực tiếp bóng đá cho fan hâm mộ trong và ngoài nước qua kết nối Internet. Xem bóng đá trực tuyến với đường truyền tốc độ cao, không lag giật, có bình luận tiếng Việt tất cả các trận đấu lớn nhỏ trên toàn cầu. Xoilac.net - Địa chỉ xem bóng đá miễn phí của bạn.</p>
			</div>
			<!-- end discription -->
		</div>

		<div class="row highlight-match" style="background-color: white;margin-top: 8px;">
			<h3 style="color:#FF4500">HIGHLIGHT</h3>
			<?php foreach ($dataToShow[2] as $key => $item): ?>	
				<?php foreach ($item as $key => $value): ?>								
				<div class="card col-4" style="width: 18rem;margin-right: 30px;border-style: ridge;padding-left: 15px;">
					<a href="<?php echo base_url(); ?>index.php/Highlight_controller/handleShowVideo/<?php echo $value['id_image'] ?>">
					  <img class="card-img-top" src="<?php echo $value['image-highligh'] ?>" alt="Card image cap">
					  <div class="card-body">					  	
					    <h5 class="card-title" style="color:black;"><?php echo $value['title-image'] ?></h5>
					  </div>
					</a>
				</div>
				<?php endforeach ?>	
			<?php endforeach ?>
		</div>	
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>