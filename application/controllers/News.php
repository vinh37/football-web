<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('News_model');
	}

	public function index()
	{
		$numberPage=$this->News_model->numberPage();
		$dataNews=$this->News_model->getNewsFolwPage(1);
		$dataListGame=$this->News_model->getListGame();
		$dataListGame=$dataListGame->result_array();
		$data=array('newsToShow'=>$dataNews,
					'listGameToShow'=>$dataListGame,
					'numberPage'=>$numberPage
					);
		$this->load->view('shownews',$data);
	}
	public function detailNews($id)
	{

		$data=$this->News_model->getNewsById($id);
		$data=$data->result_array();
		$data=array('dataToShow'=>$data);
		$this->load->view('newsDetail_view',$data);
	}
	public function Page($page)
	{
		$numberPage=$this->News_model->numberPage();
		$dataNews=$this->News_model->getNewsFolwPage($page);
		$dataListGame=$this->News_model->getListGame();
		$dataListGame=$dataListGame->result_array();
		$pageHighlight=$page;
		$data=array('newsToShow'=>$dataNews,
					'listGameToShow'=>$dataListGame,
					'numberPage'=>$numberPage,
					'pageHighlight'=>$pageHighlight
					);
		$this->load->view('shownews',$data);
	}
	public function showTheoGame($id)
	{
		$id=$id;
		
		$dataTin=$this->News_model->getNewsFolwGame($id);
		$dataListGame=$this->News_model->getListGame();
		$dataListGame=$dataListGame->result_array();
		$data=array('showTinTheoGame'=>$dataTin,
					'listGameToShow'=>$dataListGame,
					'id'=>$id
					);
		$this->load->view('tinTheoGame_view', $data, FALSE);
	}
}

/* End of file News.php */
/* Location: ./application/controllers/News.php */