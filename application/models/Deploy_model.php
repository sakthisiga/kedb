<?php

class Deploy_model extends CI_Model {
	public function get_deploys()
	{
		
		$this->db->from('deploy_tb');
		$this->db->order_by("date", "desc");
		$query = $this->db->get();
		return $query->result();
	}
	public function get_deploy_count($id)
	{
		$this->db->where('user_id',$id);
		$this->db->from('deploy_tb');
		return $this->db->count_all_results();
		//return $query;
	}
	public function delete_deploy($id)
	{
		$this->db->where('deploy_id', $id);
		$this->db->delete('deploy_tb');
		return $this->db->affected_rows();
	}
}
