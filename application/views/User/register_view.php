<body class="hold-transition register-page">  


    
      <div class="register-logo">
        <a href="<?=base_url()?>login"><b>Xerox </b><small>| ECCRM</small></a>
      </div>
      
<div class="col-md-3">
</div>

<div class="col-md-4">
      <div class="register-box-body">
        <p class="login-box-msg">Register a new membership</p>
        <form id="register-form" class="form-signin" method="post" action="<?=site_url('api/register')?>">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="emp_id" placeholder="Employee ID">
            <span class="glyphicon glyphicon-king form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="emp_name" placeholder="Employee Name">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          
          <div class="form-group has-feedback">
            <select name="state" class="form-control" placeholder="State">
					<option disabled selected> Select a State</option>
				<?php foreach($states as $state) : ?>
					<option> <?php echo $state->state_name; ?> </option>
				<?php endforeach;?>
			</select>
          </div>
          
          <div class="form-group has-feedback">
            <input type="email" class="form-control" name="email" placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="confirm_password" placeholder="Retype password">
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
            </div><!-- /.col -->
          </div>
        </form>

        <a href="<?=base_url()?>login" class="text-center">I already have a membership</a>
      </div><!-- /.form-box -->
      
      
</div><!-- /.register-box -->


<div class="col-md-4">

	         <div id="register-form-error"><!-- Dynamic field flows --> </div>

</div>


    <!-- jQuery 2.1.4 -->
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="../../plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '10%' // optional
        });
      });
    </script>
    
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
               var output = '<div  class="alert alert-error">';
                   output += '<ul>';
               
               for (var key in o.error)
               {
                    var value = o.error[key];
                    output += '<li>' + value + '</li>';
               }
               output += '</ul>';
               output += '</div>';
               $("#register-form-error").html(output).fadeIn();
               
           }
           setTimeout( function(){
        	   $("#register-form-error").fadeOut();
       	},3000);
              	
        },'json');
    });
});
</script>
    </body>