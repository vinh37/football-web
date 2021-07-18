<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class RemoveSlide_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('slide_model');
	}

	public function index()
	{
		
	}
	public function removeSlide($idRemove)
	{
		$data=$this->slide_model->getData();
		$data=json_decode($data,true);
		
		$temp=array();
		foreach ($data as $key => $value) {
			if($value['id']!=$idRemove){
				array_push($temp,$value);
			}
		}
		// echo "<pre>";
		// var_dump($temp);
		$data=json_encode($temp);
		if($this->slide_model->update($data)){
			echo "true";
		}
		else{
			echo 'false';
		}
	}
}

/* End of file RemoveSlide_controller.php */
/* Location: ./application/controllers/RemoveSlide_controller.php */