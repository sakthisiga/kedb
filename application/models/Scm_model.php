<?php

class Scm_model extends CI_Model {
    
	
	public function validate_pass($pass)
	{	$this->db->where('password',$pass);
		$query = $this->db->get('user');
		return $query->result();
	}
	
	public function profile_details($id)
	{
		$this->db->where('emp_id',$id);
		$query = $this->db->get('user');
		return $query->result();
	}
	public function get_scm_support_details()
	{
		$query = $this->db->get('scm_tb');
		return $query->result();
	}
	public function get_scm_activity()
	{
		$query = $this->db->get('scm_activity_tb');
		return $query->result();
	}
	public function get_scm_count($id)
	{
		$this->db->where('user_id',$id);
		$this->db->from('scm_tb');
		return $this->db->count_all_results();
		//return $query;
	}
	
	public function get_modal_articles($id)
	{
		$this->db->where('article_id',$id);
		$query = $this->db->get('article_tb');
		return $query->result();
	}
	
	public function get_articles_count($id)
	{
		$this->db->where('user_id',$id);
		$this->db->from('article_tb');
		return $this->db->count_all_results();
		//return $query;
	}
	
	public function get_details($q, $field){
		$this->db->select($field);
		$this->db->like($field, $q);
		$this->db->distinct();
		$query = $this->db->get('article_tb');
		if($query->num_rows() > 0){
			foreach ($query->result_array() as $row){
				$row_set[] = htmlentities(stripslashes($row[$field])); //build an array
			}
			echo json_encode($row_set); //format the array into json data
		}
	}
	
	public function get_empname($q){
		$this->db->select('emp_name');
		$this->db->like('emp_name', $q);
		$this->db->distinct();
		$query = $this->db->get('article_tb');
		if($query->num_rows() > 0){
			foreach ($query->result_array() as $row){
				$row_set[] = htmlentities(stripslashes($row['emp_name'])); //build an array
			}
			echo json_encode($row_set); //format the array into json data
		}
	}
	
	public function get_issue($q){
		$this->db->select('issue');
		$this->db->like('issue', $q);
		$this->db->distinct();
		$query = $this->db->get('article_tb');
		if($query->num_rows() > 0){
			foreach ($query->result_array() as $row){
				$row_set[] = htmlentities(stripslashes($row['issue'])); //build an array
			}
			echo json_encode($row_set); //format the array into json data
		}
	}
	
}
