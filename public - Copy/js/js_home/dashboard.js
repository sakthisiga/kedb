var Dashboard = function() {
  
    // ------------------------------------------------------------------------
  
    this.__construct = function() {
        console.log('Dashboard Created');
        Event       = new Event();
        Template    = new Template();
        load_todo();
       // Display     = new Display();
        
    };
    
    // ------------------------------------------------------------------------
    
    var load_todo = function() {
        
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
    
    // ------------------------------------------------------------------------
    
    var load_note = function() {
        
    };
    
    // ------------------------------------------------------------------------
    
    this.__construct();
    
};
