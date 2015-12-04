<?php

class Kedb_model extends CI_Model {
    
    
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
