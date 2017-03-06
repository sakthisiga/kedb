<?php

// Home Class Begins

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
//Function : Load the Search Article View as Index function
//-------------------------------------------------------------------------------------------
        
		public function index()
			{
				$this->search_article();
			}
			
//-------------------------------------------------------------------------------------------
//Function : Load the Add Article View
//-------------------------------------------------------------------------------------------		
		public function add_article()
		{
			$data['title'] = "Add an Article";
			$this->load->view('inc/header_view',$data);
			$this->load->view('kedb/kedb_add_view');
			$this->load->view('inc/footer_view');
		}

//-------------------------------------------------------------------------------------------
//Function : Load the Search Article View
//-------------------------------------------------------------------------------------------
		
		public function search_article()
		{
			$data['articles'] = $this->kedb_model->get_articles();
			$data['title'] = "Articles";
			$this->load->view('inc/header_view',$data);
			$this->load->view('kedb/kedb_search_view',$data);
			$this->load->view('inc/footer_view');
		}

//-------------------------------------------------------------------------------------------
//Function : Load the User Profile View
//-------------------------------------------------------------------------------------------
		
		public function profile()
		{
			$data['profile'] = $this->user_model->session_data($this->session->userdata('user_id'));
			$data['a_count'] = $this->kedb_model->get_articles_count($this->session->userdata('user_id'));
			$data['states'] = $this->home_model->get();
			$data['title'] = "User Profile";
			$data['user_details'] = $this->kedb_model->profile_details($this->session->userdata('user_id'));
			$this->load->view('inc/header_view',$data);
			$this->load->view('kedb/profile_view',$data);
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
}

// Home Class Ends