<?php

// Home Class Begins

class Scm extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$user_id = $this->session->userdata('user_id');
		if(!$user_id)
		{
			$this->logout();
		}
	}

	//-------------------------------------------------------------------------------------------
	//Function : Load the Search Article View as Index function
	//-------------------------------------------------------------------------------------------

	public function index()
	{
		$this->search_scm();
	}
		
	//-------------------------------------------------------------------------------------------
	//Function : Load the Add Article View
	//-------------------------------------------------------------------------------------------
	public function add_scm_support()
	{
		$data['title'] = "Register SCM Support";
		$data['activities'] = $this->scm_model->get_scm_activity();
		$this->load->view('inc/header_view',$data);
		$this->load->view('scm/scm_add_view');
		$this->load->view('inc/footer_view');
	}

	//-------------------------------------------------------------------------------------------
	//Function : Load the Search Article View
	//-------------------------------------------------------------------------------------------

	public function search_scm_support()
	{
		$data['scmdetails'] = $this->scm_model->get_scm_support_details();
		$data['activities'] = $this->scm_model->get_scm_activity();
		$data['title'] = "View or Edit SCM Support";
		$this->load->view('inc/header_view',$data);
		$this->load->view('scm/scm_search_view',$data);
		$this->load->view('inc/footer_view');
	}

	//-------------------------------------------------------------------------------------------
	//Function : Logout from application (Loads login page)
	//-------------------------------------------------------------------------------------------
	 
	public function logout()
	{
		$this->session->sess_destroy();
		redirect("login");
	}
	
	//-------------------------------------------------------------------------------------------
	//Function : Load the User Profile View
	//-------------------------------------------------------------------------------------------
}

// Home Class Ends