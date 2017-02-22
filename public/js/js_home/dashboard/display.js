var Display = function() {
  
    // ------------------------------------------------------------------------
  
    this.__construct = function() {
        console.log('Result has been Created');
    };
    
    // ------------------------------------------------------------------------
    
    this.success = function(msg) { 
    	
    	var dom = $("#notify");
    	if(typeof msg == "undefined")
		{
    		dom.html('Success').fadeIn();
		}
    	if(typeof msg == "object")
		{
    		var output = '<div class="alert alert-success">';
    		output += '<ul>';
    		for(var key in msg)
    			{
    				output += '<li>' + msg[key] + '</li>';
    			}
    		output += "</ul>";
    		output += '</div>';
    		dom.html(output).fadeIn();
		}
    	else
    	{
    		var output = '<div class="alert alert-success">';
    		output += '<ul>';
    		
    				output += '<li>' + msg + '</li>';
    			
    		output += "</ul>";
    		output += '</div>';
    		dom.html(output).fadeIn();
    	}
    	
    	setTimeout( function(){
    		dom.fadeOut();
    	},3000);
    };
    
    // ------------------------------------------------------------------------
    
    this.error = function(msg) {
    	 
    	var dom = $("#notify");
    	if(typeof msg == "undefined")
		{
    		dom.html('Error').fadeIn();
		}
    	if(typeof msg == "object")
		{
    		var output = '<div class="alert alert-danger">'; 
    		output += '<ul>';
    		for(var key in msg)
    			{
    				output += '<li>' + msg[key] + '</li>';
    			}
    		output += "</ul>";
    		output += '</div>';
    		dom.html(output).fadeIn();
		}
    	else
    	{
    		var output = '<div class="alert alert-danger">';
    		output += '<ul>';
    		
    				output += '<li>' + msg + '</li>';
    			
    		output += "</ul>";
    		output += '</div>';
    		dom.html(output).fadeIn();
    	}
    	
    	setTimeout( function(){
    		dom.fadeOut();
    	},3000);
    };
    
    // ------------------------------------------------------------------------
    
this.warning = function(msg) {
    	
    	var dom = $("#notify");
    	if(typeof msg == "undefined")
		{
    		dom.html('Warning').fadeIn();
		}
    	if(typeof msg == "object")
		{
    		var output = '<div class="alert alert-warning">';
    		output += '<ul>';
    		for(var key in msg)
    			{
    				output += '<li>' + msg[key] + '</li>';
    			}
    		output += "</ul>";
    		output += '</div>';
    		dom.html(output).fadeIn();
		}
    	else
    	{
    		var op = '<div class="alert alert-warning">';
    		op += '<ul>';
    		op += '<li>' + msg + '</li>';
    		op += '</ul>';
    		op += '</div>';
    		dom.html(op).fadeIn();
    	}
    	
    	setTimeout( function(){
    		dom.fadeOut();
    	},3000);
    };
    
    // ------------------------------------------------------------------------
    
    this.show_data = function() {
    	$.get('api/get_todo', function(o){
    		
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
    		
    		$("#list_todo").html(output);
    	},'json');
    	
    };
    
 // ------------------------------------------------------------------------
    
    this.search_data = function() {
$.get('api/get_todo?option=1', function(o){
    		
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
    		
    		$("#list_todo").html(output);
    	},'json');
    	
    };
    
    // ------------------------------------------------------------------------
    
    this.__construct();
    
};
