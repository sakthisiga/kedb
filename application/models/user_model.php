<?php

class User_model extends CI_Model {
    
    
    public function get($user, $pass)
    	{  	
	    	$query = $this->db->get_where('user', array('emp_id' => $user, 'password' => $pass));
	    	$result = $query->result();
	    	return $result;
	    }
    
    public function insert($data)
	    {
	        $this->db->insert('user',$data);
	        return $this->db->insert_id();
	    }
	public function session_data($user_id)
	    {
	    	 $query = $this->db->get_where('user', array('emp_id' => $user_id));
		    	foreach($query->result() as $row)
	        	{
	        		$data[] = $row;
	        	}
	        	return $data;
	    }
	       
}
