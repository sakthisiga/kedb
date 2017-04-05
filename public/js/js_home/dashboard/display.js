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
    
    this.__construct();
    
};
