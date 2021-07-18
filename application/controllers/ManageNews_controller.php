<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ManageNews_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('News_model');
	}

	public function index()
	{
		$dataListGame=$this->News_model->getListGame();		
		$dataListGame=$dataListGame->result_array();
		$dataNews=$this->News_model->getNews();
		$dataNews=$dataNews->result_array();		
		$data=array(
			'listGame'=>$dataListGame,
			'news'=>$dataNews
		);
		$this->load->view('managenews_view',$data);
	}

	public function addNews()
	{
		$target_dir = "imageNews/";
		$target_file = $target_dir . basename($_FILES["image-news"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		  $check = getimagesize($_FILES["image-news"]["tmp_name"]);
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
		if ($_FILES["image-news"]["size"] > 50000000) {
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
		  if (move_uploaded_file($_FILES["image-news"]["tmp_name"], $target_file)) {
		    //echo "The file ". htmlspecialchars( basename( $_FILES["image-news"]["name"])). " has been uploaded.";
		  } else {
		    echo "Sorry, there was an error uploading your file.";
		  }
		}
		$image=base_url().'imageNews/'.basename( $_FILES["image-news"]["name"]);		
		$title=$this->input->post('title');
		$idGame=$this->input->post('name-game');
		$quote=$this->input->post('quote');
		$content=$this->input->post('content');

		if($this->News_model->insertNews($title,$idGame,$quote,$content,$image)){
			echo 'true';
		}
		else{
			echo 'false';
		}
	}
	public function passInfoNewsToEdit($id)
	{	
		
		$data=$this->News_model->getNewsById($id);		
		$data=$data->result_array();
		//$data=array('newsToEdit'=>$data);
		$dataListGame=$this->News_model->getListGame();
		$dataListGame=$dataListGame->result_array();
		$newData=array('newsToEdit'=>$data,
						'showListGame'=>$dataListGame
		);
		$this->load->view('editNews_view', $newData, FALSE);

	}
	public function editNews()
	{
		$id=$this->input->post('id');
		$title=$this->input->post('title');
		$content=$this->input->post('content');
		$game=$this->input->post('game');
		$quote=$this->input->post('quote');
		$newImage=$_FILES['image']['name'];
		$physicImage=$_FILES['image']['tmp_name'];
		$oldimage=$this->input->post('oldimage');
		if(empty($newImage)){
			$newImage=$oldimage;
		}
		else{
			$target_dir = "imageNews/";
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
			if ($_FILES["image"]["size"] > 50000000) {
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
			    //echo "The file ". htmlspecialchars( basename( $_FILES["image-news"]["name"])). " has been uploaded.";
			  } else {
			    echo "Sorry, there was an error uploading your file.";
			  }
			}
			$newImage=base_url().'imageNews/'.$newImage;
		}
		
		
		if($this->News_model->editNews($id,$title,$content,$newImage,$quote,$game)){
			$this->load->view('successAlert');
		}else{
			echo 'false';
		}
	}
	public function removeNews($id)
	{	
		if($this->News_model->removeNews($id)){
			$this->load->view('successAlert');
		}else{
			echo 'false';
		}
	}

}

/* End of file ManageNews_controller.php */
/* Location: ./application/controllers/ManageNews_controller.php */