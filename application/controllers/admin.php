<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		// $user=$this->session->userdata('thanhcong');
		// $user=array('user'=>$user);
		if($this->session->has_userdata('thanhcong')){
			$this->load->view('admin_view');
		}
		else{
			header('Location:'. base_url().'index.php/loginadmin_controller');
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('thanhcong');
		header('Location:'. base_url().'index.php/admin');
	}
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */