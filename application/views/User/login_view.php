
<div class="row-fluid">

    <div class="span4 offset4">
         <div id="login-form-error" class="alert alert-error"><!-- Dynamic field flows --> </div>
    </div>
    
</div>


<div class="row-fluid">
<div class="span12" style="position:absolute; left:5px; top:150px;">
<form id="login-form" class="form-signin" method="post" action="<?=site_url('api/login')?>">
    
 <fieldset>
    <legend>Login</legend>
	<div class="control-group">
		<label class="control-label"> User Name</label>
		<div class="controls">
			<input type="text" name="username" class="input-xlarge">
		</div>	
	</div>
	
	<div class="control-group">
		<label class="control-label"> Password</label>
		<div class="controls">
			<input type="password" name="password" class="input-xlarge">
		</div>	
	</div>
	
	<div class="control-group">
		<div class="controls">
                    <input type="submit" value="Login" class="btn btn-primary"> 
                    <a class="btn btn-success" href="<?=site_url('login/register')?>">Register</a>
		</div>	
	</div>
</fieldset>
</form>
    
</div>
</div>


<script type="text/javascript">
$(function(){
    $("#login-form-error").hide();
    $("#login-form").submit(function(evt){
        evt.preventDefault();
        var url = $(this).attr('action');
        var postData = $(this).serialize();
        
        $.post(url, postData, function(o){
           if(o.result == 1) {
               window.location.href = '<?=site_url('home')?>';
           } 
           else
           {
              $("#login-form-error").show();
               var output = '<ul>';
               if(o.error2)
               {
                   output += '<li>' + o.error2 + '</li>';
               }
               else
               {
                    for (var key in o.error)
                    {
                         var value = o.error[key];
                         output += '<li>' + value + '</li>';
                    }
                }
               output += '</ul>';
               $("#login-form-error").html(output);
           }
            
        },'json');
    });
});
</script>
    