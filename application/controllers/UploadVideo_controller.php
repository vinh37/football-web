<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UploadVideo_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('slide_model');
	}

	public function index()
	{
		$this->load->view('uploadVIdeo_view');
	}
	public function handleUploadVideo()
	{
		$target_dir = "videos/";
		$target_file = $target_dir . basename($_FILES["content_video"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		  $check = getimagesize($_FILES["content_video"]["tmp_name"]);
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
		// if ($_FILES["content_video"]["size"] > 50000000) {
		//   echo "Sorry, your file is too large.";
		//   $uploadOk = 0;
		// }

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" && $imageFileType!="mp4" && $imageFileType!="ts" ) {
		  echo "Sorry, only JPG, JPEG, PNG , GIF , MP4 & TS files are allowed.";
		  $uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		  echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		  if (move_uploaded_file($_FILES["content_video"]["tmp_name"], $target_file)) {
		    echo "The file ". htmlspecialchars( basename( $_FILES["content_video"]["name"])). " has been uploaded.";
		  } else {
		    echo "Sorry, there was an error uploading your file.";
		  }
		}
		$id=$this->input->post('id-video');
		$titleVideo=$this->input->post('title-video');
		$contentVideo=base_url().'videos/'.basename( $_FILES["content_video"]["name"]);
		// echo $discription;
		// echo basename( $_FILES["content_video"]["name"]);
		$data=$this->slide_model->getDbHighlightMatch();
		$data=json_decode($data,true);
		if($data==null)$data=array();
		$dataInsert=array('id-video'=>$id,
							'title-video'=>$titleVideo,
							'content-video'=>$contentVideo
		);
		array_push($data,$dataInsert);
		$dataInsert=json_encode($data);
		if($this->slide_model->AddHighLightMatch($dataInsert)){
			$this->load->view('successAlert');
		}
		else{
			echo "False add highlight match";
		}
	}
}

/* End of file UploadVideo_controller.php */
/* Location: ./application/controllers/UploadVideo_controller.php */