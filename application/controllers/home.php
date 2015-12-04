<?php

// Dashboard Class Begins

class Home extends CI_Controller {
	
        public function __construct() {
            parent::__construct();
            $user_id = $this->session->userdata('user_id');
            if(!$user_id)
            {
                $this->logout();
            }
        }
        
        //-------------------------------------------------------------------------------------------
        //Function : Load the Dashboard View
        //-------------------------------------------------------------------------------------------
        
	public function index()
	{
		$this->load->view('kedb/inc/header_view');
		$this->load->view('kedb/kedb_add_view');
		$this->load->view('kedb/inc/footer_view');

	}
	
        //-------------------------------------------------------------------------------------------
        //Function : Logout from application (Loads login page)
        //-------------------------------------------------------------------------------------------
        
	public function logout()
	{
		$this->session->sess_destroy();
		redirect("login");
	}
}

// Dashboard Class Ends