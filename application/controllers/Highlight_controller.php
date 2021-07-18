<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Highlight_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('slide_model');
	}

	public function index()
	{
		
	}
	public function handleShowVideo($id)
	{
		$data=$this->slide_model->getDbHighlightMatch();
		$data=json_decode($data,true);
		$temp=array();
		foreach ($data as $key => $value) {
			
			if($value['id-video']==$id){
				$temp=$value;
				$temp=array('dataVideoShow'=>$temp);
				// echo "<pre>";
				// var_dump($temp);
				$this->load->view('showHighlightVideo', $temp, FALSE);
			}
		}
	}
}

/* End of file Highlight_controller.php */
/* Location: ./application/controllers/Highlight_controller.php */