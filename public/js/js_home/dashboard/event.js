var Event = function() {
  
    // ------------------------------------------------------------------------
  
    this.__construct = function() {
        console.log('Event Created');
        Display = new Display();
        create_todo();
        update_todo();
        delete_todo();
       
       
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
  	               Display.show_data();
  	           } 
  	           else
  	           {
  	        	   Display.error(o.error);
  	           }
  	        },'json');
	           
    	 });
    };
    
   
    // ------------------------------------------------------------------------
    
    var update_todo = function() {
    	
    	$("body").on('click', '.todo_update', function(e) {
    		e.preventDefault();
    		
    		var self = $(this);
    		var url = $(this).attr('href');
    		var postData = {
    			id: $(this).attr('data-id'),
    			completed: $(this).attr('data-completed')
    		};
    		
    		console.log(postData);
    		
    		$.post(url,postData, function(o){
    			if(o.result == 1)
    				{
    					
    					if(postData.completed == 1)
    						{
		    					self.parent('div').addClass('todo_complete');
		    					self.html('<i class="icon-share-alt"></i>');
		    					self.attr('data-completed',0);
		    					//Display.success('');
    						}
    					else
    						{
	    						self.parent('div').removeClass('todo_complete');
		    					self.html('<i class="icon-ok"></i>');
		    					self.attr('data-completed',1);
		    					//Display.warning('');
    						}
    				}
    			else
    				{
    					Display.error('Nothing Updated');
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
