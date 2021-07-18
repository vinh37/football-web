<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News_model extends CI_Model {

	private $numberNewsPerPage;
	

	public function __construct()
	{
		parent::__construct();
		$this->numberNewsPerPage=5;
		
	}
	public function getListGame()
	{
		$this->db->select('*');
		return $this->db->get('list_game');

	}
	public function insertListGame($nameGame)
	{
		$data=array('name_game'=>$nameGame);
		$this->db->insert('list_game', $data);
	}
	public function updateListGame($id,$nameGame)
	{
		$this->db->where('id', $id);
		$data=array(
			'id'=>$id,
			'name_game'=>$nameGame);
		return $this->db->update('list_game', $data);
	}
	public function insertNews($title,$id_game,$quote,$content,$image)
	{

		$data=array('title'=>$title,
					'id_list_game'=>$id_game,
					'quote'=>$quote,
					'content'=>$content,
					'image'=>$image
					);
		if($this->db->insert('content_news', $data)){
			$this->load->view('successAlert');
		}
		else{
			echo 'false';
		}
	}
	public function getNews()
	{
		$this->db->select('*');
		$data=$this->db->get('content_news');
		return $data;
	}
	public function getNewsById($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$data=$this->db->get('content_news');
		return $data;
	}
	public function editNews($id,$title,$content,$image,$quote,$game)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$data=array('title'=>$title,
					'content'=>$content,
					'image'=>$image,
					'quote'=>$quote,
					'id_list_game'=>$game
					);
		return $this->db->update('content_news', $data);
	}
	public function removeNews($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		return $this->db->delete('content_news');
	}
	function numberPage(){
		$this->db->select('*');
		$data=$this->db->get('content_news');
		$data=$data->result_array();
		$numberPage=round(count($data)/$this->numberNewsPerPage);
		return $numberPage;
	}
	public function getNewsFolwPage($pageNumber)
	{
		$offset=($pageNumber-1)*$this->numberNewsPerPage;
		$this->db->select('*');
		$data=$this->db->get('content_news', $this->numberNewsPerPage, $offset);
		$data=$data->result_array();
		return $data;
	}
	public function getNewsFolwGame($idGame)
	{
		$this->db->select('*');
		$this->db->where('id_list_game', $idGame);
		$data=$this->db->get('content_news');
		$data=$data->result_array();
		return $data;
	}
}

/* End of file News_model.php */
/* Location: ./application/models/News_model.php */