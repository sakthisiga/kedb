<?php

// Login Class Begins
class Login extends CI_Controller {
	
//-------------------------------------------------------------------------------------------
//Function : Load Home View (Login Page)
//-------------------------------------------------------------------------------------------
	public function index()
	{
		$data['title'] = "Login";
		$this->load->view('user/inc/header_view',$data);
		$this->load->view('user/login_view');
		$this->load->view('user/inc/footer_view');
	}
        
//-------------------------------------------------------------------------------------------
//Function : Loads Register View for New User Registration
//-------------------------------------------------------------------------------------------
        
        public function register()
        {
        	$data['states'] = $this->home_model->get();
        	$data['title'] = "User Registration";
            $this->load->view('user/inc/header_view',$data);
			$this->load->view('user/register_view',$data);
			$this->load->view('user/inc/footer_view');
        }
}

// Login Class Ends