<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SlideHomepage_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('slide_model');
	}

	public function index()
	{
		$this->load->view('addSlide_view');
		
	}
	public function addSlide()
	{
		$data=$this->slide_model->getData();
		$data=json_decode($data);
		if($data==null)$data=array();

		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["image"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		  $check = getimagesize($_FILES["image"]["tmp_name"]);
		  if($check !== false) {
		    echo "File is an image - " . $check["mime"] . ".";
		    $uploadOk = 1;
		  } else {
		    echo "File is not an image.";
		    $uploadOk = 0;
		  }
		}

		// Check if file already exists
		if (file_exists($target_file)) {
		  echo "Sorry, file already exists.";
		  $uploadOk = 0;
		}

		// Check file size
		if ($_FILES["image"]["size"] > 5000000) {
		  echo "Sorry, your file is too large.";
		  $uploadOk = 0;
		}

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		  $uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		  echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
		    //echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
		  } else {
		    echo "Sorry, there was an error uploading your file.";
		  }
		}
		$id=$this->input->post('id');
		$title=$this->input->post('title');
		$discription=$this->input->post('discription');
		$link_button=$this->input->post('link_button');
		$text_button=$this->input->post('text_button');
		$image=base_url().'uploads/'.basename( $_FILES["image"]["name"]);
		
		$dataAdd = array('id'=>$id,
						'title' =>$title ,
						'discription'=>$discription,
						'link_button'=>$link_button,
						'text_button'=>$text_button,
						'image'=>$image
		 );
		array_push($data,$dataAdd);
		$data=json_encode($data);
		if($this->slide_model->update($data)){
			$this->load->view('successAlert');
		}else{
			echo 'false';
		}
	}
}

/* End of file SlideHomepage_controller.php */
/* Location: ./application/controllers/SlideHomepage_controller.php */