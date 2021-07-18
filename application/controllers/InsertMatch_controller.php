<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class InsertMatch_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('slide_model');
	}

	public function index()
	{
		$this->load->view('insertMatch_view');
		
	}
	public function insertMatch()
	{
		$data=$this->slide_model->getDbMatch();		
		$data=json_decode($data,true);
		if($data==null)$data=array();

		$target_dir = "image/";
		$target_file = $target_dir . basename($_FILES["img-home"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		  $check = getimagesize($_FILES["img-home"]["tmp_name"]);
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
		if ($_FILES["img-home"]["size"] > 5000000) {
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
		  if (move_uploaded_file($_FILES["img-home"]["tmp_name"], $target_file)) {
		    //echo "The file ". htmlspecialchars( basename( $_FILES["img-home"]["name"])). " has been uploaded.";
		  } else {
		    echo "Sorry, there was an error uploading your file.";
		  }
		}
		$imageHome=base_url().'image/'.basename( $_FILES["img-home"]["name"]);
		$nameHome=$this->input->post('name-home');
		$time=$this->input->post('time');

		$target_file = $target_dir . basename($_FILES["img-way"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		  $check = getimagesize($_FILES["img-way"]["tmp_name"]);
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
		if ($_FILES["img-way"]["size"] > 5000000) {
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
		  if (move_uploaded_file($_FILES["img-way"]["tmp_name"], $target_file)) {
		    //echo "The file ". htmlspecialchars( basename( $_FILES["img-way"]["name"])). " has been uploaded.";
		  } else {
		    echo "Sorry, there was an error uploading your file.";
		  }
		}
		$imageWay=base_url().'image/'.basename( $_FILES["img-way"]["name"]);
		$nameWay=$this->input->post('name-way');
		$nameLeague=$this->input->post('name-league');
		$date=$this->input->post('date');

		$dataInsert=array('nameHome'=>$nameHome,
							'imageHome'=>$imageHome,
							'time'=>$time,
							'nameWay'=>$nameWay,
							'imageWay'=>$imageWay,
							'nameLeague'=>$nameLeague,
							'date'=>$date,
							'scorehome'=>'',
							'scoreway'=>'',
							'check'=>'off'
		);
		array_push($data,$dataInsert);
		$data=json_encode($data);
		if($this->slide_model->AddListMatch($data)){
			$this->load->view('successAlert');
		}
		else{
			echo 'false';
		}
	}
}

/* End of file InsertMatch_controller.php */
/* Location: ./application/controllers/InsertMatch_controller.php */