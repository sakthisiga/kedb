<?php

// Home Class Begins

class Build extends CI_Controller {

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
		$this->search_build();
	}
		
	//-------------------------------------------------------------------------------------------
	//Function : Load the Add Article View
	//-------------------------------------------------------------------------------------------
	public function add_build()
	{
		$data['title'] = "Register Build";
		$this->load->view('inc/header_view',$data);
		$this->load->view('build/build_add_view');
		$this->load->view('inc/footer_view');
	}

	//-------------------------------------------------------------------------------------------
	//Function : Load the Search Article View
	//-------------------------------------------------------------------------------------------

	public function search_build()
	{
		$data['builds'] = $this->build_model->get_builds();
		$data['title'] = "View or Edit Build";
		$this->load->view('inc/header_view',$data);
		$this->load->view('build/build_search_view',$data);
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