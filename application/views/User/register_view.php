<div class="row-fluid">

    <div class="span4 offset4">
         <div id="register-form-error" class="alert alert-error"><!-- Dynamic field flows --> </div>
    </div>
    
</div>


<div class="row-fluid">
<div class="span12">
   
<form id="register-form" class="form-signin" method="post" action="<?=site_url('api/register')?>">
 <fieldset>
    <legend>Register User</legend>
    <div class="col-sm-12">
    <div class="control-group">
		<label class="control-label"> Employee ID</label>
		<div class="controls">
			<input type="text" name="emp_id" class="input-xlarge">
		</div>	
	</div>
	</div>

	 <div class="col-sm-12">
	<div class="control-group">
		<label class="control-label"> Employee Name</label>
		<div class="controls">
			<input type="text" name="emp_name" class="input-xlarge">
		</div>	
	</div>
	</div>
	
	<div class="control-group">
		<label class="control-label"> State</label>
		<div class="controls">
			<select name="state" class="form-control">
					<option> </option>
				<?php foreach($states as $state) : ?>
					<option> <?php echo $state->state_name; ?> </option>
				<?php endforeach;?>
			</select>
			
		</div>	
	</div>
	
        <div class="control-group">
		<label class="control-label"> Email</label>
		<div class="controls">
			<input type="text" name="email" class="input-xlarge">
		</div>	
	</div>
    
	<div class="control-group">
		<label class="control-label"> Password</label>
		<div class="controls">
			<input type="password" name="password" class="input-xlarge">
		</div>	
	</div>
	
    <div class="control-group">
		<label class="control-label"> Confirm Password</label>
		<div class="controls">
			<input type="password" name="confirm_password" class="input-xlarge">
		</div>	
	</div>
	<div class="control-group">
		<div class="controls">
			<input type="submit" value="Register" class="btn btn-primary"> 
                        <a class="btn btn-inverse" href="<?=site_url('/')?>">Back</a>
		</div>	
	</div>
 </fieldset>
</form>

</div>
</div>





<script type="text/javascript">
$(function(){
    
    $("#register-form-error").hide();
    $("#register-form").submit(function(evt){
        evt.preventDefault();
        var url = $(this).attr('action');
        var postData = $(this).serialize();
        
        $.post(url, postData, function(o){
           if(o.result == 1) {
               window.location.href = '<?=site_url('/')?>';
           } 
           else
           {
               $("#register-form-error").show();
               var output = '<ul>';
               
               for (var key in o.error)
               {
                    var value = o.error[key];
                    output += '<li>' + value + '</li>';
               }
               output += '</ul>';
               $("#register-form-error").html(output);
               
           }
            
        },'json');
    });
});
</script>
    