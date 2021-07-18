<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class EditVideo_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('slide_model');
	}

	public function index()
	{			
		$data=$this->slide_model->getDbHighlightMatch();
		$data=json_decode($data,true);
		// echo "<pre>";
		// var_dump($data);
		$data=array('dataVideoToEdit'=>$data);
		$this->load->view('EditVideo_view',$data);
	}
	public function handleEditdVideo()
	{
		
		$id=$this->input->post('id-video');
		$title=$this->input->post('title-video');
		$content=$_FILES["content_video"]["name"];
		$physicContent=$_FILES["content_video"]["tmp_name"];
		$content_old=$this->input->post('content_oldvideo');
		$listContent=array();
		
		for ($i=0; $i <count($content) ; $i++) { 
			if(empty($content[$i])){
				$listContent[$i]=$content_old[$i];
			}
			else{
				$folderContent='videos/'.$content[$i];
				move_uploaded_file($physicContent[$i], $folderContent);
				$listContent[$i]=base_url().'videos/'.$content[$i];
			}
		}

		// echo "<pre>";
		// var_dump($listContent);
		$data=array();
		for ($i=0; $i <count($title) ; $i++) { 
			$temp=array();
			$temp['id-video']=$id[$i];
			$temp['title-video']=$title[$i];
			$temp['content-video']=$listContent[$i];
			array_push($data,$temp);
		}
		$data=json_encode($data);
		if($this->slide_model->updateVideoHighlight($data)){
			$this->load->view('successAlert');
		}
		else{
			echo 'edit video false';
		}
	}
}

/* End of file EditVideo_controller.php */
/* Location: ./application/controllers/EditVideo_controller.php */