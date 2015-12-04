var Template = function() {
  
    // ------------------------------------------------------------------------
  
    this.__construct = function() {
        console.log('Template Created');
    };
    
    // ------------------------------------------------------------------------
    
    this.article= function(obj) {
        var output = '';
        output += '<tr><td>'+ obj.article_id +'</td>';
        output += '<td>'+ obj.date +'</td>';
        output += '<td>'+ obj.user_id +'</td>';
        output+= '<td>'+ obj.emp_name +'</td>';
        output += '<td>'+ obj.state +'</td>';
        output += '<td>'+ obj.tool +'</td>';
        output += '<td>'+ obj.issue +'</td>';
        output+= '<td>Update</td></tr>';
        return output;
    };
    
    // ------------------------------------------------------------------------
    
    this.note = function(obj) {
        var output = '';
        output += '<div id="note_'+ obj.note_id +'">';
        output += '<span>' + obj.title + '</span>';
        output += '<span>' + obj.content + '</span>';
        output += '</div>';
        return output;
    };
    
    // ------------------------------------------------------------------------
    
    this.__construct();
    
};
