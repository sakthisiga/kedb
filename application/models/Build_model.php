<?php

class Build_model extends CI_Model {
	public function get_builds()
	{
		
		$this->db->from('build_tb');
		$this->db->order_by("date", "desc");
		$query = $this->db->get();
		return $query->result();
	}
	public function get_build_count($id)
	{
		$this->db->where('user_id',$id);
		$this->db->from('build_tb');
		return $this->db->count_all_results();
		//return $query;
	}
}
