<?php

class home_model extends CI_Model {
    
    
    public function get()
    {
    	$this->db->order_by('state_name','ASC');
        $q = $this->db->get('state_tb');         
        foreach($q->result() as $row)
        {
        	$data[] = $row;
        } 
        return $data;
    }
}
