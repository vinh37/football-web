<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Edit_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('slide_model');
	}

	public function index()
	{
		$data=$this->slide_model->getData();
		
		$data=json_decode($data,true);
		// echo "<pre>";
		// var_dump(($data));
		$data=array('dataToEdit'=>$data);
		$this->load->view('edit_view',$data);
	}
	public function Edit()
	{
		$id=$this->input->post('id');
		$title=$this->input->post('title');
		$discription=$this->input->post('discription');
		$link_button=$this->input->post('link_button');
		$text_button=$this->input->post('text_button');
		$image=$_FILES["image"]["name"];
		$physicImage=$_FILES["image"]["tmp_name"];
		$image_old=$this->input->post('image_old');
		$listImage=array();
		
		for ($i=0; $i <count($image) ; $i++) { 
			if(empty($image[$i])){
				$listImage[$i]=$image_old[$i];
			}
			else{
				$folderImage='uploads/'.$image[$i];
				move_uploaded_file($physicImage[$i], $folderImage);
				$listImage[$i]=base_url().'uploads/'.$image[$i];
			}
		}
		// echo "<pre>";
		// var_dump($listImage);
		$data=array();
		
		for ($i=0; $i <count($title) ; $i++) { 
			$temp=array();
			$temp['id']=$id[$i];
			$temp['title']=$title[$i];
			$temp['discription']=$discription[$i];
			$temp['link_button']=$link_button[$i];
			$temp['text_button']=$text_button[$i];
			$temp['image']=$listImage[$i];
			array_push($data,$temp);
		}
		$data=json_encode($data);
		if($this->slide_model->update($data)){
			$this->load->view('successAlert');
		}
		else{
			echo 'action false';
		}
	}
}

/* End of file Edit_controller.php */
/* Location: ./application/controllers/Edit_controller.php */