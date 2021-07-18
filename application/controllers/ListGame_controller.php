<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ListGame_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('News_model');
	}

	public function index()
	{
		$data=$this->News_model->getListGame();
		$data=$data->result_array();	
		$data=array('listGameToShow'=>$data);
		$this->load->view('managelistgame_view',$data);
	}
	public function createGame()
	{
		$nameGame=$this->input->post('nameGame');
		$this->News_model->insertListGame($nameGame);
	}
	public function updateListGame($id)
	{	
		//echo $id;
		$nameGame=$this->input->post('nameGame');
		echo $nameGame;
		if($this->News_model->updateListGame($id,$nameGame)){
			echo 'true';
			//$this->load->view('successAlert');
		}
		else{
			echo 'false';
		}
	}
}

/* End of file News_controller.php */
/* Location: ./application/controllers/News_controller.php */