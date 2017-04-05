var Dashboard = function() {
  
    // ------------------------------------------------------------------------
  
    this.__construct = function() {
        console.log('Dashboard has been Created');
        Event       = new Event();
        Template    = new Template();
       // Display     = new Display();
        $("#error").hide();
        $("#success").hide();
        $("#warning").hide();
        
    };
    
    
    // ------------------------------------------------------------------------
    
    this.__construct();
    
};
