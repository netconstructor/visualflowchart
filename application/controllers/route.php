<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Route extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('process_model');
	}
	
	public function index()
	{
		echo 'Route controller';
		//$this->load->view('home');
	}
	
	/*Default route for all requests*/
	public function run(){
		$argv = $this->uri->segment_array();
		$argv = $this->prepare_args($argv);
		$params = $this->prepare_params($argv);
		$controller_path = APPPATH . 'controllers/' . $argv[1] . ".php";
		if(!file_exists($controller_path)){
			show_404();
			return;
		}
		require_once $controller_path;
		if(!class_exists($argv[1])){
			show_404();
			return;
		}
		$cntrl_obj = new $argv[1](); //create object of the class
		if(!method_exists($cntrl_obj,$argv[2])){
			show_404();
			return;
		}
		//call the method with required parameters
		call_user_func_array ( array($cntrl_obj, $argv[2]) , $params );
	}
	
	private function prepare_args($argv){
		if(count($argv) == 1){
			$argv[2] = 'index';
		}
		return $argv;
	}
	
	private function prepare_params($argv){
		$num_args = count($argv);
		$params = array();
		$index = 0;
		for($i=3;$i<=$num_args;$i++){
			$params[$index++] = $argv[$i];
		}
		return $params;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */