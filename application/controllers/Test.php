<?php

class Test extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function fun()
    {
    	$query = $this->db->get_where('user', array('emp_id' => 'C5043200'));
	    //$query->result();
	    foreach($query->result() as $row)
        {
        	$data[] = $row;
        } 
       foreach ($data as $rec)
       {
       	echo $rec->emp_name;
       }
    }
}
