<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function getAccAdmin($username)
	{
		$this->db->select('*');
		$this->db->where('user', $username);
		$data=$this->db->get('account_admin');
		return $data;
	}
	public function insertAdmin($user,$pass,$email)
	{
		
		$object=array('user'=>$user,
						'pass'=>$pass,
						'email'=>$email

		);
		return $this->db->insert('account_admin', $object);
	}
}

/* End of file admin_model.php */
/* Location: ./application/models/admin_model.php */