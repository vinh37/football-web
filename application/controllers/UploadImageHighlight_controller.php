<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UploadImageHighlight_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('slide_model');
	}

	public function index()
	{
		$this->load->view('addImageHighlight_view');
	}
	public function handleUploadImageHighligh()
	{
		$target_dir = "imagesHighlight/";
		$target_file = $target_dir . basename($_FILES["image-highligh"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		  $check = getimagesize($_FILES["image-highligh"]["tmp_name"]);
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
		if ($_FILES["image-highligh"]["size"] > 5000000) {
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
		  if (move_uploaded_file($_FILES["image-highligh"]["tmp_name"], $target_file)) {
		    echo "The file ". htmlspecialchars( basename( $_FILES["image-highligh"]["name"])). " has been uploaded.";
		  } else {
		    echo "Sorry, there was an error uploading your file.";
		  }
		}
		$id=$this->input->post('id-image');
		$titleImageHighlight=$this->input->post('title-image');
		$imageHighlight=base_url().'imagesHighlight/'.basename( $_FILES["image-highligh"]["name"]);
		// echo $discription;
		// echo basename( $_FILES["content_video"]["name"]);
		$data=$this->slide_model->getImageHighlight();
		$data=json_decode($data,true);
		if($data==null)$data=array();
		$dataInsert=array('id_image'=>$id,
							'title-image'=>$titleImageHighlight,
							'image-highligh'=>$imageHighlight
		);
		array_push($data,$dataInsert);
		$dataInsert=json_encode($data);
		if($this->slide_model->AddImageHighlight($dataInsert)){
			$this->load->view('successAlert');
		}
		else{
			echo "False add highlight match";
		}
	}
}

/* End of file UploadImageHighlight_controller.php */
/* Location: ./application/controllers/UploadImageHighlight_controller.php */