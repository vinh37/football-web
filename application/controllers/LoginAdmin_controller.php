<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LoginAdmin_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
	}

	public function index()
	{
		$this->load->view('adminLogin_view');
	}
	public function checkAdmin()
	{
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$data=$this->admin_model->getAccAdmin($username);
		$data=$data->result_array();

		if($data==null){
			header('Location:'. base_url().'index.php/loginadmin_controller');
		}
		
		foreach ($data as $key => $value) {		
			if($username==$value['user']&&$password==$value['pass']){
				$this->session->set_userdata( 'thanhcong',$username);
				header('Location:'. base_url().'index.php/admin');
			}
			else{
				header('Location:'. base_url().'index.php/loginadmin_controller');
			}
		}
	}
	public function registerAdmin()
	{
		$this->load->view('registerAdmin');
	}
	public function handleRegister()
	{
		$user=$this->input->post('user');
		$email=$this->input->post('email');
		$pass=$this->input->post('password');
		if($this->admin_model->insertAdmin($user,$pass,$email)){
			$message = "Register success";
			echo "<script type='text/javascript'>alert('$message');</script>";
			header('Location:'.base_url().'index.php/loginadmin_controller');
		}
		else{
			echo " false";
		}
	}
}

/* End of file LoginAdmin_controller.php */
/* Location: ./application/controllers/LoginAdmin_controller.php */