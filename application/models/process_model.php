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
}
?>