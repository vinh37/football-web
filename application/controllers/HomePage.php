<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class HomePage extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('slide_model');
	}
	

	public function index()
	{
		//bxh
		$dataBxh=$this->slide_model->bxh(0);
		$dataBxh=array('bxhToShow'=>$dataBxh);
		// echo "<pre>";
  // 		var_dump($dataBxh);
  		
		//push data to slide top
		$dataSlide=$this->slide_model->getData();
		$dataSlide=json_decode($dataSlide,true);
		$dataSlide=array('dataSlide'=>$dataSlide);
		//$this->load->view('home',$data);

		//push data to list match
		$dataListMatch=$this->slide_model->getDbMatch();
		$dataListMatch=json_decode($dataListMatch,true);
		$dataListMatch=array('dataListMatch'=>$dataListMatch);
		//$this->load->view('home',$dataListMatch);

		//pust data to highlight match
		$dataImageHighlightMatch=$this->slide_model->getImageHighlight();
		$dataImageHighlightMatch=json_decode($dataImageHighlightMatch,true);
		$dataImageHighlightMatch=array('dataHighlightMatch'=>$dataImageHighlightMatch);

		
		//$dataBxh=array('bxhMultiLevel'=>$dataBxh);

		$data=array();
		array_push($data,$dataSlide);
		array_push($data,$dataListMatch);
		array_push($data,$dataImageHighlightMatch);
		array_push($data,$dataBxh);
		//$data=array('dataToShow'=>$data);
		
		// foreach ($data as $key => $value) {
		// 	echo "<pre>";
		// 	echo "item ...";
		// 	var_dump($data);
		// }

		$data=array('dataToShow'=>$data);
		$this->load->view('home', $data);

	}

}

/* End of file HomePage.php */
/* Location: ./application/controllers/HomePage.php */