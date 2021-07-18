<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slide_model extends CI_Model {

	

	public function __construct()
	{
		parent::__construct();

		
	}
	public function getData()
	{
		$this->db->select('*');
		$this->db->where('name', 'slide_top');
		$data=$this->db->get('homepageattribute');
		$data=$data->result_array();
		foreach ($data as $key => $value) {
			$result=$value['data'];
		}
		return $result;
	}
	
	public function update($data)
	{
		$this->db->select('*');
		$this->db->where('name', 'slide_top');
		$dataUpdate = array('name' =>'slide_top','data'=>$data );
		return $this->db->update('homepageattribute', $dataUpdate);
	}
	public function getDbMatch()
	{
		$this->db->select('data');
		$this->db->where('name', 'list_match');
		$data=$this->db->get('homepageattribute');
		$data=$data->result_array();
		foreach ($data as $key => $value) {
			$result=$value['data'];
		}
		return $result;
	}
	public function updateMatch($data)
	{
		$object=array('name'=>'list_match',
						'data'=>$data
					);
		$this->db->where('name', 'list_match');
		return $this->db->update('homepageattribute', $object);
	}
	public function AddListMatch($data)
	{
		$this->db->select('*');
		$this->db->where('name', 'list_match');
		$dataUpdate = array('name' =>'list_match','data'=>$data );
		return $this->db->update('homepageattribute', $dataUpdate);
	}

	//get video match highlight
	public function getDbHighlightMatch()
	{
		$this->db->select('*');
		$this->db->where('name', 'highlight_match');
		$data=$this->db->get('homepageattribute');
		$data=$data->result_array();
		foreach ($data as $key => $value) {
			$result=$value['data'];
		}
		return $result;
	}
	public function updateImageHighligh($data)
	{
		$this->db->select('*');
		$this->db->where('name', 'image_highlight');
		$dataUpdate = array('name' =>'image_highlight','data'=>$data );
		return $this->db->update('homepageattribute', $dataUpdate);
	}
	public function updateVideoHighlight($data)
	{	
		$this->db->select('*');
		$this->db->where('name', 'highlight_match');
		$dataUpdate = array('name' =>'highlight_match','data'=>$data );
		return $this->db->update('homepageattribute', $dataUpdate);
	}
	public function AddHighLightMatch($data)
	{
		$this->db->select('*');
		$this->db->where('name', 'highlight_match');
		$dataUpdate = array('name' =>'highlight_match','data'=>$data );
		return $this->db->update('homepageattribute', $dataUpdate);
	}
	public function getImageHighlight()
	{
		$this->db->select('*');
		$this->db->where('name', 'image_highlight');
		$data=$this->db->get('homepageattribute');
		$data=$data->result_array();
		foreach ($data as $key => $value) {
			$result=$value['data'];
		}
		return $result;
	}
	public function AddImageHighlight($data)
	{
		$this->db->select('*');
		$this->db->where('name', 'image_highlight');
		$dataUpdate = array('name' =>'image_highlight','data'=>$data );
		return $this->db->update('homepageattribute', $dataUpdate);
	}
	public $show='';
	public function bxh($parent)
  	{
  		$this->db->select('*');
  		$dulieu=$this->db->get('bxh')->result_array();
  		// echo "<pre>";
  		// var_dump($dulieu);
  		return $dulieu;
  		$children =array();
  		foreach ($dulieu as $key => $value) {
  			if($value['parent']==$parent){
  				array_push($children,$value);
  			}
  		}
  		
  		if($children){
  			$this->show="<ul>";
  			foreach ($children as $key => $value) {
  					//$this->count++;
      				$this->show=$this->show. "<li> <a href='".$value['link']."'>".$value['name']."</a>";
      				$this->bxh($value['id']);
      				$this->show=$this->show. "</li>";
      				$this->show=$this->show. "</ul>";
      			}
      		$this->show=$this->show. "</ul>";
  		}
  		return $this->show;
  	}
}

/* End of file slide_model.php */
/* Location: ./application/models/slide_model.php */
