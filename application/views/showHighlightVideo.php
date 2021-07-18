<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css">
	<script src="<?php echo base_url(); ?>js/bootstrap.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>mycss/home.css">
	<title>Highlight</title>
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
		<div class="row nav-bar">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
			  <div class="container-fluid">
			    <a class="navbar-brand" href="#">Home</a>
			    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			      <span class="navbar-toggler-icon"></span>
			    </button>
			    <div class="collapse navbar-collapse" id="navbarSupportedContent">
			      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
			        <li class="nav-item">
			          <a class="nav-link" href="#">Soi kèo</a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link" href="#">Kết quả</a>
			        </li>    
			        <li class="nav-item">
			          <a class="nav-link" href="#">Lịch thi đấu</a>
			        </li> 
			        <li class="nav-item">
			          <a class="nav-link" href="#">Bảng xếp hạng</a>
			        </li>            
			      </ul>     
			    </div>
			  </div>
			</nav>
		</div>
		<div class="row video-highlight" style="background-color:white;">
			<div class="video col-8">
					
				<div class="title-video" style="font-family: inherit;font-size: 17px;margin-bottom: 7px;text-transform: uppercase;font-weight: 700;"><?php echo $dataVideoShow['title-video'] ?></div>
				<video width="712" height="420" controls autoplay>			 
	 				  <source src="<?php echo $dataVideoShow['content-video'] ?>" type="video/mp4">		
				</video>
				<p>Video <?php echo $dataVideoShow['title-video'] ?> , cập nhật kết quả và tỷ số, xem lại trận đấu , video tổng hợp bàn thắng.</p>
			</div>
			<div class="nha-cai col-4 text-center">
				<h3>NHÀ CÁI UY TÍN</h3>
				<div class="nha-cai-uy-tin" >
					<div class="nha-cai-mot" style="background-color: black;display: flex;height: 128px;" >
						<a href="http://www.iwin9.net" target="_blank"><img src="https://cdn.bongdadem.net/2020/11/WHITE-BK-HOTLIVE-01.jpg" alt="hotlive" style="padding:16px" width="224px" height="126px" ></a>
						<p style="padding:25px">Thưởng Đến 3.688.000đ</p>
					</div>
					<div class="nha-cai-mot" style="background-color: black;display: flex;height: 128px;margin-top: 5px;" >
						<a href="http://tf88.com" target="_blank"><img src="https://cdn.bongdadem.net/2020/11/logo1.png" alt="tf88" style="padding:16px" width="224px" height="126px" ></a>
						<p style="padding:25px">Thưởng Đến 5688.000đ</p>
					</div>
					<div class="nha-cai-mot" style="background-color: black;display: flex;height: 128px;margin-top: 5px;" >
						<a href="http://www.vkgame.com" target="_blank"><img src="https://cdn.bongdadem.net/2020/11/45215745124520254.jpg" alt="vigame" style="padding:16px" width="224px" height="126px" ></a>
						<p style="padding:25px">Thưởng Đến 8888.888</p>
					</div>					
					
				</div>				
			</div>
		</div>
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>