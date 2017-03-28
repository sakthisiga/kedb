<?php

class Build_model extends CI_Model {
	public function get_builds()
	{
		
		$this->db->from('build_tb');
		$this->db->order_by("date", "desc");
		$query = $this->db->get();
		return $query->result();
	}
}
