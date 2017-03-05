<?php

// Api Class Begins

class api extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->gallery_path_url = realpath(APPPATH . '../public/img/profile');
    }
    
//-------------------------------------------------------------------------------------------
// Function : Check User login status
//-------------------------------------------------------------------------------------------
    
    private function _require_login()
    {
        if($this->session->userdata('user_id') == false)
        {
            $this->output->set_output(json_encode(['result' => '0', 'error' => 'You are not authorized']));
            return false;
        }
    }
    
//-------------------------------------------------------------------------------------------
//Function : Login into application
//-------------------------------------------------------------------------------------------
    
     public function login()
    {
        
        $this->output->set_content_type('application_json');
        
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required');
        if($this->form_validation->run() == FALSE)
        {
            $this->output->set_output(json_encode(['result' => '0','error' => $this->form_validation->error_array()]));
            return false;
        }
        
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $password = hash('sha256',$password.PASS);
        
        $this->load->model('user_model');
          
        $result = $this->user_model->get($username, $password);
        
        
        
        if($result)
        {
        	$data= $this->user_model->session_data($username);
        	foreach ($data as $rec)
        	{
        		$emp = $rec->emp_name;
        		$state = $rec->state;
        	}
        	$this->session->set_userdata([
        			'user_id' => $username,
        			'emp_name' => $emp,
        			'state' => $state
        	]);

            $this->output->set_output(json_encode(['result' => '1']));
            return false;
        }
        else 
        {
            $this->output->set_output(json_encode(['result' => '0', 'error2' => 'Invalid Credentials. <br> If you do not have user account, please click "Register a new membership" link to create a one ']));
        }
        
        
        $session = $this->session->all_userdata('user_id');
        //print_r($session);
    }
    
//-------------------------------------------------------------------------------------------
// Function : New User Registration
//-------------------------------------------------------------------------------------------
    
     public function register()
    {
        $this->output->set_content_type('application_json');
        
        $this->form_validation->set_rules('emp_id','Employee ID','required|min_length[8]|max_length[8]|is_unique[user.emp_id]');
        $this->form_validation->set_rules('emp_name','Employee Name','required');
        $this->form_validation->set_rules('state','State','required');
        $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password','Password','required|min_length[4]|max_length[20]|matches[confirm_password]');
        $this->form_validation->set_rules('confirm_password','Confirm Password','required|min_length[4]|max_length[20]');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->output->set_output(json_encode(['result' => '0','error' => $this->form_validation->error_array()]));
            return false;
        }
        $emp_id =  $this->input->post('emp_id');
        $emp_name =  $this->input->post('emp_name');
        $state= $this->input->post('state');
        $email= $this->input->post('email');
        $password = $this->input->post('password');
        $confirm_password = $this->input->post('confirm_password');
        
        $this->load->model('user_model');
          
        $user_id = $this->user_model->insert([
        		'emp_id' => $emp_id,
        		'emp_name' => $emp_name,
            	'password' => hash('sha256',$password.PASS),
            	'email' => $email,
        		'state' => $state,
        ]);  
        
        
        if($user_id)
        {
            $this->session->set_userdata([
            		'user_id' => $emp_id,
            		'emp_name' => $emp_name
            ]);
            $this->output->set_output(json_encode(['result' => '1']));
            return false;
        }
        else 
        {
            $this->output->set_output(json_encode(['result' => '0', 'error' => 'User not Created']));
        }
        
        
        $session = $this->session->all_userdata('user_id');
        //print_r($session);
    }
    
//-------------------------------------------------------------------------------------------
// Function : Reset the Password - From: Profile View
//-------------------------------------------------------------------------------------------
     public function reset_password()
     {
     	$this->output->set_content_type('application_json');
     	
     	$this->form_validation->set_rules('cpass','Current Password','required');
     	$this->form_validation->set_rules('npass','Password','required|min_length[4]|max_length[20]|matches[rnpass]');
     	$this->form_validation->set_rules('rnpass','Re-type Password','required|min_length[4]|max_length[20]');
     	
     	if($this->form_validation->run() == FALSE)
     	{
     		$this->output->set_output(json_encode(['result' => '0','error' => $this->form_validation->error_array()]));
     		return false;
     	}
     	
     	$cpass = $this->input->post('cpass');
     	$npass = $this->input->post('npass');
     	$rnpass = $this->input->post('rnpass');
     	
     	$pass = hash('sha256',$cpass.PASS);
     	
     	$check_pass = $this->kedb_model->validate_pass($pass);
     	
     	if($check_pass)
     	{
     		$rnpass = hash('sha256',$rnpass.PASS); 
     		$this->db->where(['emp_id' => $this->session->userdata('user_id')]);
    		$this->db->update('user',['password' => $rnpass]);
    		$result = $this->db->affected_rows();
    		if($result)
    			{
    				$this->output->set_output(json_encode([
    						'result' => '1',
    						'output' => 'Password Updated Succesfully'
    				]));
    				return false;
    			}
    			else
    			{
    				$this->output->set_output(json_encode([
    						'result' => '2',
    						'output' => 'Do not try using current password'
    				]));
    				return false;
    			}
     	}
     	else
     	{
     		$this->output->set_output(json_encode([
     				'result' => '3',
     				'output' => 'The current password you entered is not correct'
     		]));
     		return false;
     	}
     }

//-------------------------------------------------------------------------------------------
// Function : Reset the Profile - From: Profile View
//-------------------------------------------------------------------------------------------
     
     public function reset_profile()
     {
     	$this->output->set_content_type('application_json');
     
     	$this->form_validation->set_rules('name','Employee Name','required');
        $this->form_validation->set_rules('email','Email','required|valid_email');
        $this->form_validation->set_rules('state','State','required');
     
     	if($this->form_validation->run() == FALSE)
     	{
     		$this->output->set_output(json_encode(['result' => '0','error' => $this->form_validation->error_array()]));
     		return false;
     	}
     
     	$name = $this->input->post('name');
     	$email = $this->input->post('email');
     	$state = $this->input->post('state');

     		
     		$this->db->where(['emp_id' => $this->session->userdata('user_id')]);
     		$this->db->update('user',[
     				'emp_name' => $name,
     				'email' => $email,
     				'state' => $state
     		]);
     		$result = $this->db->affected_rows();
     		if($result)
     		{
     			$this->output->set_output(json_encode([
     					'result' => '1',
     					'output' => 'Profile details have been updated Succesfully'
     			]));
     			return false;
     		}
     		else
     		{
     			$this->output->set_output(json_encode([
     					'result' => '0',
     					'error' => 'Problem in updating the profile details, you might have not updated anything..!!'
     			]));
     			return false;
     		}
     }
     
//-------------------------------------------------------------------------------------------
// Function : Create a New Article in DB - From: KEDB Add View
//-------------------------------------------------------------------------------------------     
     
     public function create_article()
	    {
	        $this->_require_login();
	        
	        $this->output->set_content_type('application_json');
	        
	        //Form Validation
	        $this->form_validation->set_rules('date','Date','required');
	        $this->form_validation->set_rules('emp_name','Employee Name','required');
	        $this->form_validation->set_rules('state','State','required');
	        $this->form_validation->set_rules('tool','Tool','required');
	        $this->form_validation->set_rules('issue','Issue Type','required|min_length[10]|max_length[100]');
	        $this->form_validation->set_rules('problem','Problem','required|min_length[20]|max_length[500]');
	        $this->form_validation->set_rules('description','Issue Description','required|min_length[25]|max_length[1000]');
	        
	        if($this->form_validation->run() == false)
	        {
	        	$this->output->set_output(json_encode([
	        			'result' => '0',
	        			'error' => $this->form_validation->error_array()
	        	]));
	        	return false;
	        }
	        
	        //Inserting data
	        $date = date("Y-m-d", strtotime($this->input->post('date')));
	        $result = $this->db->insert('article_tb', [
	        		'date' => $date,
	        		'user_id' => $this->session->userdata('user_id'),
	        		'emp_name' => $this->input->post('emp_name'),
	        		'state' => $this->input->post('state'),
	        		'tool' => $this->input->post('tool'),
	        		'issue' => $this->input->post('issue'),
	        		'problem' => $this->input->post('problem'),
	        		'description' => $this->input->post('description')
	        ]);
	        
	        if($result)
	        {
	        	// Get fresh list to be posted to DOM
	        	
	        	$query = $this->db->get_where('article_tb',['article_id' => $this->db->insert_id()]);
	        	$this->output->set_output(json_encode([
	        			'result' => '1',
	        			'output' => 'A new article has been added',
	        			'data' => $query->result()
	        	]));
	        	return false;
	        }
	        else
	        {
	        	$this->output->set_output(json_encode(['result' => '0']));
	        }
	    }
// -------------------------------------------------------------------------------------------
// Function : Create a build entry in DB - From: BUILD Add View 
// -------------------------------------------------------------------------------------------
	     
	 public function add_build()
	    {
	    	$this->_require_login();
	    	 
	    	$this->output->set_content_type('application_json');
	    	 
	    	//Form Validation
	    	$this->form_validation->set_rules('date','Date','required');
	    	$this->form_validation->set_rules('name','Name','required');
	    	$this->form_validation->set_rules('rel','Release','required');
	    	$this->form_validation->set_rules('build','Build','required');
	    	$this->form_validation->set_rules('from_date','From Date','required');
	    	$this->form_validation->set_rules('to_date','To Date','required');
	    	$this->form_validation->set_rules('status','Status','required');
	    	$this->form_validation->set_rules('reason','Reason','required');
	    	 
	    	if($this->form_validation->run() == false)
	    	{
	    		$this->output->set_output(json_encode([
	    				'result' => '0',
	    				'error' => $this->form_validation->error_array()
	    		]));
	    		return false;
	    	}
	    	 
	    	//Inserting data
	    	$date = date("Y-m-d ", strtotime($this->input->post('date')));
	    	$result = $this->db->insert('build_tb', [
	    			'date' => $date,
	    			'name' => $this->input->post('name'),
	    			'user_id' => $this->session->userdata('user_id'),
	    			'rel' => $this->input->post('rel'),
	    			'build' => $this->input->post('build'),
	    			'from_date' => $this->input->post('from_date'),
	    			'to_date' => $this->input->post('to_date'),
	    			'status' => $this->input->post('status'),
	    			'reason' => $this->input->post('reason')
	    	]);
	    	 
	    	if($result)
	    	{
	    		// Get fresh list to be posted to DOM
	    
	    		$query = $this->db->get_where('build_tb',['build_id' => $this->db->insert_id()]);
	    		$this->output->set_output(json_encode([
	    				'result' => '1',
	    				'output' => 'Build details added successfully..!!',
	    				'data' => $query->result()
	    		]));
	    		return false;
	    	}
	    	else
	    	{
	    		$this->output->set_output(json_encode(['result' => '0']));
	    	}
	    }
	     
	    
// -------------------------------------------------------------------------------------------
// Function : Create a SCM Support entry in DB - From: SCM Add View
// -------------------------------------------------------------------------------------------
	    
	    public function add_scm_support()
	    {
	    	$this->_require_login();
	    	 
	    	$this->output->set_content_type('application_json');
	    	 
	    	//Form Validation
	    	$this->form_validation->set_rules('date','Date','required');
	    	$this->form_validation->set_rules('name','Name','required');
	    	$this->form_validation->set_rules('activity','Activity','required');
	    	$this->form_validation->set_rules('rel','Release','required');
	    	$this->form_validation->set_rules('from_date','From Date','required');
	    	$this->form_validation->set_rules('to_date','To Date','required');
	    	$this->form_validation->set_rules('status','Status','required');
	    	$this->form_validation->set_rules('comment','Comment','min_length[10]|max_length[300]');

	    	if($this->form_validation->run() == false)
	    	{
	    		$this->output->set_output(json_encode([
	    				'result' => '0',
	    				'error' => $this->form_validation->error_array()
	    		]));
	    		return false;
	    	}
	    	 
	    	//Inserting data
	    	$date = date("Y-m-d ", strtotime($this->input->post('date')));
	    	$result = $this->db->insert('scm_tb', [
	    			'date' => $date,
	    			'name' => $this->input->post('name'),
	    			'user_id' => $this->session->userdata('user_id'),
	    			'activity' => $this->input->post('activity'),
	    			'rel' => $this->input->post('rel'),
	    			'from_date' => $this->input->post('from_date'),
	    			'to_date' => $this->input->post('to_date'),
	    			'status' => $this->input->post('status'),
	    			'comment' => $this->input->post('comment')
	    	]);
	    	 
	    	if($result)
	    	{
	    		// Get fresh list to be posted to DOM
	    	  
	    		$query = $this->db->get_where('scm_tb',['scm_id' => $this->db->insert_id()]);
	    		$this->output->set_output(json_encode([
	    				'result' => '1',
	    				'output' => 'SCM Support details added successfully..!!',
	    				'data' => $query->result()
	    		]));
	    		return false;
	    	}
	    	else
	    	{
	    		$this->output->set_output(json_encode(['result' => '0']));
	    	}
	    }
	    
//-------------------------------------------------------------------------------------------
// Function : Create a KeyNote in DB - From: Profile View
//-------------------------------------------------------------------------------------------
	     
	 public function create_keynote()
	    {
	    	$this->_require_login();
	    	 
	    	$this->output->set_content_type('application_json');
	    	 
	    	//Form Validation
	    	$this->form_validation->set_rules('kname','KeyNote Name','required');
	    	$this->form_validation->set_rules('kusername','KeyNote Username','required');
	    	$this->form_validation->set_rules('kpassword','KeyNote Password','required');
	    	$this->form_validation->set_rules('kdescription','KeyNote Description','required');
	    	
	    	 
	    	if($this->form_validation->run() == false)
	    	{
	    		$this->output->set_output(json_encode([
	    				'result' => '0',
	    				'error' => $this->form_validation->error_array()
	    		]));
	    		return false;
	    	}
	    	 
	    	//Inserting data
	    	$password = base64_encode($this->input->post('kpassword'));
	    	$result = $this->db->insert('keynote_tb', [
	    			'user_id' => $this->session->userdata('user_id'),
	    			'key_name' => $this->input->post('kname'),
	    			'key_username' => $this->input->post('kusername'),
	    			'key_password' => $password,
	    			'key_description' => $this->input->post('kdescription')
	    	]);
	    	 
	    	if($result)
	    	{
	    		// Get fresh list to be posted to DOM
	    
	    		$query = $this->db->get_where('keynote_tb',['user_id' => $this->session->userdata('user_id')]);
	    		$this->output->set_output(json_encode([
	    				'result' => '1',
	    				'output' => 'A new KeyNote has been added',
	    				'data' => $query->result()
	    		]));
	    		return false;
	    	}
	    	else
	    	{
	    		$this->output->set_output(json_encode(['result' => '0']));
	    	}
	    }
//-------------------------------------------------------------------------------------------
// Function : Get the KeyNote Item
//-------------------------------------------------------------------------------------------
	    
	    public function get_keynote()
	    {
	    	$this->_require_login();
	    	$this->output->set_content_type('application_json');
	    	$query = $this->db->get_where('keynote_tb',['user_id' => $this->session->userdata('user_id')]);
	    	$this->output->set_output(json_encode($query->result()));
	    
	    }	    
//-------------------------------------------------------------------------------------------
// Function : Upload Profile Image
//-------------------------------------------------------------------------------------------
    public function do_upload()
    {
    	$this->_require_login();
    	$this->output->set_content_type('application_json');
    	$config['upload_path'] = $this->gallery_path_url;
    	$config['allowed_types'] = 'gif|jpg|png';
    	$config['max_size']	= '10000';
    	$config['max_width']  = '1024';
    	$config['max_height']  = '768';
    	$config['file_name'] = $this->session->userdata('user_id');
    	$config['overwrite'] = TRUE;
    
    	$this->load->library('upload', $config);
    
    	if ( ! $this->upload->do_upload('userfile'))
    	{
    		$error = array('error' => $this->upload->display_errors());
    		
    		$this->load->view('kedb/inc/header_view');
    		$this->load->view('kedb/profile_update_view',$error);
    		$this->load->view('kedb/inc/footer_view');
    	}
    	else
    	{
    		//header(site_url('home/profile'));
    		header("Refresh:0; url='../home/profile'");
    	}
    }

    
//-------------------------------------------------------------------------------------------
// Function : Update Article in DB - From: KEDB Search View
//-------------------------------------------------------------------------------------------
  
    public function update_article()
    {
    	$this->_require_login();
    	$this->output->set_content_type('application_json');
    	
    	$this->form_validation->set_rules('issue','Issue Type','required|min_length[10]|max_length[100]');
    	$this->form_validation->set_rules('problem','Problem','required|min_length[20]|max_length[500]');
    	$this->form_validation->set_rules('description','Issue Description','required|min_length[25]|max_length[1000]');
    	
    	if($this->form_validation->run() == false)
    	{
    		$this->output->set_output(json_encode([
    				'result' => '0',
    				'error' => $this->form_validation->error_array()
    		]));
    		return false;
    	}
    	
    	$article_id = $this->input->post('aid');
    	$issue = $this->input->post('issue');
    	$problem = $this->input->post('problem');
    	$description = $this->input->post('description');

    	$this->db->where(['article_id' => $article_id]);
    	$this->db->update('article_tb',[
    			'issue' => $issue,
    			'problem' => $problem,
    			'description' => $description
    	]);
    	
    	$result = $this->db->affected_rows();
    	
    if($result)
    	{
	    	$this->output->set_output(json_encode([
	    			'result' => '1',
	    			'output' => 'Article Updated Succesfully'
	    	]));
	    	return false;
    	}
    	else
    	{
    		$this->output->set_output(json_encode([
    				'result' => '2',
    				'output' => 'Please update before saving changes'
    		]));
    		return false;
    	}
    	
    }

   
}

// Api Class Ends