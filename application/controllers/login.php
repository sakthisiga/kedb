<?php

// Home Class Begins
class Login extends CI_Controller {
	
        //-------------------------------------------------------------------------------------------
        //Function : Load Home View (Login Page)
        //-------------------------------------------------------------------------------------------
	public function index()
	{
		$this->load->view('user/inc/header_view');
		$this->load->view('user/login_view');
		$this->load->view('user/inc/footer_view');
	}
        
        //-------------------------------------------------------------------------------------------
        //Function : Loads Register View for New User Registration
        //-------------------------------------------------------------------------------------------
        
        public function register()
        {
        	$this->load->model('home_model');
        	
        	$data['states'] = $this->home_model->get();
        	
            $this->load->view('user/inc/header_view');
			$this->load->view('user/register_view',$data);
			$this->load->view('user/inc/footer_view');
        }
}

// Home Class Ends