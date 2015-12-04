var Display = function() {
  
    // ------------------------------------------------------------------------
  
    this.__construct = function() {
        console.log('Result Created');
    };
    
    // ------------------------------------------------------------------------
    
    this.success = function(msg) { 
    	
    	var dom = $("#success");
    	if(typeof msg == "undefined")
    		{ 	
    			dom.html("Success").fadeIn();
    		}
    	else
    		{
		    	var op = '<ul>';
				op += '<li>' + msg + '</li>';
				op += '</ul>';
				
		    	dom.html(op).fadeIn();
		    	
		    	setTimeout( function(){
		    		dom.fadeOut();
		    	},3000);
    		}
    };
    
    // ------------------------------------------------------------------------
    
    this.error = function(msg) {
    	
    	var dom = $("#error");
    	if(typeof msg == "undefined")
		{
    		dom.html('Error').fadeIn();
		}
    	if(typeof msg == "object")
		{
    		var output = '<ul>';
    		for(var key in msg)
    			{
    				output += '<li>' + msg[key] + '</li>';
    			}
    		output += "</ul>";
    		dom.html(output).fadeIn();
		}
    	else
    	{
    		dom.html(msg).fadeIn();
    	}
    	
    	setTimeout( function(){
    		dom.fadeOut();
    	},3000);
    };
    
    // ------------------------------------------------------------------------
    
this.warning = function(msg) {
    	
    	var dom = $("#warning");
    	if(typeof msg == "undefined")
		{
    		dom.html('Warning').fadeIn();
		}
    	if(typeof msg == "object")
		{
    		var output = '<ul>';
    		for(var key in msg)
    			{
    				output += '<li>' + msg[key] + '</li>';
    			}
    		output += "</ul>";
    		dom.html(output).fadeIn();
		}
    	else
    	{
    		var op = '<ul>';
    		op += '<li>' + msg + '</li>';
    		op += '</ul>';
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
    this.__construct();
    
};
