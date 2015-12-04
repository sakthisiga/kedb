var Dashboard = function() {
  
    // ------------------------------------------------------------------------
  
    this.__construct = function() {
        console.log('Dashboard Created');
        Event       = new Event();
        Template    = new Template();
        load_article();
       // Display     = new Display();
        
    };
    
    // ------------------------------------------------------------------------
    
    var load_article = function() {
       Display.show_data();
    };
    
    // ------------------------------------------------------------------------
    
    var load_note = function() {
        
    };
    
    // ------------------------------------------------------------------------
    
    this.__construct();
    
};
