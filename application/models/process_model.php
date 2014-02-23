<?php
class process_model extends CI_Model{
	public function __construct(){
		
	}
	
	public function load_process($uid){
		$process = array();
		$steps = $this->db->query("	SELECT CONCAT('WF_STEP_',ps.id) id,
									ps.step_name, st.step_type_name, sp.position_x,
									sp.position_y FROM process_steps ps
									inner join step_types st on ps.step_type = st.id
									inner join step_positions sp on sp.step_id = ps.id
									order by ps.id");
		$process['steps'] = $steps->result_array();
		$actions = $this->db->query("select CONCAT('ACTION_',a.id) id, CONCAT('WF_STEP_',a.from_step) from_step, 
									CONCAT('WF_STEP_',a.to_step) to_step, label from actions a
									inner join process_steps ps on ps.id = a.from_step");
		$process['actions'] = $actions->result_array();
		return $process;
	}
	
	public function get_controllers(){
		$controllers = array();
		if ($handle = opendir('./application/controllers')) {
			while (false !== ($entry = readdir($handle))) {
				if ($entry != "." && $entry != ".." && strtolower(substr($entry, strrpos($entry, '.') + 1)) == 'php') {
					array_push($controllers, $this->get_controller_classes($entry));
				}
			}
			closedir($handle);
		}
		return $controllers;
	}
	
	private function get_controller_classes($controller){
		$tokens = token_get_all( file_get_contents('./application/controllers/'.$controller) );
		$class_token = false;
		foreach ($tokens as $token) {
			if ( !is_array($token) ) continue;
			if ($token[0] == T_CLASS) {
				$class_token = true;
			} else if ($class_token && $token[0] == T_STRING) {
				return $token[1];
				$class_token = false;
			}
		}
	}
}
?>