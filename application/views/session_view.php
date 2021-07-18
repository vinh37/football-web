<?php 
	if(!$this->session->has_userdata('thanhcong')){
		header('Location:'.base_url().'index.php/loginadmin_controller');
	}
 ?>