var Event = function() {
  
    // ------------------------------------------------------------------------
  
    this.__construct = function() {
        console.log('Event has been Created');
        Display = new Display();
        create_todo();
        update_build();
        create_build();
        update_scm();
        create_scm();
        update_todo();
        delete_todo();
        reset_password();
        reset_profile();
        
    };
    
// ------------------------------------------------------------------------
    
    var reset_password = function() {
    	 $("#reset_password").submit(function(evt) {
    		 evt.preventDefault();
  
  	        var url = $(this).attr('action');
  	        var postData = $(this).serialize();
  	        
  	        $.post(url, postData, function(o){
  	           if(o.result == 0) 
	  	           {
	  	               Display.error(o.error);
	  	           } 
  	           else if(o.result == 1)
	  	           {
	  	        	   	Display.success(o.output);
	  	           }
  	           else if(o.result == 2)
	  	           {
	  	        	 	Display.warning(o.output);
	  	           }
  	           else if(o.result == 3)
  	        	   {
  	        	   		Display.warning(o.output);
  	        	   }
  	        },'json');
	           
    	 });
    };
    
// ------------------------------------------------------------------------
    
    var reset_profile = function() {
    	 $("#reset_profile").submit(function(evt) {
    		 evt.preventDefault();
  
  	        var url = $(this).attr('action');
  	        var postData = $(this).serialize();
  	        
  	        $.post(url, postData, function(o){
  	           if(o.result == 0) 
	  	           {
	  	               Display.warning(o.error);
	  	           } 
  	           else if(o.result == 1)
	  	           {
	  	        	   	Display.success(o.output);
	  	        	   	location.reload();
	  	           }
  	        },'json');
	           
    	 });
    };
    
    // ------------------------------------------------------------------------
    
    var create_todo = function() {
    	 $("#create_article").submit(function(evt) {
    		 evt.preventDefault();
  
  	        var url = $(this).attr('action');
  	        var postData = $(this).serialize();
  	        
  	        $.post(url, postData, function(o){
  	           if(o.result == 1) {
  	               Display.success(o.output);
  	           } 
  	           else
  	           {
  	        	   Display.error(o.error);
  	           }
  	        },'json');
	           
    	 });
    };

// ------------------------------------------------------------------------
    
    var update_scm = function() {	
   	 $("#update_scm").submit(function(evt) {
   		 evt.preventDefault();
   		 
 	        var url = $(this).attr('action');
 	        var postData = $(this).serialize();
 	        
 	        $.post(url, postData, function(o){
 	           if(o.result == 1) {
 	               Display.success(o.output);
 	           }
 	           else if(o.result == 2)
 	        	   {
 	        	   	Display.warning(o.output);
 	        	   }
 	           else
 	           {
 	        	   Display.error(o.error);
 	           }
 	        },'json');	           
   	 });
   };

// ------------------------------------------------------------------------
   
   var update_build = function() {	
  	 $("#update_build").submit(function(evt) {
  		 evt.preventDefault();
  		 
	        var url = $(this).attr('action');
	        var postData = $(this).serialize();
	        
	        $.post(url, postData, function(o){
	           if(o.result == 1) {
	               Display.success(o.output);
	           }
	           else if(o.result == 2)
	        	   {
	        	   	Display.warning(o.output);
	        	   }
	           else
	           {
	        	   Display.error(o.error);
	           }
	        },'json');	           
  	 });
  };
    
 // ------------------------------------------------------------------------
    
    var create_build = function() {
    	 $("#add_build").submit(function(evt) {
    		 evt.preventDefault();
  	        var url = $(this).attr('action');
  	        var postData = $(this).serialize();
  	        
  	        $.post(url, postData, function(o){
  	           if(o.result == 1) {
  	               Display.success(o.output);
  	           } 
  	           else
  	           {
  	        	   Display.error(o.error);
  	           }
  	        },'json');
	           
    	 });
    };
    
// ------------------------------------------------------------------------
    
    var create_scm = function() {
    	 $("#add_scm_support").submit(function(evt) {
    		 evt.preventDefault();
  	        var url = $(this).attr('action');
  	        var postData = $(this).serialize();
  	        
  	        $.post(url, postData, function(o){
  	           if(o.result == 1) {
  	               Display.success(o.output);
  	           } 
  	           else
  	           {
  	        	   Display.error(o.error);
  	           }
  	        },'json');
	           
    	 });
    };
    
 // ------------------------------------------------------------------------
    
    var search_article = function() {
   	 $("#search_article").submit(function(evt) {
   		 evt.preventDefault();
 	        var url = $(this).attr('action');
 	        var postData = $(this).serialize();
 	        
 	        $.post(url, postData, function(o){
 	        	if(o.length == 0)
 	        		{
 	        			output= '<div class="alert alert-warning" role="alert">No Record Found..!!</div>';
 	        		}
 	        	else
 	        		{
 	        	var output = '';
	 	       	output += '<table class="table table-bordered">';
	 	       	output+= '<tr><th>Article ID</th>';
	 	       	output+= '<th>Date</th>';
	 	       	output+= '<th>Employee ID</th>';
	 	       	output+= '<th>Employee Name</th>';
	 	       	output+= '<th>State</th>';
	 	       	output+= '<th>Tool</th>';
	 	       	output+= '<th>Issue</th>';
	 	       	output+= '<th>Action</th></tr>';
	 	       		for(var i = 0; i < o.length; i++)
	 	       			{
	 	       				output += Template.article(o[i]);
	 	       			}
	 	       	output += '</table>';
 	        		}
	 	       		$("#list_todo").html(output);
 	        		
	 	       	},'json');   
   	 });
   };
    // ------------------------------------------------------------------------
    
    var update_todo = function() {	
    	 $("#update_article").submit(function(evt) {
    		 evt.preventDefault();
    		 
  	        var url = $(this).attr('action');
  	        var postData = $(this).serialize();
  	        
  	        $.post(url, postData, function(o){
  	           if(o.result == 1) {
  	               Display.success(o.output);
  	           }
  	           else if(o.result == 2)
  	        	   {
  	        	   	Display.warning(o.output);
  	        	   }
  	           else
  	           {
  	        	   Display.error(o.error);
  	           }
  	        },'json');	           
    	 });
    };

   
    
    // ------------------------------------------------------------------------
    
    var delete_todo = function() {
        
    	$("div").on('click', '.todo_delete', function(e){
    		e.preventDefault();
    		
    		var self = $(this).parent('div');
    		var url = $(this).attr('href');
    		var postData = {
    				'todo_id': $(this).attr('data-id')
    		};
    		$.post(url,postData, function(o){
    			if(o.result == 1)
    				{
    					Display.warning("Item Deleted");
    					show_data();
    				}
    			else
    				{
    					Display.error(o.msg);
    				}
    		},'json');
    	
    	
    	})
    };

   
    
  
    
    this.__construct();
    
};
