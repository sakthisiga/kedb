     
    <div class="tabbable" style="margin-bottom: 18px;">
    
<!--  TAB Headings Starts -->

         <ul class="nav nav-tabs">
             <li class="active"><a href="#add" data-toggle="tab">Add an Article</a></li>
             <li><a href="#view" data-toggle="tab">View an Article</a></li>
         </ul>
         
         
<!--  TAB Headings Ends -->         
           
<!--  TAB Content Starts -->  
      
	    <div class="tab-content" style="padding-bottom: 9px; border-bottom: 1px solid #ddd;">
	    
<!--  Add Article Tab content Starts --> 	  

       
	         <div class="tab-pane active" id="add">
	              <p>

<!--  Displaying error or success message --> 
	              
	              	<div class="container-fluid">
					    <div class="row-fluid">
							<div class="span12">
								<div id="error" class="alert alert-error hide"></div>
								<div id="warning" class="alert alert-warning hide"></div>
								<div id="success" class="alert alert-success hide"></div>
							</div>
						</div>
					</div>
	                  <div class="container-fluid">
	    				<div class="row-fluid">
	    				
<!-- Add Article Form starts here -->             
	    					<div id="dashboard-side" class="span4">
								<form id="create_article" class="form-entry" method="post" action="<?=site_url('api/create_article')?>">
										<div class="form-group">
										    <label for="InputDate"><strong>Date:</strong></label>
										    <input type="text" id="date" name="date" value="<?= date('m'.'/'.'d'.'/'.'Y')?>" class="input-small">
										</div>
						
										<div class="form-group">
										    <label for="InputEmployeeName"><strong>Employee Name:</strong></label>
										    <input type="text" name="emp_name" class="input-xlarge" value="<?=$this->session->userdata('emp_name')?>" readonly>
										</div>
										
										<div class="form-group">
										    <label for="InputState"><strong>State:</strong></label>
										    <input type="text" name="state" class="input-small" value="<?=$this->session->userdata('state')?>" readonly>
										</div>
										
										<div class="form-group">
										    <label for="SelectTool"><strong>Tool:</strong></label>
										   		<select name="tool" class="input-small">
										   			<option></option>
													<option>GIT</option>
													<option>Stash</option>
													<option>Ant</option>
													<option>Maven</option>
													<option>Jenkins</option>
													<option>Sonar</option>
												</select>
										</div>										
						   </div>
	
	    				    <div id="dashboard-main" class="span8">
										<div class="form-group">
										    <label for="InputIssue"><strong>Issue:</strong></label>
											<input type="text" class="input-xxlarge" name="issue" placeholder="Brief description of the issue/problem">
										</div>
					
										<div class="form-group">
										    <label for="Inputdescription"><strong>Issue Description:</strong></label>
										    <textarea id="wysihtml5-textarea" class="input-xxlarge" name="description" rows="10" placeholder="Detailed description of the issue/problem"></textarea>
										   
										</div>
				 						
					  					<button type="submit" class="btn btn-primary">Submit</button>
								</form>	
<!-- Add Article Form Ends here -->  								
							</div>
	                 	</div>
					  </div>   
	              </p>
	         </div>
	         
<!--  Add Article Tab content Ends -->

<!--  View Article Tab content Starts -->

	         <div class="tab-pane" id="view">
	             <p>
					<div class="container-fluid">
					   <div class="row-fluid">
<!-- Add Article Form starts here -->  

							<a class="btn btn-success" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
							  Search Options
							</a>
							<div class="collapse" id="collapseExample">
							  <div class="well">
							    	<form class="form-inline">
									  <div class="form-group">
									     <input type="text" class="input-small" id="s_date" name="s_date" placeholder="Date">
									     <input type="text" class="input-small" id="s_emp_id" name="s_emp_id" placeholder="Employee ID">
									     <input type="text" class="input-large" id="s_emp_name" name="s_emp_name" placeholder="Employee Name">
									     <input type="text" class="input-small" id="s_state" name="s_state" placeholder="State">
									     <input type="text" class="input-small" id="s_tool" name="s_tool" placeholder="Tool">
									     <input type="text" class="input-xlarge" id="s_issue" name="s_issue" placeholder="Issue type">
									     <button type="submit" class="btn btn-danger btn-sm">Find</button>
									  </div>
									</form>
							  </div>
							</div>


							<div id="list_todo" class="panel-body">
				
							</div>
<!-- Add Article Form Ends here -->  
					   </div>
					</div>
				 </p>
	         </div>
	         
<!--  View Article Tab content Ends -->
	
	    </div>

<!--  TAB Content Ends -->  

  
   </div> <!-- /tabbable -->
            
            
<!--  JAVA Scripting Section -->   

<script>
  $(function() {
	  
    $( "#date" ).datepicker({
        changeMonth: true,
        changeYear: true,
        });

    $( "#s_date" ).datepicker({
        changeMonth: true,
        changeYear: true,
        });
    
  });

  $(function(){
		$("#s_emp_id").autocomplete({
			source: "api/get_auto_details?field=user_id" // Search for Employee ID
		});
	});


  $(function(){
		$("#s_emp_name").autocomplete({
			source: "api/get_auto_details?field=emp_name" // Search for Employee Name
		});
	});

  $(function(){
		$("#s_state").autocomplete({
			source: "api/get_auto_details?field=state" // Search for State
		});
	});

  $(function(){
		$("#s_tool").autocomplete({
			source: "api/get_auto_details?field=tool" // Search for Tool
		});
	});

	
  $(function(){
		$("#s_issue").autocomplete({
			source: "api/get_auto_details?field=issue" // Search for Issue
		});
	});

	
  </script>