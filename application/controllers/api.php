<?php

// Api Class Begins

class Api extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('kedb_model');
    }
    
    //-------------------------------------------------------------------------------------------
    //Function : Check User login status
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
            $this->output->set_output(json_encode(['result' => '0', 'error2' => 'Invalid Credentials. <br> If you do not have user account, please click "Register" link to create a one ']));
        }
        
        
        $session = $this->session->all_userdata('user_id');
        //print_r($session);
    }
    
    //-------------------------------------------------------------------------------------------
    //Function : New User Registration
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
    //Function : Create a Todo Item
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
        $this->form_validation->set_rules('issue','Issue Type','required|min_length[10]|max_length[25]');
        $this->form_validation->set_rules('description','Issue Description','required|min_length[25]|max_length[500]');
        
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
    
    //-------------------------------------------------------------------------------------------
    //Function : Get the Todo Item
    //-------------------------------------------------------------------------------------------
    
    public function get_todo($id = NULL)
    {
        $this->_require_login();
        
        if($id != NULL)
        {
        	$this->db->where([
        			'todo_id' => $id,
        			'user_id' => $this->session->userdata('user_id')
        			
        	]);
        }
        else
        {
        	$this->db->where('user_id',$this->session->userdata('user_id'));
        }
        
        $query = $this->db->get('article_tb');
        $result = $query->result();
        
        $this->output->set_output(json_encode($result));
        
    }
    
    //-------------------------------------------------------------------------------------------
    //Function : Autocomplete for all the Search fields
    //-------------------------------------------------------------------------------------------
    
    public function get_auto_details(){
    	if (isset($_GET['term']))
    	{
    		$q = strtolower($_GET['term']);
    		$this->kedb_model->get_details($q, $_GET['field']);
    		   		
    	}
    }
   /* 
    //-------------------------------------------------------------------------------------------
    //Function : Autocomplete for Employee Name
    //-------------------------------------------------------------------------------------------
    
    public function get_emp_name(){
    	$field = "emp_name";
    	$this->load->model('kedb_model');
    	if (isset($_GET['term'])){
    		$q = strtolower($_GET['term']);
    		$this->kedb_model->get_details($q, $field);
    			
    	}
    }
    
    //-------------------------------------------------------------------------------------------
    //Function : Autocomplete for State
    //-------------------------------------------------------------------------------------------
    
    public function get_state(){
    	$field = "state";
    	$this->load->model('kedb_model');
    	if (isset($_GET['term'])){
    		$q = strtolower($_GET['term']);
    		$this->kedb_model->get_details($q, $field);
    		 
    	}
    }
    
    //-------------------------------------------------------------------------------------------
    //Function : Autocomplete for Tool
    //-------------------------------------------------------------------------------------------
    
    public function get_tool(){
    	$field = "tool";
    	$this->load->model('kedb_model');
    	if (isset($_GET['term'])){
    		$q = strtolower($_GET['term']);
    		$this->kedb_model->get_details($q, $field);
    		 
    	}
    }
    
    
    //-------------------------------------------------------------------------------------------
    //Function : Autocomplete for Issue
    //-------------------------------------------------------------------------------------------
    
    public function get_issue(){
    	$field = "issue";
    	$this->load->model('kedb_model');
    	if (isset($_GET['term'])){
    		$q = strtolower($_GET['term']);
    		$this->kedb_model->get_details($q, $field);
    		 
    	}
    }
    */
    public function update_todo()
    {
    	$this->_require_login();
    	$todo_id = $this->input->post('id');
    	$completed = $this->input->post('completed');

    	$this->db->where(['todo_id' => $todo_id]);
    	$this->db->update('todo',[
    			'completed' => $completed
    	]);
    	
    	$result = $this->db->affected_rows();
    	
    if($result)
    	{
	    	$this->output->set_output(json_encode(['result' => '1']));
	    	return false;
    	}
    	else
    	{
    		$this->output->set_output(json_encode([
    				'result' => '0',
    				'message' => 'Could not Updated'
    		]));
    		return false;
    	}
    	
    }
    
    //-------------------------------------------------------------------------------------------
    //Function : Delete a Todo Item
    //-------------------------------------------------------------------------------------------
    
    public function delete_todo()
    {
        $this->_require_login();
        
        $result = $this->db->delete('todo',[
        		'todo_id' => $this->input->post('todo_id'),
        		'user_id' => $this->session->userdata('user_id')
        ]);
        
        if($result)
        {
        	$this->output->set_output(json_encode(['result' => '1']));
        	return false;
        }
        else 
        {
        	$this->output->set_output(json_encode([
        			'result' => '0',
        			'message' => 'Could not delete'
        			
        	]));
        }
        
    }
   
}

// Api Class Ends