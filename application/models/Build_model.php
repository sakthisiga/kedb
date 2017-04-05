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
	public function delete_build($id)
	{
		$this->db->where('build_id', $id);
		$this->db->delete('build_tb');
		return $this->db->affected_rows();
	}
}
