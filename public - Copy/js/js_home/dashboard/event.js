var Event = function() {
  
    // ------------------------------------------------------------------------
  
    this.__construct = function() {
        console.log('Event Created');
        Display = new Display();
        create_todo();
        create_note();
        update_todo();
        update_note();
        delete_todo();
        delete_note();
       
    };
    
    // ------------------------------------------------------------------------
    
    var create_todo = function() {
    	 $("#create_todo").submit(function(evt) {
    		 evt.preventDefault();
  	        var url = $(this).attr('action');
  	        var postData = $(this).serialize();
  	        
  	        $.post(url, postData, function(o){
  	           if(o.result == 1) {
  	               Display.success(o.output);
  	               var output  = Template.todo(o.data[0]);
  	             //var output  = Dashboard.load_todo();
  	               $("#list_todo").append(output);
  	             $("#content").val("");
  	           } 
  	           else
  	           {
  	        	   Display.error(o.error);
  	           }
  	            
  	        },'json');
  	        load_todo();
    	 });
    };
    
    // ------------------------------------------------------------------------
    
    var create_note = function() {
        $("#create_note").submit(function(evt) {
            console.log('create_note clicked');
            return false;
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

    var update_note = function() {
        
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

    // ------------------------------------------------------------------------

    var delete_note = function() {
        
    };
    
    // ------------------------------------------------------------------------
    
    var show_data = function() {
    	
    	$.get('api/get_todo', function(o){
    		
    		var output = '';
    	//	output += '<table class="table table-bordered"><tr><th>Todo Id</th><th>Content</th><th>Action</th></tr>';
    		for(var i = 0; i < o.length; i++)
    			{
    				output += Template.todo(o[i]);
    			}
    	//	output += '</table>';
    		
    		$("#list_todo").html(output);
    	},'json');
    	
    };
    
    this.__construct();
    
};
