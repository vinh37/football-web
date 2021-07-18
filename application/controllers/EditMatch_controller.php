<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class EditMatch_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('slide_model');
	}

	public function index()
	{
		
		$dataMatch=$this->slide_model->getDbMatch();
		$dataMatch=json_decode($dataMatch,true);
		$data=array(
					'matchToEdit'=>$dataMatch
		);
		$this->load->view('EditMatch_view',$data);
	}
	public function handleEditMatch()
	{
		$check=$this->input->post('check');

		$namehome=$this->input->post('name-home');
		$homeoldimage=$this->input->post('homeoldimage');
		$time=$this->input->post('time');
		$date=$this->input->post('date');
		$scorehome=$this->input->post('tisohome');
		$scoreway=$this->input->post('tisoway');
		$wayoldimage=$this->input->post('wayoldimage');
		$nameway=$this->input->post('name-way');
		$nameleague=$this->input->post('name-league');

		$newimagehome=$_FILES["img-home"]["name"];
		$physicImageHome=$_FILES["img-home"]["tmp_name"];

		$newimageway=$_FILES["img-way"]["name"];
		$physicImageWay=$_FILES["img-way"]["tmp_name"];

		$listImageHome=array();

		for ($i=0; $i <count($newimagehome) ; $i++) { 
			if(empty($newimagehome[$i])){
				$listImageHome[$i]=$homeoldimage[$i];
			}
			else{
				$folderImage='image/'.$newimagehome[$i];
				move_uploaded_file($physicImageHome[$i], $folderImage);
				$listImageHome[$i]=base_url().'image/'.$newimagehome[$i];
			}
		}

		$listImageWay=array();
		
		for ($i=0; $i <count($newimageway) ; $i++) { 
			if(empty($newimageway[$i])){
				$listImageWay[$i]=$wayoldimage[$i];
			}
			else{
				$folderImage='image/'.$newimageway[$i];
				move_uploaded_file($physicImageWay[$i], $folderImage);
				$listImageWay[$i]=base_url().'image/'.$newimageway[$i];
			}
		}
		$data=array();
		for ($i=0; $i <count($namehome) ; $i++) { 
			$temp=array();
			$temp['nameHome']=$namehome[$i];
			$temp['imageHome']=$listImageHome[$i];
			$temp['time']=$time[$i];
			$temp['nameWay']=$nameway[$i];
			$temp['imageWay']=$listImageWay[$i];
			$temp['nameLeague']=$nameleague[$i];
			$temp['scorehome']=$scorehome[$i];
			$temp['scoreway']=$scoreway[$i];
			$temp['check']='off';
			$temp['date']=$date[$i];

			array_push($data,$temp);
		}
		$data=json_encode($data);
		if($this->slide_model->updateMatch($data)){
			$this->load->view('successAlert');
		}
		else{
			echo 'false';
		}
	}
	
}

/* End of file EditMatch_controller.php */
/* Location: ./application/controllers/EditMatch_controller.php */