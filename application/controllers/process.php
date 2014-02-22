<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Process extends CI_Controller {

	public function index()
	{
		$this->load->view('home');
	}
	
	public function load($uid){
		$this->load->view('process_designer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */