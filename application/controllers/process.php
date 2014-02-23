<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Process extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('process_model');
	}
	
	public function index()
	{
		$this->load->view('home');
	}
	
	public function load($uid){
		$data['process'] = $this->process_model->load_process($uid);
		$data['controllers'] = $this->process_model->get_controllers();
		//var_dump($data['process']);
		$this->load->view('process_designer',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */