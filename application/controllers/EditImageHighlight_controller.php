<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class EditImageHighlight_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('slide_model');
	}

	public function index()
	{
		$data=$this->slide_model->getImageHighlight();
		$data=json_decode($data,true);
		$data=array('dataToShow'=>$data);
		$this->load->view('EditImageHighlight_view', $data, FALSE);
	}
	public function handleEdit()
	{
		$id=$this->input->post('id-image');
		$title=$this->input->post('title-image');
		//$oldImage=$this->input->post('oldimage');
		$image=$_FILES["image-highligh"]["name"];
		$physicImage=$_FILES["image-highligh"]["tmp_name"];
		$image_old=$this->input->post('oldimage');
		$listImage=array();
		
		for ($i=0; $i <count($image) ; $i++) { 
			if(empty($image[$i])){
				$listImage[$i]=$image_old[$i];
			}
			else{
				$folderImage='imagesHighlight/'.$image[$i];
				move_uploaded_file($physicImage[$i], $folderImage);
				$listImage[$i]=base_url().'imagesHighlight/'.$image[$i];
			}
		}
		$data=array();
		
		for ($i=0; $i <count($id) ; $i++) { 
			$temp=array();
			$temp['id_image']=$id[$i];
			$temp['title-image']=$title[$i];
			$temp['image-highligh']=$listImage[$i];
			array_push($data,$temp);
		}
		$data=json_encode($data);
		if($this->slide_model->updateImageHighligh($data)){
			$this->load->view('successAlert');
		}
		else{
			echo 'action false';
		}
	}

}

/* End of file EditImageHiglight_controller.php */
/* Location: ./application/controllers/EditImageHiglight_controller.php */